<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateReportSellerRequest;
use App\Http\Requests\UpdateReportSellerRequest;
use App\Repositories\ReportSellerRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class ReportSellerController extends AppBaseController
{
    /** @var  ReportSellerRepository */
    private $reportSellerRepository;

    public function __construct(ReportSellerRepository $reportSellerRepo)
    {
        $this->reportSellerRepository = $reportSellerRepo;
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

        return view('report_sellers.index')
            ->with('reportSellers', $reportSellers);
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
