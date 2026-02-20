@extends('layouts.app')

@section('content')
<div class="max-w-6xl mx-auto p-6">
    <div class="flex justify-between items-center mb-8">
        <h1 class="text-3xl font-bold text-slate-900">
            <i class="fas fa-bell mr-3 text-blue-600"></i> Data Pengumuman
        </h1>
        <a href="{{ route('announcements.create') }}" class="bg-blue-600 hover:bg-blue-700 text-white px-6 py-2.5 rounded-xl font-bold transition shadow-lg shadow-blue-100">
            <i class="fas fa-plus mr-2"></i> Buat Pengumuman Baru
        </a>
    </div>

    @if (session('success'))
    <div class="mb-6 p-4 bg-green-50 border border-green-200 rounded-xl">
        <p class="text-green-700 font-medium"><i class="fas fa-check-circle mr-2"></i> {{ session('success') }}</p>
    </div>
    @endif

    <div class="bg-white rounded-2xl shadow-sm border border-slate-200 overflow-hidden">
        @if($announcements->count() > 0)
        <div class="overflow-x-auto">
            <table class="w-full">
                <thead>
                    <tr class="bg-slate-50 border-b border-slate-200">
                        <th class="px-6 py-4 text-left text-sm font-semibold text-slate-700">Judul</th>
                        <th class="px-6 py-4 text-left text-sm font-semibold text-slate-700">Gambar</th>
                        <th class="px-6 py-4 text-left text-sm font-semibold text-slate-700">Status</th>
                        <th class="px-6 py-4 text-left text-sm font-semibold text-slate-700">Tanggal</th>
                        <th class="px-6 py-4 text-right text-sm font-semibold text-slate-700">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($announcements as $announcement)
                    <tr class="border-b border-slate-200 hover:bg-slate-50 transition">
                        <td class="px-6 py-4">
                            <div>
                                <p class="font-medium text-slate-900">{{ $announcement->title }}</p>
                                <p class="text-sm text-slate-500 mt-1 line-clamp-2">{{ $announcement->content }}</p>
                            </div>
                        </td>
                        <td class="px-6 py-4">
                            @if($announcement->image)
                                <img src="{{ asset('storage/' . $announcement->image) }}" alt="Poster" class="w-16 h-16 object-cover rounded">
                            @else
                                <span class="text-slate-400 text-sm">Tidak ada gambar</span>
                            @endif
                        </td>
                        <td class="px-6 py-4">
                            @if($announcement->status === 'publish')
                                <span class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium bg-green-100 text-green-700">
                                    <span class="w-2 h-2 bg-green-600 rounded-full mr-2"></span> Dipublikasikan
                                </span>
                            @else
                                <span class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium bg-slate-100 text-slate-700">
                                    <span class="w-2 h-2 bg-slate-600 rounded-full mr-2"></span> Draft
                                </span>
                            @endif
                        </td>
                        <td class="px-6 py-4 text-sm text-slate-600">
                            {{ $announcement->created_at->format('d M Y') }}
                        </td>
                        <td class="px-6 py-4 text-right">
                            <div class="flex justify-end gap-3">
                                <a href="{{ route('announcements.edit', $announcement) }}" class="text-blue-600 hover:text-blue-700 font-medium text-sm transition">
                                    <i class="fas fa-edit mr-1"></i> Edit
                                </a>
                                <form action="{{ route('announcements.destroy', $announcement) }}" method="POST" class="inline" onsubmit="return confirm('Apakah Anda yakin ingin menghapus pengumuman ini?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-600 hover:text-red-700 font-medium text-sm transition">
                                        <i class="fas fa-trash-alt mr-1"></i> Hapus
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <!-- Pagination -->
        @if($announcements->hasPages())
        <div class="px-6 py-4 border-t border-slate-200">
            {{ $announcements->links() }}
        </div>
        @endif
        @else
        <div class="text-center py-12">
            <i class="fas fa-bell text-4xl text-slate-300 mb-4 block"></i>
            <p class="text-slate-500 font-medium">Belum ada pengumuman. <a href="{{ route('announcements.create') }}" class="text-blue-600 hover:underline">Buat yang pertama</a></p>
        </div>
        @endif
    </div>
</div>
@endsection
