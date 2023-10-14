<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\EquipmentController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\RegisterController;

Route::get('/', [HomeController::class, 'index'])->name('index_gym');
Route::resource('equipment', EquipmentController::class); // ใช้ Route::resource สำหรับ Resourceful Controller

// ถ้าคุณต้องการทำหน้า create และ store ของ equipment
// ให้ใช้ Route::get และ Route::post ตามลำดับ
Route::get('/create_equipment', [EquipmentController::class, 'create']);
Route::post('/create_equipment', [EquipmentController::class, 'store']);
Route::get('/equipment', [EquipmentController::class, 'index'])->name('equipment.index');
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
Route::get('/register', [RegisterController::class, 'showRegistrationForm']);
Route::post('/register', [RegisterController::class, 'register']);

// เพิ่ม Route สำหรับการ book
Route::post('/equipment/book/{id}', [EquipmentController::class, 'book'])->name('equipment.book');
