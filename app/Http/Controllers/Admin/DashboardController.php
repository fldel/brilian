<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Scholarship;

class AdminDashboardController extends Controller
{
    public function index()
    {
        // Hitung jumlah user
        $userCount = User::where('role', 'user')->count();

        // Hitung total scholarship
        $scholarshipCount = Scholarship::count();

        // Ambil 5 scholarship terbaru
        $latestScholarships = Scholarship::with('categories', 'user')
            ->orderBy('created_at', 'desc')
            ->take(5)
            ->get();

        return view('admin.dashboard', compact(
            'userCount',
            'scholarshipCount',
            'latestScholarships'
        ));
    }
}
