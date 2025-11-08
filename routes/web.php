<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Models\Scholarship;
use App\Models\User;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    $user = Auth::user();

    // Periksa role pengguna dan arahkan ke dashboard yang sesuai
    if ($user->role === 'admin') {
        return redirect('/admin/dashboard'); // Admin diarahkan ke dashboard admin
    }

    return view('dashboard'); // User biasa diarahkan ke dashboard user
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/about', fn() => view('about'))->name('about');
Route::get('/bookmark', fn() => view('bookmarks'))->name('bookmark');
Route::get('/tips', fn() => view('tips'))->name('tips');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

use App\Http\Controllers\Admin\ScholarshipController;
use App\Http\Controllers\Admin\TipController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\SettingsController;
use App\Http\Middleware\AdminMiddleware;

Route::middleware(['auth', 'verified', AdminMiddleware::class])->group(function () {
    Route::get('/admin/dashboard', function () {
        $scholarshipCount = Scholarship::count(); // Hitung jumlah beasiswa
        $userCount = User::count(); // Hitung jumlah pengguna
        $latestScholarships = Scholarship::latest()->take(5)->get(); // Ambil 5 beasiswa terbaru

        return view('admin.dashboard', compact('scholarshipCount', 'userCount', 'latestScholarships'));
    })->name('admin.dashboard');

    Route::prefix('admin')->name('admin.')->group(function () {
        Route::resource('scholarships', ScholarshipController::class);
        Route::resource('tips', TipController::class);
        Route::resource('users', UserController::class);

        // Tambahkan route untuk settings
        Route::get('/settings', [SettingsController::class, 'index'])->name('settings');
    });
});

require __DIR__.'/auth.php';
