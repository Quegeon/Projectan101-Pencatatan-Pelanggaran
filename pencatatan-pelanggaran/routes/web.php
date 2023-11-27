<?php

use App\Http\Controllers\Siswa\KelasController as KelolaKelas;
use App\Http\Controllers\Siswa\SiswaController as KelolaSiswa;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController as KelolaPetugas;

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


Route::get('/', [DashboardPetugas::class, 'index']);

// TODO: LOGIN ADMIN, BK

Route::prefix('kelas')->controller(KelolaKelas::class)->group(function() {
    Route::get('/', 'index')->name('kelas.index');
    Route::get('/create', 'create')->name('kelas.create');
    Route::post('/store', 'store')->name('kelas.store');
    Route::get('/{id}/edit', 'show')->name('kelas.edit');
    Route::post('/{id}/update', 'update')->name('kelas.update');
    Route::get('/{id}/destroy', 'destroy')->name('kelas.destroy');
});

Route::prefix('siswa')->controller(KelolaSiswa::class)->group(function() {
    Route::get('/', 'index')->name('siswa.index');
    Route::get('/create', 'create')->name('siswa.create');
    Route::post('/store', 'store')->name('siswa.store');
    Route::get('/{nis}/edit', 'show')->name('siswa.edit');
    Route::post('/{nis}/update', 'update')->name('siswa.update');
    Route::get('/{nis}/destroy', 'destroy')->name('siswa.destroy');
});

Route::group(['anjay'],function () {
    Route::get('dashboard', [DashboardPetugas::class, 'index'])->name('dashboard.petugas');
    Route::group(['middleware' => ['auth', 'level:admin']], function() { // FOR ADMIN
        Route::prefix('user')->controller(KelolaPetugas::class)->group(function() {
            Route::get('/', 'index')->name('user.index');
            Route::get('/create', 'create')->name('user.create');
            Route::post('/store', 'store')->name('user.store');
            Route::get('/{id}/edit', 'edit')->name('user.edit');
            Route::post('/{id}/update', 'update')->name('user.update');
            Route::get('/{id}/destroy', 'destroy')->name('user.destroy');
        });
    });

    Route::group(['middleware' => ['auth', 'level:admin,petugas']], function() { // FOR ADMIN PETUGAS

    });
});

Route::prefix('bk')->middleware(['auth:bk'])->group(function () { // FOR BK
    Route::get('dashboard', [DashboardBk::class, 'index'])->name('dashboard.bk');
});
Route::get('/user', [UserController::class, 'index']);

