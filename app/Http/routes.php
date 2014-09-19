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

Route::get('/', 'PagesController@defaultPage');

# Login
get('login', ['as' => 'sessions.create', 'uses' => 'SessionsController@create']);
post('login', ['as' => 'sessions.store', 'uses' => 'SessionsController@store']);
get('logout', ['as' => 'sessions.destroy', 'uses' => 'SessionsController@destroy']);

# Register
get('register', ['as' => 'registrations.create', 'uses' => 'RegistrationsController@create']);
post('register', ['as' => 'registrations.store', 'uses' => 'RegistrationsController@store']);

# Pages
get('admin', ['as' => 'home', 'uses' => 'PagesController@redirect']);
Route::group(['prefix' => 'admin', 'before' => 'auth'], function() {
    get('dashboard', ['as' => 'dashboard', 'uses' => 'PagesController@dashboard']);
    get('help', ['as' => 'help', 'uses' => 'PagesController@help']);

    Route::resource('domains','DomainsController');
    get('domains/{id}/delete', ['as' => 'admin.domains.destroy', 'uses' => 'DomainsController@destroy']);
});
