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
    return view('/auth/login');
});

Auth::routes();

Route::get('/dashboard/home', 'DashboardController@versionone')->name('home');
Route::get('/dashboard/v2', 'DashboardController@versiontwo')->name('v2');
Route::get('/dashboard/v3', 'DashboardController@versionthree')->name('v3');

// Tasks
Route::get('/tasks/viewTask', 'TasksController@index')->name('viewTask');
Route::get('/tasks/addTask', 'TasksController@create')->name('addTask');

Route::resource('tasks', 'TasksController');
///('tasks', 'TasksController');

Route::get('logout', '\App\Http\Controllers\Auth\LoginController@logout');
