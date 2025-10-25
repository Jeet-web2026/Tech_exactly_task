<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;

Route::controller(AuthController::class)->group(function () {

    // User registration pages routes
    Route::get('signup', 'signup')->name('signup');
    Route::get('signin', 'signin')->name('signin');

    // User authentication routes
    Route::post('register', 'register')->name('user.register');
    Route::post('login', 'login')->name('user.login');

    // Logout route
    Route::get('signout', 'logout')->name('signout');
});

require __DIR__ . '/dashboard.php';
