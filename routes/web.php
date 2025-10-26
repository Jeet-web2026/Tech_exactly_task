<?php

use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

Route::controller(HomeController::class)->group(function () {
    Route::get('/', 'index')->name('home');

    // Post manage routes
    Route::get('post/{slug}/{id}', 'ManagePost')->name('home.post');
});

require __DIR__ . '/auth/auth.php';
