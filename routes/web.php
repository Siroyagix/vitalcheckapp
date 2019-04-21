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


/* Route::get('/welcome', function () {
    return view('welcome');
}); */

Auth::routes();

Route::group(['middleware' => 'auth','middleware' => 'web'], function () {
    Route::get('/','HomeController@index')->name('home'); 

    Route::resource('vitaldatum', 'VitaldatumController')->only(['store', 'create']);
    // Route::get('/store','VitaldatumController@store')->name('store');
    // Route::post('/create','VitaldatumController@create')->name('store.create');
});
