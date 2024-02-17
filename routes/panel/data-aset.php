<?php

use App\Http\Controllers\DataAsetController;

Route::get('/', [DataAsetController::class, 'index'])->name('data-aset')->middleware('rbac:data_aset');
Route::get('/data', [DataAsetController::class, 'data'])->name('data-aset.data')->middleware('rbac:data_aset');
Route::get('/sync-sijali', [DataAsetController::class, 'syncDataSijali'])->name('data-aset.sync-sijali')->middleware('rbac:data_aset');
Route::get('/sync-sinta', [DataAsetController::class, 'syncDataSinta'])->name('data-aset.sync-sinta')->middleware('rbac:data_aset');