<?php
// Order Management
Route::group(['namespace' => 'Analysis'], function () {
    Route::resource('analysis', 'AnalysisController');
    //For DataTables
    Route::post('analysis/get', 'AnalysisTableController')->name('analysis.get');
});
