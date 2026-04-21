@extends('layouts.app')

@section('content')
<div class="max-w-6xl mx-auto p-6">
    @php
        $routePrefix = auth()->user()->role === 'administrator' ? 'admin' : auth()->user()->role;
    @endphp
    <div class="flex flex-col md:flex-row md:items-center justify-between mb-8 gap-4">
        <div>
            <h2 class="text-2xl font-bold text-slate-900 tracking-tight">Manajemen Kepala Sekolah</h2>
            <p class="text-slate-500 text-sm">Kelola data profil kepala sekolah di sini.</p>
        </div>
        <a href="{{ route($routePrefix . '.kepala-sekolah.create') }}" class="inline-flex items-center justify-center w-fit p-2 py-2.5 bg-blue-600 hover:bg-blue-700 text-white text-sm font-semibold rounded-lg transition-all duration-200 shadow-sm hover:shadow-blue-200 focus:ring-2 focus:ring-blue-500 focus:ring-offset-2">
            <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/></svg>
            Tambah Kepala Sekolah
        </a>
    </div>

    @if(session('success'))
    <div class="mb-6 p-4 bg-green-50 border border-green-200 text-green-700 rounded-lg text-sm">
        {{ session('success') }}
    </div>
    @endif

    <div class="bg-white rounded-2xl shadow-sm border border-slate-200 overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full text-left border-collapse">
                <thead>
                    <tr class="bg-slate-50/50 border-b border-slate-200">
                        <th class="px-6 py-4 text-xs font-bold uppercase tracking-wider text-slate-600">Nama</th>
                        <th class="px-6 py-4 text-xs font-bold uppercase tracking-wider text-slate-600">Masa Jabatan</th>
                        <th class="px-6 py-4 text-xs font-bold uppercase tracking-wider text-slate-600">Status</th>
                        <th class="px-6 py-4 text-xs font-bold uppercase tracking-wider text-slate-600 text-right">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-100">
                    @forelse($kepalaSekolahs as $ks)
                    <tr class="group hover:bg-blue-50/40 transition-colors duration-150">
                        <td class="px-6 py-4 flex items-center">
                            @if($ks->image)
                            <img src="{{ asset('storage/' . $ks->image) }}" class="w-10 h-10 rounded-full object-cover mr-3 border border-slate-200">
                            @else
                            <div class="w-10 h-10 rounded-full bg-slate-200 flex items-center justify-center mr-3">
                                <i class="fas fa-user text-slate-400"></i>
                            </div>
                            @endif
                            <span class="text-sm font-semibold text-slate-700 group-hover:text-blue-700 transition-colors">{{ $ks->name }}</span>
                        </td>
                        <td class="px-6 py-4">
                            <span class="text-sm text-slate-600">{{ $ks->period }}</span>
                        </td>
                        <td class="px-6 py-4">
                            @if($ks->is_active)
                                <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-green-100 text-green-800">
                                    <span class="w-1.5 h-1.5 mr-1.5 rounded-full bg-green-500"></span> Aktif
                                </span>
                            @else
                                <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-slate-100 text-slate-800">
                                    <span class="w-1.5 h-1.5 mr-1.5 rounded-full bg-slate-500"></span> Tidak Aktif
                                </span>
                            @endif
                        </td>
                        <td class="px-6 py-4 text-right">
                            <div class="flex justify-end items-center space-x-4">
                                <a href="{{ route($routePrefix . '.kepala-sekolah.edit', $ks->id) }}" class="text-sm font-medium text-slate-400 hover:text-blue-600 transition-colors">Edit</a>
                                <form action="{{ route($routePrefix . '.kepala-sekolah.destroy', $ks->id) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus data ini?')">
                                    @csrf @method('DELETE')
                                    <button type="submit" class="text-sm font-medium text-slate-400 hover:text-red-600 transition-colors">
                                        Hapus
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="4" class="px-6 py-12 text-center">
                            <div class="flex flex-col items-center">
                                <div class="p-3 bg-slate-100 rounded-full mb-3">
                                    <svg class="w-8 h-8 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/></svg>
                                </div>
                                <p class="text-slate-500 font-medium">Belum ada data kepala sekolah.</p>
                            </div>
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
