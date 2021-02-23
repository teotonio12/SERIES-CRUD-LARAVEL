<?php

use Illuminate\Support\Facades\Route;


Route::get('/series', 'App\http\Controllers\SeriesController@index')
->name('series.index');

Route::get('/series/criar', 'App\http\Controllers\SeriesController@create')
->name('series.FormCreate');

Route::post('series/criar' , 'App\http\Controllers\SeriesController@store')
->name('series.store');

Route::delete('series/{id}' , 'App\http\Controllers\SeriesController@destroy')
->name('series.destroy');