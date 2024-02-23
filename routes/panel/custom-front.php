<?php

use App\Http\Controllers\CustomFrontController;


Route::get('/', [CustomFrontController::class, 'index'])->name('custom-front')->middleware('rbac:custom_front');
Route::get('/custom-front/first', [CustomFrontController::class, 'show'])->name('custom-front.show')->middleware('rbac:custom_front');
// Route::get('/data', [CustomFrontController::class, 'data'])->name('custom-front.data')->middleware('rbac:custom_front')
Route::post('/custom-front/update', [CustomFrontController::class, 'update'])->name('custom-front.update')->middleware('rbac:custom_front,3');
Route::delete('/delete', [CustomFrontController::class, 'destroy'])->name('custom-front.delete')->middleware('rbac:custom_front,4');
