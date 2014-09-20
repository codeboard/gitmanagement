<?php

# Static Pages
get('/', 'PagesController@defaultPage');
get('admin', ['as' => 'home', 'uses' => 'PagesController@redirect']);


# Login
get('login', ['as' => 'sessions.create', 'uses' => 'SessionsController@create']);
post('login', ['as' => 'sessions.store', 'uses' => 'SessionsController@store']);
get('logout', ['as' => 'sessions.destroy', 'uses' => 'SessionsController@destroy']);

# Register
get('register', ['as' => 'registrations.create', 'uses' => 'RegistrationsController@create']);
post('register', ['as' => 'registrations.store', 'uses' => 'RegistrationsController@store']);

Route::group(['prefix' => 'admin', 'before' => 'auth'], function() {
    # Static Pages
    get('dashboard', ['as' => 'dashboard', 'uses' => 'PagesController@dashboard']);
    get('help', ['as' => 'help', 'uses' => 'PagesController@help']);

    # Domain Section
    Route::resource('domains','DomainsController');
    get('domains/{id}/delete', ['as' => 'admin.domains.destroy', 'uses' => 'DomainsController@destroy']);

    # App/Repository Section
    post('domains/{id}/app', ['as' => 'admin.app.store', 'uses' => 'AppsController@store']);
    patch('app/{id}', ['as' => 'admin.app.update', 'uses' => 'AppsController@update']);
    delete('app/{id}', ['as' => 'admin.app.destroy', 'uses' => 'AppsController@destroy']);

    # Environment Section
    post('domains/{id}/environment', ['as' => 'admin.environment.store', 'uses' => 'EnvironmentsController@store']);
});
