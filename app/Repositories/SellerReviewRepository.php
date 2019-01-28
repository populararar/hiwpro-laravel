<?php

namespace App\Repositories;

use App\Models\SellerReview;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class SellerReviewRepository
 * @package App\Repositories
 * @version January 26, 2019, 5:37 pm UTC
 *
 * @method SellerReview findWithoutFail($id, $columns = ['*'])
 * @method SellerReview find($id, $columns = ['*'])
 * @method SellerReview first($columns = ['*'])
*/
class SellerReviewRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'user_id',
        'score',
        'customer_id',
        'order_id',
        'comment',
        'img',
        'img2'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return SellerReview::class;
    }
}
