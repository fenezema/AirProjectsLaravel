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

Route::get('/terms', function () {
    return view('pages.useragreement');
})->name('terms');

Auth::routes();

Route::get('/home', 'ProjectsController@index')->name('home')->middleware('auth');
Route::get('/project/{id}', 'ProjectsController@projectdetail')->name('projectid')->middleware('auth');
Route::get('/navbarData','HomeController@navbarData')->middleware('auth');
Route::get('/ptype_select','HomeController@navbarData')->middleware('auth');
Route::get('/sidenavData','HomeController@sidenavData')->middleware('auth');
Route::get('/showProjects/navbarData','HomeController@navbarData')->middleware('auth');
Route::get('/showProjects/sidenavData','HomeController@sidenavData')->middleware('auth');
Route::get('/profile','HomeController@profile')->name('profile')->middleware('auth');
Route::post('/saveProfile','HomeController@saveProfile')->middleware('auth');
Route::get('/showProjects/{type}','ProjectsController@byProjectType')->name('byProjectType')->middleware('auth');
Route::get('/workers','HomeController@index')->name('workers')->middleware('auth');
Route::get('/workers/{id}','HomeController@userdetail')->name('workersid')->middleware('auth');
Route::get('/makeNew','ProjectsController@create')->middleware('auth')->name('newProject');
Route::post('/makepNew','ProjectsController@store')->middleware('auth');