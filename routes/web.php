<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ArticleController;
use Illuminate\Support\Facades\Route;

Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::get('/register', [AuthController::class, 'register'])->name('register');

Route::post('/login', [AuthController::class, 'authenticate'])->name('authenticate');#
Route::post('/register', [AuthController::class, 'create'])->name('create');

Route::middleware(['auth', 'auth.session'])->group(function () {
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

    Route::get('/images/{filename}', [DashboardController::class, 'images'])->middleware('auth')->name('images.show');

    Route::resource('articles', ArticleController::class);
});
