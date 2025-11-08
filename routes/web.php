<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Models\Scholarship;
use App\Models\User;
use App\Http\Controllers\Admin\ScholarshipController;
use App\Http\Controllers\Admin\TipController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\SettingsController;
use App\Http\Middleware\AdminMiddleware;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    $user = Auth::user();

    if ($user->role === 'admin') {
        return redirect('/admin/dashboard');
    }

    // Ambil data beasiswa untuk user biasa
    $scholarships = Scholarship::inRandomOrder()->take(15)->get();

    return view('dashboard', compact('scholarships'));
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/about', fn() => view('about'))->name('about');
Route::get('/bookmark', fn() => view('bookmarks'))->name('bookmark');
Route::get('/tips', fn() => view('tips'))->name('tips');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware(['auth', 'verified', AdminMiddleware::class])->group(function () {
    Route::get('/admin/dashboard', function () {
        $scholarshipCount = Scholarship::count();
        $userCount = User::count();
        $latestScholarships = Scholarship::latest()->take(5)->get();

        return view('admin.dashboard', compact('scholarshipCount', 'userCount', 'latestScholarships'));
    })->name('admin.dashboard');

    Route::prefix('admin')->name('admin.')->group(function () {
        Route::resource('scholarships', ScholarshipController::class);
        Route::resource('tips', TipController::class);
        Route::resource('users', UserController::class);
        Route::get('/settings', [SettingsController::class, 'index'])->name('settings');
    });
});

require __DIR__ . '/auth.php';
