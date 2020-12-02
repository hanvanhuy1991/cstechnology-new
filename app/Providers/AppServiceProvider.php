<?php

namespace App\Providers;

use App\Product;
use App\Taxon;
use App\User;
use DaveJamesMiller\Breadcrumbs\Facades\Breadcrumbs;
use Illuminate\Database\Eloquent\Relations\Relation;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;
use Spatie\QueryString\QueryString;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->registerQueryString();
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->bootBreadcrumbMarco();
        LengthAwarePaginator::defaultView('admin.layouts.pa');
        LengthAwarePaginator::defaultSimpleView('admin.layouts.simplePagination');

        Relation::morphMap([
            'users' => User::class,
            'products' => Product::class,
            'taxons' => Taxon::class,
        ]);
    }

    /**
     * Boot macro for breadcrumbs
     */
    protected function bootBreadcrumbMarco(): void
    {
        Breadcrumbs::macro('pageTitle', function () {
            $title = ($breadcrumb = Breadcrumbs::current()) ? "{$breadcrumb->title} – " : '';
            if (($page = (int) request('page')) > 1) {
                $title .= "Page $page – ";
            }

            return $title . config('app.name');
        });
    }

    private function registerQueryString()
    {
        $this->app->singleton(QueryString::class, function () {
            /** @var \Illuminate\Http\Request $request */
            $request = $this->app->get(Request::class);

            return new QueryString(urldecode($request->getRequestUri()));
        });
    }
}
