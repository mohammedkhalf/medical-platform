<?php

namespace App\Repositories\Backend;

use App\Exceptions\GeneralException;
use App\Models\Reservation;
use App\Repositories\BaseRepository;

class ReservationsRepository extends BaseRepository
{
    /**
     * Associated Repository Model.
     */
    const MODEL = Reservation::class;
    /**
     * Sortable.
     *
     * @var array
     */
    private $sortable = ['name','age','phone_number','clinic_id','price'];

    public function getForDataTable()
    {
        return $this->query()
            ->leftjoin("specialties","specialties.id","=","reservation.clinic_id")
            ->select([
               'reservation.id',
               'reservation.name',
               'reservation.age',
               'reservation.phone_number',
               'reservation.price',
               'reservation.created_at',
               'specialties.name as clinic_id'
            ]);
    }
}