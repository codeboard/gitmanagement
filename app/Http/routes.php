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
    get('domains', ['as' => 'admin.domains.index', 'uses' => 'DomainsController@index']);
    get('domains/create', ['as' => 'admin.domains.create', 'uses' => 'DomainsController@create']);
    post('domains', ['as' => 'admin.domains.store', 'uses' => 'DomainsController@store']);
    get('domains/{domain}', ['as' => 'admin.domains.show', 'uses' => 'DomainsController@show']);
    get('domains/{domain}/edit', ['as' => 'admin.domains.edit', 'uses' => 'DomainsController@edit']);
    put('domains/{domain}', ['as' => 'admin.domains.update', 'uses' => 'DomainsController@update']);
    patch('domains/{domain}', 'DomainsController@update');
    get('domains/{id}/delete', ['as' => 'admin.domains.destroy', 'uses' => 'DomainsController@destroy']);
    get('domains/{id}/token', ['as' => 'admin.domains.new_token', 'uses' => 'DomainsController@generateToken']);
    get('domains/{id}/nginx', ['as' => 'admin.domains.nginx', 'uses' => 'DomainsController@showNginx']);
    patch('domains/{id}/nginx', ['as' => 'admin.domains.nginx.update', 'uses' => 'DomainsController@updateNginx']);

    # App/Repository Section
    post('domains/{id}/app', ['as' => 'admin.app.store', 'uses' => 'AppsController@store']);
    patch('app/{id}', ['as' => 'admin.app.update', 'uses' => 'AppsController@update']);
    delete('app/{id}', ['as' => 'admin.app.destroy', 'uses' => 'AppsController@destroy']);

    # Environment Section
    post('domains/{id}/environment', ['as' => 'admin.environment.store', 'uses' => 'EnvironmentsController@store']);
    get('environment/{id}', ['as' => 'admin.environment.destroy', 'uses' => 'EnvironmentsController@destroy']);

    # Workers Section
    post('domains/{id}/worker', ['as' => 'admin.workers.store', 'uses' => 'WorkersController@store']);
    get('worker/{id}', ['as' => 'admin.workers.destroy', 'uses' => 'WorkersController@destroy']);

    # Settings Section
    get('settings', ['as' => 'settings', 'uses' => 'ConfigurationsController@create']);
    post('settings', ['as' => 'settings.save', 'uses' => 'ConfigurationsController@store']);
});
