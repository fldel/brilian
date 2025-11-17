<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Bookmark;
use Illuminate\Support\Facades\Auth;

class BookmarkController extends Controller
{
    public function index()
    {
        $bookmarks = Bookmark::where('user_id', Auth::id())
            ->with('scholarship')
            ->get();

        return view('bookmarks', compact('bookmarks'));
    }

    public function toggle(Request $request, $scholarshipId)
    {
        // Jika hanya cek status (AJAX)
        if ($request->has('check')) {
            $exists = Bookmark::where('user_id', Auth::id())
                ->where('scholarship_id', $scholarshipId)
                ->exists();

            return response()->json(['status' => $exists ? 'exists' : 'none']);
        }

        // Toggle
        $bookmark = Bookmark::where('user_id', Auth::id())
            ->where('scholarship_id', $scholarshipId)
            ->first();

        if ($bookmark) {
            $bookmark->delete();
            $status = 'removed';
        } else {
            Bookmark::create([
                'user_id' => Auth::id(),
                'scholarship_id' => $scholarshipId,
            ]);
            $status = 'added';
        }

        // Jika AJAX → balikan JSON
        if ($request->expectsJson()) {
            return response()->json(['status' => $status]);
        }

        // FORM biasa → redirect balik + toast success
        return redirect()->back()->with('success', $status === 'removed'
            ? 'Bookmark deleted successfully.'
            : 'Bookmark added successfully.');
    }
}
