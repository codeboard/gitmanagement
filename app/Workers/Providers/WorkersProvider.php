<?php  namespace Codeboard\Workers\Providers;

use Illuminate\Support\ServiceProvider;

class WorkersProvider extends ServiceProvider {

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(
            'Codeboard\Workers\Repositories\WorkersRepositoryInterface',
            'Codeboard\Workers\Repositories\WorkersRepository'
        );
    }
}