<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\TiketController;

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

Route::get('/', function () {
    return view('pesan');
})->name('home');

//Pemesanan tiket public
Route::post('/tiket', [TiketController::class, 'store'])->name('tiket.store');

Auth::routes();

Route::prefix('dashboard')->middleware('auth')->group(function () {
    Route::get('/', [AdminController::class, 'index'])->name('dashboard');

    //Pemesanan
    Route::get('/pemesanan', [AdminController::class, 'pemesanan'])->name('pemesanan');
    Route::get('/pemesanan/edit/{id}', [AdminController::class, 'pemesanan_edit'])->name('pemesanan.edit');
    Route::put('/pemesanan/update/{id}', [AdminController::class, 'pemesanan_update'])->name('pemesanan.update');
    Route::delete('/pemesanan/delete/{id}', [AdminController::class, 'pemesanan_destroy'])->name('pemesanan.delete');
    Route::get('/pemesanan/{id}', [AdminController::class, 'masuk'])->name('pemesanan.masuk');

    //Laporan
    Route::get('/laporan', [AdminController::class, 'laporan'])->name('laporan');

    // Check-in
    Route::get('/check-in', [AdminController::class, 'check_in'])->name('checkin');
    Route::post('/checked', [AdminController::class, 'checked'])->name('checked');
});
