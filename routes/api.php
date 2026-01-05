<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\ProductApiController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
| Semua route API products
| TANPA auth:sanctum (agar mudah testing Postman)
|--------------------------------------------------------------------------
*/

// Test API (opsional)
Route::get('/test', function () {
    return response()->json([
        'message' => 'API berjalan dengan baik'
    ]);
});

// =========================
// API PRODUCTS (CRUD)
// =========================

// GET semua product
Route::get('/products', [ProductApiController::class, 'index']);

// POST tambah product
Route::post('/products', [ProductApiController::class, 'store']);

// GET satu product berdasarkan ID
Route::get('/products/{id}', [ProductApiController::class, 'show']);

// PUT update product
Route::put('/products/{id}', [ProductApiController::class, 'update']);

// DELETE hapus product
Route::delete('/products/{id}', [ProductApiController::class, 'destroy']);
