<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Notification
 * @package App\Models
 * @version February 6, 2019, 1:08 pm UTC
 *
 * @property \App\Models\OrderHeader orderHeader
 * @property \Illuminate\Database\Eloquent\Collection category
 * @property \Illuminate\Database\Eloquent\Collection eventJoined
 * @property \Illuminate\Database\Eloquent\Collection eventShop
 * @property \Illuminate\Database\Eloquent\Collection orderDetail
 * @property \Illuminate\Database\Eloquent\Collection permissions
 * @property \Illuminate\Database\Eloquent\Collection product
 * @property \Illuminate\Database\Eloquent\Collection productEvent
 * @property \Illuminate\Database\Eloquent\Collection usersRoles
 * @property integer order_id
 * @property integer user_id
 * @property string title
 * @property string massage
 * @property integer status
 */
class Notification extends Model
{
    use SoftDeletes;

    public $table = 'notification';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];

    protected $primaryKey = 'id';

    public $fillable = [
        'order_id',
        'user_id',
        'title',
        'massage',
        'status'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'order_id' => 'integer',
        'user_id' => 'integer',
        'title' => 'string',
        'massage' => 'string',
        'status' => 'integer'
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
        return $this->belongsTo(\App\Models\OrderHeader::class,'order_id');
    }

}
