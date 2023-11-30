<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Login\LoginController as LoginController;

use App\Http\Controllers\Pelanggaran\Admin\PelanggaranController as KelolaPelanggaran;
use App\Http\Controllers\Pelanggaran\Petugas\PelanggaranController as LaporanController;
use App\Http\Controllers\Pelanggaran\Bk\PelanggaranController as ReviewPelanggaran;

use App\Http\Controllers\Siswa\KelasController as KelolaKelas;
use App\Http\Controllers\Siswa\SiswaController as KelolaSiswa;
use App\Http\Controllers\UserController as KelolaPetugas;
use App\Http\Controllers\BkController as KelolaBk;
use App\Http\Controllers\Aturan\JenisController as KelolaJenis;
use App\Http\Controllers\Aturan\HukumanController as KelolaHukuman;
use App\Http\Controllers\Aturan\AturanController as KelolaAturan;

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
Route::prefix('user')->controller(KelolaPetugas::class)->group(function() {
    Route::get('/', 'index')->name('user.index');
    Route::post('/store', 'store')->name('user.store');
    Route::get('/{id}/edit', 'edit')->name('user.edit');
    Route::post('/{id}/update', 'update')->name('user.update');
    Route::get('/{id}/destroy', 'destroy')->name('user.destroy');
});


Route::view('/login/user', 'home.login.auth-user')->name('login.user');
Route::view('/login/bk', 'home.login.auth-bk')->name('login');
Route::post('/postlogin/user',[LoginController::class,'postlogin_user'])->name('postlogin.user');
Route::post('/postlogin/bk',[LoginController::class,'postlogin_bk'])->name('postlogin.bk');
Route::get('/logout/user', [LoginController::class, 'logout_user'])->name('logout.user');
Route::get('/logout/bk', [LoginController::class, 'logout_bk'])->name('logout');

Route::group(["husen ganteng"],function () {
    Route::group(['middleware' => ['auth', 'level:Admin']], function() { // FOR ADMIN
   
        Route::prefix('bk')->controller(KelolaBk::class)->group(function() {
            Route::get('/', 'index')->name('bk.index');
            Route::get('/create', 'create')->name('bk.create');
            Route::post('/store', 'store')->name('bk.store');
            Route::get('/{id}/edit', 'edit')->name('bk.edit');
            Route::post('/{id}/update', 'update')->name('bk.update');
            Route::get('/{id}/destroy', 'destroy')->name('bk.destroy');
        });        
      
        Route::prefix('kelas')->controller(KelolaKelas::class)->group(function() {
            Route::get('/', 'index')->name('kelas.index');
            Route::get('/create', 'create')->name('kelas.create');
            Route::post('/store', 'store')->name('kelas.store');
            Route::get('/{id}/edit', 'edit')->name('kelas.edit');
            Route::post('/{id}/update', 'update')->name('kelas.update');
            Route::get('/{id}/destroy', 'destroy')->name('kelas.destroy');
        });

        Route::prefix('siswa')->controller(KelolaSiswa::class)->group(function() {
            Route::get('/', 'index')->name('siswa.index');
            Route::get('/create', 'create')->name('siswa.create');
            Route::post('/store', 'store')->name('siswa.store');
            Route::get('/{nis}/edit', 'edit')->name('siswa.edit');
            Route::post('/{nis}/update', 'update')->name('siswa.update');
            Route::get('/{nis}/destroy', 'destroy')->name('siswa.destroy');
        });

        Route::prefix('jenis')->controller(KelolaJenis::class)->group(function() {
            Route::get('/', 'index')->name('jenis.index');
            Route::post('/store', 'store')->name('jenis.store');
            Route::get('/{id}/edit', 'edit')->name('jenis.edit');
            Route::post('/{id}/update', 'update')->name('jenis.update');
            Route::get('/{id}/destroy', 'destroy')->name('jenis.destroy');
        });

        Route::prefix('hukuman')->controller(KelolaHukuman::class)->group(function() {
            Route::get('/', 'index')->name('hukuman.index');
            Route::post('/store', 'store')->name('hukuman.store');
            Route::get('/{id}/edit', 'edit')->name('hukuman.edit');
            Route::post('/{id}/update', 'update')->name('hukuman.update');
            Route::get('/{id}/destroy', 'destroy')->name('hukuman.destroy');
        });

        Route::prefix('aturan')->controller(KelolaAturan::class)->group(function() {
            Route::get('/', 'index')->name('aturan.index');
            Route::post('/store', 'store')->name('aturan.store');
            Route::get('/{id}/edit', 'edit')->name('aturan.edit');
            Route::post('/{id}/update', 'update')->name('aturan.update');
            Route::get('/{id}/destroy', 'destroy')->name('aturan.destroy');
        });

        Route::prefix('pelanggaran')->controller(KelolaPelanggaran::class)->group(function() {
            Route::get('/', 'index')->name('pelanggaran.index');
            Route::post('/store', 'store')->name('pelanggaran.store');
            Route::get('/{id}/edit', 'edit')->name('pelanggaran.edit');
            Route::post('/{id}/update', 'update')->name('pelanggaran.update');
            Route::get('/{id}/destroy', 'destroy')->name('pelanggaran.destroy');
        });
    });

    Route::group(['middleware' => ['auth', 'level:Admin,Petugas']], function() {
        Route::get('/dashboard', [DashboardPetugas::class, 'index'])->name('dashboard.petugas');
        Route::prefix('laporan')->controller(LaporanController::class)->group(function() {
            Route::get('/create', 'create')->name('laporan.create');
            Route::post('/store', 'store')->name('laporan.store');
            Route::get('/{id}/edit', 'edit')->name('laporan.edit');
            Route::post('/{id}/update', 'update')->name('laporan.update');
            Route::get('/{id}/destroy', 'destroy')->name('laporan.destroy');
        });
    });
});

Route::prefix('bk')->middleware(['auth:bk'])->group(function () {
    Route::get('dashboard', [DashboardBk::class, 'index'])->name('dashboard.bk');

    Route::prefix('pelanggaran')->controller(ReviewPelanggaran::class)->group(function() {
        Route::get('/', 'index')->name('review.index');
        Route::get('/create', 'create')->name('review.create');
        Route::post('/store', 'store')->name('review.store');
        Route::get('/{id}/proses', 'proses')->name('review.proses');
        Route::get('/{id}/edit', 'edit')->name('review.edit');
        Route::post('/{id}/update', 'update')->name('review.update');
        Route::post('/{id}/done', 'done')->name('review.done');
        Route::get('/{id}/destroy', 'destroy')->name('review.destroy');
    });
});
