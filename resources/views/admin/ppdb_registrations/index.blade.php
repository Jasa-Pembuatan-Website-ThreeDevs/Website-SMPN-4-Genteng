@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 sm:px-6 lg:px-8 py-8">
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-2xl font-semibold text-blue-700">Data Pendaftaran PPDB</h1>
        <div class="flex gap-3">
            <a href="{{ route('ppdb_registrations.export') }}" class="px-4 py-2 bg-green-500 text-white rounded hover:bg-green-600 flex items-center gap-2 shadow">
                <i class="fas fa-file-csv"></i> Export CSV
            </a>
            <a href="{{ route('ppdb_registrations.export_word') }}" class="px-4 py-2 bg-blue-500 text-white rounded hover:bg-blue-600 flex items-center gap-2 shadow">
                <i class="fas fa-file-word"></i> Export Word
            </a>
        </div>
    </div>
    <div class="bg-white shadow-md rounded-lg overflow-x-auto">
        <table class="min-w-full leading-normal">
            <thead>
                <tr>
                    <th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-xs font-semibold text-gray-600 uppercase">Foto</th>
                    <th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-xs font-semibold text-gray-600 uppercase">KK</th>
                    <th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-xs font-semibold text-gray-600 uppercase">Nama</th>
                    <th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-xs font-semibold text-gray-600 uppercase">NISN</th>
                    <th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-xs font-semibold text-gray-600 uppercase">Tempat Lahir</th>
                    <th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-xs font-semibold text-gray-600 uppercase">Tanggal Lahir</th>
                    <th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-xs font-semibold text-gray-600 uppercase">Jenis Kelamin</th>
                    <th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-xs font-semibold text-gray-600 uppercase">Asal Sekolah</th>
                    <th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-xs font-semibold text-gray-600 uppercase">Alamat</th>
                    <th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-xs font-semibold text-gray-600 uppercase">Nama Wali</th>
                    <th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-xs font-semibold text-gray-600 uppercase">WhatsApp</th>
                </tr>
            </thead>
            <tbody>
                @forelse($registrations as $reg)
                <tr>
                    <td class="px-5 py-4 border-b border-gray-200 bg-white text-sm">
                        @if($reg->photo_path)
                            <img src="{{ asset('storage/' . $reg->photo_path) }}" alt="Foto {{ $reg->name }}" class="w-12 h-16 object-cover rounded">
                        @else
                            <span class="text-gray-400 text-xs">No Photo</span>
                        @endif
                    </td>
                    <td class="px-5 py-4 border-b border-gray-200 bg-white text-sm">
                        @if($reg->kk_path)
                            <a href="{{ asset('storage/' . $reg->kk_path) }}" target="_blank" class="text-blue-600 hover:text-blue-800 underline flex items-center gap-1">
                                <i class="fas fa-file"></i> View KK
                            </a>
                        @else
                            <span class="text-gray-400 text-xs">No KK</span>
                        @endif
                    </td>
                    <td class="px-5 py-4 border-b border-gray-200 bg-white text-sm">{{ $reg->name }}</td>
                    <td class="px-5 py-4 border-b border-gray-200 bg-white text-sm">{{ $reg->nisn }}</td>
                    <td class="px-5 py-4 border-b border-gray-200 bg-white text-sm">{{ $reg->birth_place }}</td>
                    <td class="px-5 py-4 border-b border-gray-200 bg-white text-sm">{{ $reg->birth_date->format('d/m/Y') }}</td>
                    <td class="px-5 py-4 border-b border-gray-200 bg-white text-sm">{{ $reg->gender === 'L' ? 'Laki-laki' : 'Perempuan' }}</td>
                    <td class="px-5 py-4 border-b border-gray-200 bg-white text-sm">{{ $reg->origin_school }}</td>
                    <td class="px-5 py-4 border-b border-gray-200 bg-white text-sm">{{ $reg->address }}</td>
                    <td class="px-5 py-4 border-b border-gray-200 bg-white text-sm">{{ $reg->parent_name }}</td>
                    <td class="px-5 py-4 border-b border-gray-200 bg-white text-sm">{{ $reg->whatsapp }}</td>
                </tr>
                @empty
                <tr>
                    <td colspan="11" class="text-center py-10 text-gray-500">Belum ada pendaftaran.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
        <div class="mt-6">{{ $registrations->links() }}</div>
    </div>
</div>
@endsection
