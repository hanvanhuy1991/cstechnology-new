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
     * The path to the "home" route for your application.
     *
     * @var string
     */
    public const HOME = '/home';

    /**
     * Define your route model bindings, pattern filters, etc.
     *
     * @return void
     */
    public function boot()
    {
        parent::boot();

        Route::bind('user', function ($value, $route) {
            return $this->getModel(\App\User::class, $value);
        });
        Route::bind('role', function ($value, $route) {
            return $this->getModel(\App\Role::class, $value);
        });
        Route::bind('option-type', function ($value, $route) {
            return $this->getModel(\App\OptionType::class, $value);
        });

        Route::bind('option-value', function ($value, $route) {
            return $this->getModel(\App\OptionValue::class, $value);
        });

        Route::bind('prototype', function ($value, $route) {
            return $this->getModel(\App\Prototype::class, $value);
        });

        Route::bind('taxonomy', function ($value, $route) {
            return $this->getModel(\App\Taxonomy::class, $value);
        });

        Route::bind('taxon', function ($value, $route) {
            return $this->getModel(\App\Taxon::class, $value);
        });

        Route::bind('product', function ($value, $route) {
            return $this->getModel(\App\Product::class, $value);
        });

        Route::bind('variant', function ($value, $route) {
            return $this->getModel(\App\Variant::class, $value);
        });
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

    private function mapAdminRoutes()
    {
        Route::prefix('admin')
            ->middleware('web')
            ->group(base_path('routes/admin.php'));
    }

    private function getModel($model, $routeKey)
    {
        $id = \Hashids::connection($model)->decode($routeKey)[0] ?? null;
        $modelInstance = resolve($model);

        return  $modelInstance->findOrFail($id);
    }
}
