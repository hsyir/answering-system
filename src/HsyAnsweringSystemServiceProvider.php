<?php


namespace Hsy\AnsweringSystem;


use Illuminate\Support\Facades\Route;
use Illuminate\Support\ServiceProvider;

class HsyAnsweringSystemServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $this->publishes([
            __DIR__ . '/../database/migrations/' => database_path('migrations')
        ], 'migrations');

        $this->publishes([
            __DIR__ . '/../config/answering.php' => config_path('answering.php'),
        ], 'config');


    }

    public function register()
    {
        $this->registerResources();
    }

    /**
     * Register the package resources such as routes, templates, etc.
     *
     * @return void
     */
    protected function registerResources()
    {
        $this->loadViewsFrom(__DIR__ . '/../resources/views', 'answering');
        $this->registerFacades();
        $this->registerRoutes();
        $this->registerConfigs();
    }


    private function registerFacades()
    {
        $this->app->singleton("Answering", function () {
            return new Answering;
        });
    }

    /**
     * Register the package routes.
     *
     * @return void
     */
    protected function registerRoutes()
    {
        Route::group($this->routeConfiguration(), function () {
            $this->loadRoutesFrom(__DIR__ . '/../routes/web.php');
        });
    }

    /**
     * Get the Press route group configuration array.
     *
     * @return array
     */
    protected function routeConfiguration()
    {
        return [
            'namespace' => 'Hsy\AnsweringSystem\Http\Controllers',
            'prefix' => "answering",
            'middleware' => ['web',"auth"],
            "as"=>"answering.",
        ];
    }

    private function registerConfigs()
    {

        $this->mergeConfigFrom(__DIR__ . '/../config/answering.php', 'answering');
    }

}