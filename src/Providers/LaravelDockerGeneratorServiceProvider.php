<?php

namespace Lsnepomuceno\LaravelDockerGenerator\Providers;

use Illuminate\Support\ServiceProvider;
use Lsnepomuceno\LaravelDockerGenerator\Commands\DockerGenerate;

class LaravelDockerGeneratorServiceProvider extends ServiceProvider
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
    public function boot()
    {
        if ($this->app->runningInConsole()) {
            $this->commands([
                DockerGenerate::class,
            ]);
        }
    }
}
