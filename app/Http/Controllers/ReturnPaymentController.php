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
        // $orderHeaders = $this->orderHeaderRepository->findWhere(['status'=>'NOPREPARED']);

        $orderHeaders = $this->orderHeader
        // ->Where('seller_id', $user_id)
            ->whereRaw('total_price != seller_actual_price and (status = ? or status = ? or status = ? or status = ?)', ['CONFIRMED','COMPLETED','NOPREPARE','ACCEPTED'])
            ->orderBy('updated_at', 'desc')->get();

        foreach ($orderHeaders as $orderHeader) {
            $users = $this->usersRepository->findWhere(['id' => $orderHeader->customer_id]);
            $orderHeader->payment = $this->paymentRepository->findWithoutFail($orderHeader->payment_id);
        }
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
        $orderHeader = $this->orderHeaderRepository->findWithoutFail($id);
        //   dd($orderHeader);
        $payment = $this->paymentRepository->findWithoutFail($orderHeader->payment_id);

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
        $payment = $this->paymentRepository->findWithoutFail($id);

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

        $order = $this->orderHeaderRepository->findWithoutFail($payment->order_id);

        if (empty($order)) {
            Flash::error('payment not found');

            return redirect(route('returnPayment.index'));
        }
    
        $this->orderHeaderRepository->update(['status' => 'RETURNED'], $order->id);

        Flash::success('Payment updated successfully.');

        return redirect(route('returnPayment.index'));
    }
}
