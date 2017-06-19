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
    return redirect()->route('dashboard');
});

Route::get('login', 'Auth\AuthController@getLogin')->name('login');
Route::post('login', 'Auth\AuthController@postLogin');
Route::get('logout', 'Auth\AuthController@getLogout')->name('logout');

Route::group(array('prefix' => 'dashboard', 'middleware' => 'auth'), function()
{
  Route::get('/', 'Controller@index')->name('dashboard');
  Route::get('task', 'Task\TaskController@createTask')->name('addTask');
  Route::post('task', 'Task\TaskController@postTask')->name('postTask');

  Route::get('task/{id}', 'Task\TaskController@editTask')->name('editTask');
  Route::put('task/edit', 'Task\TaskController@putTask')->name('putTask');

});
