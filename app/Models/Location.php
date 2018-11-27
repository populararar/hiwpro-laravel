<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Location
 * @package App\Models
 * @version November 24, 2018, 4:41 am UTC
 *
 * @property string location_name
 * @property string branch
 * @property string province
 */
class Location extends Model
{
    use SoftDeletes;

    public $table = 'location';
    

    protected $dates = ['deleted_at'];

    protected $primaryKey = 'location_id';

    public $fillable = [
        'location_name',
        'branch',
        'province'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'location_name' => 'string',
        'branch' => 'string',
        'province' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'location_name' => 'required|max:100',
        'branch' => 'required',
        'province' => 'required'
    ];

    
}
