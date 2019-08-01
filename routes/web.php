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



Auth::routes();

Route::get('/', 'HomeController@index')->name('home');


Route::group(['middleware' => ['App\Http\Middleware\Adminmiddleware']], function () {
    Route::resource('notices', 'NoticesController');
    Route::resource('/teams', 'TeamsController');
    Route::resource('/users', 'UsersController');
});


