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
    $activeBatch = PpdbBatch::current();
    return view('pages.ppdb', compact('activeBatch'));
}
public function store(Request $request)
{
    // Pastikan ada gelombang yang aktif
    $activeBatch = PpdbBatch::current();

    if (!$activeBatch) {
        return redirect()->route('spmb.register')->with('error', 'Mohon maaf, pendaftaran sudah ditutup atau belum dibuka.');
    }

    $validated = $request->validate([
        'batch_id' => 'required|exists:ppdb_batches,id',
        'name' => 'required|string|max:255',
        'nisn' => 'required|digits:10',
        'birth_place' => 'required|string|max:255',
        'birth_date' => 'required|date',
        'gender' => 'required|in:L,P',
        'origin_school' => 'required|string|max:255',
        'address' => 'required|string',
        'parent_name' => 'required|string|max:255',
        'whatsapp' => 'required|string|min:10|max:15',
        'photo' => 'nullable|image|max:2048',
        'kk' => 'nullable|mimes:pdf,jpeg,png,jpg|max:2048',
    ], [
        'nisn.digits' => 'NISN harus berjumlah 10 digit.',
        'whatsapp.min' => 'Nomor WhatsApp minimal 10 digit.',
        'whatsapp.max' => 'Nomor WhatsApp maksimal 15 digit.',
    ]);

    // Tambahan validasi: pastikan batch_id yang dikirim adalah batch yang memang sedang aktif
    if ($validated['batch_id'] != $activeBatch->id) {
        return redirect()->route('spmb.register')->with('error', 'Gelombang pendaftaran tidak valid atau telah berakhir.');
    }

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

    return redirect()->route('spmb.success', $registration->id);
}

public function success($id)
{
    $registration = PpdbRegistration::findOrFail($id);
    return view('pages.ppdb-success', compact('registration'));
}
}
