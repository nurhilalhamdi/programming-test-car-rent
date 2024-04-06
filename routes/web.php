<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ManajemenMobilController;
use App\Http\Controllers\PengembalianMobilController;
use App\Http\Controllers\RegistrasiController;
use App\Http\Controllers\RentalMobilController;
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

// Route::get('/', function () {
//     return view('welcome');
// });


Route::group(['middleware' => 'guest'], function () {

    //Login route
    Route::get('/', [LoginController::class, 'login'])->name('login');
    Route::post('/login', [LoginController::class, 'doLogin'])->name('login.doLogin');

    //Registrasi route
    Route::get('/registrasi', [RegistrasiController::class, 'registrasi'])->name('registrasi');
    Route::post('/registrasi/daftar', [RegistrasiController::class, 'doregistrasi'])->name('registrasi.daftar');
});

Route::group(['middleware' => 'auth'], function () {

    Route::get('/dashboard', [HomeController::class, 'dashboard'])->name('dashboard');

    //Manajemen mobil route
    Route::get('/dashboard/manajemen', [ManajemenMobilController::class, 'index'])->name('dashboard.manajemen');
    Route::post('/dashboard/manajemen/store', [ManajemenMobilController::class, 'store'])->name('dashboard.manajemen.store');
    Route::get('/dashboard/manajemen/search', [ManajemenMobilController::class, 'search'])->name('dashboard.manajemen.search');
    Route::put('/dashboard/manajemen/{mobil}/update', [ManajemenMobilController::class, 'update'])->name('dashboard.manajemen.update');
    Route::delete('/dashboard/manajemen/{mobil}/destroy', [ManajemenMobilController::class, 'destroy'])->name('dashboard.manajemen.destroy');

    //Rental mobil route
    Route::get('/dashboard/rental', [RentalMobilController::class, 'index'])->name('dashboard.rental');
    Route::post('/dashboard/rental/booking', [RentalMobilController::class, 'doBooking'])->name('dashboard.rental.booking');

    //Pengembalian mobil route
    Route::get('/dashboard/return', [PengembalianMobilController::class, 'index'])->name('dashboard.return');
    Route::get('/dashboard/return/cek', [PengembalianMobilController::class, 'cekMobil'])->name('dashboard.return.cek');
    Route::put('/dashboard/return/{rental}/pengembalian', [PengembalianMobilController::class, 'doReturn'])->name('dashboard.return.pengembalian');

    //Logout route
    Route::post('/logout', [HomeController::class, 'doLogout'])->name('logout');
});
