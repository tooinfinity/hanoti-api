<?php

// Route group fo guests user only

Route::group(['middleware' => ['guest:api']], function () {

    Route::post('login', 'API\Auth\AuthController@login');
    Route::post('register', 'API\Auth\AuthController@register');
});

// Route group fo authenticade user only

Route::group(['middleware' => ['auth:api']], function () {
    Route::get('me', 'API\Auth\AuthController@getUser');
    Route::post('logout', 'API\Auth\AuthController@logout');
});
