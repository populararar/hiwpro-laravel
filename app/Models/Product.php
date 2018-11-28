<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Product
 * @package App\Models
 * @version November 27, 2018, 1:25 pm UTC
 *
 * @property \App\Models\Category category
 * @property \App\Models\ImageProduct imageProduct
 * @property \App\Models\ProductEvent productEvent
 * @property \Illuminate\Database\Eloquent\Collection eventJoined
 * @property \Illuminate\Database\Eloquent\Collection eventShop
 * @property string name
 * @property string price
 * @property string productdetail
 * @property string fee
 * @property integer product_expired
 * @property string shipping_price
 * @property string actual_price
 * @property integer product_event_idproduct_event
 * @property string image_product_id
 * @property string category_id
 */
class Product extends Model
{
    use SoftDeletes;

    public $table = 'product';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];

    protected $primaryKey = 'product_id';

    public $fillable = [
        'name',
        'price',
        'productdetail',
        'fee',
        'product_expired',
        'shipping_price',
        'actual_price',
        'shop_id',
        'image_product_id',
        'category_id'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'product_id' => 'integer',
        'name' => 'string',
        'price' => 'string',
        'productdetail' => 'string',
        'fee' => 'string',
        'product_expired' => 'integer',
        'shipping_price' => 'string',
        'actual_price' => 'string',
        'shop_id' => 'integer',
        'image_product_id' => 'string',
        'category_id' => 'string'
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
    public function category()
    {
        return $this->belongsTo(\App\Models\Category::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function imageProduct()
    {
        return $this->belongsTo(\App\Models\ImageProduct::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function shop()
    {
        return $this->belongsTo('App\Models\Shop', 'shop_id');
    }
    // /**
    //  * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
    //  **/
    // public function productEvent()
    // {
    //     return $this->belongsTo(\App\Models\ProductEvent::class);
    // }
}
