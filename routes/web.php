<?php

use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Route;

Route::group(['namespace' => 'App\http\Controllers\\','prefix' => '/series'], function () {
   
    Route::get('/', 'SeriesController@index')->name('series.index');

    Route::get('/criar', 'SeriesController@create')->name('series.FormCreate')->middleware('autenticador');

    Route::post('/criar' , 'SeriesController@store')->name('series.store')->middleware('autenticador');

    Route::post('/{id}/editaNome' , 'SeriesController@update')->name('series.update')->middleware('autenticador');

    Route::delete('/{id}' , 'SeriesController@destroy')->name('series.destroy')->middleware('autenticador');

    Route::get('/{id}/temporadas', 'TemporadaController@index')->name('temporada.index');

});

Route::group(['namespace' => 'App\http\Controllers\\','prefix' => '/temporadas'], function () {
   
    Route::get('/{temporada}/episodios', 'EpisodiosController@index')->name('episodios.index');

    Route::post('/{temporada}/episodios/assitir' , 'EpisodiosController@assistir')->name('series.assistir')->middleware('autenticador');

});

Route::group(['namespace' => 'App\http\Controllers\\','prefix' => '/entrar'], function () {
   
    Route::get('/' , 'EntrarController@index')->name('entrar.index');

    Route::post('/' , 'EntrarController@entrar')->name('entrar.entrar');

});

Route::group(['namespace' => 'App\http\Controllers\\','prefix' => '/registrar'], function () {
   
    Route::get('/' , 'RegistroController@create')->name('registro.create');

    Route::post('/' , 'RegistroController@store')->name('registro.store');

});

Route::group(['namespace' => 'App\http\Controllers\\','prefix' => '/sair'], function () {
   
    Route::get('/', 'EntrarController@sair')->name('entrar.sair');

});


Route::get('/visualizando-email', function(){
    return new App\Mail\NovaSerie(
        'GOT',
        '7',
        '15'
    );
});

Route::get('/enviando-email', function(){
    $email =  new App\Mail\NovaSerie(
        'GOT',
        '7',
        '15'
    );

    $user = (object) [
        'email' => 'renan@teste.com',
        'nome' => 'Renan Teotonio'
    ];



    Mail::to($user)->send($email);

    return "email enviado";

});

Route::get('/template', function(){
    return view('template.index');
});