<?php

use App\Http\Controllers\JalanLingkunganController;

Route::get('/', [JalanLingkunganController::class, 'index'])->name('jalan-lingkungan')->middleware('rbac:jalan_lingkungan');
Route::get('/data', [JalanLingkunganController::class, 'data'])->name('jalan-lingkungan.data')->middleware('rbac:jalan_lingkungan');
Route::get('/update/{id}', [JalanLingkunganController::class, 'update'])->name('jalan-lingkungan.update')->middleware('rbac:jalan_lingkungan');
Route::post('/store', [JalanLingkunganController::class, 'store'])->name('jalan-lingkungan.store')->middleware('rbac:jalan_lingkungan, 3');

// foto
Route::post('/foto', [JalanLingkunganController::class, 'foto'])->name('jalan-lingkungan.foto')->middleware('rbac:jalan_lingkungan');
Route::post('/data-foto', [JalanLingkunganController::class, 'dataFoto'])->name('jalan-lingkungan.data-foto')->middleware('rbac:jalan_lingkungan');
Route::post('/store-foto', [JalanLingkunganController::class, 'storeFoto'])->name('jalan-lingkungan.store-foto')->middleware('rbac:jalan_lingkungan');
Route::post('/delete-foto', [JalanLingkunganController::class, 'deleteFoto'])->name('jalan-lingkungan.delete-foto')->middleware('rbac:jalan_lingkungan');