@extends('layouts.app')

@section('content')
    <div class="max-w-7xl mx-auto p-6">
        @php
            $routePrefix = auth()->user()->role === 'administrator' ? 'admin' : auth()->user()->role;
        @endphp

        <div class="flex flex-col md:flex-row md:items-center justify-between mb-8 gap-4">
            <div>
                <h2 class="text-2xl font-bold text-slate-900 tracking-tight">Manajemen Guru</h2>
                <p class="text-slate-500 text-sm">Kelola data guru di sini.</p>
            </div>
            <a href="{{ route($routePrefix . '.teacher.create') }}"
                class="inline-flex items-center justify-center w-fit p-2 py-2.5 bg-blue-600 hover:bg-blue-700 text-white text-sm font-semibold rounded-lg transition-all duration-200 shadow-sm">
                Tambah Guru
            </a>
        </div>

        @if (session('success'))
            <div class="mb-6 p-4 bg-green-50 border border-green-200 text-green-700 rounded-lg text-sm">
                {{ session('success') }}
            </div>
        @endif

        <div class="bg-white rounded-2xl shadow-sm border border-slate-200 overflow-hidden">
            <div class="overflow-x-auto">
                <table class="w-full text-left border-collapse text-sm">
                    <thead>
                        <tr class="bg-slate-50 border-b">
                            <th class="px-6 py-3">Foto</th>
                            <th class="px-6 py-3">Nama</th>
                            <th class="px-6 py-3">NIP</th>
                            <th class="px-6 py-3">Email</th>
                            <th class="px-6 py-3">No HP</th>
                            <th class="px-6 py-3">Mata Pelajaran</th>
                            <th class="px-6 py-3">Deskripsi</th>
                            <th class="px-6 py-3 text-right">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y">
                        @forelse($teachers as $teacher)
                            <tr class="hover:bg-slate-50 transition">
                                <td class="px-6 py-3">
                                    @if ($teacher->image)
                                        <img src="{{ asset('storage/' . $teacher->image) }}" alt="{{ $teacher->full_name }}"
                                            class="w-10 h-10 rounded-full object-cover"/>
                                    @else
                                        <div class="w-10 h-10 rounded-full bg-slate-200 flex items-center justify-center">
                                            <i class="fas fa-user text-slate-400"></i>
                                        </div>
                                    @endif
                                </td>

                                <td class="px-6 py-3 font-semibold text-slate-700">
                                    {{ $teacher->full_name }}
                                </td>

                                <td class="px-6 py-3">
                                    {{ $teacher->nip ?? '-' }}
                                </td>

                                <td class="px-6 py-3">
                                    {{ $teacher->email ?? '-' }}
                                </td>

                                <td class="px-6 py-3">
                                    {{ $teacher->phone_number ?? '-' }}
                                </td>

                                <td class="px-6 py-3">
                                    {{ $teacher->subject_specialization }}
                                </td>

                                <td class="px-6 py-3">
                                    <span class="text-xs text-slate-500 line-clamp-1">{{ $teacher->description ?? '-' }}</span>
                                </td>

                                <td class="px-6 py-3 text-right">
                                    <a href="{{ route($routePrefix . '.teacher.edit', $teacher->id) }}"
                                        class="text-blue-600 hover:underline">Edit</a>
                                    <form action="{{ route($routePrefix . '.teacher.destroy', $teacher->id) }}"
                                        method="POST" class="inline-block ml-2"
                                        onsubmit="return confirm('Yakin hapus data?')">
                                        @csrf @method('DELETE')
                                        <button class="text-red-600 hover:underline">Hapus</button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="7" class="px-6 py-12 text-center">
                                    <div class="flex flex-col items-center">
                                        <div class="p-3 bg-slate-100 rounded-full mb-3">
                                            <svg class="w-8 h-8 text-slate-400" fill="none" stroke="currentColor"
                                                viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                                            </svg>
                                        </div>
                                        <p class="text-slate-500 font-medium">Belum ada data guru atau karyawan.</p>
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
