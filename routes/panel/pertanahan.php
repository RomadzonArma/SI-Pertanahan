<?php

use App\Http\Controllers\PertanahanController;
use Illuminate\Support\Facades\Route;

Route::get('/', [PertanahanController::class, 'index'])->name('pertanahan')->middleware('rbac:pertanahan');
Route::get('/data', [PertanahanController::class, 'data'])->name('pertanahan.data')->middleware('rbac:pertanahan');
