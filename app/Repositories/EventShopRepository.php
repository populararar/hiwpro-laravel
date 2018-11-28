<?php

namespace App\Repositories;

use App\Models\EventShop;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class EventShopRepository
 * @package App\Repositories
 * @version November 28, 2018, 12:37 pm UTC
 *
 * @method EventShop findWithoutFail($id, $columns = ['*'])
 * @method EventShop find($id, $columns = ['*'])
 * @method EventShop first($columns = ['*'])
*/
class EventShopRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'event_id',
        'shop_id'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return EventShop::class;
    }
}
