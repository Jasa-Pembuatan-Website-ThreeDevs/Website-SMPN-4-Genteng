@extends('layouts.app')

@section('content')
<x-slot>
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Fasilitas Sekolah') }}
        </h2>
</x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="flex justify-between items-center mb-6">
                        <h1 class="text-2xl font-bold">Fasilitas Sekolah</h1>
                        <a href="{{ route('facilities.create') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                            + Tambah
                        </a>
                    </div>

                    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                        <table class="w-full text-sm text-left text-gray-500">
                            <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                                <tr>
                                    <th scope="col" class="px-6 py-3">Gambar</th>
                                    <th scope="col" class="px-6 py-3">Nama</th>
                                    <th scope="col" class="px-6 py-3">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($facilities as $f)
                                <tr class="bg-white border-b">
                                    <td class="px-6 py-4">
                                        @if($f->image)
                                            <img src="{{ asset('storage/'.$f->image) }}" width="100" class="rounded-md">
                                        @endif
                                    </td>
                                    <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                                        {{ $f->name }}
                                    </td>
                                    <td class="px-6 py-4">
                                        <div cAchievementControllerlass="flex space-x-2">
                                            <a href="{{ route('facilities.edit',$f->id) }}" class="text-blue-600 hover:underline">Edit</a>
                                            <form action="{{ route('facilities.destroy',$f->id) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus data ini?');">
                                                @csrf @method('DELETE')
                                                <button type="submit" class="text-red-600 hover:underline">Hapus</button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection