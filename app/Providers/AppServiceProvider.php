<?php

namespace App\Providers;

use App\Company;
use App\JobType;
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
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        view()->composer('admin.job._form', function ($view) {
            $view->with('tipe_job', JobType::query());
        });
        view()->composer('admin.job._form', function ($view) {
            $view->with('company', Company::query());
        });
    }
}
