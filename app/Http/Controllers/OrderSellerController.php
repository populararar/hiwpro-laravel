<?php

namespace App\Http\Controllers;

use App\Http\Controllers\AppBaseController;
use App\Http\Requests\CreateOrderHeaderRequest;
use App\Http\Requests\UpdateOrderHeaderRequest;
use App\Mail\OrderShipped;
use App\Models\OrderHeader;
use App\Repositories\EventRepository;
use App\Repositories\EventShopRepository;
use App\Repositories\NotificationRepository;
use App\Repositories\OrderDetailRepository;
use App\Repositories\OrderHeaderRepository;
use App\Repositories\ProductRepository;
use App\Repositories\ShopRepository;
use Carbon\Carbon;
use Flash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class OrderSellerController extends AppBaseController
{
    /** @var  NotificationRepository */
    private $notificationRepository;

    /** @var  OrderHeaderRepository */
    private $orderHeaderRepository;

    /** @var  OrderHeaderRepository */
    private $orderHeader;

    /** @var  OrderDetailRepository */
    private $orderDetailRepository;

    /** @var  ProductRepository */
    private $productRepository;

    /** @var  EventShopRepository */
    private $eventShopRepository;

    /** @var  ShopRepository */
    private $shopRepository;

    /** @var  EventRepository */
    private $eventRepository;

    public function __construct(EventRepository $eventRepo, EventShopRepository $eventShopRepo, ShopRepository $shopRepository, ProductRepository $productRepo, OrderHeader $orderHeader, NotificationRepository $notificationRepo, OrderHeaderRepository $orderHeaderRepo, OrderDetailRepository $orderDetailRepo)
    {
        $this->orderHeaderRepository = $orderHeaderRepo;
        $this->orderDetailRepository = $orderDetailRepo;
        $this->notificationRepository = $notificationRepo;
        $this->orderHeader = $orderHeader;
        $this->productRepository = $productRepo;
        $this->eventShopRepository = $eventShopRepo;
        $this->shopRepository = $shopRepository;
        $this->eventRepository = $eventRepo;
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
        $orderHeaders = $this->orderHeader
        // ->Where('seller_id', $user_id)
            ->whereRaw('seller_id =? and (status = ? or status = ?)', [$user_id, 'CONFIRMED', 'COMPLETED'])
            ->orderBy('updated_at', 'desc')->get();

        $countOrder = \DB::table('order_header')->where('seller_id', Auth::user()->id)->where('status', 'CONFIRMED')->count('id');
        $countPrepared = \DB::table('order_header')->where('seller_id', Auth::user()->id)->where('status', 'PREPARED')->count('id');
        $countNoPrepared = \DB::table('order_header')->where('seller_id', Auth::user()->id)->where('status', 'NOPREPARED')->count('id');
        $countFinish = \DB::table('order_header')->where('seller_id', Auth::user()->id)->where('status', 'COMPLETED')->count('id');
        $countSum = \DB::table('order_header')->where('seller_id', Auth::user()->id)->count('id');

        $orderCount = $countOrder + $countPrepared + $countNoPrepared;

        $countIncome = \DB::table('order_header')
            ->where('seller_id', Auth::user()->id)
            ->selectRaw("SUM(seller_actual_price) AS income")->get()->first();

        $countProduct = \DB::table('order_detail')
            ->where('seller_id', Auth::user()->id)
            ->selectRaw("SUM(qrt) AS product")->get()->first();
        // dd($countProduct);

        $orderGroup = $this->getOrderList();
        // dd($orderGroup);
        foreach ($orderHeaders as $orderHeader) {
            $orderHeader->order_date = $this->formatEventDate($orderHeader->order_date);
        }

        return view('order_sellers.index')
            ->with('orderCount', $orderCount)
            ->with('countIncome', $countIncome)
            ->with('countFinish', $countFinish)
            ->with('countProduct', $countProduct)
            ->with('orderGroup', $orderGroup)
            ->with('orderHeaders', $orderHeaders);
    }

    public function downloadPdf(Request $request)
    {
        // $user_id = Auth::user()->id;
        // // dd($user_id);
        // $this->orderHeaderRepository->pushCriteria(new RequestCriteria($request));
        // $orderHeaders = $this->orderHeader
        // // ->Where('seller_id', $user_id)
        //     ->whereRaw('seller_id =? and (status = ? or status = ?)', [$user_id, 'CONFIRMED', 'COMPLETED'])
        //     ->orderBy('updated_at', 'desc')->get();

        $orderGroup = $this->getOrderList();

        return view('order_sellers.download')->with('orderGroup', $orderGroup);
        // $pdf = PDF::loadView('order_sellers.download', ["orderGroup" => $orderGroup]);
        // dd($pdf);
        //dd();
        // return $pdf->save(storage_path('app/public/upload/orderlist.pdf'));
        // return $pdf->stream();

    }

    private function getOrderList()
    {
        $mapEventShop = [];
        $products = [];
        // $orders = $this->orderHeaderRepository->with('orderDetails')->findWhere(['seller_id' => Auth::user()->id, 'status' => 'CONFIRMED']);

        $orders = $this->orderHeader->with('orderDetails')
            ->whereRaw('seller_id = ? and  (status = \'CONFIRMED\' or status =  \'NOPREPARED\' or status = \'PREPARED\') ',
                [Auth::user()->id]
            )->get();

        foreach ($orders as $order) {
            $eventShopId = $order->event_shop_id;
            if (empty($mapEventShop[$eventShopId])) {
                $mapEventShop[$eventShopId] = $order->orderDetails->toArray(); // [item1 , item2]
            } else {
                $temp = $mapEventShop[$eventShopId]; // [item1 , item2]
                $orderDetailArray = $order->orderDetails->toArray(); // [item3 , item4]
                $mapEventShop[$eventShopId] = array_merge($temp, $orderDetailArray);
            }

        }

        foreach ($mapEventShop as $key => $group) {
            // [ 1=>[item1 , item2], ...]
            $mapItem = [];
            foreach ($group as $item) { // item1 => [id,name,qty]
                if ($item['seller_actual_status'] == 1) {
                    continue;
                }

                $itemId = $item['product_id'];
                if (empty($mapItem[$itemId])) {
                    $mapItem[$itemId] = $item; // [ itemId_1 => [id,name,qty] ]
                } else {
                    $olditem = $mapItem[$itemId];
                    $qty = (int) $olditem["qrt"];
                    $qty += (int) $item['qrt'];
                    $olditem["qrt"] = $qty;
                    $mapItem[$itemId] = $olditem;
                }
            }
            $mapEventShop[$key] = $mapItem;
        }

        foreach ($mapEventShop as $key => $group) {
            foreach ($group as $keyItem => $item) {
                $eventShopId = $item['event_shop_id'];
                $pid = $item['product_id'];
                $product = $this->productRepository->findWithoutFail($pid);
                $eventShop = $this->eventShopRepository->with(['shop', 'event'])->findWithoutFail($eventShopId);
                // dd( $item);
                $location = $eventShop->shop->location;
                $eventShop->shop_location = $location;
                $item['product'] = $product;
                $item['event_shop'] = $eventShop;
                $group[$keyItem] = $item;
            }
            $mapEventShop[$key] = $group;
        }
        return $mapEventShop;
    }
    public function productUpdate(Request $request)
    {
        $detailId = $request->input("detail_id");
        $actualQty = $request->input("seller_actual_qty");
        $headerId = $request->input("header_id");

        $detail = $this->orderDetailRepository->findWithoutFail($detailId);
        if ($actualQty > $detail->qrt) {
            return back();
        }

        $this->orderDetailRepository->update([
            'seller_actual_qty' => (int) $actualQty,
            'seller_actual_at' => Carbon::now()->toDateTimeString(),
            'seller_actual_status' => 1,
        ], $detailId);

        $orderHeader = $this->orderHeaderRepository->findWithoutFail($headerId);
        $complete = true;
        foreach ($orderHeader->orderDetails as $item) {
            $actual = empty($item->seller_actual_qty) ? 0 : (int) $item->seller_actual_qty;
            if ($item->qrt != $actual) {
                $complete = false;
            }
        }

        $status = $complete ? "PREPARED" : "NOPREPARED";
        $orderHeader = $this->orderHeaderRepository->update(['status' => $status], $orderHeader->id);
        $this->updateNewTotalPrice($orderHeader->id);

        return redirect()->route('orderSeller.product', [$detail->product_id, $detail->event_shop_id]);
    }

    public function showEventShopDetail($product, $eventShop)
    {

        $orders = $this->orderHeader->with('orderDetails')
            ->whereRaw('seller_id = ? and  (status = \'CONFIRMED\' or status =  \'NOPREPARED\' or status = \'PREPARED\') and event_shop_id = ?',
                [Auth::user()->id, $eventShop]
            )->get();

        $eventShops = $this->eventShopRepository->findWithoutFail($eventShop);
        $event = $this->eventRepository->findWithoutFail($eventShops->event_id);
        $shop = $this->shopRepository->findWithoutFail($eventShops->shop_id);

        $orderHeaderId = [];
        foreach ($orders as $order) {
            array_push($orderHeaderId, $order->id);
        }
        // detail
        $orderDetails = $this->orderDetailRepository->findWhereIn('order_header_id', $orderHeaderId);
        $orderDetails = $orderDetails->where('product_id', $product);

        $product = $this->productRepository->findWithoutFail($product);
        foreach ($orderDetails as $detail) {
            $orderHeader = $this->orderHeaderRepository->with('customer')->findWithoutFail($detail->order_header_id);
            $detail->customer = $orderHeader->customer;
        }

        // dd($orderDetails);
        return view('order_sellers.showEventShopDetail')
            ->with('shop', $shop)
            ->with('event', $event)
            ->with('product', $product)
            ->with('eventShop', $eventShop)
            // ->with('orderHeader', $orderHeader)
            ->with('orderDetail', $orderDetails);
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

            $input = $request->all();
            $input['tracking'] = $input['tracking'];
            $input['status'] = 'COMPLETED';
            $input['order_date'] = $orderHeader->order_date;
            $input['exp_date'] = $orderHeader->exp_date;
            if (empty($input['shipping_date'])) {
                $input['shipping_date'] = Carbon::now()->setTimezone('Asia/Bangkok')->toDateTimeString();
            }

            $orderHeader = $this->orderHeaderRepository->update($input, $id);

            Flash::success('Order Header updated successfully.');

            return redirect(route('orderSellers.index'));
        }
        # New feature - for seller update qty
        $detailIDs = $request->input('detail_id');
        $actualQty = $request->input('seller_actual_qty');
        $complete = true;
        foreach ($detailIDs as $key => $detailId) {
            $qty = $actualQty[$key];
            $detail = $this->orderDetailRepository->findWithoutFail($detailId);
            if ($detail->qrt != $qty) {
                $complete = false;
            }

            $this->orderDetailRepository->update([
                'seller_actual_qty' => (int) $qty,
                'seller_actual_at' => Carbon::now()->toDateTimeString(),
                'seller_actual_status' => 1,
            ], $detailId);
        }

        if ($complete) {
            $orderHeader = $this->orderHeaderRepository->update(['status' => 'PREPARED'], $id);
            Flash::success('Order Detail updated successfully.');

            $orderDetails = $this->orderDetailRepository->findWhere(['order_header_id' => $orderHeader->id]);

            $user = Auth::user();

            return view('order_sellers.edit')
                ->with('orderHeader', $orderHeader)
                ->with('orderDetails', $orderDetails)
                ->with('user', $user);
        }
        $orderHeader = $this->orderHeaderRepository->update(['status' => 'NOPREPARED'], $id);
        # New feature - edit total price
        $this->updateNewTotalPrice($orderHeader->id);
        $this->saveNotification($orderHeader, $complete);
        Flash::success('Order Detail updated successfully.');
        return redirect(route('orderSellers.index'));
    }

    private function saveNotification($order, $complete)
    {
        // dd($order, $complete);
        if ($complete) {
            $this->notificationRepository->create([
                'order_id' => $order->id,
                'user_id' => $order->customer_id,
                'title' => 'สินค้ากำลังอยู่ในระหว่างการจัดส่ง',
                'massage' => '',
                'status' => 0,
            ]);
        } else {
            // $orderHeader
            $customerEmail = $order->customer->email;
            Mail::to($customerEmail)->send(new OrderShipped($order, 'NO_COMPLETE'));
            $this->notificationRepository->create([
                'order_id' => $order->id,
                'user_id' => $order->customer_id,
                'title' => 'สินค้าถูกส่งไม่ครบตามจำนวนกรุณาตรวจสอบรายการสินค้า',
                'massage' => '',
                'status' => 0,
            ]);
        }

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
            $value = $actualQty * ($price + $fee + $ship);
            $total = $total + $value;
        }
        $this->orderHeaderRepository->update([
            'seller_actual_price' => $total,
            'seller_actual_at' => Carbon::now()->setTimezone('Asia/Bangkok')->toDateTimeString(),
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
    private function formatEventDate($dateTime)
    {
        return Carbon::parse($dateTime)->format('d M Y');
    }
}
