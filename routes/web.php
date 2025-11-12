<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Admin\ScholarshipController;
use App\Http\Controllers\Admin\TipController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\SettingsController;
use App\Http\Controllers\BookmarkController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Models\Scholarship;
use App\Models\User;
use App\Http\Middleware\AdminMiddleware;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

// =================== HALAMAN UMUM ===================
Route::get('/', function () {
    return view('welcome');
});

Route::get('/about', fn() => view('about'))->name('about');
Route::get('/tips', [TipController::class, 'publicTips'])->name('tips');

// =================== DASHBOARD USER ===================
Route::get('/dashboard', function () {
    $user = Auth::user();

    // Jika admin → arahkan ke dashboard admin
    if ($user && $user->role === 'admin') {
        return redirect('/admin/dashboard');
    }

    // Ambil data beasiswa acak untuk user biasa
    $scholarships = Scholarship::inRandomOrder()->take(15)->get();
    return view('dashboard', compact('scholarships'));
})->middleware(['auth', 'verified'])->name('dashboard');

// =================== PROFIL ===================
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// =================== BOOKMARK (FITUR BARU) ===================
Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/bookmark', [BookmarkController::class, 'index'])->name('bookmark.index');
    Route::post('/bookmark/{scholarshipId}/toggle', [BookmarkController::class, 'toggle'])->name('bookmark.toggle');
});


// =================== ADMIN ROUTES ===================
Route::middleware(['auth', 'verified', AdminMiddleware::class])->group(function () {
    // Dashboard admin
    Route::get('/admin/dashboard', function () {
        $scholarshipCount = Scholarship::count();
        $userCount = User::count();
        $latestScholarships = Scholarship::latest()->take(5)->get();

        return view('admin.dashboard', compact('scholarshipCount', 'userCount', 'latestScholarships'));
    })->name('admin.dashboard');

    // Resource routes untuk kelola data admin
    Route::prefix('admin')->name('admin.')->group(function () {
        Route::resource('scholarships', ScholarshipController::class);
        Route::resource('tips', TipController::class);
        Route::resource('users', UserController::class);
        Route::get('/settings', [SettingsController::class, 'index'])->name('settings');
    });
});

require __DIR__ . '/auth.php';
