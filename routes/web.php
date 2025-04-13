<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\GradeController;
use App\Http\Controllers\Admin\LoginController;
use App\Http\Controllers\Admin\StageController;
use App\Http\Controllers\Admin\CourseController;
use App\Http\Controllers\Admin\InstructorController;
use App\Http\Controllers\Admin\SettingController;
use App\Http\Controllers\Admin\ServicesController;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

Route::group(
    [
        'prefix' => LaravelLocalization::setLocale(),
        'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath']
    ],
    function () {
        Route::get('/', function () {
            return redirect()->route('admin.login');
        })->middleware('guest');
        Route::get('/login', [LoginController::class, 'showLoginForm'])->name('admin.login');
        Route::post('/login', [LoginController::class, 'login'])->name('admin.login.post');

        Route::middleware(['isAdmin', 'auth'])->as('admin.')->prefix('admin')->group(function () {
            //logout
            Route::get('logout', [LoginController::class, 'logout'])->name('logout');

            //dashboard
            Route::get('/home', [HomeController::class, 'index'])->name('home');

            Route::resource('instructors', InstructorController::class);
            Route::resource('courses', CourseController::class);
            Route::resource('stages', StageController::class);
            Route::resource('grades', GradeController::class);
            Route::resource('services', ServicesController::class);
            Route::get('settings/show', [SettingController::class, 'show'])->name('settings.show');
            Route::PUT('settings/{id}', [SettingController::class, 'update'])->name('settings.update');
        });
    }
);
