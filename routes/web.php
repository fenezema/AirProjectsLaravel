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
    return view('landingpage');
})->name('landing');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/navbarData','HomeController@navbarData');
Route::get('/sidenavData','HomeController@sidenavData');
Route::get('/profile','HomeController@profile')->name('profile');
Route::post('/saveProfile','HomeController@saveProfile');