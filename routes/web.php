<?php

use App\Http\Controllers\RegisterController;
use App\Http\Controllers\UserLinkController;
use Illuminate\Support\Facades\Route;

Route::get('/', [RegisterController::class, 'showForm'])->name('register.form');
Route::post('/register', [RegisterController::class, 'register'])->name('register.store');


Route::get('/link/{token}', [UserLinkController::class, 'show'])->name('link.show');
