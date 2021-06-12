<?php

namespace App\Repositories\Backend;

use App\Exceptions\GeneralException;
use App\Models\Specialist;
use App\Repositories\BaseRepository;

class SpecialistsRepository extends BaseRepository
{
    /**
     * Associated Repository Model.
     */
    const MODEL = Specialist::class;
    /**
     * Sortable.
     *
     * @var array
     */
    private $sortable = ['name','status'];

    public function getForDataTable()
    {
        return $this->query()
            ->select([
                'id',
                'name',
                'status'
            ]);
    }
}