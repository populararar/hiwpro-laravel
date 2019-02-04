<?php

namespace App\Http\Controllers;

use App\Http\Controllers\AppBaseController;
use App\Http\Requests\CreateShopRequest;
use App\Http\Requests\UpdateShopRequest;
use App\Repositories\LocationRepository;
use App\Repositories\ProductRepository;
use App\Repositories\ShopRepository;
use Flash;
use Illuminate\Http\Request;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class ShopController extends AppBaseController
{
    /** @var  ShopRepository */
    private $shopRepository;

    /** @var  ShopRepository */
    private $locationRepository;

    /** @var  ProductRepository */
    private $productRepository;

    public function __construct(ProductRepository $productRepo,ShopRepository $shopRepo, LocationRepository $locationRepo)
    {
        $this->shopRepository = $shopRepo;
        $this->locationRepository = $locationRepo;
        $this->productRepository = $productRepo;
    }

    /**
     * Display a listing of the Shop.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->shopRepository->pushCriteria(new RequestCriteria($request));
        $shops = $this->shopRepository->all();
        // $shops = $shops->sortByDesc('shop_id');

        return view('shops.index')
            ->with('shops', $shops);
    }

    /**
     * Show the form for creating a new Shop.
     *
     * @return Response
     */
    public function create(Request $request)
    {
        $this->locationRepository->pushCriteria(new RequestCriteria($request));
        $locations = $this->locationRepository->all();

        $locations = $locations->mapWithKeys(function ($item) {
            return [$item['location_id'] => $item['location_name']];
        });

        return view('shops.create')
            ->with('locations', $locations);
    }

    /**
     * Store a newly created Shop in storage.
     *
     * @param CreateShopRequest $request
     *
     * @return Response
     */
    public function store(CreateShopRequest $request)
    {
        $input = $request->all();

        $shop = $this->shopRepository->create($input);

        Flash::success('Shop saved successfully.');

        return redirect(route('shops.index'));
    }

    /**
     * Display the specified Shop.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $shop = $this->shopRepository->findWithoutFail($id);
        $products = $this->productRepository->findWhere([['shop_id', '=', $shop->shop_id]]);

        if (empty($shop)) {
            Flash::error('Shop not found');

            return redirect(route('shops.index'));
        }

        $products = $products->sortByDesc('id');

        return view('shops.show')->with('shop', $shop)->with('products', $products);
    }

    /**
     * Show the form for editing the specified Shop.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id, Request $request)
    {
        $shop = $this->shopRepository->findWithoutFail($id);

        if (empty($shop)) {
            Flash::error('Shop not found');

            return redirect(route('shops.index'));
        }

        $this->locationRepository->pushCriteria(new RequestCriteria($request));
        $locations = $this->locationRepository->all();

        $locations = $locations->mapWithKeys(function ($item) {
            return [$item['location_id'] => $item['location_name']];
        });

        return view('shops.edit')->with('shop', $shop)->with('locations', $locations);
    }

    /**
     * Update the specified Shop in storage.
     *
     * @param  int              $id
     * @param UpdateShopRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateShopRequest $request)
    {
        $shop = $this->shopRepository->findWithoutFail($id);

        if (empty($shop)) {
            Flash::error('Shop not found');

            return redirect(route('shops.index'));
        }

        $shop = $this->shopRepository->update($request->all(), $id);

        Flash::success('Shop updated successfully.');

        return redirect(route('shops.index'));
    }

    /**
     * Remove the specified Shop from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $shop = $this->shopRepository->findWithoutFail($id);

        if (empty($shop)) {
            Flash::error('Shop not found');

            return redirect(route('shops.index'));
        }

        $this->shopRepository->delete($id);

        Flash::success('Shop deleted successfully.');

        return redirect(route('shops.index'));
    }
}
