<?php

Route::group(['prefix' => 'pemakaian-bahu-jalan'], function() {
    Route::get('demo', 'Bantenprov\PemakaianBahuJalan\Http\Controllers\PemakaianBahuJalanController@demo');    
    Route::resource('transaksi', 'Bantenprov\PemakaianBahuJalan\Http\Controllers\TransaksiController');
    Route::resource('item', 'Bantenprov\PemakaianBahuJalan\Http\Controllers\ItemController');
    Route::resource('tarif', 'Bantenprov\PemakaianBahuJalan\Http\Controllers\TarifController');
    Route::resource('customerretribusi', 'Bantenprov\PemakaianBahuJalan\Http\Controllers\CustomerRetribusiController');    
});