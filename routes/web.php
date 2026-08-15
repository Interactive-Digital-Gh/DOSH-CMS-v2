<?php

use App\Http\Controllers\AboutUs\AboutUsController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ContactPage\ContactPageController;
use App\Http\Controllers\DashboardChartsController;
use App\Http\Controllers\Homepage\HomeSectionsController;
use App\Http\Controllers\Homepage\SlideshowController;
use App\Http\Controllers\Misc\MiscController;
use App\Http\Controllers\PasswordResetController;
use App\Http\Controllers\PnS\PnSController;
use App\Http\Controllers\PnS\PnSHeaderController;
use App\Http\Controllers\ServiceProvidersPage\HSPsController;
use App\Http\Controllers\ServiceProvidersPage\ServiceProvidersHeaderController;
use App\Http\Controllers\UserProfileController;
use App\Models\ServiceProvidersHeader;

Route::get('/login', [AuthController::class, 'index'])->name('login');
Route::post('custom-login', [AuthController::class, 'customLogin'])->name('login.custom');
Route::get('signout', [AuthController::class, 'signOut'])->name('signout');

Route::get('forgot-password', [PasswordResetController::class, 'showForgotForm'])->name('password.request');
Route::post('forgot-password', [PasswordResetController::class, 'sendResetLink'])->name('password.email');
Route::get('reset-password/{token}', [PasswordResetController::class, 'showResetForm'])->name('password.reset');
Route::post('reset-password', [PasswordResetController::class, 'resetPassword'])->name('password.update');

Route::group(['middleware' => 'auth'], function () {
    Route::get('/', function () {
        return view('dashboard.index');
    });
    // Route::get('/admin', function () {
    //     return view('dashboard.index');
    // })->name('admin');

    // Route::resource('/profile', UserProfileController::class);
    // Route::resource('slideshow', SlideshowController::class);

    Route::resources([
        'profile' => UserProfileController::class,
        'slideshow' => SlideshowController::class,
        'home-sections' => HomeSectionsController::class,
        'aboutus-sections' => AboutUsController::class
    ]);

    Route::post('publish-slider/{id}', [SlideshowController::class, 'publish'])->name('publish-slider');

    // Products and Services
    Route::get('pns-header/{status?}', [PnSController::class, 'index'])->name('pns-header');

    Route::post('submit-pns-header', [PnSController::class, 'storePnSHeader'])->name('submit-pns-header');

    Route::get('pns-sections/{name?}/{type?}', [PnSController::class, 'edit'])->name('pns-section');

    Route::post('pns-sections-update', [PnSController::class, 'update'])->name('pns-sections-update');

    Route::get('pns-video-section', [PnSController::class, 'showVideoSection'])->name('pns-video-section');

    Route::post('pns-video-section-update', [PnSController::class, 'updateVideoSection'])->name('pns-video-section-update');


    // Service Providers
    Route::get('serviceproviders-header', [ServiceProvidersHeaderController::class, 'index'])->name('hsp-header');

    Route::post('submit-serviceproviders-header', [ServiceProvidersHeaderController::class, 'storeServiceProvidersHeader'])->name('submit-serviceproviders-header');

    Route::get('hsp-titles', [HSPsController::class, 'pageTitles'])->name('hsp-titles');

    Route::post('submit-serviceproviders-titles', [HSPsController::class, 'updatePageTitles'])->name('submit-serviceproviders-titles');

    Route::get('hsp-list', [HSPsController::class, 'hspList'])->name('hsp-list');

    Route::get('hsp-create', [HSPsController::class, 'createHSP'])->name('hsp-create');
    Route::post('/hsp-store', [HSPsController::class, 'store'])->name('hsp-store');
    Route::get('hsp-edit/{id}', [HSPsController::class, 'edit'])->name('hsp-edit');
    Route::post('hsp-update/{id}', [HSPsController::class, 'update'])->name('hsp-update');
    Route::post('hsp-delete/{id}', [HSPsController::class, 'destroy'])->name('hsp-delete');
    Route::post('search', [HSPsController::class, 'search'])->name('hsp-search');



    // Contact Page
    Route::get('contact-header', [ContactPageController::class, 'index'])->name('contact-page');

    Route::post('contact-header-update', [ContactPageController::class, 'storeContactPageHeader'])->name('contact-page-update');



    // Privacy Statement
    Route::get('privacy-statement', [MiscController::class, 'index'])->name('privacy-statement');
    Route::post('privacy-statement-update', [MiscController::class, 'updatePrivacyStatement'])->name('privacy-statement-update');




    Route::get('preview', function () {
        return view('dashboard.pages.preview.index');
    })->name('preview');

    // Route::get('pns-section', function () {
    //     return view('dashboard.pages.pns.pns-sections');
    // })->name('pns-section');

    // Dashboard Charts
    Route::get('/', [DashboardChartsController::class, 'index'])->name('dashboard');
    // Route::get('/', [DashboardChartsController::class, 'visitsThisMonth']);
});
