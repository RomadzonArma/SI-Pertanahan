<?php

use App\Http\Controllers\TimLapanganController;

Route::get('/', [TimLapanganController::class, 'index'])->name('timlapangan')->middleware('rbac:pengguna');
Route::get('/data', [TimLapanganController::class, 'data'])->name('timlapangan.data')->middleware('rbac:pengguna');