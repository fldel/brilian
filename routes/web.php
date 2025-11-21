<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Admin\ScholarshipController;
use App\Http\Controllers\Admin\TipController;
use App\Http\Controllers\Admin\UserController;
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
Route::get('/dashboard', [ScholarshipController::class, 'dashboard'])
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

// =================== PROFIL ===================
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// =================== BOOKMARK ===================
Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/bookmark', [BookmarkController::class, 'index'])->name('bookmark.index');
    Route::post('/bookmark/{scholarshipId}/toggle', [BookmarkController::class, 'toggle'])->name('bookmark.toggle');
});

// =================== ADMIN ROUTES ===================
Route::middleware(['auth', 'verified', AdminMiddleware::class])->group(function () {

    Route::get('/admin/dashboard', function () {

        // Basic Stats
        $scholarshipCount = Scholarship::count();
        $userCount = User::count();
        $latestScholarships = Scholarship::latest()->take(5)->get();

        // ================= ANALYTICS DATA =================

        // 1. User Growth (Users per month)
        $usersPerMonth = User::selectRaw('MONTH(created_at) as month, COUNT(*) as total')
            ->groupBy('month')
            ->pluck('total', 'month');

        // 2. Scholarship Status (Open / Closed)
        $openCount = Scholarship::where('is_available', 1)->count();
        $closedCount = Scholarship::where('is_available', 0)->count();

        // 3. Category Distribution
        $categoryData = Scholarship::selectRaw('category, COUNT(*) as total')
            ->groupBy('category')
            ->pluck('total', 'category');


        return view('admin.dashboard', compact(
            'scholarshipCount',
            'userCount',
            'latestScholarships',
            'usersPerMonth',
            'openCount',
            'closedCount',
            'categoryData'
        ));
    })->name('admin.dashboard');

    // CRUD Admin
    Route::prefix('admin')->name('admin.')->group(function () {
        Route::resource('scholarships', ScholarshipController::class);
        Route::resource('tips', TipController::class);
        Route::resource('users', UserController::class);
    });
});

require __DIR__ . '/auth.php';
