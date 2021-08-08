<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});


Route::group(['prefix' => 'elasticsearch'], function(){
    Route::get('/elastic', 'ElasticSearchController@index')->name('elastic.search');
    Route::get('/registraNoticiasElastic', 'ElasticSearchController@registraNoticiasElastic')->name('elastic.register');
});

Route::group(['prefix' => 'postgres'], function(){
    Route::get('/listaNoticiasApi', 'NoticiaController@getNoticiasAPI')->name('lista.noticiasAPI');
    Route::get('/registraNoticias', 'NoticiaController@registraNoticiasAPI')->name('registra.noticias');
    Route::get('/listaNoticias', 'NoticiaController@getNoticiasAll')->name('lista.noticias');
});


