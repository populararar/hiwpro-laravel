<?php

namespace App\Http\Controllers;

use App\Http\Controllers\AppBaseController;
use App\Http\Requests\CreateProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Repositories\CategoryRepository;
use App\Repositories\ProductRepository;
use App\Repositories\ShopRepository;
use Flash;
use Illuminate\Http\Request;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class ProductController extends AppBaseController
{
    /** @var  ProductRepository */
    private $productRepository;

    /** @var  shopRepository */
    private $shopRepository;

    /** @var  categoryRepository */
    private $categoryRepository;

    public function __construct(ProductRepository $productRepo, ShopRepository $shopRepo, CategoryRepository $cateRepo)
    {
        $this->productRepository = $productRepo;
        $this->shopRepository = $shopRepo;
        $this->categoryRepository = $cateRepo;

    }

    /**
     * Display a listing of the Product.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {

        $this->productRepository->pushCriteria(new RequestCriteria($request));
        $shop_id = $request->input('shop_id');
        if (!empty($shop_id)) {
            $products = $this->productRepository->findWhere(['shop_id' => $shop_id]);
        } else {
            $products = $this->productRepository->all();
        }

        return view('products.index')
            ->with('products', $products)
            ->with('shop_id', $shop_id);
    }

    /**
     * Display a listing of the Product.
     *
     * @param Request $request
     * @return Response
     */
    public function build($shop_id, Request $request)
    {
        $shop = $this->shopRepository->findWithoutFail($shop_id);

        if (empty($shop)) {
            Flash::error('Shop not found');

            return redirect(route('shops.index'));
        }

        $this->productRepository->pushCriteria(new RequestCriteria($request));
        $products = $this->productRepository->all();

        $categories = $this->categoryRepository->findWhere(['shop_id' => $shop_id]);

        // dd($categories,$shop_id);
        $categories = $categories->mapWithKeys(function ($item) {
            return [$item['category_id'] => $item['category_name']];
        });

        return view('products.create')
            ->with('products', $products)
            ->with('shop', $shop)
            ->with('categories', $categories);
    }

    /**
     * Display a listing of the Product.
     *
     * @param Request $request
     * @return Response
     */
    public function create($shop_id, Request $request)
    {
        $shop = $this->shopRepository->findWithoutFail($shop_id);

        if (empty($shop)) {
            Flash::error('Shop not found');

            return redirect(route('shops.index'));
        }

        $this->productRepository->pushCriteria(new RequestCriteria($request));
        $products = $this->productRepository->all();

        $categories = $this->categoryRepository->findWhere(['shop_id' => $shop_id]);

        // dd($categories,$shop_id);
        $categories = $categories->mapWithKeys(function ($item) {
            return [$item['category_id'] => $item['category_name']];
        });

        return view('products.create')
            ->with('products', $products)
            ->with('shop', $shop)
            ->with('categories', $categories);
    }

    /**
     * Store a newly created Product in storage.
     *
     * @param CreateProductRequest $request
     *
     * @return Response
     */
    public function store(CreateProductRequest $request)
    {
        $input = $request->all();

        $product = $this->productRepository->create($input);

        Flash::success('Product saved successfully.');

        return redirect()->route('products.index', ['shop_id' => $input['shop_id']]);
    }

    /**
     * Display the specified Product.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id, Request $request)
    {
        $product = $this->productRepository->findWithoutFail($id);
        $shop_id = $request->input('shop_id');
        if (empty($product)) {
            Flash::error('Product not found');

            return redirect(route('products.index'));
        }

        return view('products.show')->with('product', $product)->with('shop_id', $shop_id);
    }

    /**
     * Show the form for editing the specified Product.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($product_id, Request $request)
    {
        $product = $this->productRepository->findWithoutFail($product_id);

        if (empty($product)) {
            Flash::error('Product not found');

            return redirect(route('products.index'));
        }

        $shop = $this->shopRepository->findWithoutFail($product->shop_id);

        $categories = $this->categoryRepository->findWhere(['shop_id' => $product->shop_id]);

        $categories = $categories->mapWithKeys(function ($item) {
            return [$item['category_id'] => $item['category_name']];
        });

        return view('products.edit')
            ->with('product', $product)
            ->with('shop', $shop)
            ->with('categories', $categories);
    }

    /**
     * Update the specified Product in storage.
     *
     * @param  int              $id
     * @param UpdateProductRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateProductRequest $request)
    {
        $product = $this->productRepository->findWithoutFail($id);

        if (empty($product)) {
            Flash::error('Product not found');

            return redirect(route('products.index'));
        }

        $product = $this->productRepository->update($request->all(), $id);

        Flash::success('Product updated successfully.');

        return redirect(route('products.index', ['shop_id' => $request->input('shop_id')]));
    }

    /**
     * Remove the specified Product from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $product = $this->productRepository->findWithoutFail($id);

        if (empty($product)) {
            Flash::error('Product not found');

            return redirect(route('products.index'));
        }

        $this->productRepository->delete($id);

        Flash::success('Product deleted successfully.');

        return redirect(route('products.index'));
    }
}
