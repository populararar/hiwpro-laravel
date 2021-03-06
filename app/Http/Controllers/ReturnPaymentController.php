<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\OrderHeader;
use App\Repositories\OrderDetailRepository;
use App\Repositories\OrderHeaderRepository;
use App\Repositories\PaymentRepository;
use App\Repositories\UsersRepository;
use Flash;
use Illuminate\Http\Request;

class ReturnPaymentController extends Controller
{
    /** @var  OrderDetailRepository */
    private $orderDetailRepository;

    /** @var  UsersRepository */
    private $usersRepository;

    /** @var  OrderHeaderRepository */
    private $orderHeaderRepository;

    /** @var  PaymentRepository */
    private $paymentRepository;

    private $orderHeader;

    public function __construct(PaymentRepository $paymentRepo, OrderHeader $orderHeader, UsersRepository $usersRepo, OrderDetailRepository $orderDetailRepo, OrderHeaderRepository $orderHeaderRepo)
    {
        $this->orderHeaderRepository = $orderHeaderRepo;
        $this->orderDetailRepository = $orderDetailRepo;
        $this->usersRepository = $usersRepo;
        $this->orderHeader = $orderHeader;
        $this->paymentRepository = $paymentRepo;
    }

    /**
     * Display a listing of the EventJoined.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        // ->whereRaw('total_price != seller_actual_price and (status = ? or status = ? or status = ? or status = ?)', ['CONFIRMED','COMPLETED','NOPREPARE','ACCEPTED'])
        // $orderHeaders = $this->orderHeaderRepository->findWhere(['status'=>'NOPREPARED']);

        $orderHeaders = $this->orderHeader
        // ->Where('seller_id', $user_id)
            ->whereRaw('total_price != seller_actual_price')
            ->orderBy('updated_at', 'desc')->get();
        $orderHeaders = $orderHeaders->sortByDesc('created_at');
        // $orderHeaders = $this->orderHeaderRepository->findWhereIn('id' , $orderHeaders->id);
        
        foreach ($orderHeaders as $orderHeader) {
            $users = $this->usersRepository->findWhere(['id' => $orderHeader->customer_id]);
            $orderHeader->payment = $this->paymentRepository->findWithoutFail($orderHeader->payment_id);
           
        }
        // dd($orderHeaders);
        // dd( $users);
        
        return view('return_payment.index')
            ->with('orderHeaders', $orderHeaders)
            ->with('users', $users);
    }

    /**
     * Display the specified Payment.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        // $orderHeader = $this->orderHeaderRepository->findWhere(['id' => $id]);
        //   dd($orderHeader);
        $payment = $this->paymentRepository->findWithoutFail($id);

        if (empty($payment)) {
            Flash::error('Payment not found');

            return redirect(route('return_payment.index'));
        }

        return view('return_payment.upload')->with('payment', $payment);
    }

    public function uploadFile($id)
    {
        $orderHeader = $this->orderHeaderRepository->findWhere(['payment_id'=> $id])->first();
        //   dd($orderHeader->payment_id);
        // ->findWhere(['id' => $orderHeader->payment_id]);
        $payment = $this->paymentRepository->findWhere(['id'=> $orderHeader->payment_id])->first();

        return view('return_payment.upload')
            ->with('orderHeader', $orderHeader)
            ->with('payment', $payment);
    }

    /**
     * Update the specified Payment in storage.
     *
     * @param  int              $id
     * @param UpdatePaymentRequest $request
     *
     * @return Response
     */
    public function update($id, Request $request)
    {
        $payment = $this->paymentRepository->findWhere(['id'=> $id])->first();

        if (empty($payment)) {
            Flash::error('payment not found');

            return redirect(route('returnPayment.index'));
        }

        $newPath = '';
        if ($request->hasFile('imgPathUpdate')) {
            $newPath = $request->file('imgPathUpdate')->store('public/upload');
        }

        if ($newPath != '') {
            $newPath = str_replace("public", "", $newPath);
        }
        
        $payment = $this->paymentRepository->update([
            'img_return' => $newPath,
        ], $id);

        $order = $this->orderHeaderRepository->findWhere(['payment_id'=> $id])->first();

        if (empty($order)) {
            Flash::error('payment not found');

            return redirect(route('returnPayment.index'));
        }
    
        $orderHeader = $this->orderHeaderRepository->update(['status' => 'RETURNED'], $order->id);
// dd($orderHeader);
        Flash::success('Payment updated successfully.');

        return redirect(route('returnPayment.index'));
    }
}
