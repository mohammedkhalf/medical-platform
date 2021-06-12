<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Auth\User;

class Profile extends Model
{
    use SoftDeletes;

    protected $table = "profiles";

    protected $guarded = [];

    protected $fillabel = [
        'reservation_id',
        'patient_name',
        'age',
        'phone_number',
        'diagnosis',
        'clinic_id',
        'analysis_id',
        'analysis_description',
        'first_drug_id',
        'first_drug_dose',
        'second_drug_id',
        'second_drug_dose',
        'third_drug_id',
        'third_drug_dose'
    ];
    //relationships
    public function users()
    {
        return $this->belongsTo(User::class,'patient_id');
    }

    public function reservation()
    {
        return $this->belongsTo(Reservation::class,'reservation_id');
    }

    public function specialist ()
    {
        return $this->belongsTo(Specialist::class,'clinic_id');
    }

    public function analysis ()
    {
        return $this->belongsTo(Analysis::class,'analysis_id');
    }

    //static methods
    public static function CreateFormRequest($request)
    {

    }

    public static function UpdateFormRequest ($request,$profile)
    {
        $updatedProfile = $profile->update($request->only('patient_name','age','phone_number',
        'diagnosis','analysis_id','analysis_description','first_drug_id',
        'first_drug_dose','second_drug_id','second_drug_dose','third_drug_id','third_drug_dose'));
        return  $updatedProfile;
    }
}
