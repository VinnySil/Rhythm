<?php

use App\Http\Controllers\admin\DashboardController;
use App\Http\Controllers\ArtistRequestController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\users\UserController;
use App\Http\Middleware\AdminMiddleware;
use App\Models\ArtistRequest;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
})->name('home');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/songs/{artist_request}/stream', [ArtistRequestController::class, 'streamSong'])->name('artist-request.stream');

Route::middleware(['auth', AdminMiddleware::class])->prefix('admin')->group(function(){
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');

    Route::resource('users', UserController::class)->names('users');

    Route::resource('artist-requests', ArtistRequestController::class)->except(['create', 'update', 'store', 'edit'])->names('artistRequests');

    Route::patch('/request/{artist_request}/accept', [ArtistRequestController::class, 'acceptRequest'])->name('artist.request.accept');
    Route::patch('/request/{artist_request}/reject', [ArtistRequestController::class, 'rejectRequest'])->name('artist.request.reject');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    

    //ruta para los request de artistas
    Route::get('/request-artist', [ArtistRequestController::class, 'formRequest'])->name('artist.request.form');
    Route::post('/request-artist', [ArtistRequestController::class, 'submitRequest'])->name('artist.request.submit');
    Route::get('/request-artist/success', [ArtistRequestController::class, 'successPage'])->name('artist.request.success');
});

require __DIR__.'/auth.php';
    