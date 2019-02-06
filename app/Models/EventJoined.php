<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class EventJoined
 * @package App\Models
 * @version December 14, 2018, 11:42 am UTC
 *
 * @property \App\Models\EventShop eventShop
 * @property \App\Models\Seller seller
 * @property \Illuminate\Database\Eloquent\Collection eventShop
 * @property \Illuminate\Database\Eloquent\Collection permissions
 * @property \Illuminate\Database\Eloquent\Collection product
 * @property \Illuminate\Database\Eloquent\Collection productEvent
 * @property \Illuminate\Database\Eloquent\Collection usersRoles
 * @property integer seller_seller_id
 * @property integer event_shop_id
 * @property integer score
 */
class EventJoined extends Model
{
    use SoftDeletes;

    public $table = 'event_joined';

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';

    protected $dates = ['deleted_at'];

    protected $primaryKey = 'id';

    public $fillable = [
        'seller_seller_id',
        'event_shop_id',
        'score',
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'seller_seller_id' => 'integer',
        'event_shop_id' => 'integer',
        'score' => 'integer',
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
    public function eventShop()
    {
        return $this->belongsTo(\App\Models\EventShop::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function seller()
    {
        return $this->belongsTo(\App\Models\Users::class, 'seller_seller_id');
    }

   
}