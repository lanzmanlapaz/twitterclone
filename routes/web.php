<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('index');
});

Route::get('/home', [PostController::class, 'index'])->middleware(['auth', 'verified'])->name('home');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::patch('/profile/address', [ProfileController::class, 'updateAddress'])->name('profile.update.address');
    Route::patch('/profile/picture', [ProfileController::class, 'updateProfilePicture'])->name('profile.picture.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::post('/post', [PostController::class, 'store'])->name('post.store');
Route::get('/post/{id}', [PostController::class, 'show'])->name('post.view');
Route::delete('/post/{post}', [PostController::class, 'destroy'])->name('post.destroy');

require __DIR__.'/auth.php';