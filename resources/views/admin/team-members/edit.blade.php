@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 sm:px-6 lg:px-8 py-8">
    <div class="max-w-3xl mx-auto">
        <div class="flex justify-between items-center mb-6">
            <h1 class="text-2xl font-semibold text-gray-700">Edit Anggota Tim</h1>
            @php
                $routePrefix = auth()->user()->role === 'administrator' ? 'admin' : auth()->user()->role;
            @endphp
            <a href="{{ route($routePrefix . '.team-members.index') }}" class="text-blue-500 hover:text-blue-700 flex items-center gap-2">
                <i class="fas fa-arrow-left"></i>
                Kembali
            </a>
        </div>

        @if ($errors->any())
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-4" role="alert">
                <strong class="font-bold">Error!</strong>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <div class="bg-white shadow-md rounded-lg overflow-hidden p-6">
            <form action="{{ route($routePrefix . '.team-members.update', $teamMember) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                
                <div class="mb-4">
                    <label for="name" class="block text-gray-700 text-sm font-bold mb-2">Nama Lengkap:</label>
                    <input type="text" name="name" id="name" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" value="{{ old('name', $teamMember->name) }}" required>
                </div>

                <div class="mb-4">
                    <label for="role" class="block text-gray-700 text-sm font-bold mb-2">Peran / Jabatan (e.g. Koordinator BK):</label>
                    <input type="text" name="role" id="role" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" value="{{ old('role', $teamMember->role) }}" required>
                </div>

                <div class="mb-4">
                    <label for="category" class="block text-gray-700 text-sm font-bold mb-2">Kategori:</label>
                    <select name="category" id="category" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
                        <option value="UKS" {{ old('category', $teamMember->category) == 'UKS' ? 'selected' : '' }}>UKS</option>
                        <option value="BK" {{ old('category', $teamMember->category) == 'BK' ? 'selected' : '' }}>BK</option>
                    </select>
                </div>

                <div class="mb-4">
                    <label for="order" class="block text-gray-700 text-sm font-bold mb-2">Urutan Tampilan:</label>
                    <input type="number" name="order" id="order" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" value="{{ old('order', $teamMember->order) }}">
                </div>

                <div class="mb-4">
                    <label for="image" class="block text-gray-700 text-sm font-bold mb-2">Foto Anggota (Biarkan kosong jika tidak ingin mengubah):</label>
                    @if ($teamMember->image)
                        <div class="mb-2">
                            <img src="{{ Storage::url($teamMember->image) }}" alt="{{ $teamMember->name }}" class="h-20 w-20 object-cover rounded-full">
                        </div>
                    @endif
                    <input type="file" name="image" id="image" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                    <p class="text-xs text-gray-500 mt-1">Format: jpeg, png, jpg, gif. Max: 2MB.</p>
                </div>

                <div class="mb-6">
                    <label for="description" class="block text-gray-700 text-sm font-bold mb-2">Deskripsi Singkat:</label>
                    <textarea name="description" id="description" rows="3" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">{{ old('description', $teamMember->description) }}</textarea>
                </div>

                <div class="flex items-center justify-end">
                    <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline shadow">
                        Perbarui Anggota
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
