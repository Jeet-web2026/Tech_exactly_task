<?php


// Dashboard redirect routes

use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;

Route::controller(DashboardController::class)->group(function () {
    Route::prefix('dashboard')->middleware('auth')->group(function () {

        // Admin dashboard routes
        Route::middleware('allowAdmin')->group(function () {
            Route::get('admin', 'adminDashboard')->name('admin.dashboard');
        });

        // User dashboard routes
        Route::get('user', 'Dashboard')->name('user.dashboard');
    });
});
