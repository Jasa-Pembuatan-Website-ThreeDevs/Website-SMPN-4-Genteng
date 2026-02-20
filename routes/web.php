<?php

use App\Http\Controllers\AchievementController;
use App\Http\Controllers\admin\EkstrakurikulerController;
use App\Http\Controllers\admin\PpdbBatchController;
use App\Http\Controllers\AnnouncementController;
use App\Http\Controllers\FacilityController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\PpdbController;
use App\Http\Controllers\ProfileController;

use App\Models\Achievement;
use App\Models\Facility;
use App\Models\Post;
use App\Models\PpdbBatch;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    $today = \Carbon\Carbon::today();
    $activeBatch = PpdbBatch::where('is_active', true)
        ->whereDate('start_date', '<=', $today)
        ->whereDate('end_date', '>=', $today)
        ->first();
    
    $posts = Post::latest()->take(3)->get();
    $facilities = Facility::all();
    $achievements = Achievement::latest()->take(4)->get();
    $announcements = \App\Models\Announcement::where('status', 'publish')->latest()->take(5)->get();

    $ekstrakurikuler = \App\Models\Ekstrakurikuler::all();
    return view('welcome', compact('activeBatch', 'posts', 'facilities', 'achievements', 'ekstrakurikuler', 'announcements'));
});

Route::get('/visi-misi', function() {
    return view('pages.visimisi');
});

Route::get('/kepala-sekolah', function() {
    return view('pages.kepala-sekolah');
});

Route::get('/uks', function () {
    return view('pages.uks');
});

Route::get('/bk', function () {
    return view('pages.bk');
});

Route::get('/dudika', function() {
    return view('pages.dudika');
});
// PPDB Registration dashboard and export
Route::get('/dashboard/ppdb-registrations', [App\Http\Controllers\PpdbRegistrationController::class, 'index'])->name('ppdb_registrations.index');
Route::get('/dashboard/ppdb-registrations/export', [App\Http\Controllers\PpdbRegistrationController::class, 'export'])->name('ppdb_registrations.export');
Route::get('/dashboard/ppdb-registrations/export-word', [App\Http\Controllers\PpdbRegistrationController::class, 'exportWord'])->name('ppdb_registrations.export_word');

Route::get('/ppdb', [PpdbController::class, 'create'])->name('ppdb.register');
Route::post('/ppdb', [PpdbController::class, 'store'])->name('ppdb.store');
Route::get('/ppdb/success/{id}', [PpdbController::class, 'success'])->name('ppdb.success');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware(['auth', 'administrator'])
    ->name('admin.')
    ->prefix('admin')
    ->group(function () {
        Route::resource('/posts', PostController::class);
        Route::resource('/facilities', FacilityController::class);
        Route::resource('/achievements', AchievementController::class);
        Route::resource('/ppdb-batches', PpdbBatchController::class);
        Route::resource('/ekstrakurikulers', EkstrakurikulerController::class);
        Route::resource('/announcements', AnnouncementController::class);

    });

Route::middleware(['auth', 'teacher'])
    ->name('teacher.')
    ->prefix('teacher')
    ->group(function () {
        Route::resource('/facilities', FacilityController::class);
        Route::resource('/achievements', AchievementController::class);
    });

Route::middleware(['auth', 'officer'])
    ->name('officer.')
    ->prefix('officer')
    ->group(function () {
        Route::resource('/posts', PostController::class);
        Route::resource('/ppdb-batches', PpdbBatchController::class);
    });

Route::resource('achievements', AchievementController::class);

Route::get('/ekstrakurikuler/view', [EkstrakurikulerController::class, 'view'])->name('ekskul.view');
Route::get('/fasilitas', [FacilityController::class, 'publicIndex'])->name('facilities.view');
Route::get('/berita', [PostController::class, 'publicIndex'])->name('posts.public.index');
Route::get('/berita/{post:slug}', [PostController::class, 'show'])->name('posts.public.show');

require __DIR__.'/auth.php';
