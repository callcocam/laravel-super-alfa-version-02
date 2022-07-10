<?php

namespace App\Providers;

use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;
use SIGA\Charts\LivewireChartsServiceProvider;
use SIGA\Themes\ThemeManager;
use App\Models\TempLog;
use App\Observers\TempLogObserver;
use Illuminate\Support\Facades\Artisan;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->register(LivewireChartsServiceProvider::class);
        $this->app->alias(ThemeManager::class, 'theme');
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->loadViewsFrom(app_path('SIGA/resources/views'), 'siga');
        Schema::defaultStringLength(255);
        Paginator::useBootstrap();
        //TempLog::observe(TempLogObserver::class);

       // Artisan::call('schedule:work');
    }
}
