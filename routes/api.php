<?php

Route::get('/verify', 'OtherController@verifyCredentials');

Route::get('/readers', 'ReadersController@getReaders');
Route::get('/readers/{id}', 'ReadersController@getReader');
Route::post('/readers', 'ReadersController@createReader');
Route::put('/readers/{id}', 'ReadersController@updateReader');
Route::delete('/readers/{id}', 'ReadersController@deleteReader');

Route::get('/editions', 'EditionsController@getEditions');
Route::get('/editions/{id}', 'EditionsController@getEdition');

Route::get('/permissions', 'PermissionsController@getPermissions');
Route::get('/permissions/{id}', 'PermissionsController@getPermission');
Route::post('/permissions', 'PermissionsController@createPermission');
Route::put('/permissions/{id}', 'PermissionsController@updatePermission');
Route::delete('/permissions/{id}', 'PermissionsController@deletePermission');

Route::get('/reader-logins', 'ReaderLoginsController@getReaderLogins');
Route::get('/reader-logins/{id}', 'ReaderLoginsController@getReaderLogin');

Route::get('/publications', 'PublicationsController@getPublications');
Route::get('/publications/{id}', 'PublicationsController@getPublication');

Route::get('/subscriptions', 'SubscriptionsController@getSubscriptions');
Route::get('/subscriptions/{id}', 'SubscriptionsController@getSubscription');

Route::get('/subscription-periods', 'SubscriptionPeriodsController@getSubscriptionPeriods');
Route::get('/subscription-periods/{id}', 'SubscriptionPeriodsController@getSubscriptionPeriod');
Route::post('/subscription-periods', 'SubscriptionPeriodsController@createSubscriptionPeriod');
Route::put('/subscription-periods/{id}', 'SubscriptionPeriodsController@updateSubscriptionPeriod');
Route::delete('/subscription-periods/{id}', 'SubscriptionPeriodsController@deleteSubscriptionPeriod');

Route::post('/sso/any', 'SSOController@createAnyToken');
Route::post('/sso/publication', 'SSOController@createPublicationToken');
Route::post('/sso/edition', 'SSOController@createEditionToken');

Route::post('/other/remove-devices', 'OtherController@removeDevices');
Route::post('/other/auth-passwords', 'OtherController@authPasswords');

Route::post('/targeted-notifications', 'TargetedNotificationsController@send');