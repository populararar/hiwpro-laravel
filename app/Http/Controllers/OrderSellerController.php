<?php

namespace App\Http\Controllers;

use App\Http\Controllers\AppBaseController;
use App\Http\Requests\CreateOrderHeaderRequest;
use App\Http\Requests\UpdateOrderHeaderRequest;
use App\Repositories\OrderHeaderRepository;
use Flash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class OrderSellerController extends AppBaseController
{
    /** @var  OrderHeaderRepository */
    private $orderHeaderRepository;

    public function __construct(OrderHeaderRepository $orderHeaderRepo)
    {
        $this->orderHeaderRepository = $orderHeaderRepo;
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
        $orderHeaders = $this->orderHeaderRepository->findWhere(['seller_id' => $user_id, 'status' => 'CONFIRMED'])->sortByDesc('updated_at');

        return view('order_sellers.index')
            ->with('orderHeaders', $orderHeaders);
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
    public function edit($id)
    {
        $orderHeader = $this->orderHeaderRepository->findWithoutFail($id);

        if (empty($orderHeader)) {
            Flash::error('Order Header not found');

            return redirect(route('orderHeaders.index'));
        }

        return view('order_sellers.edit')->with('orderHeader', $orderHeader);
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

            return redirect(route('orderSellers.index'));
        }

        $orderHeader = $this->orderHeaderRepository->update($request->all(), $id);

        Flash::success('Order Header updated successfully.');

        return redirect(route('orderSellers.index'));
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
