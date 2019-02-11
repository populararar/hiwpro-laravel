<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateReportAdminRequest;
use App\Http\Requests\UpdateReportAdminRequest;
use App\Repositories\ReportAdminRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class ReportAdminController extends AppBaseController
{
    /** @var  ReportAdminRepository */
    private $reportAdminRepository;

    public function __construct(ReportAdminRepository $reportAdminRepo)
    {
        $this->reportAdminRepository = $reportAdminRepo;
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

        return view('report_admins.index')
            ->with('reportAdmins', $reportAdmins);
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
