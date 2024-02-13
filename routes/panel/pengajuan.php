<?php

use App\Http\Controllers\PengajuanController;

Route::get('/', [PengajuanController::class, 'index'])->name('pengajuan')->middleware('rbac:pengajuan');
Route::get('/create', [PengajuanController::class, 'create'])->name('pengajuan.create')->middleware('rbac:pengajuan');
Route::post('/store', [PengajuanController::class, 'store'])->name('pengajuan.store')->middleware('rbac:pengajuan,2');
Route::get('/data', [PengajuanController::class, 'data'])->name('pengajuan.data')->middleware('rbac:pengajuan');
Route::get('/edit/{encrypted_id}', [PengajuanController::class, 'edit'])->name('pengajuan.edit')->middleware('rbac:pengajuan');
Route::post('/update', [PengajuanController::class, 'update'])->name('pengajuan.update')->middleware('rbac:pengajuan,3');
Route::delete('/delete', [PengajuanController::class, 'delete'])->name('pengajuan.delete')->middleware('rbac:pengajuan,4');

Route::post('/ajukanpemohon', [PengajuanController::class, 'ajukanpemohon'])->name('pengajuan.ajukanpemohon')->middleware('rbac:pengajuan');
Route::post('/send_ajukan_pemohon', [PengajuanController::class, 'send_ajukan_pemohon'])->name('pengajuan.send_ajukan_pemohon')->middleware('rbac:pengajuan,6');
Route::post('/ajukanoperator', [PengajuanController::class, 'ajukanoperator'])->name('pengajuan.ajukanoperator')->middleware('rbac:pengajuan');
Route::post('/send_ajukan_operator', [PengajuanController::class, 'send_ajukan_operator'])->name('pengajuan.send_ajukan_operator')->middleware('rbac:pengajuan,6');
Route::post('/ajukanlapangan', [PengajuanController::class, 'ajukanlapangan'])->name('pengajuan.ajukanlapangan')->middleware('rbac:pengajuan');
Route::post('/send_ajukan_survey', [PengajuanController::class, 'send_ajukan_survey'])->name('pengajuan.send_ajukan_survey')->middleware('rbac:pengajuan,6');
// Route::post('/send_ajukan_tidak_survey', [PengajuanController::class, 'send_ajukan_tidak_survey'])->name('pengajuan.send_ajukan_tidak_survey')->middleware('rbac:pengajuan,6');
Route::post('/operator_send_pimpinan', [PengajuanController::class, 'operator_send_pimpinan'])->name('pengajuan.operator_send_pimpinan')->middleware('rbac:pengajuan,6');
Route::post('/ajukansubkoor', [PengajuanController::class, 'ajukansubkoor'])->name('pengajuan.ajukansubkoor')->middleware('rbac:pengajuan');
Route::post('/send_ajukan_subkoor', [PengajuanController::class, 'send_ajukan_subkoor'])->name('pengajuan.send_ajukan_subkoor')->middleware('rbac:pengajuan,6');
Route::post('/ajukankabid', [PengajuanController::class, 'ajukankabid'])->name('pengajuan.ajukankabid')->middleware('rbac:pengajuan');
Route::post('/send_ajukan_kabid', [PengajuanController::class, 'send_ajukan_kabid'])->name('pengajuan.send_ajukan_kabid')->middleware('rbac:pengajuan,6');
Route::post('/ajukanselesai', [PengajuanController::class, 'ajukanselesai'])->name('pengajuan.ajukankadin')->middleware('rbac:pengajuan');
Route::post('/send_ajukan_kadin', [PengajuanController::class, 'send_ajukan_kadin'])->name('pengajuan.send_ajukan_kadin')->middleware('rbac:pengajuan,6');
Route::post('/ajukanselesai', [PengajuanController::class, 'ajukanselesai'])->name('pengajuan.ajukanselesai')->middleware('rbac:pengajuan');
Route::post('/send_ajukan_selesai', [PengajuanController::class, 'send_ajukan_selesai'])->name('pengajuan.send_ajukan_selesai')->middleware('rbac:pengajuan,6');
