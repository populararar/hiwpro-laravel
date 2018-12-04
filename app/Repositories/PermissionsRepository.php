<?php

namespace App\Repositories;

use App\Models\Permissions;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class PermissionsRepository
 * @package App\Repositories
 * @version December 4, 2018, 1:04 pm UTC
 *
 * @method Permissions findWithoutFail($id, $columns = ['*'])
 * @method Permissions find($id, $columns = ['*'])
 * @method Permissions first($columns = ['*'])
*/
class PermissionsRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'role_id',
        'menu_id',
        'can_visible',
        'can_create',
        'can_update',
        'can_delete',
        'can_show'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Permissions::class;
    }
}
