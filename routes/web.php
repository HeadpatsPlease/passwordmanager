<?php

use App\Http\Controllers\passwordmanagerController;
use App\Http\Controllers\ProfileController;
use App\Models\savedAccount;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', [passwordmanagerController::class, 'getAccounts'])->middleware(['auth', 'verified'])->name('dashboard');
Route::post('/dashboard', [passwordmanagerController::class,'getAccounts'])->middleware(['auth', 'verified'])->name('dashboard.load');
Route::post('/dashboard', [passwordmanagerController::class,'addAccount'])->name('dashboard.add');
Route::post('/dashboard/update', [passwordmanagerController::class,'updateAccount'])->name('dashboard.update');
Route::post('/dashboard/delete', [passwordmanagerController::class,'deleteAccounts'])->name('dashboard.delete');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
