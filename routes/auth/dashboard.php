<?php

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
        Route::post('users-details-save/{uid}', 'Userdetailssave')->name('admin.users-save');

        // CRUD routes for admin posts manage
        Route::prefix('post')->group(function () {
            Route::get('{slug}', 'adminPostView')->name('admin.users-post-view');
            Route::get('edit/{slug}', 'adminPostedit')->name('admin.users-post-edit');
            Route::get('delete/{uid}/{slug}', 'adminPostdelete')->name('admin.users-post-delete');

            Route::post('update/{uid}/{slug}', 'adminPostupdate')->name('admin.users-post-update');
        });
    });
});
