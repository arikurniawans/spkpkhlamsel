<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\KriteriaController;
use App\Http\Controllers\PendudukController;
use App\Http\Controllers\RekomendasiController;
use App\Http\Controllers\AlternatifController;

use App\Http\Middleware\Pendamping;
use App\Http\Middleware\Penduduk;

Route::get('/', function () {
    // return view('welcome');
    return view('auth.login');
});

Route::middleware('guest')->group(function () {
    Route::get('login', [AuthenticatedSessionController::class, 'create'])
        ->name('login');

    Route::post('login', [AuthenticatedSessionController::class, 'store']);

    // Hapus atau komentari rute registrasi
    // Route::get('register', [RegisteredUserController::class, 'create'])
    //     ->name('register');

    // Route::post('register', [RegisteredUserController::class, 'store']);
});

Route::middleware('auth')->group(function () {
    Route::get('logout', [AuthenticatedSessionController::class, 'destroy'])
        ->name('logout');

    Route::get('/home', [HomeController::class, 'index'])->middleware(['auth', 'verified'])->name('home');

    Route::get('/dashboard/pendamping', [HomeController::class, 'pendamping'])->middleware(['auth', Pendamping::class])->name('dashboard.pendamping');
    Route::get('/dashboard/penduduk', [HomeController::class, 'penduduk'])->middleware(['auth', Penduduk::class])->name('dashboard.penduduk');
    Route::get('/kriteria', [KriteriaController::class, 'index'])->name('kriteria');
    Route::get('/penduduk', [PendudukController::class, 'index'])->name('penduduk');
    Route::post('/penduduk/store', [PendudukController::class, 'store'])->name('penduduk.store');
    Route::put('/penduduk/{id}', [PendudukController::class, 'update'])->name('penduduk.update');
    Route::delete('/penduduk/{id}', [PendudukController::class, 'destroy'])->name('penduduk.destroy');
    Route::get('/rekomendasi', [RekomendasiController::class, 'index'])->name('rekomendasi');
    Route::post('/rekomendasi/saw', [RekomendasiController::class, 'saw'])->name('rekomendasi.saw');
    Route::get('/alternatif', [AlternatifController::class, 'index'])->name('alternatif');
    Route::post('/alternatif/store', [AlternatifController::class, 'store'])->name('alternatif.store');
    Route::put('/alternatif/{id}', [AlternatifController::class, 'update'])->name('alternatif.update');
    Route::delete('alternatif/{id}', [AlternatifController::class, 'destroy'])->name('alternatif.destroy');



});
