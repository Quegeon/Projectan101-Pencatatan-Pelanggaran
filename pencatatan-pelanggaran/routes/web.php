<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Login\LoginController as LoginController;
use App\Http\Controllers\Siswa\KelasController as KelolaKelas;
use App\Http\Controllers\UserController as KelolaPetugas;
use App\Http\Controllers\Aturan\JenisController as KelolaJenis;
use App\Http\Controllers\Dashboard\UserController as DashboardPetugas;
use App\Http\Controllers\Dashboard\BkController as DashboardBk;

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

// Login
Route::view('/login/user', 'home.login.auth-user');
Route::view('/login/bk', 'home.login.auth-bk');
Route::post('/postlogin/user',[LoginController::class,'postlogin_user'])->name('postlogin.user');
Route::post('/postlogin/bk',[LoginController::class,'postlogin_bk'])->name('postlogin.bk');

Route::group(["husen ganteng"],function () {
    Route::group(['middleware' => ['auth', 'level:Admin']], function() { // FOR ADMIN
        Route::prefix('user')->controller(KelolaPetugas::class)->group(function() {
            Route::get('/', 'index')->name('user.index');
            Route::post('/store', 'store')->name('user.store');
            Route::get('/{id}/edit', 'edit')->name('user.edit');
            Route::post('/{id}/update', 'update')->name('user.update');
            Route::get('/{id}/destroy', 'destroy')->name('user.destroy');
        });

        Route::prefix('jenis')->controller(KelolaJenis::class)->group(function() {
            Route::get('/', 'index')->name('jenis.index');
            Route::post('/store', 'store')->name('jenis.store');
            Route::get('/{id}/edit', 'edit')->name('jenis.edit');
            Route::post('/{id}/update', 'update')->name('jenis.update');
            Route::get('/{id}/destroy', 'destroy')->name('jenis.destroy');
        });
    });
    Route::group(['middleware' => ['auth', 'level:Admin,Petugas']], function() { // FOR ADMIN PETUGAS
        Route::get('/dashboard', [DashboardPetugas::class, 'index'])->name('dashboard.petugas');
    });
});

Route::prefix('bk')->middleware(['auth:bk'])->group(function () { // FOR BK
    Route::get('/dashboard', [DashboardBk::class, 'index'])->name('dashboard.bk');
});
