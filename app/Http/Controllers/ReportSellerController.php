<?php

namespace App\Http\Controllers;

use App\Http\Controllers\AppBaseController;
use App\Http\Requests\CreateReportSellerRequest;
use App\Http\Requests\UpdateReportSellerRequest;
use App\Models\Event;
use App\Models\OrderDetail;
use App\Repositories\OrderHeaderRepository;
use App\Repositories\ReportSellerRepository;
use App\Repositories\SellerReviewRepository;
use Carbon\Carbon;
use Flash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Khill\Lavacharts\Lavacharts;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class ReportSellerController extends AppBaseController
{
    /** @var  SellerReviewRepository */
    private $sellerReviewRepository;

    /** @var  ReportSellerRepository */
    private $reportSellerRepository;

    private $event;

    /** @var  OrderHeaderRepository */
    private $orderHeaderRepository;

    private $lava;

    private $orderDetail;

    public function __construct(SellerReviewRepository $sellerReviewRepo, OrderHeaderRepository $orderHeaderRepo, OrderDetail $orderDetail, Lavacharts $lava, Event $event, ReportSellerRepository $reportSellerRepo)
    {
        $this->reportSellerRepository = $reportSellerRepo;
        $this->event = $event;
        $this->orderDetail = $orderDetail;
        $this->lava = $lava;
        $this->orderHeaderRepository = $orderHeaderRepo;
        $this->sellerReviewRepository = $sellerReviewRepo;
    }

    /**
     * Display a listing of the ReportSeller.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->reportSellerRepository->pushCriteria(new RequestCriteria($request));
        $reportSellers = $this->reportSellerRepository->all();

        $start = $request->input('start');
        if (empty($start)) {
            $start = Carbon::now()->format('Y-m-01');
        }
        $end = $request->input('end');
        if (empty($end)) {
            $end = Carbon::now()->endOfMonth()->format('Y-m-d');
        }
        $orderGroup = $this->getOrderList();

        $countSent = \DB::table('order_header')->where('seller_id', Auth::user()->id)->where('status', 'COMPLETED')->count('id');
        $countOrder = \DB::table('order_header')->where('seller_id', Auth::user()->id)->where('status', 'CONFIRMED')->count('id');
        $countIncome = \DB::table('order_header')
            ->where('seller_id', Auth::user()->id)
            ->selectRaw("SUM(seller_actual_price) AS income")->get()->first();
        // dd($countIncome);

        $this->setTotalFree($this->lava, $start, $end);

        $reviews = $this->sellerReviewRepository->findWhere(['user_id' => Auth::user()->id]);
        $avg = $reviews->avg('score');
        if (empty($avg)) {
            $avg = 0;
        }

        $eventShopTopFive = $this->topFiveEvent($start, $end);
        
        $topFiveHotMonth = $this->topFiveHotMonth($start, $end);

        $topFiveOrder = $this->topFiveOrder($start, $end);

        return view('report_sellers.index')
            ->with('avg', $avg)
            //->with('eventShopTopFive', $eventShopTopFive)
            ->with('countIncome', $countIncome)
            ->with('countOrder', $countOrder)
            ->with('countSent', $countSent)
            ->with('lava', $this->lava)
            ->with('orderGroup', $orderGroup)
            ->with('reportSellers', $reportSellers);
    }

    private function topFiveHotMonth($start, $end)
    {
        $data = \DB::table('event_joined')
        ->selectRaw(' YEAR(created_at) as year ,  MONTH(created_at) as month , COUNT(seller_seller_id) AS counted ')
        ->where('created_at' , '>=' , $start)
        ->where('created_at' , '<=' , $end)
        ->groupBy('year','month')
        ->orderBy('counted', 'desc')->take(5)->get();

        /*CONCAT( YEAR(created_at),'-' , MONTH(created_at) ) AS date_time , COUNT(seller_seller_id) AS counted */
        
        foreach ($data as $key => $value) {
           // $eventShop = $this->eventShopRepository->findWithoutFail($value->event_shop_id)
           // $value->shopName = $eventShope->shop->name
           // $value->xxx = $eventShope->xxx->xx
        }

        return $data;
    }

    private function topFiveEvent($start, $end)
    {
        $data = \DB::table('event_joined')
        ->selectRaw(' event_shop_id , COUNT(seller_seller_id) AS counted ')
        ->where('created_at' , '>=' , $start)
        ->where('created_at' , '<=' , $end)
        ->groupBy('event_shop_id')
        ->orderBy('counted', 'desc')->take(5)->get();

        foreach ($data as $key => $value) {
           // $eventShop = $this->eventShopRepository->findWithoutFail($value->event_shop_id)
           // $value->shopName = $eventShope->shop->name
           // $value->xxx = $eventShope->xxx->xx
        }

        return $data;
    }

    private function topFiveOrder($start, $end)
    {
        $data = \DB::table('order_header')
        ->selectRaw(' event_shop_id , COUNT(id) AS counted ')
        ->where('created_at' , '>=' , $start)
        ->where('created_at' , '<=' , $end)
        ->groupBy('event_shop_id')
        ->orderBy('counted', 'desc')->take(5)->get();

        foreach ($data as $key => $value) {
           // $eventShop = $this->eventShopRepository->findWithoutFail($value->event_shop_id)
           // $value->shopName = $eventShope->shop->name
           // $value->xxx = $eventShope->xxx->xx
        }

        return $data;
    }

    private function getOrderList()
    {
        $products = [];
        $orders = $this->orderHeaderRepository->findWhere(['seller_id' => Auth::user()->id, 'status' => 'CONFIRMED']);
        foreach ($orders as $order) {
            $detail = $order->orderDetails;
            if (count($detail) <= 0) {
                continue;
            }
            foreach ($detail as $key => $item) {
                # code... product
                $item->product_name = $item->product->name;
                $item->product_img = $item->product->image_product_id;
                array_push($products, $item);
            }
        }

        $grouped = collect($products)->groupBy('product_name');
        // dd($grouped);
        return $grouped;
    }

    private function setTotalFree($lava, $start, $end)
    {
        $income = $lava->DataTable();

        // get count order

        $income->addStringColumn('Year-Month')
        // ->addNumberColumn('qty')
        // ->addNumberColumn('free')
            ->addNumberColumn('ค่าหิ้ว(บาท)');

        $data = $this->getTotalFree($start, $end);
        foreach ($data as $row) {
            $a = $row; //,  $a->sumQty, $a->sum,
            $income->addRow([$a->first()->date, $a->sumPercent]);
        }

        $lava->ColumnChart('Fee', $income, [
            'title' => 'สรุปรายได้',
            'titleTextStyle' => [
                'color' => '#eb6b2c',
                'fontSize' => 14,
            ],
        ]);
    }
    private function getTotalFree($start, $end)
    {
        $detail = $this->orderDetail
            ->where('created_at', '>=', $start)
            ->where('created_at', '<=', $end)
            ->where('seller_id', Auth::user()->id)
            ->get();

        foreach ($detail as $item) {
            $free = (int) $item->fee * (int) $item->qrt;
            $item->total_free = $free;
            $item->date = Carbon::parse($item->created_at)->format('Y-m');

        }

        $groups = $detail->groupBy('date');
        foreach ($groups as $item) {
            $item->sumQty = $item->sum('qrt');
            $sum = $item->sum('total_free');
            $sumPercent = $item->sum('total_free') * 0.90; //0.90;
            $item->sum = $sum;
            $item->sumPercent = $sumPercent;
        }

        return $groups;
    }

    /**
     * Show the form for creating a new ReportSeller.
     *
     * @return Response
     */
    public function create()
    {
        return view('report_sellers.create');
    }

    /**
     * Store a newly created ReportSeller in storage.
     *
     * @param CreateReportSellerRequest $request
     *
     * @return Response
     */
    public function store(CreateReportSellerRequest $request)
    {
        $input = $request->all();

        $reportSeller = $this->reportSellerRepository->create($input);

        Flash::success('Report Seller saved successfully.');

        return redirect(route('reportSellers.index'));
    }

    /**
     * Display the specified ReportSeller.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $reportSeller = $this->reportSellerRepository->findWithoutFail($id);

        if (empty($reportSeller)) {
            Flash::error('Report Seller not found');

            return redirect(route('reportSellers.index'));
        }

        return view('report_sellers.show')->with('reportSeller', $reportSeller);
    }

    /**
     * Show the form for editing the specified ReportSeller.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $reportSeller = $this->reportSellerRepository->findWithoutFail($id);

        if (empty($reportSeller)) {
            Flash::error('Report Seller not found');

            return redirect(route('reportSellers.index'));
        }

        return view('report_sellers.edit')->with('reportSeller', $reportSeller);
    }

    /**
     * Update the specified ReportSeller in storage.
     *
     * @param  int              $id
     * @param UpdateReportSellerRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateReportSellerRequest $request)
    {
        $reportSeller = $this->reportSellerRepository->findWithoutFail($id);

        if (empty($reportSeller)) {
            Flash::error('Report Seller not found');

            return redirect(route('reportSellers.index'));
        }

        $reportSeller = $this->reportSellerRepository->update($request->all(), $id);

        Flash::success('Report Seller updated successfully.');

        return redirect(route('reportSellers.index'));
    }

    /**
     * Remove the specified ReportSeller from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $reportSeller = $this->reportSellerRepository->findWithoutFail($id);

        if (empty($reportSeller)) {
            Flash::error('Report Seller not found');

            return redirect(route('reportSellers.index'));
        }

        $this->reportSellerRepository->delete($id);

        Flash::success('Report Seller deleted successfully.');

        return redirect(route('reportSellers.index'));
    }
}
