<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class OrderDetail
 * @package App\Models
 * @version January 11, 2019, 11:13 am UTC
 *
 * @property \App\Models\OrderHeader orderHeader
 * @property \Illuminate\Database\Eloquent\Collection category
 * @property \Illuminate\Database\Eloquent\Collection eventJoined
 * @property \Illuminate\Database\Eloquent\Collection eventShop
 * @property \Illuminate\Database\Eloquent\Collection permissions
 * @property \Illuminate\Database\Eloquent\Collection product
 * @property \Illuminate\Database\Eloquent\Collection productEvent
 * @property \Illuminate\Database\Eloquent\Collection usersRoles
 * @property string qrt
 * @property string price
 * @property string option
 * @property string fee
 * @property string shipping_rate
 * @property string|\Carbon\Carbon order_header_id
 */
class OrderDetail extends Model
{
    use SoftDeletes;

    public $table = 'order_detail';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];

    protected $primaryKey = 'id';

    public $fillable = [
        'qrt',
        'price',
        'option',
        'fee',
        'shipping_rate',
        'order_header_id',
        'seller_id',
        'product_id',
        'seller_actual_qty',
        'seller_actual_at',
        'seller_actual_status',
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'string',
        'qrt' => 'string',
        'price' => 'string',
        'option' => 'string',
        'fee' => 'string',
        'shipping_rate' => 'string',
        'seller_actual_qty' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function orderHeader()
    {
        return $this->belongsTo(\App\Models\OrderHeader::class);
    }

      /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function product()
    {
        return $this->belongsTo(\App\Models\Product::class,'product_id');
    }
    
      /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function seller()
    {
        return $this->belongsTo(\App\Models\Users::class,'seller_id');
    }

}
