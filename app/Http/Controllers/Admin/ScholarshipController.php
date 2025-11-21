<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Scholarship;
use Illuminate\Support\Facades\DB;

class ScholarshipController extends Controller
{
    /**
     * Display a listing of the scholarships.
     */
    public function index()
    {
        $scholarships = Scholarship::latest()->get();
        return view('admin.scholarships.index', compact('scholarships'));
    }

    /**
     * Show the form for creating a new scholarship.
     */
    public function create()
    {
        return view('admin.scholarships.create');
    }

    /**
     * Store a newly created scholarship in storage.
     */
    public function store(Request $request)
    {
        // Validasi data yang dikirimkan dari form
        $request->validate([
            'name'        => 'required|string|max:255',
            'description' => 'required|string',
            'image'       => 'nullable|image|mimes:jpg,jpeg,png,gif,svg|max:5120',
            'link'        => 'required|url',
            'is_available'=> 'required|boolean',
            'start_date'  => 'required|date',
            'end_date'    => 'required|date|after_or_equal:start_date',
            'category'    => 'required|in:d1,d2,d3,d4,s1,s2,s3',
        ]);

        // Proses upload gambar jika ada
        $imagePath = $request->hasFile('image')
            ? $request->file('image')->store('scholarships', 'public')
            : null;

        // Simpan data ke tabel scholarships
        DB::beginTransaction();
        try {
            Scholarship::create([
                'name'        => $request->name,
                'description' => $request->description,
                'image'       => $imagePath,
                'link'        => $request->link,
                'is_available'=> $request->is_available,
                'start_date'  => $request->start_date,
                'end_date'    => $request->end_date,
                'category'    => $request->category,
            ]);

            DB::commit();
            return redirect()
                ->route('admin.scholarships.index')
                ->with('success', 'Scholarship created successfully!');
        } catch (\Exception $e) {
            DB::rollBack();
            return back()->withErrors(['error' => 'Failed to save scholarship: ' . $e->getMessage()]);
        }
    }

    /**
     * Display the specified scholarship.
     */
    public function show(Scholarship $scholarship)
    {
        return view('admin.scholarships.show', compact('scholarship'));
    }

    /**
     * Show the form for editing the specified scholarship.
     */
    public function edit(Scholarship $scholarship)
    {
        return view('admin.scholarships.edit', compact('scholarship'));
    }

    /**
     * Update the specified scholarship in storage.
     */
    public function update(Request $request, Scholarship $scholarship)
    {
        // Validasi data yang dikirimkan dari form
        $request->validate([
            'name'        => 'required|string|max:255',
            'description' => 'required|string',
            'image'       => 'nullable|image|mimes:jpg,jpeg,png,gif,svg|max:5120',
            'link'        => 'required|url',
            'is_available'=> 'required|boolean',
            'start_date'  => 'required|date',
            'end_date'    => 'required|date|after_or_equal:start_date',
            'category'    => 'required|in:d1,d2,d3,d4,s1,s2,s3',
        ]);

        // Proses upload gambar jika ada
        $imagePath = $request->hasFile('image')
            ? $request->file('image')->store('scholarships', 'public')
            : $scholarship->image;

        // Update data di tabel scholarships
        DB::beginTransaction();
        try {
            $scholarship->update([
                'name'        => $request->name,
                'description' => $request->description,
                'image'       => $imagePath,
                'link'        => $request->link,
                'is_available'=> $request->is_available,
                'start_date'  => $request->start_date,
                'end_date'    => $request->end_date,
                'category'    => $request->category,
            ]);

            DB::commit();
            return redirect()
                ->route('admin.scholarships.index')
                ->with('success', 'Scholarship updated successfully!');
        } catch (\Exception $e) {
            DB::rollBack();
            return back()->withErrors(['error' => 'Failed to update scholarship: ' . $e->getMessage()]);
        }
    }

    /**
     * Remove the specified scholarship from storage.
     */
    public function destroy(Scholarship $scholarship)
    {
        try {
            $scholarship->delete();
            return redirect()
                ->route('admin.scholarships.index')
                ->with('success', 'Scholarship deleted successfully!');
        } catch (\Exception $e) {
            return back()->withErrors(['error' => 'Failed to delete scholarship: ' . $e->getMessage()]);
        }
    }

    /**
     * Display the scholarship dashboard.
     */
/**
 * Display the scholarship dashboard for users (with search).
 */
public function dashboard(Request $request)
{
    $query = Scholarship::query();

    // Search text
    if ($request->filled('search')) {
        $search = strtolower($request->search);

        $query->where(function ($q) use ($search) {
            $q->whereRaw('LOWER(name) LIKE ?', ["%{$search}%"])
              ->orWhereRaw('LOWER(description) LIKE ?', ["%{$search}%"])
              ->orWhereRaw('LOWER(category) LIKE ?', ["%{$search}%"]);
        });
    }

    // Recommended random (15)
    $recommended = Scholarship::inRandomOrder()->take(15)->get();

    // Main list (filtered)
    $scholarships = $query->get();

    return view('dashboard', compact('recommended', 'scholarships'));
}

}