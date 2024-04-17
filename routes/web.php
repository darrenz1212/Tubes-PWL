<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\pollController;
use App\Http\Controllers\pollResultController;
use App\Http\Controllers\updateDeleteController;
use App\Http\Controllers\adminController;
use Illuminate\Support\Facades\Route;

// Routes for Guest Users
Route::get('/', function () {
    return view('auth.login');
});

// Routes for Authenticated Users
Route::middleware(['auth', 'verified'])->group(function () {

    // Dashboard Routes
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    // Dashboard for Prodi
    Route::get('/prodi', function () {
        return view('dashboardProdi');
    })->name('prodi');

    // Profile Routes
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Poll Routes
    Route::get('/poll', [pollController::class, 'index'])->name('poll');
    Route::post('/poll', [pollController::class, 'createPoll'])->name('create-poll');

    // Poll Result Route
    Route::get('/pollResult', [pollResultController::class, 'index'])->name('pollResult');

    // Add MK (Mata Kuliah) Routes
    Route::get('/addmk', [\App\Http\Controllers\MKController::class, 'index'])->name('addMK');
    Route::post('/addmk', [\App\Http\Controllers\MKController::class, 'store'])->name('mata-kuliah.store');

    // Update and Delete Routes
    Route::get('/updateDelete', [updateDeleteController::class, 'index'])->name('updateDelete');
    Route::delete('/updateDelete/{user}', [updateDeleteController::class, 'destroy'])->name('updateDelete.destroy');
    Route::put('/updateDelete/{user}', [updateDeleteController::class, 'update'])->name('userUpdate');

    // Admin Dashboard Route
    Route::get('/admin', [adminController::class, 'index'])->name('admin');
    Route::get('/registerUser', [adminController::class, 'registerUser'])->name('registerUser');
});

// Auth Routes
require __DIR__.'/auth.php';
