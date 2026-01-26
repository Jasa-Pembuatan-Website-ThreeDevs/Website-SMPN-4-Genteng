<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\PpdbController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\FacilityController;
use App\Http\Controllers\AchievementController;
use App\Http\Controllers\admin\PpdbBatchController;

use App\Models\PpdbBatch;
use App\Models\Post;
use App\Models\Facility;
use App\Models\Achievement;

Route::get('/', function () {
    $today = \Carbon\Carbon::today();
    $activeBatch = PpdbBatch::where('is_active', true)
        ->whereDate('start_date', '<=', $today)
        ->whereDate('end_date', '>=', $today)
        ->first();
    
    $posts = Post::latest()->take(3)->get();
    $facilities = Facility::all();
    $achievements = Achievement::latest()->take(4)->get();

    return view('welcome', compact('activeBatch', 'posts', 'facilities', 'achievements'));
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

Route::get('/ppdb', [PpdbController::class, 'create'])->name('ppdb.register');
Route::post('/ppdb', [PpdbController::class, 'store'])->name('ppdb.store');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware('auth', 'admin')
    ->name('admin.')
    ->group(function () {
    Route::resource('/admin/posts', PostController::class);
    Route::resource('/admin/facilities', FacilityController::class);
    Route::resource('/admin/achievements', AchievementController::class);
    Route::resource('/admin/ppdb-batches', PpdbBatchController::class);
});

Route::resource('achievements', AchievementController::class);

Route::get('/fasilitas', [FacilityController::class, 'publicIndex']);
Route::get('/berita', [PostController::class, 'publicIndex'])->name('posts.public.index');
Route::get('/berita/{post:slug}', [PostController::class, 'show'])->name('posts.public.show');

require __DIR__.'/auth.php';
