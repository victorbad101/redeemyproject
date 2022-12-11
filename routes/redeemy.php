<?php

use App\Modules\Auth\Controllers\LogInController;
use App\Modules\Auth\Controllers\UserController;
use App\Modules\Redeemy\Controllers\VinylController;
use App\Modules\Redeemy\Models\Vinyl;
use Illuminate\Support\Facades\Route;

Route::get('/dashboard', [VinylController::class, 'index']);

Route::get('/create', [UserController::class, 'create'])->name('user.register.create');
Route::post('/user/create', [UserController::class, 'store'])->name('user.register.store');

Route::get('/login', [LogInController::class, 'create'])->name('user.login.create');
Route::post('/login', [LogInController::class, 'store'])->name('user.login.store');
Route::delete('/logout', [LogInController::class, 'destroy'])->name('user.logout');

Route::get('/vinyl/create', [VinylController::class, 'create']);
Route::post('/vinyl/create', [VinylController::class, 'store'])->name('vinyl.store');
