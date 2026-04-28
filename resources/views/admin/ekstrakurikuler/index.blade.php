@extends('layouts.app')

@section('content')
<div class="max-w-6xl mx-auto p-6">
    <div class="flex flex-col md:flex-row md:items-center justify-between mb-8 gap-4">
        <div>
            <h2 class="text-2xl font-bold text-slate-900 tracking-tight">Manajemen Ekstrakurikuler</h2>
            <p class="text-slate-500 text-sm">Kelola kegiatan ekstrakurikuler sekolah.</p>
        </div>
        <a href="{{ route('admin.ekstrakurikulers.create') }}" class="inline-flex items-center justify-center w-fit p-2 py-2.5 bg-blue-600 hover:bg-blue-700 text-white text-sm font-semibold rounded-lg transition-all duration-200 shadow-sm hover:shadow-blue-200">
            <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/></svg>
            Tambah Ekstrakurikuler
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
                        <th class="px-6 py-4 text-xs font-bold uppercase tracking-wider text-slate-600">Nama Ekskul</th>
                        <th class="px-6 py-4 text-xs font-bold uppercase tracking-wider text-slate-600">Pembina</th>
                        <th class="px-6 py-4 text-xs font-bold uppercase tracking-wider text-slate-600">Jumlah Siswa</th>
                        <th class="px-6 py-4 text-xs font-bold uppercase tracking-wider text-slate-600 text-right">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-100">
                    @forelse($ekstrakurikuler as $ekskul)
                    <tr class="group hover:bg-blue-50/40 transition-colors duration-150">
                        <td class="px-6 py-4 flex items-center">
                            @if($ekskul->image)
                            <img src="{{ asset('storage/' . $ekskul->image) }}" class="w-10 h-10 rounded-lg object-cover mr-3 border border-slate-200">
                            @else
                            <div class="w-10 h-10 rounded-lg bg-slate-200 flex items-center justify-center mr-3">
                                <i class="fas fa-users text-slate-400"></i>
                            </div>
                            @endif
                            <span class="text-sm font-semibold text-slate-700 group-hover:text-blue-700 transition-colors">{{ $ekskul->name }}</span>
                        </td>
                        <td class="px-6 py-4">
                            <span class="text-sm text-slate-600">{{ $ekskul->teacher->name ?? '-' }}</span>
                        </td>
                        <td class="px-6 py-4">
                            <span class="text-sm text-slate-600">{{ $ekskul->student_count }} Siswa</span>
                        </td>
                        <td class="px-6 py-4 text-right">
                            <div class="flex justify-end items-center space-x-4">
                                <a href="{{ route('admin.ekstrakurikulers.edit', $ekskul->id) }}" class="text-sm font-medium text-slate-400 hover:text-blue-600 transition-colors">Edit</a>
                                <form action="{{ route('admin.ekstrakurikulers.destroy', $ekskul->id) }}" method="POST" onsubmit="return confirm('Hapus ekstrakurikuler ini?')">
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
                        <td colspan="4" class="px-6 py-12 text-center text-slate-500">
                            Belum ada data ekstrakurikuler.
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
