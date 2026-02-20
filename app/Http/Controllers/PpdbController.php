<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PpdbBatch;
use App\Models\PpdbRegistration;
use Illuminate\Support\Facades\Storage;
use Carbon\Carbon;

class PpdbController extends Controller
{
public function create()
{
    $today = Carbon::today();
    $activeBatch = PpdbBatch::where('is_active', true)
        ->whereDate('start_date', '<=', $today)
        ->whereDate('end_date', '>=', $today)
        ->first();

    return view('pages.ppdb', compact('activeBatch'));
}

public function store(Request $request)
{
    $validated = $request->validate([
        'batch_id' => 'nullable|exists:ppdb_batches,id',
        'name' => 'required|string|max:255',
        'nisn' => 'required|numeric',
        'birth_place' => 'required|string|max:255',
        'birth_date' => 'required|date',
        'gender' => 'required|in:L,P',
        'origin_school' => 'required|string|max:255',
        'address' => 'required|string',
        'parent_name' => 'required|string|max:255',
        'whatsapp' => 'required|string|max:20',
        'photo' => 'nullable|image|max:2048',
        'kk' => 'nullable|mimes:pdf,jpeg,png,jpg|max:2048',
    ]);

    $photoPath = null;
    $kkPath = null;

    if ($request->hasFile('photo')) {
        $photoPath = $request->file('photo')->store('ppdb', 'public');
    }

    if ($request->hasFile('kk')) {
        $kkPath = $request->file('kk')->store('ppdb', 'public');
    }

    $registration = PpdbRegistration::create([
        'ppdb_batch_id' => $validated['batch_id'] ?? null,
        'name' => $validated['name'],
        'nisn' => $validated['nisn'],
        'birth_place' => $validated['birth_place'],
        'birth_date' => $validated['birth_date'],
        'gender' => $validated['gender'],
        'origin_school' => $validated['origin_school'],
        'address' => $validated['address'],
        'parent_name' => $validated['parent_name'],
        'whatsapp' => $validated['whatsapp'],
        'photo_path' => $photoPath,
        'kk_path' => $kkPath,
    ]);

    return redirect()->route('ppdb.success', $registration->id);
}

public function success($id)
{
    $registration = PpdbRegistration::findOrFail($id);
    return view('pages.ppdb-success', compact('registration'));
}
}
