<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class ReportSeller
 * @package App\Models
 * @version February 11, 2019, 11:42 am UTC
 *
 * @property \App\Models\Payment payment
 * @property \Illuminate\Database\Eloquent\Collection category
 * @property \Illuminate\Database\Eloquent\Collection eventJoined
 * @property \Illuminate\Database\Eloquent\Collection eventShop
 * @property \Illuminate\Database\Eloquent\Collection Notification
 * @property \Illuminate\Database\Eloquent\Collection OrderDetail
 * @property \Illuminate\Database\Eloquent\Collection permissions
 * @property \Illuminate\Database\Eloquent\Collection product
 * @property \Illuminate\Database\Eloquent\Collection productEvent
 * @property \Illuminate\Database\Eloquent\Collection usersRoles
 * @property string address
 * @property string|\Carbon\Carbon order_date
 * @property string|\Carbon\Carbon exp_date
 * @property string slip_status
 * @property integer total_price
 * @property string tracking_number
 * @property integer customer_id
 * @property string shipping_id
 * @property string|\Carbon\Carbon shipping_date
 * @property string|\Carbon\Carbon payment_date
 * @property string|\Carbon\Carbon accepted_date
 * @property string status
 * @property string order_number
 * @property integer payment_id
 * @property integer seller_id
 * @property string name
 * @property string lastname
 * @property string email
 * @property integer seller_actual_price
 * @property string|\Carbon\Carbon seller_actual_at
 */
class ReportSeller extends Model
{
    use SoftDeletes;

    public $table = 'order_header';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];

    protected $primaryKey = 'id';

    public $fillable = [
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
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'address' => 'string',
        'slip_status' => 'string',
        'total_price' => 'integer',
        'tracking_number' => 'string',
        'customer_id' => 'integer',
        'shipping_id' => 'string',
        'status' => 'string',
        'order_number' => 'string',
        'payment_id' => 'integer',
        'seller_id' => 'integer',
        'name' => 'string',
        'lastname' => 'string',
        'email' => 'string',
        'seller_actual_price' => 'integer'
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
    public function payment()
    {
        return $this->belongsTo(\App\Models\Payment::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function notifications()
    {
        return $this->hasMany(\App\Models\Notification::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function orderDetails()
    {
        return $this->hasMany(\App\Models\OrderDetail::class);
    }
}
