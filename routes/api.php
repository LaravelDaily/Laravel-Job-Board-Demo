<?php

Route::group(['prefix' => 'v1', 'as' => 'admin.', 'namespace' => 'Api\V1\Admin'], function () {
    Route::apiResource('permissions', 'PermissionsApiController');

    Route::apiResource('roles', 'RolesApiController');

    Route::apiResource('users', 'UsersApiController');

    Route::apiResource('countries', 'CountriesApiController');

    Route::apiResource('jobs', 'JobsApiController');

    Route::apiResource('proposals', 'ProposalsApiController');
});
