<?php

namespace Sagor110090\Permission;

use Illuminate\Support\ServiceProvider;
use Sagor110090\Permission\IsAdmin;

class PermissionServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        include __DIR__.'/routes.php';
        $this->loadMigrationsFrom(__DIR__.'/migrations');
        $this->loadViewsFrom(__DIR__.'/views', 'permission');
        $this->registerMiddleware();

    }
    protected function registerMiddleware()
    {
        /** @var Kernel|\Illuminate\Foundation\Http\Kernel $kernel */
        $this->app['router']->aliasMiddleware('isAdmin', IsAdmin::class);
    }
    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $this->app->make('Sagor110090\Permission\UserController');
        $this->app->make('Sagor110090\Permission\RoleController');
        
    }
}
