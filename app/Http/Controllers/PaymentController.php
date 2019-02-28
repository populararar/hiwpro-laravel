<?php

namespace App\Http\Controllers;

use App\Http\Controllers\AppBaseController;
use App\Http\Requests\CreatePaymentRequest;
use App\Http\Requests\UpdatePaymentRequest;
use App\Mail\OrderShipped;
use App\Repositories\OrderHeaderRepository;
use App\Repositories\PaymentRepository;
use Flash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class PaymentController extends AppBaseController
{

    /** @var  OrderHeaderRepository */
    private $orderHeaderRepository;

    /** @var  PaymentRepository */
    private $paymentRepository;

    public function __construct(PaymentRepository $paymentRepo, OrderHeaderRepository $orderHeaderRepo)
    {
        $this->paymentRepository = $paymentRepo;
        $this->orderHeaderRepository = $orderHeaderRepo;
    }

    /**
     * Display a listing of the Payment.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->paymentRepository->pushCriteria(new RequestCriteria($request));
        $payments = $this->paymentRepository->all();

        return view('payments.index')
            ->with('payments', $payments);
    }

    /**
     * Show the form for creating a new Payment.
     *
     * @return Response
     */
    public function create()
    {
        return view('payments.create');
    }

    /**
     * Store a newly created Payment in storage.
     *
     * @param CreatePaymentRequest $request
     *
     * @return Response
     */
    public function store(CreatePaymentRequest $request)
    {
        $input = $request->all();

        $payment = $this->paymentRepository->create($input);

        Flash::success('Payment saved successfully.');

        return redirect(route('payments.index'));
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
        $payment = $this->paymentRepository->findWithoutFail($id);

        if (empty($payment)) {
            Flash::error('Payment not found');

            return redirect(route('payments.index'));
        }

        return view('payments.show')->with('payment', $payment);
    }

    /**
     * Show the form for editing the specified Payment.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $payment = $this->paymentRepository->findWithoutFail($id);

        if (empty($payment)) {
            Flash::error('Payment not found');

            return redirect(route('payments.index'));
        }

        return view('payments.edit')->with('payment', $payment);
    }

    /**
     * Update the specified Payment in storage.
     *
     * @param  int              $id
     * @param UpdatePaymentRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatePaymentRequest $request)
    {
        $payment = $this->paymentRepository->findWithoutFail($id);

        if (empty($payment)) {

            dd($id);
            Flash::error('Payment not found');

            return redirect(route('payments.index'));
        }

        $input = $request->all();

        $input['status'] = 'CONFIRMED';

        $payment = $this->paymentRepository->update($input, $id);
        // dd('aa',$id , $payment->order_id);
        $this->orderHeaderRepository->update(['status' => 'CONFIRMED'], $payment->order_id);

        Flash::success('Payment updated successfully.');

        return redirect(route('payments.index'));
    }

    public function sendMail($paymentId,$id)
    {
        $order = $this->orderHeaderRepository->findWhere(['id' => $id])->first();
        $customerEmail = $order->customer->email;

        if ($order) {
            Mail::to($customerEmail)->send(new OrderShipped($order, 'NO_COMPLETE_PAYMENT'));
        }

        $payment = $this->paymentRepository->findWithoutFail($paymentId);

        if (empty($payment)) {
            Flash::error('Payment not found');

            return redirect(route('payments.index'));
        }

        Flash::success('Sent Report mail successfully.');

        return redirect()->route('payments.edit',[$paymentId]);
    }

    /**
     * Remove the specified Payment from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $payment = $this->paymentRepository->findWithoutFail($id);

        if (empty($payment)) {
            Flash::error('Payment not found');

            return redirect(route('payments.index'));
        }

        $this->paymentRepository->delete($id);

        Flash::success('Payment deleted successfully.');

        return redirect(route('payments.index'));
    }
}
