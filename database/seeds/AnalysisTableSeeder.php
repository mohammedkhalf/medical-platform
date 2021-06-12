<?php

use Illuminate\Database\Seeder;
use App\Models\Analysis;
use Illuminate\Database\Eloquent\Model;

class AnalysisTableSeeder extends Seeder
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

            Analysis::create([
            	'name'=>'x-ray',
                'status'=>'1'
            ]);
            Model::reguard();
	    }
    }
}
