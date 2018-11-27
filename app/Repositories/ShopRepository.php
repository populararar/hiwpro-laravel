<?php

namespace App\Repositories;

use App\Models\Shop;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class ShopRepository
 * @package App\Repositories
 * @version November 27, 2018, 12:39 pm UTC
 *
 * @method Shop findWithoutFail($id, $columns = ['*'])
 * @method Shop find($id, $columns = ['*'])
 * @method Shop first($columns = ['*'])
*/
class ShopRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'name',
        'detail',
        'location_location_id'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Shop::class;
    }
}
