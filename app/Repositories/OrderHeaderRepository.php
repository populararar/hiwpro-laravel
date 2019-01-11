<?php

namespace App\Repositories;

use App\Models\OrderHeader;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class OrderHeaderRepository
 * @package App\Repositories
 * @version January 11, 2019, 11:12 am UTC
 *
 * @method OrderHeader findWithoutFail($id, $columns = ['*'])
 * @method OrderHeader find($id, $columns = ['*'])
 * @method OrderHeader first($columns = ['*'])
*/
class OrderHeaderRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'address',
        'order_date',
        'exp_date',
        'slip_status',
        'total_price',
        'tracking_number',
        'seller_id',
        'customer_id',
        'shipping_id',
        'shipping_date',
        'payment_date',
        'accepted_date',
        'status'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return OrderHeader::class;
    }
}
