<?php

use App\Http\Controllers\ExportController;
use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\ExportAnalysisController;

Route::middleware(['guest'])->group(function () {
    Route::get('/', function () {
        return view('LandingPage');
    });
    Route::get('/login', [LoginController::class, 'login'])->name('login');
    Route::post('/login', [LoginController::class, 'authenticate']);

});


Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index']);
    Route::get('/profile', [ProfileController::class, 'index']);
    Route::post('/profile-update', [ProfileController::class, 'updateProfile'])->name('profile.update');
    Route::post('/logout', [LoginController::class, 'logout']);
});

// Data Customer
Route::group(['middleware' => ['isAdmin'], 'prefix' => 'Customer'], function () {
    Route::get('/', [CustomerController::class, 'listCustomer'])->name('customer.index');
    Route::post('/create', [CustomerController::class, 'createCustomer'])->name('customer.create');
    Route::put('/update/{id}', [CustomerController::class, 'updateCustomer'])->name('customer.update');
    Route::delete('/delete/{id}', [CustomerController::class, 'deleteCustomer'])->name('customer.destroy');
});

// Data Ekspor
Route::group(['middleware' => ['isAdmin'], 'prefix' => 'Ekspor'], function () {
    Route::get('/', [ExportController::class, 'listEkspor'])->name('ekspor.index');
    Route::post('/', [ExportController::class, 'createEkspor'])->name('ekspor.store');
    Route::post('/ekspor-update', [ExportController::class, 'updateEkspor'])->name('ekspor.update');
    Route::post('/ekpor-delete', [ExportController::class, 'deleteEkspor'])->name('ekspor.delete');
});

// Data Produk
Route::prefix('produk')->middleware(['isAdmin'])->group(function () {
    Route::get('/', [ProdukController::class, 'listProduk'])->name('produk.index');
    Route::post('/create', [ProdukController::class, 'createProduk'])->name('produk.create');
    Route::put('/update/{id}', [ProdukController::class, 'updateProduk'])->name('produk.update');
    Route::delete('/delete/{id}', [ProdukController::class, 'deleteProduk'])->name('produk.delete');
});

// Analisi
Route::prefix('perhitungan')->middleware(['isAdmin'])->group(function () {
    Route::get('/', [ExportAnalysisController::class, 'index'])->name('exports.index');
    Route::get('/exports/analyze', [ExportAnalysisController::class, 'analyze'])->name('exports.analyze');
    Route::get('/exports/detail-perhitungan', [ExportAnalysisController::class, 'prhitungan'])->name('exports.perhitungan');
});

// Data Keuangan

