<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\PpdbBatch;
use Illuminate\Http\Request;

class PpdbBatchController extends Controller
{
    /**
     * Menampilkan daftar gelombang pendaftaran.
     */
    public function index()
    {
        // Mengambil data urut dari yang paling baru dibuat
        $batches = PpdbBatch::latest()->get();
        return view('admin.ppdb-batches.index', compact('batches'));
    }

    /**
     * Menampilkan form untuk membuat gelombang baru.
     */
    public function create()
    {
        return view('admin.ppdb-batches.create');
    }

    /**
     * Menyimpan gelombang baru ke database.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'       => 'required|string|max:255',
            'start_date' => 'required|date',
            'end_date'   => 'required|date|after_or_equal:start_date', // Tgl selesai tidak boleh sebelum tgl mulai
            'description'=> 'nullable|string',
        ]);

        // Handle Checkbox is_active
        $isActive = $request->has('is_active');

        // Jika gelombang ini di-set AKTIF, maka matikan semua gelombang lain
        if ($isActive) {
            PpdbBatch::query()->update(['is_active' => false]);
        }

        PpdbBatch::create([
            'name'        => $request->name,
            'start_date'  => $request->start_date,
            'end_date'    => $request->end_date,
            'description' => $request->description,
            'is_active'   => $isActive,
        ]);

        return redirect()->route('admin.ppdb-batches.index')
            ->with('success', 'Gelombang pendaftaran berhasil dibuat!');
    }

    /**
     * Menampilkan form edit.
     */
    public function edit(PpdbBatch $ppdbBatch)
    {
        return view('admin.ppdb-batches.edit', compact('ppdbBatch'));
    }

    /**
     * Mengupdate data gelombang.
     */
    public function update(Request $request, PpdbBatch $ppdbBatch)
    {
        $request->validate([
            'name'       => 'required|string|max:255',
            'start_date' => 'required|date',
            'end_date'   => 'required|date|after_or_equal:start_date',
            'description'=> 'nullable|string',
        ]);

        // Handle Checkbox is_active
        $isActive = $request->has('is_active');

        // Jika user mencentang 'Aktif', matikan gelombang lain selain yg sedang diedit
        if ($isActive) {
            PpdbBatch::where('id', '!=', $ppdbBatch->id)->update(['is_active' => false]);
        }

        $ppdbBatch->update([
            'name'        => $request->name,
            'start_date'  => $request->start_date,
            'end_date'    => $request->end_date,
            'description' => $request->description,
            'is_active'   => $isActive,
        ]);

        return redirect()->route('admin.ppdb-batches.index')
            ->with('success', 'Gelombang pendaftaran berhasil diperbarui!');
    }

    /**
     * Menghapus gelombang.
     */
    public function destroy(PpdbBatch $ppdbBatch)
    {
        // Opsional: Cek apakah sudah ada siswa yang mendaftar di gelombang ini sebelum hapus
        // if ($ppdbBatch->students()->exists()) {
        //     return back()->with('error', 'Tidak bisa menghapus gelombang yang sudah ada pendaftarnya.');
        // }

        $ppdbBatch->delete();

        return redirect()->route('admin.ppdb-batches.index')
            ->with('success', 'Gelombang pendaftaran berhasil dihapus.');
    }
}