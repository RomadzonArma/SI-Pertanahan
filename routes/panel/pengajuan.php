<?php

use App\Http\Controllers\PengajuanController;

Route::get('/', [PengajuanController::class, 'index'])->name('pengajuan')->middleware('rbac:pengajuan');
Route::get('/create', [PengajuanController::class, 'create'])->name('pengajuan.create')->middleware('rbac:pengajuan');
Route::post('/store', [PengajuanController::class, 'store'])->name('pengajuan.store')->middleware('rbac:pengajuan,2');
Route::get('/data', [PengajuanController::class, 'data'])->name('pengajuan.data')->middleware('rbac:pengajuan');
Route::get('/edit/{id}', [PengajuanController::class, 'edit'])->name('pengajuan.edit')->middleware('rbac:pengajuan');

Route::post('/update', [PengajuanController::class, 'update'])->name('pengajuan.update')->middleware('rbac:pengajuan,3');

Route::delete('/delete', [PengajuanController::class, 'delete'])->name('pengajuan.delete')->middleware('rbac:pengajuan,4');
