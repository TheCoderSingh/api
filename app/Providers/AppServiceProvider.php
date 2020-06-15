<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Alunos\Households\Providers\ModuleServiceProvider as HouseholdServiceProvider;
use Alunos\Profiles\Providers\ModuleServiceProvider as ProfileServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->register(ProfileServiceProvider::class);
        $this->app->register(HouseholdServiceProvider::class);
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
