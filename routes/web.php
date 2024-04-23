<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\pollController;
use App\Http\Controllers\pollResultController;
use App\Http\Controllers\updateDeleteController;
use App\Http\Controllers\adminController;
use App\Http\Controllers\unauthorizedController;
use App\Http\Controllers\matkulFixController;
use Illuminate\Support\Facades\Route;
use App\Http\Middleware\Mahasiswa;
use App\Http\Middleware\Prodi;
use App\Http\Middleware\Admin;

Route::get('/', function () {
    return view('auth.login');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware(['auth',Mahasiswa::class])->group(function (){
    Route::get('/poll', [pollController::class, 'index'])->name('poll');
    Route::post('/poll',[pollController::class,'createPoll'])->name('create-poll');
    Route::get('/mypoll',[pollController::class,'showPoll'])->name('my-poll');
});

Route::middleware(['auth',Prodi::class])->group(function (){
    Route::get('/pollResult', [pollResultController::class, 'index'])->name('pollResult');
    Route::post('/pollResult', [pollResultController::class, 'addMatkul'])->name('store-mk');
    Route::get('/addmk',[\App\Http\Controllers\MKController::class,'index'])->name('addMK');
    Route::get('/delmk',[\App\Http\Controllers\MKController::class,'indexDelete'])->name('delMK');
    Route::post('/addmk',[\App\Http\Controllers\MKController::class,'store'])->name('mata-kuliah.store');
    Route::delete('/delmk', [\App\Http\Controllers\MKController::class, 'deleteMk'])->name('delete-mk');
    Route::get('/showpoll',[pollResultController::class,'showPoll'])->name('show-poll');
});


Route::middleware(['auth',Admin::class])->group(function (){
    Route::get('/updateDelete', [updateDeleteController::class, 'index'])->name('updateDelete');
    Route::delete('/delete/{user}', [updateDeleteController::class, 'destroy'])->name('updateDelete.destroy');
    Route::get('/update/{user}', [updateDeleteController::class, 'showUpdate'])->name('userUpdate');
    Route::put('/update/{user}', [updateDeleteController::class, 'update'])->name('update');
    Route::get('/admin', [adminController::class, 'index'])->name('admin');
    Route::get('/registerUser', [adminController::class, 'registerUser'])->name('registerUser');
    Route::post('/registerUser',[adminController::class, 'store'])->name('storeUser');
});

Route::get('/matkulFix', [matkulFixController::class, 'index'])->name('matkulFix');
Route::get('/unauthorized', [unauthorizedController::class, 'index'])->name('unauthorized');


require __DIR__.'/auth.php';
