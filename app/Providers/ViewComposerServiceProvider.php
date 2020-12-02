<?php

namespace App\Providers;

use App\Http\Composers\CurrentUserComposer;
use Illuminate\Contracts\View\Factory;
use Illuminate\Support\ServiceProvider;

class ViewComposerServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot(Factory $factory)
    {
        $factory->composer('admin.*', CurrentUserComposer::class);
    }
}
