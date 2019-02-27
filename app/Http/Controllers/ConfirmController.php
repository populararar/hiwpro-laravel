<?php

namespace App\Http\Controllers;

use App\Repositories\EventRepository;
use App\Repositories\OrderDetailRepository;
use App\Repositories\OrderHeaderRepository;
use App\Repositories\PaymentRepository;
use App\Repositories\ProfileRepository;
use App\Repositories\UsersRepository;
use DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Response;
use Flash;
use Validator;

class ConfirmController extends Controller
{
    /** @var  ProfileRepository */
    private $profileRepository;

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

    public function __construct( ProfileRepository $profileRepo,PaymentRepository $paymentRepo, OrderDetailRepository $orderDetailRepo, EventRepository $eventRepo, OrderHeaderRepository $orderHeaderRepo, UsersRepository $usersRepo)
    {
        $this->orderHeaderRepository = $orderHeaderRepo;
        $this->usersRepository = $usersRepo;
        $this->eventRepository = $eventRepo;
        $this->orderDetailRepository = $orderDetailRepo;
        $this->paymentRepository = $paymentRepo;
        $this->profileRepository = $profileRepo;
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
                // dd( $mapSeller[$eventShopId]->profile);
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

        $list = DB::table('provinces')
            ->orderBy('name_th')->get();

        // member address get display

        return view('confirms.address')->with('list', $list); //->with('memberAddress', []);
    }

    function final (Request $request) {
        if (!$this->validCart()) {
            return redirect()->route('home');
        }

        $customer_info = $request->all();
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

        $request->session()->put('customer_info', $customer_info);
        // dd($customer_info);
        return view('confirms.final')
            ->with('mapSeller', $mapSeller)
            ->with('shopGroup', $shopGroup)
            ->with('cart', $cart)
            ->with('address', $customer_info);

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
    public function slip($id, Request $request)
    {
        $user = Auth::user();
        $orderHeaders = $this->orderHeaderRepository
            ->findWhere(['customer_id' => $user->id, 'order_number' => $id])->first();
        if (empty($orderHeaders)) {
            return redirect()->route('home');
        }

        return view('confirms.slip')->with('orderHeaders', $orderHeaders)->with('user', $user);

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

        $validator = Validator::make($request->all(), [
            // 'name' => 'required',
            // 'bank_num' => 'required|max:10',
            // 'bank_from' => 'required',
            // 'bank_to' => 'required',
            // 'img_path' => 'required',
            // 'send_time' => 'required',
        ]);

      
        $orderHeaders = $this->orderHeaderRepository
            ->findWhere(['customer_id' => $user->id, 'order_number' => $id])->first();
        if (empty($orderHeaders)) {
            return redirect()->route('home');
        }
        
        if ($validator->fails()) {
            return view('confirms.payment')->with('orderHeaders', $orderHeaders)->with('user', $user)
                ->withErrors($validator)
                ->withInput();
        }
      
        if(empty($request->file('img_path'))){
            Flash::error('กรุณาใส่หลักฐานในการโอนเงิน');
            return view('confirms.payment')->with('orderHeaders', $orderHeaders)->with('user', $user);
        }
        else{  
            if(empty($input["name"]) || empty($input["bank_num"]) || empty($input["bank_from"])|| empty($input["bank_to"])||empty( $input["send_time"] )){
                Flash::error('กรุณาใส่ข้อมูลและหลักฐานในการโอนเงินให้ครบถ้วน');
                return view('confirms.payment')->with('orderHeaders', $orderHeaders)->with('user', $user);
            }
            $path = $request->file('img_path')->store('public/upload');

            $input = $request->all();

            $input["img_path"] = str_replace("public", "", $path);
            
            $input['order_id'] = $orderHeaders->id;

            $payment = $this->paymentRepository->create($input);

            $orderHeader = $this->orderHeaderRepository->update([
                'payment_id' => $payment->id,
                'slip_status' => "UPLOADED",
                // 'shipping_date'=> Carbon::now()->setTimezone('Asia/Bangkok')->toDateTimeString(),
            ], $orderHeaders->id);

            Flash::success(' ขอขอบคุณสำหรับการช้อปปิ้งสินค้ากับหิ้วโปร 
            ระบบกำลังดำเนินการตรวจสอบรายการคำสั่งซื้อนี้ 
            ทางเราจะทำการส่งข้อมูลการอัปเดททางข้อความให้คุณทราบโดยเร็ว');
        
            return redirect()->route('orders.statusdetail', [$orderHeaders->order_number]);
        }
       
    }

}

