<?php

namespace App\Http\Controllers;

use App\Http\Controllers\AppBaseController;
use App\Http\Requests\CreateReportAdminRequest;
use App\Http\Requests\UpdateReportAdminRequest;
use App\Models\Event;
use App\Models\OrderDetail;
use App\Repositories\ReportAdminRepository;
use Carbon\Carbon;
use Flash;
use Illuminate\Http\Request;
use Khill\Lavacharts\Lavacharts;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class ReportAdminController extends AppBaseController
{
    /** @var  ReportAdminRepository */
    private $reportAdminRepository;

    private $event;
    
    private $lava;

    private $orderDetail;

    public function __construct(OrderDetail $orderDetail, Lavacharts $lava, ReportAdminRepository $reportAdminRepo, Event $event)
    {
        $this->reportAdminRepository = $reportAdminRepo;
        $this->event = $event;
        $this->orderDetail = $orderDetail;
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

        // $countOrder = \DB::table('order_header')->where('seller_id' , Auth::user()->id)->where('status', 'COMPLETED')->count('id');
        // $countOrder = \DB::table('order_header')->where('seller_id' , Auth::user()->id)->where('status', 'CREATED')->count('id');

        $this->setIncomeChart($this->lava, $start, $end);

        $this->setTotalFree($this->lava, $start, $end);

        return view('report_admins.index')
            ->with('lava', $this->lava)
            ->with('reportAdmins', $reportAdmins);
    }

    private function setTotalFree($lava, $start, $end)
    {
        $income = $lava->DataTable();

        $income->addStringColumn('Year-Month')
            ->addNumberColumn('free')
            ->addNumberColumn('10%');

        $data = $this->getTotalFree($start, $end);
        foreach ($data as $row) {
            $a = $row;
            $income->addRow([$a->first()->date, $a->sum, $a->sumPercent]);
        }

        $lava->ColumnChart('Fee', $income, [
            'title' => 'Fee Growth',
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
            $sumPercent = $item->sum('total_free') * 0.10; //0.90;
            $item->sum = $sum;
            $item->sumPercent = $sumPercent;
        }

        return $groups;
    }

    private function setIncomeChart($lava, $start, $end)
    {
        $income = $lava->DataTable();

        $income->addStringColumn('Year-Month')
            ->addNumberColumn('income')
            ->addNumberColumn('fee');

        $data = $this->getTotal($start, $end);
        // dd($data );
        foreach ($data as $row) {
            $a = $row->toArray();

            $income->addRow([$a['date'], $a["income"], $a["fee"]]);
        }

        $lava->ColumnChart('Income', $income, [
            'title' => 'Income Growth',
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
                $total= (int) $d->fee * (int) $d->qrt;
                $total_fee =   $total_fee + $total;
            }

            // if (empty($detail)) {
            //     $row->fee = 0;
            //     $row->income = (int) $row->income;
            //     $row->date = (string) $row['YEAR(startDate)'] . '-' . (string) $row['MONTH(startDate)'];
            // } else {
            $row->fee = (int)  $total_fee;
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
