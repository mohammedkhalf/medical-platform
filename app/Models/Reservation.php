<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Auth\User;

class Reservation extends Model
{
    use SoftDeletes;

    protected $table = "reservation";

    protected $fillabel = ['name','age','phone_number','clinic_id','price'];

    protected $guarded = [];

    //relationship
    public function profile()
    {
        return $this->hasOne(Profile::class,'reservation_id','id');
    }

}
