<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Route;

class RouteServiceProvider extends ServiceProvider
{
    /**
     * This namespace is applied to your controller routes.
     *
     * In addition, it is set as the URL generator's root namespace.
     *
     * @var string
     */
    protected $namespace = 'App\Http\Controllers';

    /**
     * Define your route model bindings, pattern filters, etc.
     *
     * @return void
     */
    public function boot()
    {
        parent::boot();
    }

    /**
     * Define the routes for the application.
     *
     * @return void
     */
    public function map()
    {
        $this->mapApiRoutes();

        $this->mapWebRoutes();

        $this->mapFrontendRoutes(); // Mapping frontend routes

        $this->mapBackendRoutes(); // Mapping backend routes
    }

    /**
     * Define the "web" routes for the application.
     *
     * These routes all receive session state, CSRF protection, etc.
     *
     * @return void
     */
    protected function mapWebRoutes()
    {
        Route::middleware('web')
             ->namespace($this->namespace)
             ->group(base_path('routes/web.php'));
    }

    /**
     * Define the "api" routes for the application.
     *
     * These routes are typically stateless.
     *
     * @return void
     */
    protected function mapApiRoutes()
    {
        Route::prefix('api')
             ->middleware('api')
             ->namespace($this->namespace)
             ->group(base_path('routes/api.php'));
    }

    /**
     * Define the "frontend" routes for the application
     * 
     * These routes all receive session state, CSRF protection, etc. in frontend
     *
     * @return void
     */
    protected function mapFrontendRoutes()
    {
        Route::middleware('web')
               ->name('ln.')
               ->namespace('App\Http\Controllers\Frontend')
               ->group(base_path('routes/frontend.php'));
    }

    /**
     * Define the "backend" routes for the application
     * 
     * These routes all receive session state, CSRF protection, etc. in backend
     *
     * @return void
     */
    protected function mapBackendRoutes()
    {
        Route::middleware('web')
               ->name('ln.')
               ->namespace('App\Http\Controllers\Backend')
               ->group(base_path('routes/backend.php'));
    }
}
