<?php

namespace App\Repositories;

use App\Models\Productevent;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class ProducteventRepository
 * @package App\Repositories
 * @version November 28, 2018, 2:51 pm UTC
 *
 * @method Productevent findWithoutFail($id, $columns = ['*'])
 * @method Productevent find($id, $columns = ['*'])
 * @method Productevent first($columns = ['*'])
*/
class ProducteventRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'sale_price',
        'event_shop_id',
        'promotion_id',
        'product_id'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Productevent::class;
    }
}
