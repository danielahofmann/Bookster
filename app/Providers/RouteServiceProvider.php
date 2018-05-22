<?php

namespace App\Providers;

use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;

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
        //

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

        //Map the routes for the different ageGroups
        $this->mapToddlerRoutes();
        $this->mapKidRoutes();
        $this->mapTeenRoutes();
        $this->mapElderlyRoutes();
        $this->mapSeniorRoutes();
        $this->mapDefaultRoutes();
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
	 * These routes are for the toddlers ageGroup
	 *
	 * @return void
	 */
	protected function mapToddlerRoutes()
	{
		Route::middleware('web')
		     ->namespace($this->namespace)
		     ->group(base_path('routes/toddlers.php'));
	}

	/**
	 * These routes are for the kids ageGroup
	 *
	 * @return void
	 */
	protected function mapKidRoutes()
	{
		Route::middleware('web')
		     ->namespace($this->namespace)
		     ->group(base_path('routes/kids.php'));
	}

	/**
	 * These routes are for the teens ageGroup
	 *
	 * @return void
	 */
	protected function mapTeenRoutes()
	{
		Route::middleware('web')
		     ->namespace($this->namespace)
		     ->group(base_path('routes/teens.php'));
	}

	/**
	 * These routes are for the elderly ageGroup
	 *
	 * @return void
	 */
	protected function mapElderlyRoutes()
	{
		Route::middleware('web')
		     ->namespace($this->namespace)
		     ->group(base_path('routes/elderly.php'));
	}

	/**
	 * These routes are for the seniors ageGroup
	 *
	 * @return void
	 */
	protected function mapSeniorRoutes()
	{
		Route::middleware('web')
		     ->namespace($this->namespace)
		     ->group(base_path('routes/seniors.php'));
	}

	/**
	 * These routes are for the seniors ageGroup
	 *
	 * @return void
	 */
	protected function mapDefaultRoutes()
	{
		Route::middleware('web')
		     ->namespace($this->namespace)
		     ->group(base_path('routes/default.php'));
	}
}
