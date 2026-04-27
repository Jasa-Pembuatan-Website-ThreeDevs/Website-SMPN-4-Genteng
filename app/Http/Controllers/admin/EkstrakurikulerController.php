<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Ekstrakurikuler;
use App\Models\User; // To get the list of teachers
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage; // For image handling

class EkstrakurikulerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $ekstrakurikuler = Ekstrakurikuler::latest()->get();
        return view('admin.ekstrakurikuler.index', compact('ekstrakurikuler'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.ekstrakurikuler.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'          => 'required|string|max:255',
            'description'   => 'nullable|string',
            'image'         => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $imagePath = null;
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('ekstrakurikuler_images', 'public');
        }

        Ekstrakurikuler::create([
            'name'          => $request->name,
            'description'   => $request->description,
            'image'         => $imagePath,
        ]);

        return redirect()->route('admin.ekstrakurikulers.index')
            ->with('success', 'Ekstrakurikuler berhasil ditambahkan!');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Ekstrakurikuler $ekstrakurikuler)
    {
        return view('admin.ekstrakurikuler.edit', compact('ekstrakurikuler'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Ekstrakurikuler $ekstrakurikuler)
    {
        $request->validate([
            'name'          => 'required|string|max:255',
            'description'   => 'nullable|string',
            'image'         => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $imagePath = $ekstrakurikuler->image;
        if ($request->hasFile('image')) {
            // Delete old image if exists
            if ($ekstrakurikuler->image) {
                \Illuminate\Support\Facades\Storage::disk('public')->delete($ekstrakurikuler->image);
            }
            $imagePath = $request->file('image')->store('ekstrakurikuler_images', 'public');
        }

        $ekstrakurikuler->update([
            'name'          => $request->name,
            'description'   => $request->description,
            'image'         => $imagePath,
        ]);

        return redirect()->route('admin.ekstrakurikulers.index')
            ->with('success', 'Ekstrakurikuler berhasil diperbarui!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Ekstrakurikuler $ekstrakurikuler)
    {
        if ($ekstrakurikuler->image) {
            \Illuminate\Support\Facades\Storage::disk('public')->delete($ekstrakurikuler->image);
        }
        $ekstrakurikuler->delete();

        return redirect()->route('admin.ekstrakurikulers.index')
            ->with('success', 'Ekstrakurikuler berhasil dihapus.');
    }

    public function view() 
    {
        $ekstrakurikuler = Ekstrakurikuler::all();
        return view('pages.ekskul', compact('ekstrakurikuler'));
    }
}
