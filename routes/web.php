<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\mahasiswaController;
use App\Http\Controllers\matkulController;

Route::get('/layout', function () {
    return view('layout');
});

Route::get('/mahasiswa',[mahasiswaController::class, 'index'])->name('mahasiswa.index');
Route::post('/mahasiswa',[mahasiswaController::class, 'store'])->name('mahasiswa.store');
Route::put('/mahasiswa/{nim}', [mahasiswaController::class, 'update'])->name('mahasiswa.update');
Route::delete('/mahasiswa/{nim}', [mahasiswaController::class, 'destroy'])->name('mahasiswa.destroy');

Route::get('/matkul',[matkulController::class, 'index'])->name('matkul.index');
Route::post('/matkul',[matkulController::class, 'store'])->name('matkul.store');
Route::put('/matkul/{kode_matkul}', [matkulController::class, 'update'])->name('matkul.update');
Route::delete('/matkul/{kode_matkul}', [matkulController::class, 'destroy'])->name('matkul.destroy');