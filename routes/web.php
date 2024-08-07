<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PendaftarController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\CetakController;
use App\Http\Controllers\AuthController;


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
    return view('welcome');
});

Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Rute yang dilindungi oleh middleware admin
Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('admin/dashboard', [AuthController::class, 'showDashboard'])->name('admin.dashboard');
    Route::get('admin/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::resource('admin/pendaftar', PendaftarController::class);
    Route::get('pendaftar/export-excel', [PendaftarController::class, 'exportExcel'])->name('pendaftar.export-excel'); // Perbaiki rute export
    Route::get('admin/pendaftar/{id}/edit', [PendaftarController::class, 'show'])->name('pendaftar.edit');
    Route::put('admin/pendaftar/{id}', [PendaftarController::class, 'update'])->name('pendaftar.update');
    Route::get('admin/pendaftar/cetak/{id}', [PendaftarController::class, 'cetak'])->name('cetak.print');




});

Route::get('/register-admin', [AuthController::class, 'showAdminRegisterForm'])->name('registerAdminForm');
Route::post('/register-admin', [AuthController::class, 'registerAdmin'])->name('registerAdmin');


Route::get('/register/create', [RegisterController::class, 'create'])->name('register.create');
Route::post('/register', [RegisterController::class, 'store'])->name('register.store');
Route::get('/register/succes', function () {return view('register.succes');})->name('register.succes');

// Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
// Route::post('/login', [AuthController::class, 'login']);
// Route::get('/dashboard', [AuthController::class, 'showDashboard'])->middleware('auth')->name('dashboard');
// Route::post('/logout', [AuthController::class, 'logout'])->name('logout');





