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

Route::group(['middleware' => 'can:show-config'], function () {
  Route::get('/config', 'ConfigController@index')->name('config');
});

Route::group(['middleware' => 'can:show-reports'], function () {
  Route::get('/reports', 'ReportController@index')->name('report');
});

Route::group(['middleware' => 'can:show-dashboard'], function () {
  Route::get('/dashboard', 'DashboardController@index')->name('dashboard');
});

Route::group(['middleware' => 'can:create-user'], function () {
  Route::get('/users/new', 'UsersController@new')->name('new_user');
  Route::post('/users/create', 'UsersController@create')->name('create_user');
});
