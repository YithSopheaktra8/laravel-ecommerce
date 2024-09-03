<?php

use App\Http\Controllers\Backend\AdminController;
use App\Http\Controllers\Backend\ProfileController;
use Illuminate\Support\Facades\Route;

// admin dashboard route
Route::get('dashboard', [AdminController::class, 'dashboard'])->name('dashboard');

// profile route
Route::get('profile', [ProfileController::class, 'index'])->name('profile');

// update profile route
Route::post('profile/update', [ProfileController::class, 'updateProfile'])->name('profile.update');

Route::post('profile/update/password', [ProfileController::class, 'updatePassword'])->name('password.update');


