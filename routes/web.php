<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

Route::get('/', function () {
    return view('welcome');
});

Route::middleware('auth')->group(function () {

    // Dashboard (wajib login)
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    // Profile (untuk Breeze)
    Route::get('/profile', function () {
        return view('profile.edit');
    })->name('profile.edit');

    // Products (wajib login, role dicek di controller)
    Route::resource('products', ProductController::class);
});

require __DIR__.'/auth.php';
