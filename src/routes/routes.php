<?php

Route::group(['prefix' => 'pemakaian-bahu-jalan'], function() {
    Route::get('demo', 'Bantenprov\PemakaianBahuJalan\Http\Controllers\PemakaianBahuJalanController@demo');
});
