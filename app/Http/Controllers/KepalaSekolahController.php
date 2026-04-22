<?php

namespace App\Http\Controllers;

use App\Models\KepalaSekolah;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class KepalaSekolahController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $kepalaSekolahs = KepalaSekolah::latest()->get();
        return view('admin.kepala-sekolah.index', compact('kepalaSekolahs'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.kepala-sekolah.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'name'          => 'required|string|max:255',
            'major'         => 'nullable|string|max:255',
            'position'      => 'required|string|max:255',
            'image'         => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'bio_short'     => 'nullable|string',
            'education'     => 'nullable|string|max:255',
            'certification' => 'nullable|string|max:255',
            'period'        => 'nullable|string|max:255',
            'email'         => 'nullable|email|max:255',
            'biography'     => 'nullable|string',
            'quote'         => 'nullable|string',
            'is_active'     => 'nullable|boolean',
        ]);

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('kepala-sekolah', 'public');
        }

        $data['is_active'] = $request->has('is_active') ? true : false;

        // If this one is active, deactivate others (optional, depending on requirement)
        if ($data['is_active']) {
            KepalaSekolah::where('is_active', true)->update(['is_active' => false]);
        }

        KepalaSekolah::create($data);

        $prefix = auth()->user()->role === 'administrator' ? 'admin' : auth()->user()->role;
        return redirect()->route($prefix . '.kepala-sekolah.index')->with('success', 'Data Kepala Sekolah berhasil ditambahkan');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(KepalaSekolah $kepalaSekolah)
    {
        return view('admin.kepala-sekolah.edit', compact('kepalaSekolah'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, KepalaSekolah $kepalaSekolah)
    {
        $data = $request->validate([
            'name'          => 'required|string|max:255',
            'major'         => 'nullable|string|max:255',
            'position'      => 'required|string|max:255',
            'image'         => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'bio_short'     => 'nullable|string',
            'education'     => 'nullable|string|max:255',
            'certification' => 'nullable|string|max:255',
            'period'        => 'nullable|string|max:255',
            'email'         => 'nullable|email|max:255',
            'biography'     => 'nullable|string',
            'quote'         => 'nullable|string',
            'is_active'     => 'nullable|boolean',
        ]);

        if ($request->hasFile('image')) {
            if ($kepalaSekolah->image && Storage::disk('public')->exists($kepalaSekolah->image)) {
                Storage::disk('public')->delete($kepalaSekolah->image);
            }
            $data['image'] = $request->file('image')->store('kepala-sekolah', 'public');
        }

        $data['is_active'] = $request->has('is_active') ? true : false;

        if ($data['is_active']) {
            KepalaSekolah::where('id', '!=', $kepalaSekolah->id)->update(['is_active' => false]);
        }

        $kepalaSekolah->update($data);

        $prefix = auth()->user()->role === 'administrator' ? 'admin' : auth()->user()->role;
        return redirect()->route($prefix . '.kepala-sekolah.index')->with('success', 'Data Kepala Sekolah berhasil diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(KepalaSekolah $kepalaSekolah)
    {
        if ($kepalaSekolah->image && Storage::disk('public')->exists($kepalaSekolah->image)) {
            Storage::disk('public')->delete($kepalaSekolah->image);
        }
        $kepalaSekolah->delete();
        return back()->with('success', 'Data Kepala Sekolah berhasil dihapus');
    }

    public function publicShow()
    {
        $kepalaSekolah = KepalaSekolah::where('is_active', true)->first();

        // If none active, get the latest one
        if (!$kepalaSekolah) {
            $kepalaSekolah = KepalaSekolah::latest()->first();
        }

        if (!$kepalaSekolah) {
            // Fallback or return the hardcoded view if no data in DB yet
            return view('pages.kepala-sekolah');
        }

        return view('pages.kepala-sekolah', compact('kepalaSekolah'));
    }
}
