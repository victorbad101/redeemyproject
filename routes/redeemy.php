<?php

use App\Modules\Auth\Controllers\UserController;
use App\Modules\Redeemy\Controllers\VinylController;
use App\Modules\Redeemy\Models\Vinyl;
use Illuminate\Support\Facades\Route;

Route::get('/dashboard', [VinylController::class, 'index']);

Route::get('/create', [UserController::class, 'create']);
Route::post('/user/create', [UserController::class, 'store'])->name('user.store');
