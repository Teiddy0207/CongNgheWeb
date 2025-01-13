<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\PostController;
// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/', [CommentController::class, 'index'])->name('comments.index');
Route::get('/comments/create', [CommentController::class, 'create'])->name('comments.create');


// Route để lưu vấn đề mới
 Route::post('/comments', [CommentController::class, 'store'])->name('comments.store');


// // Route để chỉnh sửa vấn đề
Route::get('/comments/{id}/edit', [CommentController::class, 'edit'])->name('comments.edit');

// // Route để cập nhật vấn đề
Route::put('/comments/{id}', [CommentController::class, 'update'])->name('comments.update');


Route::delete('/comments/{id}', [CommentController::class, 'destroy'])->name('comments.destroy');

Route::get('/comments/{id}', [CommentController::class, 'show'])->name('comments.show');


Route::post('posts/{post}/comments', [PostController::class, 'store'])->name('post.store');
