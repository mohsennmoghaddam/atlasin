<?php

use App\Http\Controllers\Admin\BlogController;
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

    Route::get('/aboutUs', [\App\Http\Controllers\client\AboutController::class, 'index'])->name('aboutUs');

    Route::get('/ourService', [\App\Http\Controllers\client\OurServiceController::class, 'index'])->name('ourService');

    Route::get('/ContactUS', [\App\Http\Controllers\client\ContactUsController::class, 'index'])->name('ContactUS');

    Route::get('/homecare', [\App\Http\Controllers\Client\HomecareController::class, 'index'])->name('homecare');

    Route::get('/hospital', [\App\Http\Controllers\Client\HospitalController::class, 'index'])->name('hospital');

    Route::get('/hospital/category/{slug}', [\App\Http\Controllers\Client\HospitalController::class, 'category'])->name('hospital.category');

    Route::get('/blogs/{slug}', [\App\Http\Controllers\client\BlogController::class, 'show'])->name('blogs.show');



    });


    Route::get('/login', [\App\Http\Controllers\Admin\AuthController::class, 'showLoginForm'])->name('login.form');

    Route::post('/login/send-otp', [\App\Http\Controllers\Admin\AuthController::class, 'sendOtp'])->name('login.sendOtp');

    // نمایش فرم مرحله دوم (ورود OTP + رمز مخفی)
    Route::get('/login/verify', [\App\Http\Controllers\Admin\AuthController::class, 'showVerifyForm'])->name('login.verifyForm');

    // بررسی و اعتبارسنجی کد وارد شده
    Route::post('/login/verify', [\App\Http\Controllers\Admin\AuthController::class, 'verifyOtp'])->name('login.verifyOtp');

    // نمایش فرم رمز ایستا
    Route::get('/login/password', [\App\Http\Controllers\Admin\AuthController::class, 'showPasswordForm'])->name('login.passwordForm');

    // بررسی رمز ایستا و ورود نهایی
    Route::post('/login/password', [\App\Http\Controllers\Admin\AuthController::class, 'loginWithPassword'])->name('login.password');

    Route::get('/logout', [\App\Http\Controllers\Admin\AuthController::class, 'logout'])->name('logout');



// admin
    Route::prefix('AtlassianPanelCo')

        ->middleware([

            App\Http\Middleware\Auth::class ,
            \App\Http\Middleware\CheckPermission::class. ':show-panel',

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

            Route::resource('/admin/testimonials', \App\Http\Controllers\Admin\TestimonialController::class);
            Route::resource('/admin/hospitals', \App\Http\Controllers\Admin\HospitalController::class);
            Route::resource('/admin/partners', \App\Http\Controllers\Admin\PartnerImageController::class);


            Route::resource('blogs', \App\Http\Controllers\Admin\BlogController::class);
            Route::resource('blogs-category', \App\Http\Controllers\Admin\BlogCategoryController::class);

            Route::resource('homecare', \App\Http\Controllers\Admin\HomecareSectionController::class);
            Route::resource('homecare-sliders', \App\Http\Controllers\Admin\HomecareSliderController::class);
            Route::resource('homecare-cards', \App\Http\Controllers\Admin\HomecareProductCardController::class);
            Route::resource('homecare-texts', \App\Http\Controllers\Admin\HomecareTextSectionController::class);
            Route::resource('homecare-features', \App\Http\Controllers\Admin\HomecareProductFeatureController::class);
            Route::resource('homecare-mask-category', \App\Http\Controllers\Admin\HomecareMaskCategoryController::class);
            Route::delete('homecare-mask-items/{item}', [\App\Http\Controllers\Admin\HomecareMaskCategoryController::class, 'destroyItem'])
                ->name('homecare-mask-items.destroy');

            // routes/web.php  (داخل گروه ادمین خودت)
            Route::resource('hospital-texts', \App\Http\Controllers\Admin\HospitalTextSectionController::class);

            Route::resource('hospital-category', \App\Http\Controllers\Admin\HospitalCategoryController::class);

            Route::resource('hospital-schematics', \App\Http\Controllers\Admin\HospitalCategorySchematicController::class);

            Route::resource('hospital-summaries', \App\Http\Controllers\Admin\HospitalCategorySummaryController::class);

            Route::resource('hospital-stages', \App\Http\Controllers\Admin\HospitalCategoryStageController::class);

            Route::resource('hospital-catalogs', \App\Http\Controllers\Admin\HospitalCategoryCatalogController::class);

            Route::resource('hospital-gallery', \App\Http\Controllers\Admin\HospitalCategoryImageController::class);

            Route::resource('faqs', \App\Http\Controllers\Admin\FaqController::class);


        });


