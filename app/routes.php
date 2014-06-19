<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::group(array('prefix' => 'v1', 'before' => 'api.auth|api.limit'), function()
{
    Route::get('/monthly/{year}/{month?}', 'ActivityController@getMonthlyActivity');
    
    Route::get('/daily/{year}/{month?}/{day?}', 'ActivityController@getDailyActivity');
    
    Route::post('/activity', 'ActivityController@postActivity');
});