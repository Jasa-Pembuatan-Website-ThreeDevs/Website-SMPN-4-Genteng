<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Vision;
use App\Models\Mission;
use Illuminate\Http\Request;

class VisiMisiController extends Controller
{
    public function index()
    {
        $vision = Vision::first();
        $missions = Mission::orderBy('order')->get();
        return view('admin.visi-misi.index', compact('vision', 'missions'));
    }

    public function updateVision(Request $request)
    {
        $request->validate([
            'quote' => 'required|string',
            'description' => 'nullable|string',
        ]);

        $vision = Vision::first() ?: new Vision();
        $vision->quote = $request->quote;
        $vision->description = $request->description;
        $vision->save();

        return back()->with('success', 'Visi berhasil diperbarui!');
    }

    public function storeMission(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'order' => 'nullable|integer',
        ]);

        Mission::create($request->all());

        return back()->with('success', 'Misi berhasil ditambahkan!');
    }

    public function updateMission(Request $request, Mission $mission)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'order' => 'nullable|integer',
        ]);

        $mission->update($request->all());

        return back()->with('success', 'Misi berhasil diperbarui!');
    }

    public function destroyMission(Mission $mission)
    {
        $mission->delete();
        return back()->with('success', 'Misi berhasil dihapus!');
    }
}
