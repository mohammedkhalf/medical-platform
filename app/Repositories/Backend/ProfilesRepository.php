<?php

namespace App\Repositories\Backend;

use App\Exceptions\GeneralException;
use App\Models\Profile;
use App\Repositories\BaseRepository;

class ProfilesRepository extends BaseRepository
{
    /**
     * Associated Repository Model.
     */
    const MODEL = Profile::class;
    /**
     * Sortable.
     *
     * @var array
     */
    private $sortable = [
        'id',
        'reservation_id',
        'patient_name',
        'age',
        'phone_number',
        'clinic_id',
        'complain',
    ];

    public function getForDataTable()
    {
        return $this->query()
            ->leftjoin('specialties','specialties.id','=','profiles.clinic_id')
            ->leftjoin('reservation','reservation.id','=','profiles.reservation_id')
            ->select([
                'profiles.id',
                'profiles.reservation_id',
                'profiles.patient_name',
                'profiles.age',
                'profiles.phone_number',
                'specialties.name as clinic_id',
                // 'profiles.complain',
                // 'profiles.analysis_type',
                // 'profiles.analysis_description',
                // 'profiles.first_drug',
                // 'profiles.first_drug_dose',
            ]);
    }

}