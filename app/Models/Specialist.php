<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Auth\User;
use Illuminate\Notifications\Action;

class Specialist extends Model
{
    use SoftDeletes;

    static $active = "1";
    static $disabled = "2";

    protected $table = "specialties";

    protected $guarded = [];

    protected $fillabel = ['name','status'];



    //static methods
    public static function CreateFromRequest($specialist)
    {
        $specialistData = Specialist::create(['name'=>$specialist->name,'status'=>$specialist->status]);
        return  $specialistData;
    }

    public static function UpdateFormRequest ($request,$specialist)
    {
        $updatedSpecialist = $specialist->update($request->only('name','status'));
        return  $updatedSpecialist;
    }

    public static function getSpecialistName ($id)
    {
       $specialist= Specialist::findOrFail($id);
       return  $specialist->name;
    }
}
