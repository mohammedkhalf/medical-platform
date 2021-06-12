<?php

use Illuminate\Database\Seeder;
use App\Models\Auth\User;
use App\Models\Specialist;
use Illuminate\Database\Eloquent\Model;

class SpecialistTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if (! \App::environment(['production'])) {
            Model::unguard();

            Specialist::create([
            	'name'=>'Obstetrics and Gynecology',
                'status'=>'1'
            ]);
            Model::reguard();
	    }
    }
}
