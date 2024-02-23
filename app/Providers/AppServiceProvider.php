<?php

namespace App\Providers;

use App\Model\CustomFront;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Blade;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        view()->composer('layouts.frontend.home.header', function ($view) {
            $view->with('list', CustomFront::first());
        });
        view()->composer('layouts.frontend.home.footer', function ($view) {
            $view->with('list', CustomFront::first());
        });

        View::share('plugins', []);

        Blade::directive('jsScript', function ($str) {
            $path = asset($str . "?q=" . time());
            return '<script src="' . $path . '"></script>';
        });

        if (in_array(env('APP_ENV'), ['production', 'ministry', 'egov'])) {
            \URL::forceRootUrl(\Config::get('app.url'));
            \URL::forceScheme('https');
        }
    }
}
