<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Login\LoginController as LoginController;

use App\Http\Controllers\Pelanggaran\Admin\PelanggaranController as KelolaPelanggaran;
use App\Http\Controllers\Pelanggaran\Petugas\PelanggaranController as LaporanController;
use App\Http\Controllers\Pelanggaran\Bk\PelanggaranController as ReviewPelanggaran;

use App\Http\Controllers\Pelanggaran\Temporary\TempController as TempController;

use App\Http\Controllers\Siswa\KelasController as KelolaKelas;
use App\Http\Controllers\Siswa\SiswaController as KelolaSiswa;
use App\Http\Controllers\UserController as KelolaPetugas;
use App\Http\Controllers\BkController as KelolaBk;
use App\Http\Controllers\Aturan\JenisController as KelolaJenis;
use App\Http\Controllers\Aturan\HukumanController as KelolaHukuman;
use App\Http\Controllers\Aturan\AturanController as KelolaAturan;

use App\Http\Controllers\Profile\UserController as ProfilePetugas;
use App\Http\Controllers\Profile\BkController as ProfileBk;

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

Route::view('/', 'layouts.landing-page');

Route::view('/login/user', 'home.login.auth-user')->name('login.user');
Route::view('/login/bk', 'home.login.auth-bk')->name('login.bk');
Route::post('/postlogin/user',[LoginController::class,'postlogin_user'])->name('postlogin.user');
Route::post('/postlogin/bk',[LoginController::class,'postlogin_bk'])->name('postlogin.bk');
Route::get('/logout/user', [LoginController::class, 'logout_user'])->name('logout.user');
Route::get('/logout/bk', [LoginController::class, 'logout_bk'])->name('logout');

Route::prefix('temp')->controller(TempController::class)->group(function() {
    Route::post('/store', 'temp_store')->name('temp.store');
    Route::delete('/{id}/destroy', 'temp_destroy')->name('temp.destroy');
});

Route::group(["husen ganteng"],function () {
    Route::group(['middleware' => ['auth', 'level:Admin', 'checkdata']], function() {
        Route::prefix('kelola_petugas')->controller(KelolaPetugas::class)->group(function() {
            Route::get('/', 'index')->name('petugas.index');
            Route::post('/store', 'store')->name('petugas.store');
            Route::get('/{id}/edit', 'edit')->name('petugas.edit');
            Route::post('/{id}/update', 'update')->name('petugas.update');
            Route::get('/{id}/destroy', 'destroy')->name('petugas.destroy');
        });

        Route::prefix('kelola_bk')->controller(KelolaBk::class)->group(function() {
            Route::get('/', 'index')->name('bk.index');
            Route::get('/create', 'create')->name('bk.create');
            Route::post('/store', 'store')->name('bk.store');
            Route::get('/{id}/edit', 'edit')->name('bk.edit');
            Route::post('/{id}/update', 'update')->name('bk.update');
            Route::get('/{id}/destroy', 'destroy')->name('bk.destroy');
        });

        Route::prefix('kelola_kelas')->controller(KelolaKelas::class)->group(function() {
            Route::get('/', 'index')->name('kelas.index');
            Route::get('/create', 'create')->name('kelas.create');
            Route::post('/store', 'store')->name('kelas.store');
            Route::get('/{id}/edit', 'edit')->name('kelas.edit');
            Route::post('/{id}/update', 'update')->name('kelas.update');
            Route::get('/{id}/destroy', 'destroy')->name('kelas.destroy');
        });

        Route::prefix('kelola_siswa')->controller(KelolaSiswa::class)->group(function() {
            Route::get('/', 'index')->name('siswa.index');
            Route::get('/create', 'create')->name('siswa.create');
            Route::post('/store', 'store')->name('siswa.store');
            Route::get('/{nis}/edit', 'edit')->name('siswa.edit');
            Route::post('/{nis}/update', 'update')->name('siswa.update');
            Route::get('/{nis}/destroy', 'destroy')->name('siswa.destroy');
            Route::get('/{nis}/history', 'history')->name('history.admin');
            Route::post('/{nis}/change_point', 'change_point')->name('change.point.admin');
        });

        Route::prefix('kelola_jenis')->controller(KelolaJenis::class)->group(function() {
            Route::get('/', 'index')->name('jenis.index');
            Route::post('/store', 'store')->name('jenis.store');
            Route::get('/{id}/edit', 'edit')->name('jenis.edit');
            Route::post('/{id}/update', 'update')->name('jenis.update');
            Route::get('/{id}/destroy', 'destroy')->name('jenis.destroy');
        });

        Route::prefix('kelola_hukuman')->controller(KelolaHukuman::class)->group(function() {
            Route::get('/', 'index')->name('hukuman.index');
            Route::post('/store', 'store')->name('hukuman.store');
            Route::get('/{id}/edit', 'edit')->name('hukuman.edit');
            Route::post('/{id}/update', 'update')->name('hukuman.update');
            Route::get('/{id}/destroy', 'destroy')->name('hukuman.destroy');
        });

        Route::prefix('kelola_aturan')->controller(KelolaAturan::class)->group(function() {
            Route::get('/', 'index')->name('aturan.index');
            Route::post('/store', 'store')->name('aturan.store');
            Route::get('/{id}/edit', 'edit')->name('aturan.edit');
            Route::post('/{id}/update', 'update')->name('aturan.update');
            Route::get('/{id}/destroy', 'destroy')->name('aturan.destroy');
        });

        Route::prefix('kelola_pelanggaran')->controller(KelolaPelanggaran::class)->group(function() {
            Route::get('/', 'index')->name('pelanggaran.index');
            Route::post('/store', 'store')->name('pelanggaran.store');
            Route::get('/{id}/detail', 'detail')->name('pelanggaran.detail');
            Route::get('/{id}/edit', 'edit')->name('pelanggaran.edit')->withoutMiddleware(['checkdata']);
            Route::post('/{id}/update', 'update')->name('pelanggaran.update')->withoutMiddleware(['checkdata']);
            Route::get('/{id}/destroy', 'destroy')->name('pelanggaran.destroy');
        });
    });

    Route::group(['middleware' => ['auth', 'level:Admin,Petugas']], function() {
        Route::get('/dashboard', [DashboardPetugas::class, 'index'])->name('dashboard');
        Route::get('/dashboard/detail-petugas/{id}', [DashboardPetugas::class, 'detail'])->name('dashboard.detail');
        Route::prefix('laporan')->controller(LaporanController::class)->group(function() {
            Route::get('/create', 'create')->name('laporan.create');
            Route::post('/store', 'store')->name('laporan.store');
            Route::get('/{id}/edit', 'edit')->name('laporan.edit');
            Route::post('/{id}/update', 'update')->name('laporan.update');
            Route::get('/{id}/destroy', 'destroy')->name('laporan.destroy');
            Route::get('/print', 'print')->name('laporan.print');
<<<<<<< HEAD
<<<<<<< HEAD

=======
>>>>>>> 4c65a6150544551668aae7fac50218a0508f4b5b
=======

>>>>>>> 3efa527c19d4cc2f48a62714dfb00d8f5e0dfa91
        });
        Route::prefix('profil')->controller(ProfilePetugas::class)->group(function(){
            Route::view('/', 'home.admin.user.profile')->name('profile.user');
            Route::post('/update', 'update')->name('profile.user.update');
            Route::post('/change_password', 'change_password')->name('profile.user.change_password');
        });
    });
});

