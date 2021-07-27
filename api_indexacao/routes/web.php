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

Route::group(['prefix' => 'indexacao'], function(){
    Route::get('/form', 'IndexacaoController@index')->name('indexacao.form');
    Route::post('/store', 'IndexacaoController@store')->name('indexacao.store');
    // Route::post('/register', 'DoctorController@registerDoctorAPI');
});
