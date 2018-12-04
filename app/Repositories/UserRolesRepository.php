<?php

namespace App\Repositories;

use App\Models\UserRoles;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class UserRolesRepository
 * @package App\Repositories
 * @version December 4, 2018, 12:31 pm UTC
 *
 * @method UserRoles findWithoutFail($id, $columns = ['*'])
 * @method UserRoles find($id, $columns = ['*'])
 * @method UserRoles first($columns = ['*'])
*/
class UserRolesRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'user_id',
        'role_id',
        'status'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return UserRoles::class;
    }
}
