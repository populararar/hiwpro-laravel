<?php

namespace App\Http\Controllers;

use App\Http\Controllers\AppBaseController;
use App\Http\Requests\CreateOrderHeaderRequest;
use App\Http\Requests\UpdateOrderHeaderRequest;
use App\Repositories\OrderDetailRepository;
use App\Repositories\OrderHeaderRepository;
use App\Repositories\SellerReviewRepository;
use App\Repositories\UsersRepository;
use App\Repositories\NotificationRepository;
use Carbon\Carbon;
use Carbon\DateTimeZone;
use Flash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;
use Validator;

class OrderController extends AppBaseController
{
     /** @var  NotificationRepository */
     private $notificationRepository;

    /** @var  SellerReviewRepository */
    private $sellerReviewRepository;

    /** @var  OrderDetailRepository */
    private $orderDetailRepository;

    /** @var  UsersRepository */
    private $usersRepository;

    /** @var  OrderHeaderRepository */
    private $orderHeaderRepository;

    public function __construct(NotificationRepository $notificationRepo ,SellerReviewRepository $sellerReviewRepo, OrderDetailRepository $orderDetailRepo, OrderHeaderRepository $orderHeaderRepo, UsersRepository $usersRepo)
    {
        $this->orderHeaderRepository = $orderHeaderRepo;
        $this->usersRepository = $usersRepo;
        $this->orderDetailRepository = $orderDetailRepo;
        $this->sellerReviewRepository = $sellerReviewRepo;
        $this->notificationRepository = $notificationRepo;

    }

    /**
     * Display a listing of the OrderHeader.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $user = Auth::user();
        
        $notifications = $this->notificationRepository->findWhere(['user_id' => $user->id])->sortByDesc('created_at')->sortBy('status');

        $this->orderHeaderRepository->pushCriteria(new RequestCriteria($request));

        $user = Auth::user();
        $now = Carbon::now()->setTimezone('Asia/Bangkok');
        $orderHeaders = $this->orderHeaderRepository->findWhere(['customer_id' => $user->id]);
        foreach ($orderHeaders as $order) {
            $create = Carbon::parse($order->created_at);
            if ($order->slip_status == 'WAITING' && $order->status == 'CREATE' && $now->diffInHours($create) >= 2) {
                $this->orderHeaderRepository->update(['status' => 'CLOSE'], $order->id);
                $order->status = "CLOSE";
            }
        }

        return view('orders.index')
            ->with('orderHeaders', $orderHeaders)
            ->with('notifications', $notifications)
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
        $reviewCount = $this->sellerReviewRepository->findWhere(['order_id' => $orderHeaders->id])->count('id');

        return view('orders.statusdetail')->with('orderHeaders', $orderHeaders)->with('reviewCount', $reviewCount);
    }

    public function sellerReview(Request $request)
    {
        // dd($request->all());
        $validator = Validator::make($request->all(), [
            'order_id' => 'required',
            'order_number' => 'required',
            'rating' => 'required',
            'comment' => 'required',

        ]);

        if ($validator->fails()) {
            return redirect()->route('register')
                ->withErrors($validator)
                ->withInput();
        }
        $input = $request->all();
        $order = $this->orderHeaderRepository->findWhere(['order_number' => $input['order_number']])->first();
        if (empty($order)) {
            Flash::error('Order Not found.');
            return redirect()->route('home');
        }

        $input["order_id"] = $order->id;
        $input["user_id"] = $order->seller_id;
        $input["customer_id"] = $user = Auth::user()->id;
        $score = $input["rating"];

        //Upload file
        $path = $request->file('img1')->store('public/upload');
        $path2 = $request->file('img2')->store('public/upload');

        $input["img"] = str_replace("public", "", $path);
        $input["img2"] = str_replace("public", "", $path2);

        $review = $this->sellerReviewRepository->create($input);

        $this->orderHeaderRepository->update([
            'status' => 'ACCEPTED',
            'score' => $score ,
        ],$order->id);

        Flash::success('Review Seller successfully.');

        return redirect()->route('orders.statusdetail', [$order->order_number]);
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

        $info = $request->session()->get('customer_info');
        if (empty($info)) {
            return redirect()->route('home');
        }

        $now = Carbon::now()->setTimezone('Asia/Bangkok')->toDateTimeString();

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
                'address' => $info['address'].' '.$info['city'].' '.$info['state'].' '.$info['country'].' '.$info['zip'],
                'order_date' => $now,
                'order_number' => $orderNumber,
                'exp_date' => $expDate,
                'slip_status' => 'WAITING',
                'total_price' => $totalPrice,
                'seller_id' => $seller->id,
                'customer_id' => $user->id,
                'status' => 'CREATE',
                'name'=> $info['name'],
                'lastname'=> $info['lastname'],
                'email'=> $info['email'],
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

        Flash::success('ขอขอบคุณสำหรับการช้อปปิ้งสินค้ากับหิ้วโปร เราได้รับคำสั่งซื้อของคุณเรียบร้อยแล้ว และกำลังดำเนินการตรวจสอบรายการคำสั่งซื้อนี้ ทางเราจะทำการส่งข้อมูลการอับเดททางข้อความให้คุณทราบโดยเร็ว');
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
