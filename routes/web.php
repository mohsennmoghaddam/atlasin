<?php

use App\Http\Controllers\client\ContactUsController;
use App\Http\Controllers\Client\HomeController;
use Illuminate\Support\Facades\Route;


Route::get('lang/{locale}', function ($locale) {
    if (!in_array($locale, ['fa', 'en'])) {
        abort(400);
    }

    session(['locale' => $locale]);

    return redirect()->back();
})->name('language.switch');

    //client
    Route::middleware([\App\Http\Middleware\SetLocale::class])->prefix('/')->name('clients.')->group(function () {

    Route::get('/', [HomeController::class, 'index'])->name('index');

    Route::get('/about', [HomeController::class, 'about'])->name('about');

    Route::post('/contact', [ContactUsController::class, 'store'])->name('contact.store');

    });


    Route::get('/login', [\App\Http\Controllers\Admin\AuthController::class, 'showLoginForm'])->name('login.form');

    Route::post('/login/send-otp', [\App\Http\Controllers\Admin\AuthController::class, 'sendOtp'])->name('login.sendOtp');


    // admin
    Route::prefix('AtlassianPanelCo')

        ->middleware([


        ])
        ->group(function () {

            Route::get('/',[\App\Http\Controllers\Admin\HomeController::class, 'index'])->name('admin.index');

            Route::resource('slider',\App\Http\Controllers\Admin\SliderController::class);

            Route::resource('about',\App\Http\Controllers\Admin\AboutController::class);

            Route::resource('contact-services', \App\Http\Controllers\Admin\ContactServiceController::class);

            Route::resource('contact' ,  \App\Http\Controllers\Admin\ContactUsController::class);

            Route::resource('team-members', \App\Http\Controllers\Admin\TeamMemberController::class);

            Route::get('why-uses', [\App\Http\Controllers\Admin\WhyUsController::class, 'index'])->name('why-uses.index');
            Route::get('why-uses/create', [\App\Http\Controllers\Admin\WhyUsController::class, 'create'])->name('why-uses.create');
            Route::post('why-uses', [\App\Http\Controllers\Admin\WhyUsController::class, 'store'])->name('why-uses.store');
            Route::get('why-uses/{whyUse}/edit', [\App\Http\Controllers\Admin\WhyUsController::class, 'edit'])->name('why-uses.edit');
            Route::put('why-uses/{whyUse}', [\App\Http\Controllers\Admin\WhyUsController::class, 'update'])->name('why-uses.update');
            Route::delete('why-uses/{whyUse}', [\App\Http\Controllers\Admin\WhyUsController::class, 'destroy'])->name('why-uses.destroy');

            Route::resource('role',\App\Http\Controllers\Admin\RoleController::class);
            Route::get('role/{role}/permission', [\App\Http\Controllers\Admin\RoleController::class, 'editPermissions'])->name('role.permission.edit');
            Route::put('role/{role}/permission', [\App\Http\Controllers\Admin\RoleController::class, 'updatePermissions'])->name('role.permission.update');
            Route::resource('permission', \App\Http\Controllers\Admin\PermissionController::class)->names([
                'index' => 'permission.index',
                'create' => 'permission.create',
                'store' => 'permission.store',
                'edit' => 'permission.edit',
                'update' => 'permission.update',
                'destroy' => 'permission.destroy',
            ]);

            Route::resource('users', \App\Http\Controllers\Admin\UserController::class);

        });


