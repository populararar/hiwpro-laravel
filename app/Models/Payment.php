<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Payment
 * @package App\Models
 * @version January 16, 2019, 1:13 pm UTC
 *
 * @property \Illuminate\Database\Eloquent\Collection category
 * @property \Illuminate\Database\Eloquent\Collection eventJoined
 * @property \Illuminate\Database\Eloquent\Collection eventShop
 * @property \Illuminate\Database\Eloquent\Collection orderDetail
 * @property \Illuminate\Database\Eloquent\Collection OrderHeader
 * @property \Illuminate\Database\Eloquent\Collection permissions
 * @property \Illuminate\Database\Eloquent\Collection product
 * @property \Illuminate\Database\Eloquent\Collection productEvent
 * @property \Illuminate\Database\Eloquent\Collection usersRoles
 * @property string img_path
 * @property integer total
 * @property string bank_from
 * @property string bank_to
 */
class Payment extends Model
{
    use SoftDeletes;

    public $table = 'payment';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];

    protected $primaryKey = 'id';

    public $fillable = [
        'img_path',
        'total',
        'bank_from',
        'bank_to',
        'send_time',
        'order_id',
        'status',
        'name'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'img_path' => 'string',
        'total' => 'integer',
        'bank_from' => 'string',
        'bank_to' => 'string'
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
    public function order()
    {
        return $this->belongsTo(\App\Models\OrderHeader::class, 'order_id');
    }

      /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function orders()
    {
        return $this->hasOne(\App\Models\OrderHeader::class, 'order_id');
    }
}
