<?php

Route::redirect('/', '/login');

Route::redirect('/home', '/admin');

Auth::routes();

Route::group(['prefix' => 'admin', 'as' => 'admin.', 'namespace' => 'Admin', 'middleware' => ['auth']], function () {
    Route::get('/', 'HomeController@index')->name('home');

    Route::delete('permissions/destroy', 'PermissionsController@massDestroy')->name('permissions.massDestroy');

    Route::resource('permissions', 'PermissionsController');

    Route::delete('roles/destroy', 'RolesController@massDestroy')->name('roles.massDestroy');

    Route::resource('roles', 'RolesController');

    Route::delete('users/destroy', 'UsersController@massDestroy')->name('users.massDestroy');

    Route::resource('users', 'UsersController');

    Route::delete('countries/destroy', 'CountriesController@massDestroy')->name('countries.massDestroy');

    Route::resource('countries', 'CountriesController');

    Route::delete('jobs/destroy', 'JobsController@massDestroy')->name('jobs.massDestroy');
    Route::resource('jobs', 'JobsController');

    Route::post('jobs/media', 'JobsController@storeMedia')->name('jobs.storeMedia');

    Route::delete('proposals/destroy', 'ProposalsController@massDestroy')->name('proposals.massDestroy');

    Route::resource('proposals', 'ProposalsController');

    Route::post('proposals/media', 'ProposalsController@storeMedia')->name('proposals.storeMedia');
});
