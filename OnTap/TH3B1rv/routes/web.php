<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\MedicineController;

//tra ve trang chu voi tat ca bai viet
Route::get('/', MedicineController::class .'@index')->name(name: 'medicines.index');

//tra ve form adding
Route::get('/medicines/create', MedicineController::class .'@create')->name('medicines.createhehe');

//them vao co so du lieu
Route::post('/medicines', MedicineController::class .'@store')->name('medicines.store');
// tra ve trang tat ca bai viet

// Route::get('/medicines/{id}', MedicineController::class .'@show')->name('medicines.show');
// tra ve form sua
Route::get('/medicines/{id}/edit', MedicineController::class .'@edit')->name('medicines.edit');
// sau khi sua thi cap nhat
Route::put('/medicines/{id}', MedicineController::class .'@update')->name('medicines.update');
//xoa bai dang
Route::delete('/medicines/{id}', MedicineController::class .'@destroy')->name('medicines.destroy');
