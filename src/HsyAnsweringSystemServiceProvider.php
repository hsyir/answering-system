<?php


namespace Hsy\AnsweringSystem;


use Illuminate\Support\ServiceProvider;

class HsyAnsweringSystemServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $this->publishes([
            __DIR__.'/../database/migrations/' => database_path('migrations')
        ], 'migrations');
    }

    public function register()
    {
        $this->registerFacades();
    }

    private function registerFacades()
    {
        $this->app->singleton("Answering", function () {
            return new Answering;
        });
    }
}