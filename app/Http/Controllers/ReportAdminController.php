<?php

namespace App\Http\Controllers;

use App\Http\Controllers\AppBaseController;
use App\Http\Requests\CreateReportAdminRequest;
use App\Http\Requests\UpdateReportAdminRequest;
use App\Models\Event;
use App\Models\OrderDetail;
use App\Models\OrderHeader;
use App\Repositories\EventRepository;
use App\Repositories\EventShopRepository;
use App\Repositories\OrderHeaderRepository;
use App\Repositories\ReportAdminRepository;
use App\Repositories\ShopRepository;
use Carbon\Carbon;
use Flash;
use Illuminate\Http\Request;
use Khill\Lavacharts\Lavacharts;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class ReportAdminController extends AppBaseController
{
    /** @var  OrderHeaderRepository */
    private $orderHeaderRepository;

    /** @var  ReportAdminRepository */
    private $reportAdminRepository;

    /** @var  ShopRepository */
    private $shopRepository;

    /** @var  EventRepository */
    private $eventRepository;

    /** @var  EventShopRepository */
    private $eventShopRepository;

    private $event;

    private $lava;

    private $orderDetail;

    private $orderHeader;

    public function __construct(EventRepository $eventRepo, EventShopRepository $eventShopRepo, ShopRepository $shopRepository, OrderHeaderRepository $orderHeaderRepo, OrderHeader $orderHeader, OrderDetail $orderDetail, Lavacharts $lava, ReportAdminRepository $reportAdminRepo, Event $event)
    {
        $this->reportAdminRepository = $reportAdminRepo;
        $this->orderHeaderRepository = $orderHeaderRepo;
        $this->orderDetail = $orderDetail;
        $this->orderHeader = $orderHeader;
        $this->eventShopRepository = $eventShopRepo;
        $this->shopRepository = $shopRepository;
        $this->eventRepository = $eventRepo;
        $this->event = $event;
        $this->lava = $lava;

    }

    /**
     * Display a listing of the ReportAdmin.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->reportAdminRepository->pushCriteria(new RequestCriteria($request));
        $reportAdmins = $this->reportAdminRepository->all();
        $start = $request->input('start');
        if (empty($start)) {
            $start = Carbon::now()->format('Y-m-01');
        }
        $end = $request->input('end');
        if (empty($end)) {
            $end = Carbon::now()->endOfMonth()->format('Y-m-d');
        }

        $countSeller = \DB::table('users_roles')->where('role_id', '2')->count('id');
        $countUser = \DB::table('users_roles')->where('role_id', '3')->count('id');
        $countOrder1 = \DB::table('order_header')->where('status', 'CREATE')->count('id');
        $countOrder2 = \DB::table('order_header')->where('status', 'COMFIRMED')->count('id');
        $countOrder3 = \DB::table('order_header')->where('status', 'COMPLETED')->count('id');
        $countOrder4 = \DB::table('order_header')->where('status', 'ACCEPTED')->count('id');

        // $income = $this->event
        // ->selectRaw(" SUM(income) AS income")
        // // ->whereRaw('event.startDate >= ? AND event.event_exp <= ?', [$start, $now])
        // // ->groupBy("YEAR(startDate)")->groupBy("MONTH(startDate)")
        // ->get();

        $this->setTotalFree($this->lava, $start, $end);
        $this->setTopFiveEvent($this->lava, $start, $end);
        $this->setTopFiveOrder($this->lava, $start, $end);

        $this->setIncomeChart($this->lava, $start, $end);

        $this->setTotalFree($this->lava, $start, $end);

        $this->setOrderChart($this->lava);

        $eventShopTopFive = $this->topFiveEvent($start, $end);

        $topFiveHotMonth = $this->topFiveHotMonth($start, $end);

        $topFiveOrder = $this->topFiveOrder($start, $end);

        $stats = [
            'countSeller' => $countSeller,
            'countCustomer' => $countUser,
            'countOrder1' => $countOrder1,
            'countOrder2' => $countOrder2,
            'countOrder3' => $countOrder3,
            'countOrder4' => $countOrder4,
            // 'income' => $income,
        ];

        return view('report_admins.index')
            ->with('lava', $this->lava)
            ->with('stats', $stats)
            ->with('topFiveOrder', $topFiveOrder)
            ->with('topFiveHotMonth', $topFiveHotMonth)
            ->with('eventShopTopFive', $eventShopTopFive)
            ->with('reportAdmin', $reportAdmins);
    }

    private function topFiveHotMonth($start, $end)
    {
        $data = \DB::table('event_joined')
            ->selectRaw(' YEAR(created_at) as year ,  MONTH(created_at) as month , COUNT(seller_seller_id) AS counted ')
            ->where('created_at', '>=', $start)
            ->where('created_at', '<=', $end)
            ->groupBy('year', 'month')
            ->orderBy('counted', 'desc')->take(5)->get();

        /*CONCAT( YEAR(created_at),'-' , MONTH(created_at) ) AS date_time , COUNT(seller_seller_id) AS counted */

        foreach ($data as $key => $value) {
            // dd($value);
            // year": 2019
            // +"month": 3
            // +"counted": 2
            // $eventpShop = $this->eventShopRepository->findWithoutFail($value->event_shop_id)
            // $value->shopName = $eventShope->shop->name
            // $value->xxx = $eventShope->xxx->xx
        }

        // dd($data);

        return $data;
    }

    private function topFiveEvent($start, $end)
    {
        $data = \DB::table('event_joined')
            ->selectRaw(' event_shop_id , COUNT(seller_seller_id) AS counted ')
            ->where('created_at', '>=', $start)
            ->where('created_at', '<=', $end)
            ->groupBy('event_shop_id')
            ->orderBy('counted', 'desc')->take(5)->get();

        foreach ($data as $key => $value) {
            $eventShop = $this->eventShopRepository->findWithoutFail($value->event_shop_id);
            $value->shopName = $this->shopRepository->findWithoutFail($eventShop->shop_id);
            $value->eventName = $this->eventRepository->findWithoutFail($eventShop->event_id);
            //    dd($value->eventName);
            // $value->xxx = $eventShope->xxx->xx
        }

        return $data;
    }

    private function topFiveOrder($start, $end)
    {
        $data = \DB::table('order_header')
            ->selectRaw(' event_shop_id , COUNT(id) AS counted ')
            ->where('created_at', '>=', $start)
            ->where('created_at', '<=', $end)
            ->groupBy('event_shop_id')
            ->orderBy('counted', 'desc')->take(5)->get();

        foreach ($data as $key => $value) {
            $eventShop = $this->eventShopRepository->findWithoutFail($value->event_shop_id);
            // dd($value);
            if (!empty($eventShop->shop_id)) {
                $value->shopName = $this->shopRepository->findWithoutFail($eventShop->shop_id);
                $value->eventName = $this->eventRepository->findWithoutFail($eventShop->event_id);
            }
            // $eventShop = $this->eventShopRepository->findWithoutFail($value->event_shop_id)
            // $value->shopName = $eventShope->shop->name
            // $value->xxx = $eventShope->xxx->xx
        }

        return $data;
    }

    private function setTopFiveEvent($lava, $start, $end)
    {
        $reasons = $lava->DataTable();

        $reasons->addStringColumn('Reasons')
            ->addNumberColumn('Percent');

        $lava->DonutChart('IMDB', $reasons, [
            'title' => 'อีเวนต์ที่มีคนมาร่วมหิ้วมากที่สุด',
        ]);

        // get count order

        $data = $this->topFiveEvent($start, $end);
        foreach ($data as $row) {
            $a = $row; //,  $a->sumQty, $a->sum,
            $reasons->addRow([$a->shopName->name, $a->counted]);
        }

    }

    private function setTopFiveOrder($lava, $start, $end)
    {
        $order = $lava->DataTable();

        $order->addDateColumn('Year-Month')
            ->addNumberColumn('ยอดสั่งซื้อ')
            ->setDateTimeFormat('Y');

        // get count order
        $data = $this->topFiveOrder($start, $end);
        foreach ($data as $row) {
            $a = $row;
            //dd($a);,  $a->sumQty, $a->sum,
            $order->addRow(['2018', $a->counted]);
        }
        $lava->ColumnChart('order', $order, [
            'title' => 'Company Performance',
            'titleTextStyle' => [
                'color' => '#eb6b2c',
                'fontSize' => 14,
            ],
        ]);

        // $income->addStringColumn('Year-Month')
        // // ->addNumberColumn('qty')
        // // ->addNumberColumn('free')
        //     ->addNumberColumn('ค่าหิ้ว(บาท)');

    }

    private function setTopFiveHotMonth($lava, $start, $end)
    {
        $orders = $lava->DataTable();
        $data = $this->topFiveHotMonth( $start, $end);
        $orders->addDateColumn('Year-Month')
            ->addNumberColumn('จำนวน');

        foreach ($data as $row) {
            $year =  $row->year;
            $month =  $row->month;
            $counted = $row->counted;

            $yearMouth = sprintf("%d-%02d", $year,  $month );

            $orders->addRow([$yearMouth, $counted ]);
        }
    
        $lava->ColumnChart('TopFiveHotMonth', $orders, [
            'title' => 'Top Five Hot Month',
            'titleTextStyle' => [
                'color' => '#eb6b2c',
                'fontSize' => 14,
            ],
        ]);
    }

    public function orderReport(Request $request)
    {
        $this->reportAdminRepository->pushCriteria(new RequestCriteria($request));
        $reportAdmins = $this->reportAdminRepository->all();
        $start = $request->input('start');
        if (empty($start)) {
            $start = Carbon::now()->format('Y-m-01');
        }
        $end = $request->input('end');
        if (empty($end)) {
            $end = Carbon::now()->endOfMonth()->format('Y-m-d');
        }

        $countSeller = \DB::table('users_roles')->where('role_id', '2')->count('id');
        $countUser = \DB::table('users_roles')->where('role_id', '3')->count('id');
        $countOrder1 = \DB::table('order_header')->where('status', 'CREATE')->count('id');
        $countOrder2 = \DB::table('order_header')->where('status', 'COMFIRMED')->count('id');
        $countOrder3 = \DB::table('order_header')->where('status', 'COMPLETED')->count('id');
        $countOrder4 = \DB::table('order_header')->where('status', 'ACCEPTED')->count('id');

        $this->setTotalFree($this->lava, $start, $end);
        $this->setTopFiveEvent($this->lava, $start, $end);
        $this->setTopFiveOrder($this->lava, $start, $end);

        $this->setIncomeChart($this->lava, $start, $end);

        $this->setTotalFree($this->lava, $start, $end);

        $this->setOrderChart($this->lava);

        $eventShopTopFive = $this->topFiveEvent($start, $end);

       $topFiveHotMonth = $this->topFiveHotMonth($start, $end);

        $topFiveOrder = $this->topFiveOrder($start, $end);

        $stats = [
            'countSeller' => $countSeller,
            'countCustomer' => $countUser,
            'countOrder1' => $countOrder1,
            'countOrder2' => $countOrder2,
            'countOrder3' => $countOrder3,
            'countOrder4' => $countOrder4,
            // 'income' => $income,
        ];

        return view('report_admins.order_report')
            ->with('lava', $this->lava)
            ->with('stats', $stats)
            ->with('topFiveOrder', $topFiveOrder)
            ->with('topFiveHotMonth', $topFiveHotMonth)
            ->with('eventShopTopFive', $eventShopTopFive)
            ->with('reportAdmin', $reportAdmins);
    }

    /**
     * Display a listing of the ReportAdmin.
     *
     * @param Request $request
     * @return Response
     */
    public function sellerReport(Request $request)
    {
        $this->reportAdminRepository->pushCriteria(new RequestCriteria($request));
        $reportAdmins = $this->reportAdminRepository->all();
        $start = $request->input('start');
        if (empty($start)) {
            $start = Carbon::now()->format('Y-m-01');
        }
        $end = $request->input('end');
        if (empty($end)) {
            $end = Carbon::now()->endOfMonth()->format('Y-m-d');
        }

        $countSeller = \DB::table('users_roles')->where('role_id', '2')->count('id');
        $countUser = \DB::table('users_roles')->where('role_id', '3')->count('id');
        $countOrder1 = \DB::table('order_header')->where('status', 'CREATE')->count('id');
        $countOrder2 = \DB::table('order_header')->where('status', 'COMFIRMED')->count('id');
        $countOrder3 = \DB::table('order_header')->where('status', 'COMPLETED')->count('id');
        $countOrder4 = \DB::table('order_header')->where('status', 'ACCEPTED')->count('id');

        $this->setTotalFree($this->lava, $start, $end);
        $this->setTopFiveEvent($this->lava, $start, $end);
        $this->setTopFiveOrder($this->lava, $start, $end);
        $this->setIncomeChart($this->lava, $start, $end);
        $this->setTotalFree($this->lava, $start, $end);
        $this->setTopFiveHotMonth($this->lava, $start, $end);
        
        $eventShopTopFive = $this->topFiveEvent($start, $end);

        $topFiveHotMonth = $this->topFiveHotMonth($start, $end);

        $topFiveOrder = $this->topFiveOrder($start, $end);

        $stats = [
            'countSeller' => $countSeller,
            'countCustomer' => $countUser,
            'countOrder1' => $countOrder1,
            'countOrder2' => $countOrder2,
            'countOrder3' => $countOrder3,
            'countOrder4' => $countOrder4,
            // 'income' => $income,
        ];

        return view('report_admins.report_seller')
            ->with('lava', $this->lava)
            ->with('stats', $stats)
            ->with('topFiveOrder', $topFiveOrder)
            ->with('topFiveHotMonth', $topFiveHotMonth)
            ->with('eventShopTopFive', $eventShopTopFive)
            ->with('reportAdmin', $reportAdmins);
    }

    private function getCountOrder()
    {

        $data = $this->orderHeader->selectRaw('YEAR(created_at) , MONTH(created_at) , count(id) AS count')
            ->where('status', 'CONFIRMED')
            ->orWhere('status', 'ACCEPTED')
            ->groupBy("YEAR(created_at)")
            ->groupBy("MONTH(created_at)")
            ->get();

        // dd($data);

        foreach ($data as $row) {
            $a = $row->toArray();
            $success = $this->orderHeader->selectRaw('count(id) AS count')
                ->whereRaw('YEAR(created_at) = ? and MONTH(created_at) = ? and status = ?', [$a['YEAR(created_at)'], $a['MONTH(created_at)'], 'COMPLETED'])
                ->first();

            $row->countSuccess = (int) $success->count;
        }

        return $data;

    }

    private function setOrderChart($lava)
    {
        $orders = $lava->DataTable();

        $orders->addStringColumn('Year-Month')
            ->addNumberColumn('กำลังดำเนินการ')
            ->addNumberColumn('จัดส่งแล้ว');

        $data = $this->getCountOrder();
        foreach ($data as $row) {
            $arr = $row->toArray();
            $countFail = $arr["count"];
            $countSuccess = $arr["countSuccess"];

            $yearMouth = sprintf("%d-%02d", $arr["YEAR(created_at)"], $arr["MONTH(created_at)"]);

            $orders->addRow([$yearMouth, $countFail, $countSuccess]);
        }

        $lava->ColumnChart('Orders', $orders, [
            'title' => 'Order counter',
            // 'titleTextStyle' => [
            //     'color'    => '#eb6b2c',
            //     'fontSize' => 12
            // ]
        ]);

    }

    private function setTotalFree($lava, $start, $end)
    {
        $income = $lava->DataTable();

        $income->addStringColumn('Year-Month')
            ->addNumberColumn('free')
            ->addNumberColumn('ค่าหิ้ว');

        $data = $this->getTotalFree($start, $end);
        foreach ($data as $row) {
            $a = $row;
            $income->addRow([$a->first()->date, $a->sum, $a->sumPercent]);
        }

        $lava->ColumnChart('Fee', $income, [
            'title' => 'ค่าหิ้วรวม(บาท)',
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
        //->where('seller_id' , Auth::user()->id)
            ->get();

        foreach ($detail as $item) {
            $free = (int) $item->fee * (int) $item->qrt;
            $item->total_free = $free;
            $item->date = Carbon::parse($item->created_at)->format('Y-m');
        }

        $groups = $detail->groupBy('date');
        foreach ($groups as $item) {
            $sum = $item->sum('total_free');
            $sumPercent = $item->sum('total_free') * 0.90;
            $item->sum = $sum;
            $item->sumPercent = $sumPercent;
        }

        return $groups;
    }

    private function setIncomeChart($lava, $start, $end)
    {
        $income = $lava->DataTable();

        $income->addStringColumn('Year-Month')
            ->addNumberColumn('รายได้ทั้งหมด')
            ->addNumberColumn('ค่าหิ้ว');

        $data = $this->getTotal($start, $end);
        // dd($data );
        foreach ($data as $row) {
            $a = $row->toArray();

            $income->addRow([$a['date'], $a["income"], $a["fee"]]);
        }

        $lava->ColumnChart('Income', $income, [
            'title' => 'รายได้รวม(บาท)',
            'titleTextStyle' => [
                'color' => '#eb6b2c',
                'fontSize' => 14,
            ],
        ]);

    }

    private function getTotal($start, $end)
    {
        // dd($start, $end);
        $data = $this->event
            ->selectRaw("YEAR(startDate) , MONTH(startDate) , SUM(income) AS income")
            ->whereRaw('event.startDate >= ? AND event.event_exp <= ?', [$start, $end])
            ->groupBy("YEAR(startDate)")->groupBy("MONTH(startDate)")
            ->get();
        // dd($data);

        foreach ($data as $key => $row) {
            $m = (string) $row['MONTH(startDate)'];
            $y = (string) $row['YEAR(startDate)'];

            // $this->getTotalFree()

            $detail = $this->orderDetail
            // ->selectRaw("YEAR(created_at) , MONTH(created_at) , SUM(fee) AS fee")
                ->whereRaw("YEAR(created_at) = ? and MONTH(created_at) = ?", [$y, $m])
            // ->groupBy("YEAR(created_at)")->groupBy("MONTH(created_at)")
                ->get();
            $total_fee = 0;
            foreach ($detail as $d) {
                $total = (int) $d->fee * (int) $d->qrt;
                $total_fee = $total_fee + $total;
            }

            // if (empty($detail)) {
            //     $row->fee = 0;
            //     $row->income = (int) $row->income;
            //     $row->date = (string) $row['YEAR(startDate)'] . '-' . (string) $row['MONTH(startDate)'];
            // } else {
            $row->fee = (int) $total_fee;
            $row->income = (int) $row->income;
            $row->date = (string) $row['YEAR(startDate)'] . '-' . (string) $row['MONTH(startDate)'];
            // }
            // dd($row);

        }

        return $data;
    }

    /**
     * Show the form for creating a new ReportAdmin.
     *
     * @return Response
     */
    public function create()
    {
        return view('report_admins.create');
    }

    /**
     * Store a newly created ReportAdmin in storage.
     *
     * @param CreateReportAdminRequest $request
     *
     * @return Response
     */
    public function store(CreateReportAdminRequest $request)
    {
        $input = $request->all();

        $reportAdmin = $this->reportAdminRepository->create($input);

        Flash::success('Report Admin saved successfully.');

        return redirect(route('reportAdmins.index'));
    }

    /**
     * Display the specified ReportAdmin.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $reportAdmin = $this->reportAdminRepository->findWithoutFail($id);

        if (empty($reportAdmin)) {
            Flash::error('Report Admin not found');

            return redirect(route('reportAdmins.index'));
        }

        return view('report_admins.show')->with('reportAdmin', $reportAdmin);
    }

    /**
     * Show the form for editing the specified ReportAdmin.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $reportAdmin = $this->reportAdminRepository->findWithoutFail($id);

        if (empty($reportAdmin)) {
            Flash::error('Report Admin not found');

            return redirect(route('reportAdmins.index'));
        }

        return view('report_admins.edit')->with('reportAdmin', $reportAdmin);
    }

    /**
     * Update the specified ReportAdmin in storage.
     *
     * @param  int              $id
     * @param UpdateReportAdminRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateReportAdminRequest $request)
    {
        $reportAdmin = $this->reportAdminRepository->findWithoutFail($id);

        if (empty($reportAdmin)) {
            Flash::error('Report Admin not found');

            return redirect(route('reportAdmins.index'));
        }

        $reportAdmin = $this->reportAdminRepository->update($request->all(), $id);

        Flash::success('Report Admin updated successfully.');

        return redirect(route('reportAdmins.index'));
    }

    /**
     * Remove the specified ReportAdmin from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $reportAdmin = $this->reportAdminRepository->findWithoutFail($id);

        if (empty($reportAdmin)) {
            Flash::error('Report Admin not found');

            return redirect(route('reportAdmins.index'));
        }

        $this->reportAdminRepository->delete($id);

        Flash::success('Report Admin deleted successfully.');

        return redirect(route('reportAdmins.index'));
    }
}
