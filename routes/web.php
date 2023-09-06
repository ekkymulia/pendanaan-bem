<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DepartemenController;
use App\Http\Controllers\OrmawaController;
use App\Http\Controllers\ProkerController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Session;

Route::get('/', function () {
    return view('landing-page');
})->name('/');

//Language Change
Route::get('lang/{locale}', function ($locale) {
    if (!in_array($locale, ['en', 'de', 'es', 'fr', 'pt', 'cn', 'ae'])) {
        abort(400);
    }
    Session()->put('locale', $locale);
    Session::get('locale');
    return redirect()->back();
})->name('lang');


// Route::prefix('dashboard')->group(function () {
Route::view('index', 'dashboard.index')->name('index');
// });
Route::middleware(['auth','login'])->group(function () {
    Route::resource('dashboard', DashboardController::class);

    Route::middleware(['role:superadmin'])->group(function () {
        Route::resource('ormawa', OrmawaController::class);
    });

    Route::middleware(['role:superadmin,ormawa'])->group(function () {
        Route::resource('departemen', DepartemenController::class);
    });

    Route::middleware(['role:superadmin,departemen,ormawa'])->group(function () {
        Route::resource('proker', ProkerController::class);
    });    

    Route::prefix('users')->group(function () {
        Route::view('user-profile', 'apps.user-profile')->name('user-profile');
        Route::view('edit-profile', 'apps.edit-profile')->name('edit-profile');
        Route::view('user-cards', 'apps.user-cards')->name('user-cards');
    });
    
    // sample route profil ormawa
    Route::prefix('ormawa-profile')->group(function () {
        Route::view('profile', 'ormawa-myprofile.profile')->name('ormawa-profile');
        Route::view('profile/edit', 'ormawa-myprofile.edit-profile')->name('edit-ormawa-profile');
    });
    
    // sample route profil departemen
    Route::prefix('departemen-profile')->group(function () {
        Route::view('profile', 'departemen-myprofile.profile')->name('departemen-profile');
        Route::view('profile/edit', 'departemen-myprofile.edit-profile')->name('edit-departemen-profile');
    });
});


Route::view('internationalization', 'pages.internationalization')->name('internationalization');

// Route::prefix('others')->group(function () {
//     Route::view('400', 'errors.400')->name('error-400');
//     Route::view('401', 'errors.401')->name('error-401');
//     Route::view('403', 'errors.403')->name('error-403');
//     Route::view('404', 'errors.404')->name('error-404');
//     Route::view('500', 'errors.500')->name('error-500');
//     Route::view('503', 'errors.503')->name('error-503');
// });

// Route::prefix('authentication')->group(function () {
//     Route::view('login', 'authentication.login')->name('login');
//     Route::view('login-one', 'authentication.login-one')->name('login-one');
//     Route::view('login-two', 'authentication.login-two')->name('login-two');
//     Route::view('login-bs-validation', 'authentication.login-bs-validation')->name('login-bs-validation');
//     Route::view('login-bs-tt-validation', 'authentication.login-bs-tt-validation')->name('login-bs-tt-validation');
//     Route::view('login-sa-validation', 'authentication.login-sa-validation')->name('login-sa-validation');
//     Route::view('sign-up', 'authentication.sign-up')->name('sign-up');
//     Route::view('sign-up-one', 'authentication.sign-up-one')->name('sign-up-one');
//     Route::view('sign-up-two', 'authentication.sign-up-two')->name('sign-up-two');
//     Route::view('sign-up-wizard', 'authentication.sign-up-wizard')->name('sign-up-wizard');
//     Route::view('unlock', 'authentication.unlock')->name('unlock');
//     Route::view('forget-password', 'authentication.forget-password')->name('forget-password');
//     Route::view('reset-password', 'authentication.reset-password')->name('reset-password');
//     Route::view('maintenance', 'authentication.maintenance')->name('maintenance');
// });

Route::prefix('auth')->group(function () {
    Route::view('login', 'auth.login')->name('login');
    Route::post('login', [LoginController::class, 'authenticate'])->name('login');
    Route::get('logout', [LoginController::class, 'logout'])->name('logout');
    Route::get('profile', [LoginController::class, 'profile'])->name('profile');
});


Route::view('landing-page', 'pages.landing-page')->name('landing-page');

Route::get('/clear-cache', function () {
    Artisan::call('config:cache');
    Artisan::call('cache:clear');
    Artisan::call('config:clear');
    Artisan::call('view:clear');
    Artisan::call('route:clear');
    return "Cache is cleared";
})->name('clear.cache');
