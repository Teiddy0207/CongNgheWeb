<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;


Route::get('/', [ProductController::class, 'index'])->name('products.index');

// Route để tạo vấn đề mới
Route::get('/products/create', [ProductController::class, 'create'])->name('products.create');

// Route để lưu vấn đề mới
Route::post('/products', [ProductController::class, 'store'])->name('products.store');


// Route để chỉnh sửa vấn đề
Route::get('/products/{id}/edit', [ProductController::class, 'edit'])->name('products.edit');

// Route để cập nhật vấn đề
Route::put('/products/{id}', [ProductController::class, 'update'])->name('products.update');


Route::delete('/products/{id}', [ProductController::class, 'destroy'])->name('products.destroy');
