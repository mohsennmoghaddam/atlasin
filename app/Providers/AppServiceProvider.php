<?php

namespace App\Providers;

use App\Http\Middleware\Auth;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

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
        app()->setLocale(session('locale', config('app.locale')));

        View::composer('*', function ($view) {
            if (auth()->check()) {
                $user = auth()->user();
                $role = $user->roles()->first();
                $view->with('currentUser', $user);
                $view->with('currentRole', $role ? $role->name : null);
            }
        });

    }
}
