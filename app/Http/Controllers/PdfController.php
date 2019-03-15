<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use PDF;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Mail\OrderShipped;
use App\Models\OrderHeader;
use App\Repositories\EventRepository;
use App\Repositories\EventShopRepository;
use App\Repositories\OrderDetailRepository;
use App\Repositories\OrderHeaderRepository;
use App\Repositories\ProductRepository;
use App\Repositories\ShopRepository;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Flash;
use Response;

class PdfController extends Controller
{
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
 

    public function __construct(EventRepository $eventRepo, EventShopRepository $eventShopRepo, ShopRepository $shopRepository, ProductRepository $productRepo, OrderHeader $orderHeader,  OrderHeaderRepository $orderHeaderRepo, OrderDetailRepository $orderDetailRepo)
    {
        $this->orderHeaderRepository = $orderHeaderRepo;
        $this->orderDetailRepository = $orderDetailRepo;
        $this->orderHeader = $orderHeader;
        $this->productRepository = $productRepo;
        $this->eventShopRepository = $eventShopRepo;
        $this->shopRepository = $shopRepository;
        $this->eventRepository = $eventRepo;
    }

    public function index(Request $request)
    {
        $orderGroup = $this->getOrderList();

        return view('order_sellers.download')
        ->with('orderGroup', $orderGroup);
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
}
