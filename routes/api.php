<?php

// Route group fo guests user only

Route::group(['middleware' => ['guest:api']], function () {

    Route::post('login', 'API\Auth\AuthController@login');
    //Route::post('register', 'API\Auth\AuthController@register');
});

// Route group fo authenticade user only

Route::group(['middleware' => ['auth:api']], function () {
    Route::get('me', 'API\Auth\AuthController@getUser');
    Route::post('logout', 'API\Auth\AuthController@logout');

    Route::resource('users', 'API\Auth\UserController')->except('update');
    Route::get('roles', 'API\Auth\PermissionController@role_list');
    Route::post('roles', 'API\Auth\PermissionController@role_store');
    Route::get('permissions', 'API\Auth\PermissionController@permission_list');
    Route::post('permissions', 'API\Auth\PermissionController@permission_store');
    Route::post('rolepermissions/{role}', 'API\Auth\PermissionController@role_has_permissions');
    Route::post('assignuserrole/{role}', 'API\Auth\PermissionController@assign_user_to_role');

    Route::apiresource('categories', 'API\Products\CategoryController');
    Route::apiresource('products', 'API\Products\ProductController');
    Route::apiresource('units', 'API\Products\UnitController');

    Route::apiresource('customers', 'API\HumanResources\CustomerController');
});

// used Route::fallback() to help customize 404.
Route::fallback(function () {
    return response()->json(['message' => 'Not Found.'], 404);
})->name('api.fallback.404');
