<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class SellerReview
 * @package App\Models
 * @version January 26, 2019, 5:37 pm UTC
 *
 * @property \Illuminate\Database\Eloquent\Collection category
 * @property \Illuminate\Database\Eloquent\Collection eventJoined
 * @property \Illuminate\Database\Eloquent\Collection eventShop
 * @property \Illuminate\Database\Eloquent\Collection orderDetail
 * @property \Illuminate\Database\Eloquent\Collection permissions
 * @property \Illuminate\Database\Eloquent\Collection product
 * @property \Illuminate\Database\Eloquent\Collection productEvent
 * @property \Illuminate\Database\Eloquent\Collection usersRoles
 * @property integer user_id
 * @property integer score
 * @property integer customer_id
 * @property integer order_id
 * @property string comment
 * @property string img
 * @property string img2
 */
class SellerReview extends Model
{
    use SoftDeletes;

    public $table = 'seller_review';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];

    protected $primaryKey = 'id';

    public $fillable = [
        'user_id',
        'score',
        'customer_id',
        'order_id',
        'comment',
        'img',
        'img2'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'user_id' => 'integer',
        'score' => 'integer',
        'customer_id' => 'integer',
        'order_id' => 'integer',
        'comment' => 'string',
        'img' => 'string',
        'img2' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        
    ];

    
}
