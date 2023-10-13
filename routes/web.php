<?php

use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
Route::get('/', [HomeController::class, 'index'])->name('index_gym');
Route::resource('equipment','App\Http\Controllers\EquipmentController');
Route::get('create_equipment','App\Http\Controllers\EquipmentController@create');
Route::post('create_equipment','App\Http\Controllers\StudentController@store');