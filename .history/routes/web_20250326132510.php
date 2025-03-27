<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\users\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');


Route::middleware(['auth', 'admin'])->prefix('admin')->group(function(){


    

});

Route::get('/admin', function () {
    return view('admin');
})->middleware(['auth', 'verified'])->name('admin'); //programar para que solamente los administradores puedan entrar aqui

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


Route::resource('users', UserController::class)->names('users');

require __DIR__.'/auth.php';
