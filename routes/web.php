<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\pollController;
use App\Http\Controllers\pollResultController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('index',function (){
   return view('index') ;
})->middleware(['auth','verified'])->name('prodi');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/poll', [pollController::class, 'index'])->name('poll');
require __DIR__.'/auth.php';
Route::get('/pollResult', [pollResultController::class, 'index'])->name('pollResult');
require __DIR__.'/auth.php';

require __DIR__.'/auth.php';
