<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Event
 * @package App\Models
 * @version November 22, 2018, 2:13 pm UTC
 *
 * @property string eventName
 * @property timestamp startDate
 * @property timestamp lastDate
 * @property string imgPath
 * @property string event_type
 * @property timestamp event_exp
 * @property string detail
 * @property integer income
 */
class Event extends Model
{
    use SoftDeletes;

    public $table = 'event';
    

    protected $dates = ['deleted_at'];

    protected $primaryKey = 'event_id';

    public $fillable = [
        'eventName',
        'startDate',
        'lastDate',
        'imgPath',
        'event_type',
        'event_exp',
        'detail',
        'income'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'eventName' => 'string',
        'imgPath' => 'string',
        'event_type' => 'string',
        'detail' => 'string',
        'income' => 'integer'
    ];

    /**
     * Validation rules
     *gt:startDate
     * @var array
     */
    public static $rules = [
        'eventName' => 'required|max:100',
        'startDate' => 'required|date|date_format:Y-m-d',
        'lastDate' => 'required|date|date_format:Y-m-d|after:startDate',
        'event_type' => 'required',
        'event_exp' => 'required|date|date_format:Y-m-d|after:startDate',
        'detail' => 'required'
    ];

    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function eventShops()
    {
        return $this->hasMany(\App\Models\EventShop::class,'event_id');
    }
}
