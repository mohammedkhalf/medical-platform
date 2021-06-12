<?php

namespace App\Repositories\Backend;

use App\Exceptions\GeneralException;
use App\Models\Analysis;
use App\Repositories\BaseRepository;

class AnalysisRepository extends BaseRepository
{
    /**
     * Associated Repository Model.
    */
    const MODEL = Analysis::class;
    /**
     * Sortable.
     *
     * @var array
     */
    private $sortable = [
        'id',
        'name',
        'status',
        'created_at',
        'updated_at',
    ];

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