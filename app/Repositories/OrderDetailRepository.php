<?php

namespace App\Repositories;

use App\Models\OrderDetail;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class OrderDetailRepository
 * @package App\Repositories
 * @version January 11, 2019, 11:13 am UTC
 *
 * @method OrderDetail findWithoutFail($id, $columns = ['*'])
 * @method OrderDetail find($id, $columns = ['*'])
 * @method OrderDetail first($columns = ['*'])
*/
class OrderDetailRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'qrt',
        'price',
        'option',
        'fee',
        'shipping_rate',
        'order_header_id'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return OrderDetail::class;
    }
}
