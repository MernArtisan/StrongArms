<?php

namespace App\Providers;

use App\Models\Content;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\View;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {


        if (Schema::hasTable('contents')) {
            $cms_content = Content::all();
        }

        View::share('cms_content', $cms_content);


        View::composer('*', function ($view) {
            $isAdmin = Auth::check() && Auth::user()->hasRole('admin');
            $isProvider = Auth::check() && Auth::user()->hasRole('provider');
            $view->with('isAdmin', $isAdmin);
            $view->with('isProvider', $isProvider);
        });
    }
}
