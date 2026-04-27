<?php

namespace App\Http\Controllers;

use App\Models\Teacher;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class TeacherController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $teachers = Teacher::latest()->get();
        return view('admin.teacher.index', compact('teachers'));
    }

    public function publicIndex()
    {
        $teachers = Teacher::orderBy('full_name')->get();
        return view('pages.teachers', compact('teachers'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.teacher.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
            'full_name' => 'required|string|max:255',
            'nip' => 'nullable|string|max:50',
            'subject_specialization' => 'required|string|max:100',
            'description' => 'nullable|string',
        ]);

        if ($request->hasFile('image')) {
            $file = $request->file('image');

            $filename = time() . '_' . $file->getClientOriginalName();

            $path = $file->storeAs('teachers', $filename, 'public');

            $validated['image'] = $path; // simpan: teachers/namafile.jpg
        }

        Teacher::create($validated);

        $prefix = auth()->user()->role === 'administrator' ? 'admin' : auth()->user()->role;
        return redirect()->route($prefix . '.teacher.index')->with('success', 'Data guru atau karyawan berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(Teacher $teacher)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Teacher $teacher)
    {
        return view('admin.teacher.edit', compact('teacher'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Teacher $teacher)
    {
        $validated = $request->validate([
            'image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
            'full_name' => 'required|string|max:255',
            'nip' => 'nullable|string|max:50',
            'subject_specialization' => 'required|string|max:100',
            'description' => 'nullable|string',
        ]);

        if ($request->hasFile('image')) {
            // hapus lama
            if ($teacher->image) {
                Storage::disk('public')->delete($teacher->image);
            }

            $file = $request->file('image');
            $filename = time() . '_' . $file->getClientOriginalName();

            $path = $file->storeAs('teachers', $filename, 'public');

            $validated['image'] = $path;
        }

        $teacher->update($validated);

        $prefix = auth()->user()->role === 'administrator' ? 'admin' : auth()->user()->role;

        return redirect()->route($prefix . '.teacher.index')
            ->with('success', 'Data guru berhasil diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Teacher $teacher)
    {
        if ($teacher->image && Storage::disk('public')->exists($teacher->image)) {
            Storage::disk('public')->delete($teacher->image);
        }
        $teacher->delete();
        return back()->with('success', 'Data guru atau karyawan berhasil dihapus');
    }
}
