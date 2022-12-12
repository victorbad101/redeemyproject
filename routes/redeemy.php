<?php

use App\Modules\Auth\Controllers\LogInController;
use App\Modules\Auth\Controllers\UserController;
use App\Modules\Redeemy\Controllers\AuthorPostController;
use App\Modules\Redeemy\Controllers\RedeemerController;
use App\Modules\Redeemy\Controllers\VinylController;
use Illuminate\Support\Facades\Route;

Route::get('/dashboard', [VinylController::class, 'index']);

Route::get('/create', [UserController::class, 'create'])->name('user.register.create');
Route::post('/user/create', [UserController::class, 'store'])->name('user.register.store');

Route::get('/login', [LogInController::class, 'create'])->name('user.login.create');
Route::post('/login', [LogInController::class, 'store'])->name('user.login.store');
Route::delete('/logout', [LogInController::class, 'destroy'])->name('user.logout')->middleware('auth');

Route::controller(AuthorPostController::class)->middleware('isAuthor')->group(function () {
    Route::get('/vinyl/create', 'create')->name('vinyl.create');
    Route::post('/vinyl/create','store')->name('vinyl.store');
});

Route::get('/vinyl/{id}/redeem', [RedeemerController::class, 'createCode'])->name('vinyl.redeem');
Route::post('/vinyl/{id}/redeem', [RedeemerController::class, 'removeCode'])->name('vinyl.remover');
