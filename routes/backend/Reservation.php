<?php
// Faq Management
Route::group(['namespace' => 'Reservations'], function () {
    Route::resource('reservations', 'ReservationController', ['except' => ['show']]);
    //For DataTables
    Route::post('reservations/get', 'ReservationControllerTable')->name('reservations.get');
});
