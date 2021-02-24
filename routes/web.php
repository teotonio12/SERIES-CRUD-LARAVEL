<?php

use Illuminate\Support\Facades\Route;

Route::group(['namespace' => 'App\http\Controllers\\'], function () {
   
    Route::get('/series', 'SeriesController@index')->name('series.index');

    Route::get('/series/criar', 'SeriesController@create')->name('series.FormCreate');

    Route::post('/series/criar' , 'SeriesController@store')->name('series.store');

    Route::post('/series/{id}/editaNome' , 'SeriesController@update')->name('series.update');

    Route::delete('series/{id}' , 'SeriesController@destroy')->name('series.destroy');

});

Route::group(['namespace' => 'App\http\Controllers\\'], function () {

    Route::get('/series/{id}/temporadas', 'TemporadaController@index');

});


