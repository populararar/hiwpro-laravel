<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class EventShop
 * @package App\Models
 * @version November 28, 2018, 12:37 pm UTC
 *
 * @property \App\Models\Event event
 * @property \App\Models\Shop shop
 * @property \Illuminate\Database\Eloquent\Collection product
 * @property \Illuminate\Database\Eloquent\Collection productEvent
 * @property integer event_id
 * @property integer shop_id
 */
class EventShop extends Model
{
    use SoftDeletes;

    public $table = 'event_shop';

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';

    protected $dates = ['deleted_at'];

    protected $primaryKey = 'id';

    public $fillable = [
        'event_id',
        'shop_id',
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'event_id' => 'integer',
        'shop_id' => 'integer',
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
    public function event()
    {
        return $this->belongsTo(\App\Models\Event::class, 'event_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function shop()
    {
        return $this->belongsTo(\App\Models\Shop::class, 'shop_id');
    }
}
