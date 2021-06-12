<?php

namespace App\Repositories\Backend;

use App\Exceptions\GeneralException;
use App\Models\Drug;
use App\Repositories\BaseRepository;

class DrugsRepository extends BaseRepository
{
    /**
     * Associated Repository Model.
     */
    const MODEL = Drug::class;

    /**
     * Sortable.
     *
     * @var array
     */
    private $sortable = [
        'id',
        'name',
        'manufacture',
        'amount',
        'price',
        'created_at',
        'updated_at',
        'specialist_id'
    ];

    /**
     * @return mixed
     */
    public function getForDataTable()
    {
        return $this->query()
            ->leftjoin("specialties","specialties.id","=","drugs.specialist_id")
            ->select([
                'drugs.id',
                'drugs.name',
                'drugs.manufacture',
                'drugs.amount',
                'drugs.price',
                'drugs.created_at',
                'specialties.name as specialist_id',

            ]);
    }

}
