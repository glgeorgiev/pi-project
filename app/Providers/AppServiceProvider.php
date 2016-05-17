<?php

namespace App\Providers;

use App\Language;
use Exception;
use Illuminate\Support\ServiceProvider;
use Request;
use View;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        if (Request::has('language')) {
            $language = Language::find(Request::input('language'));
        }

        if (! isset($language)) {
            $language = Language::first();
        }

        if (is_null($language)) {
            throw new Exception('No language');
        }

        View::share('langauge', $language);
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
