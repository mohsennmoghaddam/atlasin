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

        });


