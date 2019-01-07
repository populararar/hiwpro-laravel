<?php

namespace App\Http\Controllers;

use App\Http\Controllers\AppBaseController;
use App\Http\Requests\CreateCategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;
use App\Repositories\CategoryRepository;
use App\Repositories\ShopRepository;
use Flash;
use Illuminate\Http\Request;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class CategoryController extends AppBaseController
{
    /** @var  CategoryRepository */
    private $categoryRepository;

    /** @var  ShopRepository */
    private $shopRepository;

    public function __construct(CategoryRepository $categoryRepo, ShopRepository $shopRepo)
    {
        $this->categoryRepository = $categoryRepo;
        $this->shopRepository = $shopRepo;
    }

    /**
     * Display a listing of the Category.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->categoryRepository->pushCriteria(new RequestCriteria($request));
        $categories = $this->categoryRepository->all();
        $categories = $categories->sortByDesc('category_id');

        return view('categories.index')
            ->with('categories', $categories);
    }

    /**
     * Show the form for creating a new Category.
     *
     * @return Response
     */
    public function create(Request $request)
    {
        $this->shopRepository->pushCriteria(new RequestCriteria($request));
        $shops = $this->shopRepository->with('location')->all();

        $shops = $shops->mapWithKeys(function ($item) {
            $item->name = $item->name . ' - ' . $item->location->location_name;
            //  dd($item->name);
            return [$item['shop_id'] => $item['name']];
        });
        // dd($shops);

        return view('categories.create')
            ->with('shops', $shops);

    }

    /**
     * Store a newly created Category in storage.
     *
     * @param CreateCategoryRequest $request
     *
     * @return Response
     */
    public function store(CreateCategoryRequest $request)
    {
        $input = $request->all();

        $category = $this->categoryRepository->create($input);

        Flash::success('Category saved successfully.');

        return redirect(route('categories.index'));
    }

    /**
     * Display the specified Category.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $category = $this->categoryRepository->findWithoutFail($id);

        if (empty($category)) {
            Flash::error('Category not found');

            return redirect(route('categories.index'));
        }

        return view('categories.show')->with('category', $category);
    }

    /**
     * Show the form for editing the specified Category.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $category = $this->categoryRepository->findWithoutFail($id);

        if (empty($category)) {
            Flash::error('Category not found');

            return redirect(route('categories.index'));
        }

        $this->shopRepository->pushCriteria(new RequestCriteria($request));
        $shops = $this->shopRepository->with('location')->all();

        $shops = $shops->mapWithKeys(function ($item) {
            $item->name = $item->name . ' - ' . $item->location->location_name;
            return [$item['shop_id'] => $item['name']];
        });

        return view('categories.edit')->with('category', $category)->with('shops', $shops);
    }

    /**
     * Update the specified Category in storage.
     *
     * @param  int              $id
     * @param UpdateCategoryRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateCategoryRequest $request)
    {
        $category = $this->categoryRepository->findWithoutFail($id);

        if (empty($category)) {
            Flash::error('Category not found');

            return redirect(route('categories.index'));
        }

        $category = $this->categoryRepository->update($request->all(), $id);

        Flash::success('Category updated successfully.');

        return redirect(route('categories.index'));
    }

    /**
     * Remove the specified Category from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $category = $this->categoryRepository->findWithoutFail($id);

        if (empty($category)) {
            Flash::error('Category not found');

            return redirect(route('categories.index'));
        }

        $this->categoryRepository->delete($id);

        Flash::success('Category deleted successfully.');

        return redirect(route('categories.index'));
    }
}
