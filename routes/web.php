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
Route::get('hello', function () {
    return 'hii';
});
Route::get('henna','HomeController@index' );

Route::group(['middleware' => 'auth'], function() {
    Route::resource('projects', 'ProjectsController');
    Route::resource('projects.tasks', 'TasksController');
    Route::patch('/users/{user}/change-name', 'UsersController@changeName');
    Route::get('/users/mytask',['uses'=>'UsersController@myTask','as'=>'users.mytask']);
    Route::resource('users', 'UsersController');
});

Route::get('register', 'Auth\RegisterController@showRegistrationForm');
Route::post('register','Auth\RegisterController@register');
Route::get('login', ['uses' => 'Auth\LoginController@showLoginForm', 'as' => 'login']);
Route::post('login', 'Auth\LoginController@login');
Route::get('logout', 'Auth\LoginController@logout');

