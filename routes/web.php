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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['middleware' => ['auth']], function () {
  Route::prefix('user')->group(function () {
      Route::get('/', 'UserController@index')->name('index.user');
      Route::get('/edit/{id}', 'UserController@edit')->name('edit.user');
      Route::post('/update/{id}', 'UserController@update')->name('update.user');
      Route::get('/delete/{id}', 'UserController@destroy')->name('delete.user');
  });
  Route::prefix('dokter')->group(function () {
      Route::get('/', 'DokterController@index')->name('index.dokter');
      Route::get('/add', 'DokterController@create')->name('add.dokter');
      Route::post('/store', 'DokterController@store')->name('store.dokter');
      Route::get('/edit/{id}', 'DokterController@edit')->name('edit.dokter');
      Route::post('/update/{id}', 'DokterController@update')->name('update.dokter');
      Route::get('/delete/{id}', 'DokterController@destroy')->name('delete.dokter');
  });
});
