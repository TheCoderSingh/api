<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Alunos\Profiles\Providers\ModuleServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->register(ModuleServiceProvider::class);
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
