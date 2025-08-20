<?php

use App\Http\Controllers\RegisterController;
use App\Http\Controllers\UserLinkController;
use Illuminate\Support\Facades\Route;

Route::get('/', [RegisterController::class, 'showForm'])->name('register.form');
Route::post('/register', [RegisterController::class, 'register'])->name('register.store');


Route::prefix('link')->name('link.')->group(function () {
    Route::get('{token}', [UserLinkController::class, 'show'])->name('show');
    Route::post('{token}/regenerate', [UserLinkController::class, 'regenerate'])->name('regenerate');
    Route::post('{token}/deactivate', [UserLinkController::class, 'deactivate'])->name('deactivate');
});
