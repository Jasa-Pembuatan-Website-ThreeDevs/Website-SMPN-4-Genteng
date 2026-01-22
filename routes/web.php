<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\PpdbController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\FacilityController;
use App\Http\Controllers\AchievementController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/ppdb', function() {
    return view('components.form-ppdb');
});

Route::get('/visi-misi', function() {
    return view('pages.visimisi');
});

Route::get('/kepala-sekolah', function() {
    return view('pages.kepala-sekolah');
});

Route::get('/dudika', function() {
    return view('pages.dudika');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth', 'admin')->group(function () {
    Route::resource('/admin/posts', PostController::class);
    Route::get('/admin/ppdb', [PpdbController::class, 'index']);
    Route::resource('facilities', FacilityController::class);
    Route::resource('achievements', AchievementController::class);
    Route::resource('posts', PostController::class);
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
}); 
Route::get('/fasilitas', function () {
    return view('pages.fasilitas');
});

require __DIR__.'/auth.php';
