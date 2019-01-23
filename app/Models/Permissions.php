<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Permissions
 * @package App\Models
 * @version December 4, 2018, 1:04 pm UTC
 *
 * @property \App\Models\Menu menu
 * @property \App\Models\Role role
 * @property \Illuminate\Database\Eloquent\Collection eventShop
 * @property \Illuminate\Database\Eloquent\Collection product
 * @property \Illuminate\Database\Eloquent\Collection productEvent
 * @property \Illuminate\Database\Eloquent\Collection usersRoles
 * @property integer role_id
 * @property integer menu_id
 * @property integer can_visible
 * @property integer can_create
 * @property integer can_update
 * @property integer can_delete
 * @property integer can_show
 */
class Permissions extends Model
{
    use SoftDeletes;

    public $table = 'permissions';

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';

    protected $dates = ['deleted_at'];

    protected $primaryKey = 'id';

    public $fillable = [
        'role_id',
        'menu_id',
        'can_visible',
        'can_create',
        'can_update',
        'can_delete',
        'can_read',
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'role_id' => 'integer',
        'menu_id' => 'integer',
        'can_visible' => 'integer',
        'can_create' => 'integer',
        'can_update' => 'integer',
        'can_delete' => 'integer',
        'can_read' => 'integer',
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
    public function menu()
    {
        return $this->belongsTo(\App\Models\Menu::class, 'menu_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function role()
    {
        return $this->belongsTo(\App\Models\Role::class);
    }
}
