<?php

namespace App\Http\Controllers;

use App\Http\Controllers\AppBaseController;
use App\Http\Requests\CreateProducteventRequest;
use App\Http\Requests\UpdateProducteventRequest;
use App\Repositories\EventShopRepository;
use App\Repositories\ProducteventRepository;
use App\Repositories\ProductRepository;
use Flash;
use Illuminate\Http\Request;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class ProducteventController extends AppBaseController
{
    /** @var  ProducteventRepository */
    private $producteventRepository;

    /** @var  ProducteventRepository */
    private $productRepository;

    /** @var  EventShopRepository */
    private $eventShopRepository;

    public function __construct(ProducteventRepository $producteventRepo, ProductRepository $productRepo, EventShopRepository $eventShopRepo)
    {
        $this->producteventRepository = $producteventRepo;
        $this->productRepository = $productRepo;
        $this->eventShopRepository = $eventShopRepo;
    }

    private function getEventShopId()
    {
        if (session()->has('event_shop_id')) {
            return session('event_shop_id');
        }
        return 0;
    }

    /**
     * Display a listing of the Productevent.
     *
     * @param Request $request
     * @return Response
     */
    public function index($event_shop_id, Request $request)
    {
        session(['event_shop_id' => $event_shop_id]);

        $id = $this->getEventShopId();
        if ($id < 1) {
            return redirect(route('eventshops.index'));
        }

        $this->producteventRepository->pushCriteria(new RequestCriteria($request));
        $productevents = $this->producteventRepository->findWhere(['event_shop_id' => $id]);
        $productevents = $productevents->sortByDesc('id');

        return view('productevents.index')
            ->with('productevents', $productevents);
    }

    /**
     * Show the form for creating a new Productevent.
     *
     * @return Response
     */
    public function create()
    {
        $id = $this->getEventShopId();
        // get event shop detail
        $eventShop = $this->eventShopRepository->findWithoutFail($id);

        if (empty($eventShop)) {
            return redirect()->route('eventshops.inex');
        }

        $products = $this->productRepository->findWhere(['shop_id' => $eventShop->shop_id]);

        return view('productevents.create')->with('products', $products);
    }

    /**
     * Store a newly created Productevent in storage.
     *
     * @param CreateProducteventRequest $request
     *
     * @return Response
     */
    public function store(CreateProducteventRequest $request)
    {
        $input = $request->all();

        foreach ($input['productid'] as $id) {
            $data = $input;
            $data['product_id'] = $id;
            $this->producteventRepository->create($data);
        }

        $event_shop_id = $input['event_shop_id'];

        Flash::success('Productevent saved successfully.');

        return redirect(route('productevents.index.event', ['event_shop_id' => $event_shop_id]));
    }

    /**
     * Display the specified Productevent.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $productevent = $this->producteventRepository->findWithoutFail($id);

        if (empty($productevent)) {
            Flash::error('Productevent not found');

            return redirect(route('productevents.index'));
        }

        return view('productevents.show')->with('productevent', $productevent);
    }

    /**
     * Show the form for editing the specified Productevent.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $productevent = $this->producteventRepository->findWithoutFail($id);

        if (empty($productevent)) {
            Flash::error('Productevent not found');

            return redirect(route('productevents.index'));
        }

        return view('productevents.edit')->with('productevent', $productevent);
    }

    /**
     * Update the specified Productevent in storage.
     *
     * @param  int              $id
     * @param UpdateProducteventRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateProducteventRequest $request)
    {
        $productevent = $this->producteventRepository->findWithoutFail($id);

        if (empty($productevent)) {
            Flash::error('Productevent not found');

            return redirect(route('productevents.index'));
        }

        $productevent = $this->producteventRepository->update($request->all(), $id);

        Flash::success('Productevent updated successfully.');

        return redirect(route('productevents.index'));
    }

    /**
     * Remove the specified Productevent from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $productevent = $this->producteventRepository->findWithoutFail($id);

        if (empty($productevent)) {
            Flash::error('Productevent not found');

            return redirect(route('productevents.index'));
        }

        $this->producteventRepository->delete($id);

        Flash::success('Productevent deleted successfully.');

        return redirect(route('productevents.index'));
    }
}
