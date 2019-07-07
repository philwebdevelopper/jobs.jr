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

Route::get('/clientForm', function (){
  return view('clientForm');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

<<<<<<< HEAD
Route::post('/map', function () {
    return view('map');
});
=======
Route::get('/emailtest', 'testController@test');

Route::post('/testpost', 'testController2@test');


>>>>>>> form-validation
