<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Validator;
use Log;

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
       /* If (env('APP_ENV') !== 'local') {
            $this->app['request']->server->set('HTTPS', true);
        }

        Schema::defaultStringLength(191); */

       /* Validator::extend('pwned', Pwned::class);

        Validator::replacer('pwned', function ($message, $attribute, $rule, $parameters) {
            return str_replace(':min', array_shift($parameters) ?? 1, $message);
        }); */
    }
}
