<?php

namespace App\Repositories;

use App\Models\EventJoined;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class EventJoinedRepository
 * @package App\Repositories
 * @version December 14, 2018, 11:42 am UTC
 *
 * @method EventJoined findWithoutFail($id, $columns = ['*'])
 * @method EventJoined find($id, $columns = ['*'])
 * @method EventJoined first($columns = ['*'])
*/
class EventJoinedRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'seller_seller_id',
        'event_shop_id',
        'score'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return EventJoined::class;
    }
}
