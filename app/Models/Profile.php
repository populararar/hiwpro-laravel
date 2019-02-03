<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Profile
 * @package App\Models
 * @version January 18, 2019, 2:48 pm UTC
 *
 * @property \App\Models\User user
 * @property \App\Models\Address address
 * @property \Illuminate\Database\Eloquent\Collection category
 * @property \Illuminate\Database\Eloquent\Collection eventJoined
 * @property \Illuminate\Database\Eloquent\Collection eventShop
 * @property \Illuminate\Database\Eloquent\Collection orderDetail
 * @property \Illuminate\Database\Eloquent\Collection permissions
 * @property \Illuminate\Database\Eloquent\Collection product
 * @property \Illuminate\Database\Eloquent\Collection productEvent
 * @property \Illuminate\Database\Eloquent\Collection usersRoles
 * @property string tel
 * @property string img
 * @property integer address_id
 * @property string bank_num
 * @property string bank_name
 * @property string national_id
 * @property string national_img
 * @property integer user_id
 */
class Profile extends Model
{
    use SoftDeletes;

    public $table = 'profile';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];

    protected $primaryKey = 'id';

    public $fillable = [
        'tel',
        'img',
        'address_id',
        'bank_num',
        'bank_name',
        'national_id',
        'national_img',
        'national_img2',
        'user_id',
        'status'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'tel' => 'string',
        'img' => 'string',
        'address_id' => 'integer',
        'bank_num' => 'string',
        'bank_name' => 'string',
        'national_id' => 'string',
        'national_img' => 'string',
        'national_img2' => 'string',
        'user_id' => 'integer'
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
    public function user()
    {
        return $this->belongsTo(\App\Models\User::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     **/
    public function address()
    {
        return $this->hasOne(\App\Models\Address::class);
    }
}
