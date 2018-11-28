<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Shop
 * @package App\Models
 * @version November 27, 2018, 12:39 pm UTC
 *
 * @property \App\Models\Location location
 * @property \Illuminate\Database\Eloquent\Collection eventJoined
 * @property \Illuminate\Database\Eloquent\Collection eventShop
 * @property string name
 * @property string detail
 * @property integer location_location_id
 */
class Shop extends Model
{
    use SoftDeletes;

    public $table = 'shop';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];

    protected $primaryKey = 'shop_id';

    public $fillable = [
        'name',
        'detail',
        'location_location_id'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'shop_id' => 'integer',
        'name' => 'string',
        'detail' => 'string',
        'location_location_id' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'name' => 'required',
        'detail' => 'required',
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function location()
    {
        return $this->belongsTo(\App\Models\Location::class,  'location_location_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function products()
    {
        return $this->hasMany(\App\Models\Product::class, 'shop_id' ,'shop_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     **/
    public function events()
    {
        return $this->belongsToMany(\App\Models\Event::class, 'event_shop');
    }
}
