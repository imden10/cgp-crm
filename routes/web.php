<?php

use Illuminate\Support\Facades\Route;

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

Route::group(['prefix' => 'dashboard', 'middleware' => ['auth:sanctum', 'verified']], function() {
    Route::get('/', 'DashboardController@index');

    Route::get('companies-get-list', 'CompaniesController@getList')->name('companies-get-list');
    Route::resource('companies', 'CompaniesController');
    Route::get('clients-get-list', 'ClientsController@getList')->name('clients-get-list');
    Route::resource('clients', 'ClientsController');
    Route::resource('users', 'UsersController');
});
