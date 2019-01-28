<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

use Illuminate\Foundation\Auth\User as Authenticatable;

/**
 * Class Users
 * @package App\Models
 * @version December 4, 2018, 12:30 pm UTC
 *
 * @property \Illuminate\Database\Eloquent\Collection eventShop
 * @property \Illuminate\Database\Eloquent\Collection product
 * @property \Illuminate\Database\Eloquent\Collection productEvent
 * @property \Illuminate\Database\Eloquent\Collection UsersRole
 * @property string name
 * @property string email
 * @property string|\Carbon\Carbon email_verified_at
 * @property string password
 * @property string remember_token
 */
class Users extends Authenticatable
{
    use Notifiable ,SoftDeletes;

    public $table = 'users';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];

    protected $primaryKey = 'id';

    public $fillable = [
        'name',
        'email',
        'email_verified_at',
        'password',
        'remember_token'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'name' => 'string',
        'email' => 'string',
        'password' => 'string',
        'remember_token' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function usersRoles()
    {
        return $this->hasMany(\App\Models\UserRoles::class , 'user_id', 'id');
    }

      /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function profile()
    {
        return $this->hasOne(\App\Models\Profile::class);
    }
}
