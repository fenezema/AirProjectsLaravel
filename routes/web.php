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

Route::get('/home', 'ProjectsController@index')->name('home')->middleware('auth');
Route::get('/navbarData','HomeController@navbarData')->middleware('auth');
Route::get('/sidenavData','HomeController@sidenavData')->middleware('auth');
Route::get('/showProjects/navbarData','HomeController@navbarData')->middleware('auth');
Route::get('/showProjects/sidenavData','HomeController@sidenavData')->middleware('auth');
Route::get('/profile','HomeController@profile')->name('profile')->middleware('auth');
Route::post('/saveProfile','HomeController@saveProfile')->middleware('auth');
Route::get('/showProjects/{type}','ProjectsController@byProjectType')->name('byProjectType')->middleware('auth');
Route::get('/workers','HomeController@index')->name('workers')->middleware('auth');
Route::get('/makeNew','ProjectsController@create')->name('newProject');

/*
sorry buat nyoba
*/
Route::get('/post-project', function () {
    return view('pages.postproject');
})->name('postproject');
Route::get('/project', function () {
    return view('pages.project');
})->name('project');