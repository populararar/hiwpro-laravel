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

        return view('orders.index')
            ->with('orderHeaders', $orderHeaders);
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
        $address = $request->session()->get('address');
        if (empty($address)) {
            return redirect()->route('home');
        }

        $now = Carbon::now()->toDateTimeString();
        $orderNumber = Carbon::now()->format('YmdHis') . '' . Carbon::now()->micro;
        $user = Auth::user();
        $orderHeaderData = [
            'address' => $address['address'],
            'order_date' => $now,
            'order_number' => $orderNumber,
            // 'exp_date',
            'slip_status' => 'CREATE',
            'total_price' => \Cart::getTotal(),
            // 'tracking_number' ,
            // 'seller_id',
            'customer_id' => $user->id,
            // 'shipping_id',
            // 'shipping_date',
            // 'payment_date',
            // 'accepted_date',
            'status' => 'CREATE',
        ];
        $orderHeader = $this->orderHeaderRepository->create($orderHeaderData);
        $orderDetails = collect([]);
        if (!empty($orderHeader)) {
            foreach ($cart as $item) {
                $event_shop_id = $item->attributes->event_shop_id;
                $seller = $mapSeller[$event_shop_id];

                $detailData = [
                    'qrt' => $item->quantity,
                    'price' => $item->price,
                    'option' => '', //$item->attributes->option
                    'fee' => $item->attributes->fee,
                    'shipping_rate' => $item->attributes->shippping,
                    'order_header_id' => $orderHeader->id,
                    'seller_id' => $seller->id,
                ];

                $orderDetail = $this->orderDetailRepository->create($detailData);
                $orderDetails->put($orderDetail->id, $orderDetail);
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
