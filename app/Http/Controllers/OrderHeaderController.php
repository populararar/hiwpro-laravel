<?php

namespace App\Http\Controllers;

use App\Http\Controllers\AppBaseController;
use App\Http\Requests\CreateOrderHeaderRequest;
use App\Http\Requests\UpdateOrderHeaderRequest;
use App\Models\OrderHeader;
use App\Repositories\OrderDetailRepository;
use App\Repositories\OrderHeaderRepository;
use App\Repositories\UsersRepository;
use Flash;
use Illuminate\Http\Request;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class OrderHeaderController extends AppBaseController
{

    /** @var  OrderDetailRepository */
    private $orderDetailRepository;

    /** @var  UsersRepository */
    private $usersRepository;

    /** @var  OrderHeaderRepository */
    private $orderHeaderRepository;

    private $orderHeader;

    public function __construct(OrderHeader $orderHeader, UsersRepository $usersRepo, OrderDetailRepository $orderDetailRepo, OrderHeaderRepository $orderHeaderRepo)
    {
        $this->orderHeaderRepository = $orderHeaderRepo;
        $this->orderDetailRepository = $orderDetailRepo;
        $this->usersRepository = $usersRepo;
        $this->orderHeader = $orderHeader;
    }

    /**
     * Display a listing of the OrderHeader.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {

        $this->orderHeaderRepository->pushCriteria(new RequestCriteria($request));
        // $orderHeaders = $this->orderHeaderRepository->findwhere([''=>]);

        $orderHeaders = $this->orderHeader
        ->whereRaw('id NOT IN (SELECT id FROM hiwpro.order_header WHERE status = \'CREATE\' 
        AND TIMESTAMPDIFF(HOUR, created_at, NOW()) > 24) AND  slip_status = \'WAITING\' ')
        ->orderBy('updated_at', 'desc')
        ->get();
        // $customer = $this->usersRepository->findWhere(['id'=>$orderHeaders->customer->customer_id]);

        return view('order_headers.index')
            ->with('orderHeaders', $orderHeaders);
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
