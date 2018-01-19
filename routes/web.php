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

Route::get('/dashboard', 'DashboardController@index')->name('dashboard');
// Route::get('/reports', 'ReportController@index')->name('reports');
// Route::get('/config', 'ConfigController@index')->name('config');

Route::group(['middleware' => 'checkemployeerole'], function () {
  Route::get('/reports', 'ReportController@index')->name('reports');
});

Route::group(['middleware' => 'checkadminrole'], function () {
  Route::get('/config', 'ConfigController@index')->name('config');
});
