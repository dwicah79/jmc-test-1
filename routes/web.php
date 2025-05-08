<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegencyController;
use App\Http\Controllers\ProvinceController;
use App\Http\Controllers\ReportController;

Route::get('/', function () {
    return view('welcome');
});

Route::prefix('provinces')->group(function () {
    Route::get('/', [ProvinceController::class, 'index'])->name('provinces.index');
    Route::post('/', [ProvinceController::class, 'store'])->name('provinces.store');
    Route::get('/{province}/edit', [ProvinceController::class, 'edit'])->name('provinces.edit');
    Route::put('/{province}', [ProvinceController::class, 'update'])->name('provinces.update');
    Route::delete('/{province}', [ProvinceController::class, 'destroy'])->name('provinces.destroy');
});

Route::prefix('regencies')->group(function () {
    Route::get('/', [RegencyController::class, 'index'])->name('regencies.index');
    Route::post('/', [RegencyController::class, 'store'])->name('regencies.store');
    Route::get('/{regency}/edit', [RegencyController::class, 'edit'])->name('regencies.edit');
    Route::put('/{regency}', [RegencyController::class, 'update'])->name('regencies.update');
    Route::delete('/{regency}', [RegencyController::class, 'destroy'])->name('regencies.destroy');
});

Route::prefix('reports')->group(function () {
    Route::get('/provinces', [ReportController::class, 'printofpopulationPerProvince'])->name('reports.provinces');
    Route::get('/regencies', [ReportController::class, 'printofpopulationPerRegency'])->name('reports.regencies');
});
