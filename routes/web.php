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

Route::group(['middleware' => 'auth'], function()
{
    Route::get('/profile', 'UsersController@index');
    Route::get('/goals', 'ScheduleController@goalsSchedule');
    Route::get('/achievements', 'BadgesController@achievedBadges');

    Route::get('/logout', 'Auth\LoginController@logout');
    Route::get('/activities','ActivitiesController@index');
    Route::get('/friends', 'FriendsController@index');
    Route::get('/friends/{id}', 'FriendsController@friend');
});




