<?php

namespace App\Http\Controllers;

use App\Http\Controllers\AppBaseController;
use App\Http\Requests\CreateOrderHeaderRequest;
use App\Http\Requests\UpdateOrderHeaderRequest;
use App\Repositories\OrderDetailRepository;
use App\Repositories\OrderHeaderRepository;
use App\Repositories\UsersRepository;
use Carbon\Carbon;
use Flash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class OrderController extends AppBaseController
{

    /** @var  OrderDetailRepository */
    private $orderDetailRepository;

    /** @var  UsersRepository */
    private $usersRepository;

    /** @var  OrderHeaderRepository */
    private $orderHeaderRepository;

    public function __construct(OrderDetailRepository $orderDetailRepo, OrderHeaderRepository $orderHeaderRepo, UsersRepository $usersRepo)
    {
        $this->orderHeaderRepository = $orderHeaderRepo;
        $this->usersRepository = $usersRepo;
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
        $this->orderHeaderRepository->pushCriteria(new RequestCriteria($request));

        $user = Auth::user();
        $orderHeaders = $this->orderHeaderRepository->findWhere(['customer_id' => $user->id]);
        // $oh=$orderHeaders->first();

        // foreach($oh->orderDetails as $item){
        //     dd($item, $item->product->productdetail);

        // }

        return view('orders.index')
            ->with('orderHeaders', $orderHeaders)
            ->with('user', $user);
    }

    /**
     * Show the form for creating a new OrderHeader.
     *
     * @return Response
     */
    public function create()
    {
        return view('order_headers.create');
    }

    public function statusdetail($id, Request $request)
    {
        $user = Auth::user();
        $orderHeaders = $this->orderHeaderRepository->with('orderDetails')->findWhere(['customer_id' => $user->id, 'order_number' => $id])->first();
        return view('orders.statusdetail')->with('orderHeaders', $orderHeaders);
    }

    private function validCart()
    {
        $cart = \Cart::getContent();
        return count($cart) > 0 ? true : false;
    }

    /**
     * Store a newly created OrderHeader in storage.
     *
     * @param CreateOrderHeaderRequest $request
     *
     * @return Response
     */
    public function store(Request $request)
    {
        // $input = $request->all();

        if (!$this->validCart()) {
            return redirect()->route('home');
        }

        $sellers = $request->session()->get('sellers');
        if (empty($sellers)) {
            return redirect()->route('home');
        }

        $mapSeller = [];
        foreach ($sellers as $s) {
            $arr = explode('-', $s);
            $eventShopId = $arr[0];
            $sellerId = $arr[1];
            // Query seller data
            $mapSeller[$eventShopId] = $this->usersRepository->findWithoutFail($sellerId);
        }

        $cart = \Cart::getContent();
        $shopGroup = $cart->groupBy('attributes.key');

        $address = $request->session()->get('address');
        if (empty($address)) {
            return redirect()->route('home');
        }

        $now = Carbon::now()->toDateTimeString();

        $user = Auth::user();
        $i = 0;
        foreach ($shopGroup as $key => $group) {
            $orderNumber = Carbon::now()->format('Ymd') . $i++ . '' . Carbon::now()->micro;
            $totalPrice = 0;
            foreach ($group as $item) {
                $totalPrice = $totalPrice + ($item->price + $item->attributes->fee + $item->attributes->shippping);
            }
            $eventShopId = $group->first()->attributes->event_shop_id;
            $seller = $mapSeller[$eventShopId];
            $expDate = Carbon::tomorrow('Asia/Bangkok')->toDateTimeString();
            $orderHeaderData = [
                'address' => $address['address'],
                'order_date' => $now,
                'order_number' => $orderNumber,
                'exp_date' => $expDate,
                'slip_status' => 'WAITING',
                'total_price' => $totalPrice,
                'seller_id' => $seller->id,
                'customer_id' => $user->id,
                'status' => 'CREATE',
            ];
            $orderHeader = $this->orderHeaderRepository->create($orderHeaderData);
            foreach ($group as $item) {
                $detailData = [
                    'product_id' => $item->id,
                    'qrt' => $item->quantity,
                    'price' => $item->price,
                    'option' => '', //$item->attributes->option
                    'fee' => $item->attributes->fee,
                    'shipping_rate' => $item->attributes->shippping,
                    'order_header_id' => $orderHeader->id,
                    'seller_id' => $seller->id,
                ];
                $this->orderDetailRepository->create($detailData);
            }
        }

        Flash::success('Order Header saved successfully.');
        \Cart::clear();
        $request->session()->forget('sellers');
        $request->session()->forget('address');

        return redirect(route('orders.index'));
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

        return view('order_headers.show')->with('orderHeader', $orderHeader);
    }

    /**
     * Show the form for editing the specified OrderHeader.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $orderHeader = $this->orderHeaderRepository->findWithoutFail($id);

        if (empty($orderHeader)) {
            Flash::error('Order Header not found');

            return redirect(route('orderHeaders.index'));
        }

        return view('order_headers.edit')->with('orderHeader', $orderHeader);
    }

    /**
     * Update the specified OrderHeader in storage.
     *
     * @param  int              $id
     * @param UpdateOrderHeaderRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateOrderHeaderRequest $request)
    {
        $orderHeader = $this->orderHeaderRepository->findWithoutFail($id);

        if (empty($orderHeader)) {
            Flash::error('Order Header not found');

            return redirect(route('orderHeaders.index'));
        }

        $orderHeader = $this->orderHeaderRepository->update($request->all(), $id);

        Flash::success('Order Header updated successfully.');

        return redirect(route('orderHeaders.index'));
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
