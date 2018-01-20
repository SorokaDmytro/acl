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

Route::get('/config', 'ConfigController@index', function() {
  // can: owners, admins
})->middleware('can:show-config');

Route::get('/reports', 'ReportController@index', function() {
  // can: owners, employee
})->middleware('can:show-reports');

Route::get('/dashboard', 'DashboardController@index', function() {
  // can: owners, employee, admin
})->middleware('can:show-dashboard');
