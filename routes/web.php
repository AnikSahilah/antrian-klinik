<?php

use App\Http\Controllers\Antrian_Pasien_Controller;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DashboardAdminController;
use App\Http\Controllers\Jadwal_Periksa_Controller;
use App\Http\Controllers\DashboardDokterController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LandingPageController as LandingController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('template1');
});

Route::get('/', [LandingController::class, 'createAntrian'])->name('landing.createAntrian');
Route::post('/', [LandingController::class, 'storeAntrian'])->name('landing.storeAntrian');

Route::get('/dashboard-admin', [DashboardAdminController::class, 'index'])
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::get('/dokter-dashboard', [DashboardDokterController::class, 'index'])
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::resource('antrian', Antrian_Pasien_Controller::class)->middleware(['auth', 'verified']);
Route::resource('jadwal', Jadwal_Periksa_Controller::class)->middleware(['auth', 'verified']);
Route::resource('user', UserController::class)->middleware(['auth', 'verified']);

Route::get('/', [LandingController::class, 'index'])->name('landing.index');
// Route::post('/daftar-antrian', [LandingController::class, 'store'])->name('landing.store');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
