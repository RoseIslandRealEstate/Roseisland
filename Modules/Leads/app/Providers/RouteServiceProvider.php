<?php

namespace Modules\Leads\Providers;

use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Route;
use Modules\Leads\App\Http\Middleware\MultiAuth;


class RouteServiceProvider extends ServiceProvider
{
    protected string $name = 'Leads';

    /**
     * Called before routes are registered.
     */
    public function boot(): void
    {
        parent::boot();

        // Register middleware alias for the module
        $router = $this->app['router'];
        $router->aliasMiddleware('leads.multi_auth', MultiAuth::class);
    }

    /**
     * Define the routes for the application.
     */
    public function map(): void
    {
        $this->mapApiRoutes();
        $this->mapWebRoutes();
    }

    /**
     * Define the "web" routes for the module.
     */
    protected function mapWebRoutes(): void
    {
        Route::middleware('web')
            ->group(module_path($this->name, 'Routes/web.php'));
    }

    /**
     * Define the "api" routes for the module.
     */
    protected function mapApiRoutes(): void
    {
        Route::middleware('api')
            ->prefix('api')
            ->name('api.')
            ->group(module_path($this->name, 'Routes/api.php'));
    }
}
