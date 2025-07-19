<?php


use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Auth;

class ViewServiceProvider extends ServiceProvider
{
    public function boot(): void
    {

        View::composer('*', function ($view) {
            if (Auth::check()) {
                $user = Auth::user();
                $role = $user->roles()->first();
                $view->with('currentUser', $user);
                $view->with('currentRole', $role ? $role->name : null);
            }
        });

    }

    public function register(): void {}
}


