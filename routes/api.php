<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\GradeController;
use App\Http\Controllers\Api\LoginController;
use App\Http\Controllers\Api\StageController;
use App\Http\Controllers\Api\LogoutController;
use App\Http\Controllers\Api\ProfileController;
use App\Http\Controllers\Api\PasswordController;
use App\Http\Controllers\Api\RegisterController;
use App\Http\Controllers\Api\InstructorController;
use App\Http\Controllers\Api\ServicesController;

// register
Route::post("/register", [RegisterController::class, 'register']);

// verify
Route::post('/verify', [RegisterController::class, 'verify']);
Route::post('/otp', [RegisterController::class, 'otp']);
//login
Route::post("/login", [LoginController::class, 'login']);
//forget-password
Route::post('/forget-password', [PasswordController::class, 'forgetPassword']);
//confirmationOtp
Route::post('/confirmation-otp', [PasswordController::class, 'confirmationOtp']);
//reset-password
Route::post('/reset-password', [PasswordController::class, 'resetPassword']);

Route::get('/stages', [StageController::class, 'index']);
Route::get('/grades', [GradeController::class, 'index']);

Route::get('/services', [ServicesController::class, 'index']);
Route::post('/services', [ServicesController::class, 'index']);

Route::group(['middleware' => ['auth:sanctum']], function () {
    // user
    Route::get('/profile', [ProfileController::class, 'profile']);
    Route::post('/profile', [ProfileController::class, 'updateProfile']);
    Route::post('/change-password', [PasswordController::class, 'changePassword']);
    Route::post('/logout', [LogoutController::class, 'logout']);

    // instructor
    Route::get('/instructors', [InstructorController::class, 'index']);
    Route::get('/instructor/{id}', [InstructorController::class, 'show']);
    Route::get('/most-instructors', [InstructorController::class, 'MostInstructors']);
    Route::get('/our-instructors', [InstructorController::class, 'OurInstructors']);
});
