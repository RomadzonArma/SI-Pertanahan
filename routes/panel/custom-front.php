<?php

use App\Http\Controllers\CustomFrontController;


Route::get('/', [CustomFrontController::class, 'index'])->name('custom-front')->middleware('rbac:custom_front');
Route::get('/data', [CustomFrontController::class, 'data'])->name('custom-front.data')->middleware('rbac:custom_front');
Route::post('/store', [CustomFrontController::class, 'store'])->name('custom-front.store')->middleware('rbac:custom_front,2');
Route::patch('/update', [CustomFrontController::class, 'update'])->name('custom-front.update')->middleware('rbac:custom_front,3');
Route::delete('/delete', [CustomFrontController::class, 'delete'])->name('custom-front.delete')->middleware('rbac:custom_front,4');
