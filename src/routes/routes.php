<?php
Route::group(['prefix' => 'pemakaian-bahu-jalan','middleware' => ['web','auth']], function() {
    Route::get('demo', 'Bantenprov\PemakaianBahuJalan\Http\Controllers\PemakaianBahuJalanController@demo');
    Route::resource('transaksi', 'Bantenprov\PemakaianBahuJalan\Http\Controllers\TransaksiController');
    Route::resource('item', 'Bantenprov\PemakaianBahuJalan\Http\Controllers\ItemController');
    Route::resource('customerretribusi', 'Bantenprov\PemakaianBahuJalan\Http\Controllers\CustomerRetribusiController');
    Route::resource('tarif', 'Bantenprov\PemakaianBahuJalan\Http\Controllers\TarifController');    
});