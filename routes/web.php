<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\PegawaiController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//AUTH
Route::get('/', [AuthController::class, 'index'])->name('auth.index');
Route::get('/logout', [AuthController::class, 'logout'])->name('auth.logout');
Route::post('/postLogin', [AuthController::class, 'postLogin'])->name('auth.postLogin');


Route::group(['middleware' => 'auth'], function () { 
    //ADMIN
    Route::get('/admin-dashboard', [AdminController::class, 'index'])->name('admin.index');
    Route::get('/admin-manage-akun', [AdminController::class, 'manageAkun'])->name('admin.manageAkun');

    //CRUD AKUN
    Route::post('/tambah-akun', [AdminController::class, 'tambahAkun'])->name('admin.tambahAkun');
    Route::post('/edit-akun', [AdminController::class, 'editAkun'])->name('admin.editAkun');
    Route::get('/delete-akun/{id}', [AdminController::class, 'deleteAkun'])->name('admin.deleteAkun');

    //Pegawai
    Route::get('/pegawai-dashboard', [PegawaiController::class, 'index'])->name('pegawai.index');
    Route::get('/pegawai-profile', [PegawaiController::class, 'profile'])->name('pegawai.profile');
    Route::get('/pegawai-daftar-muzakki', [PegawaiController::class, 'daftarMuzakki'])->name('pegawai.daftarMuzakki');
    Route::post('/pegawai-tambah-muzakki', [PegawaiController::class, 'tambahMuzakki'])->name('pegawai.tambahMuzakki');
    Route::post('/pegawai-edit-muzakki', [PegawaiController::class, 'editMuzakki'])->name('pegawai.editMuzakki');
    Route::get('/pegawai-delete-muzakki/{id}', [PegawaiController::class, 'deleteMuzakki'])->name('pegawai.deleteMuzakki');

    Route::get('/pegawai-daftar-mustahik', [PegawaiController::class, 'daftarMustahik'])->name('pegawai.daftarMustahik');
    Route::post('/pegawai-tambah-mustahik', [PegawaiController::class, 'tambahMustahik'])->name('pegawai.tambahMustahik');
    Route::post('/pegawai-edit-mustahik', [PegawaiController::class, 'editMustahik'])->name('pegawai.editMustahik');
    Route::get('/pegawai-delete-mustahik/{id}', [PegawaiController::class, 'deleteMustahik'])->name('pegawai.deleteMustahik');

    Route::get('/pegawai-daftar-akunbank', [PegawaiController::class, 'daftarAkunBank'])->name('pegawai.daftarAkunBank');
    Route::post('/pegawai-tambah-akunbank', [PegawaiController::class, 'tambahAkunBank'])->name('pegawai.tambahAkunBank');
    Route::post('/pegawai-edit-akunbank', [PegawaiController::class, 'editAkunBank'])->name('pegawai.editAkunBank');
    Route::get('/pegawai-delete-akunbank/{id}', [PegawaiController::class, 'deleteAkunBank'])->name('pegawai.deleteAkunBank');

    Route::get('/pegawai-data-penerimaandana', [PegawaiController::class, 'penerimaanDana'])->name('pegawai.penerimaanDana');
    Route::post('/pegawai-tambah-penerimaandana', [PegawaiController::class, 'tambahPenerimaanDana'])->name('pegawai.tambahPenerimaanDana');
    Route::post('/pegawai-edit-penerimaandana', [PegawaiController::class, 'editPenerimaanDana'])->name('pegawai.editPenerimaanDana');
    Route::get('/pegawai-delete-penerimaandana/{id}', [PegawaiController::class, 'deletePenerimaanDana'])->name('pegawai.deletePenerimaanDana');

    Route::get('/pegawai-data-penyalurandana', [PegawaiController::class, 'penyaluranDana'])->name('pegawai.penyaluranDana');
    Route::post('/pegawai-dropdown-penyalurandana', [PegawaiController::class, 'dropdownPenyaluran'])->name('pegawai.dropdownPenyaluran');
    Route::post('/pegawai-dropdown-penyalurandana2', [PegawaiController::class, 'dropdownPenyaluran2'])->name('pegawai.dropdownPenyaluran2');
    Route::post('/pegawai-tambah-penyalurandana', [PegawaiController::class, 'tambahPenyaluranDana'])->name('pegawai.tambahPenyaluranDana');
    Route::post('/pegawai-edit-penyalurandana', [PegawaiController::class, 'editPenyaluranDana'])->name('pegawai.editPenyaluranDana');
    Route::get('/pegawai-delete-penyalurandana/{id}', [PegawaiController::class, 'deletePenyaluranDana'])->name('pegawai.deletePenyaluranDana');

    Route::get('/pegawai-laporan-dana', [PegawaiController::class, 'laporanDana'])->name('pegawai.laporanDana');
});
