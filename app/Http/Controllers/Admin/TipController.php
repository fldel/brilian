<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Tip;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TipController extends Controller
{
    public function index()
    {
        $tips = Tip::with('user')->latest()->get();
        return view('admin.tips.index', compact('tips'));
    }

    public function create()
    {
        return view('admin.tips.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
            'link' => 'nullable|url|max:255', // ✅ Validasi tambahan
        ]);

        $imagePath = null;
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('tips', 'public');
        }

        Tip::create([
            'title' => $validated['title'],
            'content' => $validated['content'],
            'user_id' => Auth::id(),
            'image' => $imagePath,
            'link' => $validated['link'] ?? null, // ✅ Simpan link
        ]);

        return redirect()->route('admin.tips.index')->with('success', 'Tip created successfully!');
    }

    public function destroy($id)
    {
        $tip = Tip::findOrFail($id);
        $tip->delete();

        return redirect()->route('admin.tips.index')->with('success', 'Tip deleted successfully!');
    }
    
        public function publicTips()
    {
        $tips = \App\Models\Tip::latest()->get();
        return view('tips', compact('tips'));
    }
}
