<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\MasyarakatController;
use App\Http\Controllers\PetugasController;
use Illuminate\Routing\Router;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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

Auth::routes();
Route::get('/logout', [LoginController::class, 'logout'])->name('logout');
Route::post('/register', [RegisterController::class, 'create'])->name('register');

// Masyarakat
Route::get('/', [MasyarakatController::class, 'index'])->name('masyarakat.index');
Route::post('/', [MasyarakatController::class, 'store'])->name('masyarakat.store');

// Petugas
Route::group(['middleware' => ['auth', 'role:petugas']], function () {
    Route::prefix('petugas')->group(function () {
        Route::get('/', [PetugasController::class, 'index'])->name('petugas.index');
        Route::get('/edit/{id}', [PetugasController::class, 'edit'])->name('petugas.edit');
        Route::patch('/update/{id}', [PetugasController::class, 'update'])->name('petugas.update');

        Route::get('/pengaduan', [PetugasController::class, 'pengaduan'])->name('petugas.pengaduan');
    });
});
// Admin
Route::group(['middleware' => ['auth', 'role:admin']], function () {
    Route::prefix('admin')->group(function () {
        Route::get('/', [AdminController::class, 'index'])->name('admin.index');
        Route::get('/create_petugas', [AdminController::class, 'create_petugas'])->name('admin.create_petugas');
        Route::post('/store', [AdminController::class, 'store_petugas'])->name('admin.store');
        Route::delete('/destroy/{id}', [AdminController::class, 'destroy_petugas'])->name('admin.destroy');

        Route::get('pengaduan', [AdminController::class, 'pengaduan'])->name('admin.pengaduan');
        Route::delete('/destroy_pengaduan/{id}', [AdminController::class, 'destroy_pengaduan'])->name('admin.destroy_pengaduan');
        Route::get('/cetak_pengaduan', [AdminController::class, 'cetak_pengaduan'])->name('admin.cetak_pengaduan');
    });
});
