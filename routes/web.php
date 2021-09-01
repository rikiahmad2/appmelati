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
});
