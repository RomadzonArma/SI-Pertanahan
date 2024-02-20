<?php

use App\Http\Controllers\PertanahanController;
use Illuminate\Support\Facades\Route;

Route::get('/', [PertanahanController::class, 'index'])->name('pertanahan')->middleware('rbac:pertanahan');
Route::get('/data', [PertanahanController::class, 'data'])->name('pertanahan.data')->middleware('rbac:pertanahan');
Route::get('/update/{id}', [PertanahanController::class, 'update'])->name('pertanahan.update')->middleware('rbac:pertanahan');
Route::post('/store', [PertanahanController::class, 'store'])->name('pertanahan.store')->middleware('rbac:pertanahan, 3');
