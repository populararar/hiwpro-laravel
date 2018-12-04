<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Productevent
 * @package App\Models
 * @version November 28, 2018, 2:51 pm UTC
 *
 * @property \App\Models\Product product
 * @property \App\Models\Promotion promotion
 * @property \Illuminate\Database\Eloquent\Collection eventShop
 * @property \Illuminate\Database\Eloquent\Collection product
 * @property string sale_price
 * @property string event_shop_id
 * @property string promotion_id
 * @property integer product_id
 */
class Productevent extends Model
{
    use SoftDeletes;

    public $table = 'product_event';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];

    protected $primaryKey = 'id';

    public $fillable = [
        'sale_price',
        'event_shop_id',
        'promotion_id',
        'product_id'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'sale_price' => 'string',
        'event_shop_id' => 'string',
        'promotion_id' => 'string',
        'product_id' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'sale_price' => 'required',
        'event_shop_id' => 'required',
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function product()
    {
        return $this->belongsTo(\App\Models\Product::class, 'product_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function promotion()
    {
        return $this->belongsTo(\App\Models\Promotion::class);
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function eventshop()
    {
        return $this->belongsTo(\App\Models\EventShop::class,'event_shop_id');
    }
}
