<?php

namespace App\Http\Controllers;

use App\Http\Controllers\AppBaseController;
use App\Http\Requests\CreateOrderHeaderRequest;
use App\Http\Requests\UpdateOrderHeaderRequest;
use App\Repositories\OrderDetailRepository;
use App\Repositories\OrderHeaderRepository;
use Carbon\Carbon;
use Flash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class OrderSellerController extends AppBaseController
{
    /** @var  OrderHeaderRepository */
    private $orderHeaderRepository;

    /** @var  OrderDetailRepository */
    private $orderDetailRepository;

    public function __construct(OrderHeaderRepository $orderHeaderRepo, OrderDetailRepository $orderDetailRepo)
    {
        $this->orderHeaderRepository = $orderHeaderRepo;
        $this->orderDetailRepository = $orderDetailRepo;
    }

    /**
     * Display a listing of the OrderHeader.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $user_id = Auth::user()->id;

        $this->orderHeaderRepository->pushCriteria(new RequestCriteria($request));
        $orderHeaders = $this->orderHeaderRepository->findWhere(['seller_id' => $user_id, 'status' => 'CONFIRMED'])->sortByDesc('updated_at');

        return view('order_sellers.index')
            ->with('orderHeaders', $orderHeaders);
    }

    /**
     * Show the form for creating a new OrderHeader.
     *
     * @return Response
     */
    public function create()
    {
        return view('order_sellers.create');
    }

    /**
     * Store a newly created OrderHeader in storage.
     *
     * @param CreateOrderHeaderRequest $request
     *
     * @return Response
     */
    public function store(CreateOrderHeaderRequest $request)
    {
        $input = $request->all();

        $orderHeader = $this->orderHeaderRepository->create($input);

        Flash::success('Order Header saved successfully.');

        return redirect(route('orderHeaders.index'));
    }

    /**
     * Display the specified OrderHeader.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $orderHeader = $this->orderHeaderRepository->findWithoutFail($id);

        if (empty($orderHeader)) {
            Flash::error('Order Header not found');

            return redirect(route('orderHeaders.index'));
        }

        return view('order_sellers.show')->with('orderHeader', $orderHeader);
    }

    /**
     * Show the form for editing the specified OrderHeader.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id, Request $request)
    {
        $user = Auth::user();

        // $orderHeaders = $this->orderHeaderRepository->with('orderDetails')->findWhere(['customer_id' => $user->id, 'order_number' => $id])->first();
        $orderHeader = $this->orderHeaderRepository->findWithoutFail($id);

        if (empty($orderHeader)) {
            Flash::error('Order Header not found');
            return redirect(route('orderHeaders.index'));
        }

        $orderDetails = $this->orderDetailRepository->findWhere(['order_header_id' => $orderHeader->id]);

        return view('order_sellers.edit')
            ->with('orderHeader', $orderHeader)
            ->with('orderDetails', $orderDetails)
            ->with('user', $user);
    }

    /**
     * Update the specified OrderHeader in storage.
     *
     * @param  int              $id
     * @param UpdateOrderHeaderRequest $request
     *
     * @return Response
     */
    public function update($id, Request $request)
    {

        $orderHeader = $this->orderHeaderRepository->findWithoutFail($id);

        if (empty($orderHeader)) {
            Flash::error('Order Header not found');

            return redirect(route('orderSellers.index'));
        }

        $formDetail = $request->input('form-detail');
        if (empty($formDetail)) {
            $orderHeader = $this->orderHeaderRepository->update($request->all(), $id);

            Flash::success('Order Header updated successfully.');

            return redirect(route('orderSellers.index'));
        }
        # New feature - for seller update qty
        $detailIDs = $request->input('detail_id');
        $actualQty = $request->input('seller_actual_qty');
        foreach ($detailIDs as $key => $detailId) {
            $qty = $actualQty[$key];
            $this->orderDetailRepository->update([
                'seller_actual_qty' => (int) $qty,
                'seller_actual_at' => Carbon::now()->toDateTimeString(),
                'seller_actual_status' => 1,
            ], $detailId);
        }
        # New feature - edit total price
        $this->updateNewTotalPrice($orderHeader->id);

        Flash::success('Order Detail updated successfully.');
        return redirect(route('orderSellers.index'));
    }

    private function updateNewTotalPrice($id)
    {
        $total = 0;
        $detail = $this->orderDetailRepository->findWhere(['order_header_id' => $id]);
        foreach ($detail as $item) {
            $price = $item->price;
            $actualQty = $item->seller_actual_qty;
            $fee = $item->fee;
            $ship = (int) $item->shipping_rate;
            $value = ($price * $actualQty) + ($fee + $ship);
            $total = $total + $value;
        }
        $this->orderHeaderRepository->update([
            'seller_actual_price' => $total,
            'seller_actual_at' => Carbon::now()->toDateTimeString(),
        ], $id);
    }

    /**
     * Remove the specified OrderHeader from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $orderHeader = $this->orderHeaderRepository->findWithoutFail($id);

        if (empty($orderHeader)) {
            Flash::error('Order Header not found');

            return redirect(route('orderHeaders.index'));
        }

        $this->orderHeaderRepository->delete($id);

        Flash::success('Order Header deleted successfully.');

        return redirect(route('orderHeaders.index'));
    }
}
