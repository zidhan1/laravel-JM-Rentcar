<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\MobilController;
use App\Http\Controllers\Admin\LogoutController;
use App\Http\Controllers\Admin\ProfileController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\User\TransaksiController;
use App\Http\Controllers\User\UserController;
use App\Models\User;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/cars', [UserController::class, 'cars']);

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/logout', [LogoutController::class], 'logout')->middleware(['auth', 'isAdmin'])->name('logout');

//routing dashboard
Route::prefix('admin')->middleware(['auth', 'isAdmin'])->group(function () {

    Route::get('/dashboard', [DashboardController::class, 'index']);
});

//routing view mobil
Route::prefix('admin')->middleware(['auth', 'isAdmin'])->group(function () {
    Route::get('/datamobil', [MobilController::class, 'viewMobil']);
});

//routing form tambah mobil
Route::prefix('admin')->middleware(['auth', 'isAdmin'])->group(function () {
    Route::get('/tambahmobil', [MobilController::class, 'tambahMobil'])->name('admin.mobil');
});

//routing simpan mobil
Route::prefix('admin')->middleware(['auth', 'isAdmin'])->group(function () {
    Route::post('/datamobil', [MobilController::class, 'storeMobil'])->name('admin.store');
});

//routing form edit mobil
Route::prefix('admin')->middleware(['auth', 'isAdmin'])->group(function () {
    Route::get('/editmobil/edit/{id}', [MobilController::class, 'editMobil'])->name('admin.edit');
});

//routing update mobil
Route::prefix('admin')->middleware(['auth', 'isAdmin'])->group(function () {
    Route::post('/updatemobil/edit/{id}', [MobilController::class, 'updateMobil'])->name('admin.update');
});

//routing delete mobil
Route::prefix('admin')->middleware(['auth', 'isAdmin'])->group(function () {
    Route::post('/datamobil/delete/{id}', [MobilController::class, 'mobilDestroy'])->name('admin.destroy');
});

//routing profile
Route::prefix('admin')->middleware(['auth', 'isAdmin'])->group(function () {
    Route::get('/profile', [ProfileController::class, 'viewProfile'])->name('admin.profile');
});

//routing view transaksi
Route::prefix('admin')->middleware((['auth', 'isAdmin']))->group(function () {
    Route::get('/transaksi', [TransaksiController::class, 'viewTransaksi']);
});

//routing delete transaksi
Route::prefix('admin')->middleware((['auth', 'isAdmin']))->group(function () {
    Route::post('/transaksi/delete/{id}', [TransaksiController::class, 'deleteTransaksi'])->name('destroy.transaksi');
});

//routing user transaksi
Route::get('/sewa/{id}', [TransaksiController::class, 'tambahSewa'])->middleware(['auth', 'isUser'])->name('user.sewa');

//routing user store sewa
Route::put('/home{id}', [TransaksiController::class, 'store'])->middleware(['auth', 'isUser'])->name('sewa.store');

//routing user deskripsi
Route::get('/deskripsi/{id}', [TransaksiController::class, 'viewDeskripsi'])->middleware(['auth', 'isUser'])->name('user.deskripsi');

//routing tambah ulasan
Route::post('/deskripsi/{id}', [TransaksiController::class, 'tambahUlasan'])->name('deskripsi.store');
