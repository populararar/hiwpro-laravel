<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateSellerReviewRequest;
use App\Http\Requests\UpdateSellerReviewRequest;
use App\Repositories\SellerReviewRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class SellerReviewController extends AppBaseController
{
    /** @var  SellerReviewRepository */
    private $sellerReviewRepository;

    public function __construct(SellerReviewRepository $sellerReviewRepo)
    {
        $this->sellerReviewRepository = $sellerReviewRepo;
    }

    /**
     * Display a listing of the SellerReview.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->sellerReviewRepository->pushCriteria(new RequestCriteria($request));
        $sellerReviews = $this->sellerReviewRepository->all();

        return view('seller_reviews.index')
            ->with('sellerReviews', $sellerReviews);
    }

    /**
     * Show the form for creating a new SellerReview.
     *
     * @return Response
     */
    public function create()
    {
        return view('seller_reviews.create');
    }

    /**
     * Store a newly created SellerReview in storage.
     *
     * @param CreateSellerReviewRequest $request
     *
     * @return Response
     */
    public function store(CreateSellerReviewRequest $request)
    {
        $input = $request->all();

        $sellerReview = $this->sellerReviewRepository->create($input);

        Flash::success('Seller Review saved successfully.');

        return redirect(route('sellerReviews.index'));
    }

    /**
     * Display the specified SellerReview.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $sellerReview = $this->sellerReviewRepository->findWithoutFail($id);

        if (empty($sellerReview)) {
            Flash::error('Seller Review not found');

            return redirect(route('sellerReviews.index'));
        }

        return view('seller_reviews.show')->with('sellerReview', $sellerReview);
    }

    /**
     * Show the form for editing the specified SellerReview.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $sellerReview = $this->sellerReviewRepository->findWithoutFail($id);

        if (empty($sellerReview)) {
            Flash::error('Seller Review not found');

            return redirect(route('sellerReviews.index'));
        }

        return view('seller_reviews.edit')->with('sellerReview', $sellerReview);
    }

    /**
     * Update the specified SellerReview in storage.
     *
     * @param  int              $id
     * @param UpdateSellerReviewRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateSellerReviewRequest $request)
    {
        $sellerReview = $this->sellerReviewRepository->findWithoutFail($id);

        if (empty($sellerReview)) {
            Flash::error('Seller Review not found');

            return redirect(route('sellerReviews.index'));
        }

        $sellerReview = $this->sellerReviewRepository->update($request->all(), $id);

        Flash::success('Seller Review updated successfully.');

        return redirect(route('sellerReviews.index'));
    }

    /**
     * Remove the specified SellerReview from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $sellerReview = $this->sellerReviewRepository->findWithoutFail($id);

        if (empty($sellerReview)) {
            Flash::error('Seller Review not found');

            return redirect(route('sellerReviews.index'));
        }

        $this->sellerReviewRepository->delete($id);

        Flash::success('Seller Review deleted successfully.');

        return redirect(route('sellerReviews.index'));
    }
}
