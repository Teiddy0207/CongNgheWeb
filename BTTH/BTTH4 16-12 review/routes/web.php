<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\IssueController;

Route::get('/', [IssueController::class, 'index'])->name('issues.index');

// Route để tạo vấn đề mới
Route::get('/issues/create', [IssueController::class, 'create'])->name('issues.create');

// Route để lưu vấn đề mới
Route::post('/issues', [IssueController::class, 'store'])->name('issues.store');

// Route để hiển thị chi tiết một vấn đề (nếu cần)
// Route::get('/issues/{id}', [IssueController::class, 'show'])->name('issues.show');

// Route để xóa vấn đề
Route::delete('/issues/{id}', [IssueController::class, 'destroy'])->name('issues.destroy');

// Route để chỉnh sửa vấn đề
Route::get('/issues/{id}/edit', [IssueController::class, 'edit'])->name('issues.edit');

// Route để cập nhật vấn đề
Route::put('/issues/{id}', [IssueController::class, 'update'])->name('issues.update');
