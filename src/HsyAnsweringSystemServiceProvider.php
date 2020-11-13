<?php


namespace Hsy\AnsweringSystem;


use Illuminate\Support\ServiceProvider;

class HsyAnsweringSystemServiceProvider extends ServiceProvider
{
    public function boot()
    {
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