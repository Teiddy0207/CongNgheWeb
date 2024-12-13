<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;

//tra ve trang chu voi tat ca bai viet
Route::get('/', PostController::class .'@index')->name('posts.index');

//tra ve form adding
Route::get('/posts/create', PostController::class .'@create')->name('posts.create');

//them vao co so du lieu
Route::post('/posts', PostController::class .'@store')->name('posts.store');
// tra ve trang tat ca bai viet

Route::get('/posts/{post}', PostController::class .'@show')->name('posts.show');
// tra ve form sua
Route::get('/posts/{post}/edit', PostController::class .'@edit')->name('posts.edit');
// sau khi sua thi cap nhat
Route::put('/posts/{post}', PostController::class .'@update')->name('posts.update');
//xoa bai dang
Route::delete('/posts/{post}', PostController::class .'@destroy')->name('posts.destroy');