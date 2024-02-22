<?php

use App\Http\Controllers\PertanahanController;
use Illuminate\Support\Facades\Route;

Route::get('/', [PertanahanController::class, 'index'])->name('pertanahan')->middleware('rbac:pertanahan');
Route::get('/data', [PertanahanController::class, 'data'])->name('pertanahan.data')->middleware('rbac:pertanahan');
Route::get('/update/{id}', [PertanahanController::class, 'update'])->name('pertanahan.update')->middleware('rbac:pertanahan');
Route::post('/store', [PertanahanController::class, 'store'])->name('pertanahan.store')->middleware('rbac:pertanahan, 3');
// Route::delete('/delete-photo/{id}', [PertanahanController::class, 'deletePhoto'])->name('pertanahan.deletePhoto')->middleware('rbac:pertanahan,4');

Route::post('/foto', [PertanahanController::class, 'foto'])->name('pertanahan.foto')->middleware('rbac:pertanahan');
Route::post('/data-foto', [PertanahanController::class, 'dataFoto'])->name('pertanahan.data-foto')->middleware('rbac:pertanahan');
Route::post('/store-foto', [PertanahanController::class, 'storeFoto'])->name('pertanahan.store-foto')->middleware('rbac:pertanahan');
Route::post('/delete-foto', [PertanahanController::class, 'deleteFoto'])->name('pertanahan.delete-foto')->middleware('rbac:pertanahan');
