<?php

use Illuminate\Database\Seeder;
use App\Models\Auth\User;
use App\Models\Reservation;
use Illuminate\Database\Eloquent\Model;

class ReservationSeeder extends Seeder
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

            Reservation::create([
            	'name'=>'Mohammed Khalf',
                'age'=>'27',
                'phone_number'=>'01094356579',
                'clinic_id'=>'1',
                'price'=>'50'
            ]);
            Model::reguard();
	    }
    }
}
