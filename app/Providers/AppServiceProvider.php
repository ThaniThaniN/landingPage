<?php

namespace App\Providers;

use App\Models\Section;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function boot(): void
    {
        // Share active sections with the  layout
        View::composer('components.admin-layout', function ($view) {
            $sections = Section::all();
            $view->with('sections', $sections);
        });
        Model::preventLazyLoading();
    }
    /**
     * Bootstrap any application services.
     */
    public function register()
    {
        // Other registrations can go here
    }
}
