<?php

namespace App\Providers;

use App\View\Components\LabelSelectAssigner;
use App\View\Components\LabelSelectStatus;
use App\View\Components\LabelTag;
use App\View\Components\Select;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\URL;
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
        $this->app->register(\Rollbar\Laravel\RollbarServiceProvider::class);
        
        if ($this->app->isLocal()) {
            $this->app->register(\Laravel\Telescope\TelescopeServiceProvider::class);
            $this->app->register(TelescopeServiceProvider::class);
        }
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Blade::component('label-tag', LabelTag::class);
        Blade::component('label-select-status', LabelSelectStatus::class);
        Blade::component('label-select-assigner', LabelSelectAssigner::class);
        Blade::component('select', Select::class);
        if (config('app.env') === 'production') {
            URL::forceScheme('https');
        }
    }
}
