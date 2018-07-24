<?php

namespace App\Providers;

use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Session;

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
	    /**
	     * Definition of macros
	     *
	     * For the Routing, it's necessary to define macros, which then can be used in the age-specific routing files.
	     * They are used like functions, which you can call from routing files and so reduce code massively.
	     * They need to be defined, so the routes for each age-group are defined and can be used in templates.
	     * Please always make sure, that the call for parent to boot happens lastly.
	     */

	    Route::macro('home', function ($age) {
		    Route::get( '/', 'HomeController@index')->name($age.'-home');
	    });

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

        //Map routes for admin
	    $this->mapAdminRoutes();

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

	/**
	 * These routes are for the admins
	 *
	 * @return void
	 */
	protected function mapAdminRoutes()
	{
		Route::middleware('web')
		     ->namespace($this->namespace)
		     ->group(base_path('routes/admin.php'));
	}
}
