<?php

namespace App\Repositories;

use App\Models\ReportSeller;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class ReportSellerRepository
 * @package App\Repositories
 * @version February 11, 2019, 11:42 am UTC
 *
 * @method ReportSeller findWithoutFail($id, $columns = ['*'])
 * @method ReportSeller find($id, $columns = ['*'])
 * @method ReportSeller first($columns = ['*'])
*/
class ReportSellerRepository extends BaseRepository
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
        'customer_id',
        'shipping_id',
        'shipping_date',
        'payment_date',
        'accepted_date',
        'status',
        'order_number',
        'payment_id',
        'seller_id',
        'name',
        'lastname',
        'email',
        'seller_actual_price',
        'seller_actual_at'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return ReportSeller::class;
    }
}
