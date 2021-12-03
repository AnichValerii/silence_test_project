<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind('App\Interfaces\SilenceXmlConvertor', 'App\Services\SilenceXmlToJsonConvertor');
        $this->app->bind('App\Interfaces\SilenceXmlParserInterface', 'App\Services\SilenceXmlParserService');
        $this->app->bind('App\Interfaces\BookGeneratorInterface', 'App\Services\BookGeneratorService');

    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
