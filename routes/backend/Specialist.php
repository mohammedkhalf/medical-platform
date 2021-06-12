<?php
// Specialist Management
Route::group(['namespace' => 'Specialists'], function () {
    Route::resource('specialists', 'SpecialistController');
    //For DataTables
    Route::post('specialists/get', 'SpecialistControllerTable')->name('specialists.get');
});
