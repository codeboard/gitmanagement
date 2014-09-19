<?php namespace Codeboard\Providers;

use Illuminate\Routing\FilterServiceProvider as ServiceProvider;

class FilterServiceProvider extends ServiceProvider {

	/**
	 * The filters that should run before all requests.
	 *
	 * @var array
	 */
	protected $before = [
		'Codeboard\Http\Filters\MaintenanceFilter',
	];

	/**
	 * The filters that should run after all requests.
	 *
	 * @var array
	 */
	protected $after = [
		//
	];

	/**
	 * All available route filters.
	 *
	 * @var array
	 */
	protected $filters = [
		'auth' => 'Codeboard\Http\Filters\AuthFilter',
		'auth.basic' => 'Codeboard\Http\Filters\BasicAuthFilter',
		'csrf' => 'Codeboard\Http\Filters\CsrfFilter',
		'guest' => 'Codeboard\Http\Filters\GuestFilter',
	];

}