<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

class AdminManageController extends Controller
{
    public function index()
    {
        return view('admin.settings');
    }
}
