<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class OrderHeader
 * @package App\Models
 * @version January 11, 2019, 11:12 am UTC
 *
 * @property \App\Models\User user
 * @property \App\Models\User user
 * @property \App\Models\Shipping shipping
 * @property \Illuminate\Database\Eloquent\Collection category
 * @property \Illuminate\Database\Eloquent\Collection eventJoined
 * @property \Illuminate\Database\Eloquent\Collection eventShop
 * @property \Illuminate\Database\Eloquent\Collection OrderDetail
 * @property \Illuminate\Database\Eloquent\Collection Payment
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
 * @property integer seller_id
 * @property integer customer_id
 * @property string shipping_id
 * @property string|\Carbon\Carbon shipping_date
 * @property string|\Carbon\Carbon payment_date
 * @property string|\Carbon\Carbon accepted_date
 * @property string status
 */
class OrderHeader extends Model
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
        // 'seller_id',
        'customer_id',
        'shipping_id',
        'shipping_date',
        'payment_date',
        'accepted_date',
        'status',
        'order_number',
        'payment_id',
        'seller_id'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'address' => 'string',
        'slip_status' => 'string',
        'total_price' => 'integer',
        'tracking_number' => 'string',
        // 'seller_id' => 'integer',
        'customer_id' => 'integer',
        'shipping_id' => 'string',
        'status' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        
    ];

    // /**
    //  * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
    //  **/
    // public function user()
    // {
    //     return $this->belongsTo(\App\Models\User::class);
    // }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function user()
    {
        return $this->belongsTo(\App\Models\Users::class);
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function customer()
    {
        return $this->belongsTo(\App\Models\Users::class, 'customer_id');
    }


      
   
    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function shipping()
    {
        return $this->belongsTo(\App\Models\Shipping::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function orderDetails()
    {
        return $this->hasMany(\App\Models\OrderDetail::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function payments()
    {
        return $this->hasMany(\App\Models\Payment::class);
    }

}
