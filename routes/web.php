<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
Route::get('/', function () {
    return view('welcome');
});

// Account routes
Route::get('/login', [ProductController::class, 'login']);
Route::post('/checkLogin', [ProductController::class, 'checkLogin']);
Route::get('/logout', [ProductController::class, 'logout']);


// Admin routes
Route::prefix('admin')->middleware('checkLogin')->group(function () {
    Route::get('adminProducts', [ProductController::class, 'adminProducts'])->name('admin.adminProducts');
    Route::get('addProduct', [ProductController::class, 'displayAddProduct']);
    Route::post('addProduct', [ProductController::class, 'addProduct']);
    Route::get('editProduct/{code}', [ProductController::class, 'editProduct']);
    Route::post('editProduct/{code}', [ProductController::class, 'edit']);
    Route::get('deleteProduct/{code}', [ProductController::class, 'deleteProduct']);
});

// User routes
Route::prefix('users')->middleware('checkLogin')->group(function () {
    Route::get('viewProduct', [ProductController::class, 'viewProduct']);
    Route::post('viewProduct', [ProductController::class, 'viewProduct']);
});
