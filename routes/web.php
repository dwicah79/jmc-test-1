<?php

use App\Http\Controllers\ProvinceController;
use Illuminate\Support\Facades\Route;

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
