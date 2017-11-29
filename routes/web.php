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
//Controller to Dashboard. Only visible after login

//Routes to authprovider. provider is between {} because you can use multiple options.
Route::get('socialauth/{provider}', 'Auth\SocialAuthController@redirectToProvider');
Route::get('socialauth/{provider}/callback', 'Auth\SocialAuthController@handleProviderCallback');
Route::resource('/vakexpert', 'VakexpertController');
Route::resource('/project', 'ProjectController');
