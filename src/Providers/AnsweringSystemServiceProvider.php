<?php


namespace Hsy\AnsweringSystem\Providers;



use Illuminate\Support\ServiceProvider;

class AnsweringSystemServiceProvider extends ServiceProvider
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
        $this->app->singletone("Answering",function(){

        });
    }
}