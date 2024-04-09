<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\pollController;
use App\Http\Controllers\pollResultController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('auth.login');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/prodi',function (){
    return view('dashboardProdi') ;
})->middleware(['auth','verified'])->name('prodi');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/poll', [pollController::class, 'index'])->name('poll');
Route::post('/poll',[pollController::class,'createPoll'])->name('create-poll');
Route::get('/pollResult', [pollResultController::class, 'index'])->name('pollResult');

Route::get('/addmk',[\App\Http\Controllers\MKController::class,'index'])->name('addMK');
Route::post('/addmk',[\App\Http\Controllers\MKController::class,'store'])->name('mata-kuliah.store');
require __DIR__.'/auth.php';

