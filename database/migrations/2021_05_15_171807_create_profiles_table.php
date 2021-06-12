<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProfilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('profiles', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger("reservation_id")->unsigned()->index()->nullable();
            $table->string("patient_name")->nullable();
            $table->integer("age")->nullable();
            $table->string("phone_number")->nullable();
            $table->bigInteger('clinic_id')->unsigned()->index()->nullable();
            $table->text("diagnosis")->nullable();
            $table->bigInteger("analysis_id")->unsigned()->index()->nullable();
            $table->text("analysis_description")->nullable();
            $table->bigInteger("first_drug_id")->unsigned()->index()->nullable();
            $table->integer("first_drug_dose")->nullable();
            $table->bigInteger("second_drug_id")->unsigned()->index()->nullable();
            $table->integer("second_drug_dose")->nullable();
            $table->bigInteger("third_drug_id")->unsigned()->index()->nullable();
            $table->integer("third_drug_dose")->nullable();
            $table->text("notes")->nullable();

            $table->foreign('reservation_id')->references('id')->on('reservation');
            $table->foreign('clinic_id')->references('id')->on('specialties');
            $table->foreign('analysis_id')->references('id')->on('analysis');
            $table->foreign('first_drug_id')->references('id')->on('drugs');
            $table->foreign('second_drug_id')->references('id')->on('drugs');
            $table->foreign('third_drug_id')->references('id')->on('drugs');

            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('profiles');
    }
}
