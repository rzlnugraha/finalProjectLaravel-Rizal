<?php

namespace App\Providers;

use App\Company;
use App\JobType;
use App\Job;
use Illuminate\Support\Facades\DB;
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
        view()->composer(['visitor.index','welcome'], function ($view) {
            $view->with('job', Job::with('company')->whereDate('tanggal_expired','>=', date('Y-m-d'))->latest()->take(6)->get());
        });
        view()->composer(['visitor.index','welcome'], function ($view) {
            $view->with('kategori', DB::table('userjobs')
                        ->join('job_types', 'job_types.id', 'userjobs.tipe_job')
                        ->select('userjobs.tipe_job', 'job_types.job_type as tipe', DB::raw('count(*) as total'))
                        ->groupBy('userjobs.tipe_job')
                        ->get());
        });
    }
}
