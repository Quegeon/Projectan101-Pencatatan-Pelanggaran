<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Login\LoginController as LoginController;
use App\Http\Controllers\Dashboard\DashboardController as DashboardController;
use App\Http\Controllers\UserController;




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


Route::get('/',[LoginController::class,'indexpetugas']);
Route::get('/loginpetugas',[LoginController::class,'indexpetugas'])->name('login');
Route::post('/login/petugas',[LoginController::class,'loginpetugas']);


Route::get('/loginbk',[LoginController::class,'indexbk']);

Route::get('/dashboard',[DashboardController::class,'index']);

Route::get('/user',[UserController::class,'index']);
Route::post('/user/tambah',[UserController::class,'store']);




