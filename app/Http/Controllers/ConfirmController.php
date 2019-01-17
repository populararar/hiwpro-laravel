<?php

namespace App\Http\Controllers;

use App\Repositories\EventRepository;
use App\Repositories\OrderDetailRepository;
use App\Repositories\OrderHeaderRepository;
use App\Repositories\PaymentRepository;
use App\Repositories\UsersRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use Response;

class ConfirmController extends Controller
{
    /** @var  PaymentRepository */
    private $paymentRepository;

    //
    /** @var  EventRepository */
    private $eventRepository;

    /** @var  UsersRepository */
    private $usersRepository;

    /** @var  OrderHeaderRepository */
    private $orderHeaderRepository;

    /** @var  OrderDetailRepository */
    private $orderDetailRepository;

    public function __construct(PaymentRepository $paymentRepo, OrderDetailRepository $orderDetailRepo, EventRepository $eventRepo, OrderHeaderRepository $orderHeaderRepo, UsersRepository $usersRepo)
    {
        $this->orderHeaderRepository = $orderHeaderRepo;
        $this->usersRepository = $usersRepo;
        $this->eventRepository = $eventRepo;
        $this->orderDetailRepository = $orderDetailRepo;
        $this->paymentRepository = $paymentRepo;
    }

    public function index(Request $request)
    {

        if (!$this->validCart()) {
            return redirect()->route('home');
        }

        if ($request->session()->has('sellers')) {
            $sellers = $request->session()->get('sellers');
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

            return view('confirms.store')
                ->with('mapSeller', $mapSeller)
                ->with('shopGroup', $shopGroup)
                ->with('cart', $cart);
        }

        return redirect()->route('cart.detail');
    }

    /**
     * Display a listing of the OrderHeader.
     *
     * @param Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        if (!$this->validCart()) {
            return redirect()->route('home');
        }

        //Event shop id | Seller Id
        $sellers = $request->input('seller');
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

        $request->session()->put('sellers', $sellers);

        return view('confirms.store')
            ->with('mapSeller', $mapSeller)
            ->with('shopGroup', $shopGroup)
            ->with('cart', $cart);
    }

    public function edit($confirm, Request $request)
    {
        if (!$this->validCart()) {
            return redirect()->route('home');
        }

        // member address get display

        return view('confirms.address'); //->with('memberAddress', []);
    }

    function final (Request $request) {
        if (!$this->validCart()) {
            return redirect()->route('home');
        }

        $address = $request->all();
        // dd($address);
        $sellers = $request->session()->get('sellers');
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

        $request->session()->put('address', $address);

        return view('confirms.final')
            ->with('mapSeller', $mapSeller)
            ->with('shopGroup', $shopGroup)
            ->with('cart', $cart)
            ->with('address', $address);

        // return view('confirm.final')
    }/**

     * Display the specified Event.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        // dd($id);

        return view('confirms.payment');
    }

    private function validCart()
    {
        $cart = \Cart::getContent();
        return count($cart) > 0 ? true : false;
    }

    public function payment($id, Request $request)
    {
        $user = Auth::user();
        $orderHeaders = $this->orderHeaderRepository
            ->findWhere(['customer_id' => $user->id, 'order_number' => $id])->first();
        if (empty($orderHeaders)) {
            return redirect()->route('home');
        }

        return view('confirms.payment')->with('orderHeaders', $orderHeaders)->with('user', $user);

    }
    public function paymentStore($id, Request $request)
    {
        $user = Auth::user();
        $orderHeaders = $this->orderHeaderRepository
            ->findWhere(['customer_id' => $user->id, 'order_number' => $id])->first();
        if (empty($orderHeaders)) {
            return redirect()->route('home');
        }

        $path = $request->file('img_path')->store('public/upload');

        $input = $request->all();

        $input["img_path"] = str_replace("public", "", $path);

        $input['order_id'] = $orderHeaders->id;
        
        $payment = $this->paymentRepository->create($input);
       
        $orderHeader = $this->orderHeaderRepository->update([
            'payment_id'=> $payment->id,
            'slip_status'=>"UPLOADED",
            // 'shipping_date'=> Carbon::now()->toDateTimeString()
        ], $orderHeaders->id);


        return redirect()->route('orders.statusdetail',[$orderHeaders->order_number]);
    }

}
