<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Guest\HomeController;
use App\Http\Controllers\Guest\CategoryController as GuestCategoryController;
use App\Http\Controllers\Guest\AdController as GuestAdController;
use App\Http\Controllers\Customer\ProfileController as CustomerProfileController;
use App\Http\Controllers\Customer\AdController as CustomerAdController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\CategoryController as AdminCategoryController;
use App\Http\Controllers\Admin\AdController as AdminAdController;
use App\Http\Middleware\CustomerMiddleware;
use App\Http\Middleware\AdminMiddleware;
use Illuminate\Support\Facades\Route;


Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/search', [HomeController::class, 'search'])->name('search');

Route::get('/category/{category}', [GuestCategoryController::class, 'show'])
    ->name('category.show');

Route::get('/ad/{ad}', [GuestAdController::class, 'show'])
    ->name('ad.single');

Route::middleware([CustomerMiddleware::class])->group(function () {
    Route::get('/profile', [CustomerProfileController::class, 'index'])->name('profile');
    Route::resource('/my-ads', CustomerAdController::class);
});

Route::middleware([AdminMiddleware::class])
    ->prefix('admin')
    ->name('admin.')
    ->group(function () {

        Route::get('/dashboard', [AdminController::class, 'index'])->name('dashboard');
        Route::resource('/users', UserController::class);
        Route::resource('/categories', AdminCategoryController::class);
        Route::resource('/ads', AdminAdController::class);
    });


require __DIR__.'/auth.php';
