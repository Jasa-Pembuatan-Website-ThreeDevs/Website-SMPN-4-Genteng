<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PpdbBatch;
use Carbon\Carbon;

class PpdbController extends Controller
{
public function create()
{
    return view('pages.ppdb');
}

public function store(Request $request)
{
    dd($request->all());

    return redirect()->back()->with('success', 'Simulasi pendaftaran berhasil (Data belum disimpan ke DB)');
}
}
