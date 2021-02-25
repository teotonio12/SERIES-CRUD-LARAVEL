<?php

use Illuminate\Auth\Events\Logout;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function (){
    return view('welcome');
});

Route::group(['namespace' => 'App\http\Controllers\\'], function () {
   
    Route::get('/series', 'SeriesController@index')->name('series.index');

    Route::get('/series/criar', 'SeriesController@create')->name('series.FormCreate')->middleware('autenticador');

    Route::post('/series/criar' , 'SeriesController@store')->name('series.store')->middleware('autenticador');

    Route::post('/series/{id}/editaNome' , 'SeriesController@update')->name('series.update')->middleware('autenticador');

    Route::delete('series/{id}' , 'SeriesController@destroy')->name('series.destroy')->middleware('autenticador');

    Route::get('/series/{id}/temporadas', 'TemporadaController@index')->name('temporada.index');

    Route::get('/temporadas/{temporada}/episodios', 'EpisodiosController@index')->name('episodios.index');

    Route::post('/temporadas/{temporada}/episodios/assitir' , 'EpisodiosController@assistir')->name('series.assistir')->middleware('autenticador');

    Route::get('/entrar' , 'EntrarController@index')->name('entrar.index');

    Route::post('/entrar' , 'EntrarController@entrar')->name('entrar.entrar');

    Route::get('/registrar' , 'RegistroController@create')->name('registro.create');

    Route::post('/registrar' , 'RegistroController@store')->name('registro.store');

    Route::get('/sair', 'EntrarController@sair')->name('entrar.sair');
       


    


});


