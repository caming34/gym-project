<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\EquipmentController;
// use Illuminate\Support\Facades\Auth;





Route::get('/', [HomeController::class, 'index'])->name('index_gym');
Route::resource('equipment', 'App\Http\Controllers\EquipmentController');
Route::get('/create_equipment', 'App\Http\Controllers\EquipmentController@create');
Route::post('/create_equipment', 'App\Http\Controllers\EquipmentController@store');
Route::get('/equipment', [EquipmentController::class, 'index'])->name('equipment.index');
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
Route::get('/register', [RegisterController::class, 'showRegistrationForm']);
Route::post('/register', [RegisterController::class, 'register']);
// Auth::routes();