<?php

namespace App\Http\Controllers;

use App\Models\Achievement;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AchievementController extends Controller
{
    /**
     * Display a listing of the resource.
     */
   public function index()
{
    $achievements = Achievement::orderBy('year', 'desc')->paginate(10);

    $years = Achievement::select('year')
        ->distinct()
        ->orderBy('year', 'desc')
        ->pluck('year');

    return view('achievement.index', compact('achievements', 'years'));
}


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('achievement.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'level' => 'required|string',
            'year' => 'required|integer',
            'description' => 'nullable',
            'image' => 'nullable|image|max:2048'
        ]);

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('achievements', 'public');
        }

        Achievement::create($data);

        return redirect()->route('achievements.index')
            ->with('success', 'Prestasi berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Achievement $achievement)
    {
        return view('achievement.edit', compact('achievement'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Achievement $achievement)
    {
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'level' => 'required|string',
            'year' => 'required|integer',
            'description' => 'nullable',
            'image' => 'nullable|image|max:2048'
        ]);

        if ($request->hasFile('image')) {
            if ($achievement->image) {
                Storage::disk('public')->delete($achievement->image);
            }
            $data['image'] = $request->file('image')->store('achievements', 'public');
        }

        $achievement->update($data);

        return redirect()->route('achievements.index')
            ->with('success', 'Prestasi berhasil diperbarui');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Achievement $achievement)
    {
        if ($achievement->image) {
            Storage::disk('public')->delete($achievement->image);
        }
        $achievement->delete();
        return back()->with('success', 'Data berhasil dihapus');
    }
}
