<?php

use App\Http\Controllers\JalanLingkunganController;

Route::get('/', [JalanLingkunganController::class, 'index'])->name('jalan-lingkungan')->middleware('rbac:jalan_lingkungan');
Route::get('/data', [JalanLingkunganController::class, 'data'])->name('jalan-lingkungan.data')->middleware('rbac:jalan_lingkungan');