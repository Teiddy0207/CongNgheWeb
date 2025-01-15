<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PlayerController;

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [PlayerController::class, 'index'])->name('players.index');
Route::get('/players/create', [PlayerController::class, 'create'])->name('players.create');


// // Route để lưu vấn đề mới
 Route::post('/players', [PlayerController::class, 'store'])->name('players.store');


// // // Route để chỉnh sửa vấn đề
 Route::get('/players/{id}/edit', [PlayerController::class, 'edit'])->name('players.edit');

// // // Route để cập nhật vấn đề
Route::put('/players/{id}', [PlayerController::class, 'update'])->name('players.update');


Route::delete('/players/{id}', [PlayerController::class, 'destroy'])->name('players.destroy');



