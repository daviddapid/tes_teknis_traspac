<?php

use App\Http\Controllers\AgamaController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\EselonController;
use App\Http\Controllers\GolonganController;
use App\Http\Controllers\JabatanController;
use App\Http\Controllers\JenisKelaminController;
use App\Http\Controllers\PegawaiController;
use App\Http\Controllers\UnitKerjaController;
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

Route::controller(AuthController::class)->group(function () {
    Route::get('/login', 'loginView')->name('login');
    Route::post('/login', 'loginAction')->name('login.post');
    Route::get('/register', 'registerView')->name('register');
    Route::post('/register', 'registerAction')->name('register.post');
});

Route::middleware('auth')->group(function () {

    Route::controller(PegawaiController::class)->group(function () {
        Route::get('/', 'index')->name('pegawai.index');
        Route::get('/tambah-data-pegawai', 'create')->name('pegawai.create');
        Route::post('/tambah-data-pegawai', 'store')->name('pegawai.store');
        Route::get('/edit/{pegawai}', 'edit')->name('pegawai.edit');
        Route::put('/edit/{pegawai}', 'update')->name('pegawai.update');
        Route::delete('/delete/{pegawai}', 'destroy')->name('pegawai.destroy');
        Route::get('/pegawai/cetak-excel', 'cetakExcel')->name('pegawai.cetak');
    });

    Route::resource('agama', AgamaController::class)->only('index', 'store', 'update', 'destroy');
    Route::resource('eselon', EselonController::class)->only('index', 'store', 'update', 'destroy');
    Route::resource('golongan', GolonganController::class)->only('index', 'store', 'update', 'destroy');
    Route::resource('jabatan', JabatanController::class)->only('index', 'store', 'update', 'destroy');
    Route::resource('jenis-kelamin', JenisKelaminController::class)->only('index', 'store', 'update', 'destroy');
    Route::resource('unit-kerja', UnitKerjaController::class)->only('index', 'store', 'update', 'destroy');
});
