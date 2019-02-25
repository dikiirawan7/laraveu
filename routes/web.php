<?php

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

Route::get('/coba','CobaController@index');
Route::get('/paging','PostController@paging');
Route::get('/cari/{any}','PostController@cari');
Route::get('/tes/{any}','PostController@update');

//Route::get('/tes','PostController@index');
//Route::get('/tes/{any}','PostController@tes');
Route::get('/{any}',function(){
    return view('latihan');
})->where('any', '.*');