<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Users extends Authenticatable
{
    use Notifiable;

    public $table = 'users';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];

    protected $primaryKey = 'id';
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
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
        return $this->hasOne(\App\Models\Profile::class,'user_id');
    }
}
