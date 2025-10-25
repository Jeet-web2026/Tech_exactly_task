<?php


// Dashboard redirect routes

use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;

Route::controller(DashboardController::class)->group(function () {
    Route::prefix('dashboard')->middleware(['auth', 'allowAdmin'])->group(function () {
        Route::get('admin', 'adminDashboard')->name('admin.dashboard');
        Route::get('all-posts', 'adminPosts')->name('admin.posts');
        Route::get('users', 'adminUsers')->name('admin.users');

        // CRUD routes for admin users manage
        Route::get('users-delete/{uid}', 'Userdelete')->name('admin.users-delete');
        Route::get('users-edit/{uid}', 'Useredit')->name('admin.users-edit');
    });
});
