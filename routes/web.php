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

Route::get('/', 'Auth\LoginController@showHome')->name('login');


Route::get('login/strava', 'Auth\LoginController@redirectToProvider');
Route::get('oauth/code_callback', 'Auth\LoginController@handleProviderCallback');

Route::get('/hall-of-fame', 'ActivitiesController@showHall');

Route::group(['middleware' => 'auth'], function()
{
    Route::get('/dashboard', 'UsersController@index');
    Route::get('/achievements', 'BadgesController@achievedBadges');

    Route::get('/logout', 'Auth\LoginController@logout');
    Route::get('/activities','ActivitiesController@index');
    Route::get('/ranking', 'ActivitiesController@ranking');
    Route::get('/users/type/{type}', 'FriendsController@index');
    Route::get('/users/{id}', 'FriendsController@friend');

    Route::post('/users', 'FriendsController@storeOrDelete');
    Route::post('/users', 'FriendsController@store');

});