Route::prefix('bk')->middleware(['auth:bk', 'checkdata'])->group(function () {
    Route::get('dashboard', [DashboardBk::class, 'index'])->name('dashboard.bk');
    Route::get('siswa', [DashboardBk::class, 'view_siswa'])->name('view_siswa');
    Route::get('aturan', [DashboardBk::class, 'view_aturan'])->name('view_aturan');
    Route::group(['controller' => ReviewPelanggaran::class, 'prefix' => 'pelanggaran'], function() {
        Route::get('/create', 'create')->name('review.create');
        Route::post('/store', 'store')->name('review.store');
        Route::get('/{id}/edit', 'edit')->name('review.edit')->withoutMiddleware(['checkdata']);
        Route::get('/{id}/detail', 'detail')->name('review.detail');
        Route::post('/{id}/update', 'update')->name('review.update')->withoutMiddleware(['checkdata']);
        Route::get('/{id}/destroy', 'destroy')->name('review.destroy');

        Route::get('/{id}/review', 'review')->name('review.review');
        Route::post('/{id}/proses', 'proses')->name('review.proses');
        Route::get('/inbox', 'inbox')->name('review.inbox');
        Route::get('/cancel/{opt}/{atr}', 'cancel')->name('review.cancel');

        Route::get('/printbk', 'printbk')->name('printbk');
        Route::get('/{id}/receipt', 'receipt')->name('receipt');
        Route::get('/{nis}/detail', 'detail')->name('detail');
        Route::get('/{nis}/history', 'history')->name('history');
        Route::post('/{nis}/change_point', 'change_point')->name('change.point');
    });

    Route::prefix('profil')->controller(ProfileBk::class)->group(function(){
        Route::view('/', 'home.admin.bk.profil')->name('profile.bk');
        Route::post('/update', 'update_profile')->name('profile.bk.update');
        Route::post('/change_password', 'change_password')->name('profile.bk.change_password');
    });
});
