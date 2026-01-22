@extends('layouts.app')

@section('content')
<div class="max-w-3xl mx-auto p-6">
    <div class="bg-white rounded-2xl shadow-sm border border-slate-200 p-8">
        <h2 class="text-2xl font-bold text-slate-900 mb-6">Buat Post Baru</h2>

        <form action="{{ route('posts.store') }}" method="POST" class="space-y-5">
            @csrf

            <div>
                <label class="block text-sm font-semibold text-slate-700 mb-1">Judul</label>
                <input type="text" name="title" value="{{ old('title') }}" 
                    class="w-full border-slate-200 rounded-xl focus:ring-4 focus:ring-blue-100 focus:border-blue-500 border p-3 transition @error('title') border-red-500 @enderror" 
                    placeholder="Masukkan judul post">
                @error('title') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
            </div>

            <div class="grid grid-cols-2 gap-4">
                <div>
                    <label class="block text-sm font-semibold text-slate-700 mb-1">Tipe (Anouncement)</label>
                    <select name="anouncement" class="w-full border-slate-200 rounded-xl focus:ring-4 focus:ring-blue-100 focus:border-blue-500 border p-3 transition">
                        <option value="news" {{ old('anouncement') == 'news' ? 'selected' : '' }}>News</option>
                        <option value="announcement" {{ old('anouncement') == 'announcement' ? 'selected' : '' }}>Announcement</option>
                    </select>
                </div>
            </div>

            <div class="grid grid-cols-2 gap-4">
                <div>
                    <label class="block text-sm font-semibold text-slate-700 mb-1">Tanggal Terbit</label>
                    <input type="datetime-local" name="published_at" value="{{ old('published_at') }}" 
                        class="w-full border-slate-200 rounded-xl focus:ring-4 focus:ring-blue-100 focus:border-blue-500 border p-3 transition @error('published_at') border-red-500 @enderror">
                    @error('published_at') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                </div>
                <div>
                    <label class="block text-sm font-semibold text-slate-700 mb-1">Tanggal Berakhir</label>
                    <input type="datetime-local" name="expired_at" value="{{ old('expired_at') }}" 
                        class="w-full border-slate-200 rounded-xl focus:ring-4 focus:ring-blue-100 focus:border-blue-500 border p-3 transition @error('expired_at') border-red-500 @enderror">
                    @error('expired_at') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                </div>
            </div>

            <div>
                <label class="block text-sm font-semibold text-slate-700 mb-1">Isi Konten</label>
                <textarea name="content" rows="5" 
                    class="w-full border-slate-200 rounded-xl focus:ring-4 focus:ring-blue-100 focus:border-blue-500 border p-3 transition @error('content') border-red-500 @enderror" 
                    placeholder="Tulis konten di sini...">{{ old('content') }}</textarea>
                @error('content') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
            </div>

            <div class="flex gap-5 justify-end items-center pt-6">
                <a href="{{ route('posts.index') }}" class="text-slate-500 font-medium">Batal</a>
                <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white px-6 py-2.5 rounded-xl font-bold transition shadow-lg shadow-blue-100">
                    Simpan Post
                </button>
            </div>
        </form>
    </div>
</div>
@endsection