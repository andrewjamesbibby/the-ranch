<?php

use Illuminate\Http\Request;


//Route::middleware('auth:api')->get('/user', function (Request $request) {
//    return $request->user();
//});

Route::get('/readers', 'ReadersController@getReaders');
Route::get('/readers/{id}', 'ReadersController@getReader');
Route::post('/readers', 'ReadersController@createReader');
Route::put('/readers/{id}', 'ReadersController@updateReader');
Route::delete('/readers/{id}', 'ReadersController@deleteReader');

Route::get('/editions', 'EditionsController@getEditions');

Route::post('/targeted-notifications', 'TargetedNotificationsController@send');