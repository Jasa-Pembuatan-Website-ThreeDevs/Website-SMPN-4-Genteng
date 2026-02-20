@extends('layouts.app')

@section('content')
<div class="max-w-4xl mx-auto p-6">
    <div class="bg-white rounded-2xl shadow-sm border border-slate-200 p-8">
        <h2 class="text-2xl font-bold text-slate-900 mb-6">Edit Post</h2>

        <form action="{{ route('admin.posts.update', $post) }}" method="POST" enctype="multipart/form-data" class="space-y-6">
            @csrf
            @method('PUT')

            <div>
                <label class="block text-sm font-semibold text-slate-700 mb-2">Judul</label>
                <input type="text" name="title" value="{{ old('title', $post->title) }}" 
                    class="w-full border-slate-200 rounded-xl focus:ring-4 focus:ring-blue-100 focus:border-blue-500 border p-3 transition @error('title') border-red-500 @enderror" 
                    placeholder="Masukkan judul post"
                    required>
                @error('title') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
            </div>

            <div>
                <label class="block text-sm font-semibold text-slate-700 mb-2">Isi Konten</label>
                <textarea name="content" rows="5" 
                    class="w-full border-slate-200 rounded-xl focus:ring-4 focus:ring-blue-100 focus:border-blue-500 border p-3 transition @error('content') border-red-500 @enderror" 
                    placeholder="Tulis konten di sini..."
                    required>{{ old('content', $post->content) }}</textarea>
                @error('content') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
            </div>

            <div>
                <label class="block text-sm font-semibold text-slate-700 mb-2">Gambar Thumbnail</label>
                <div class="relative">
                    <input type="file" name="thumbnail" id="thumbnail" accept="image/*"
                        class="absolute inset-0 w-full h-full opacity-0 cursor-pointer"
                        @error('thumbnail') aria-invalid="true" @enderror>
                    <div class="border-2 border-dashed border-slate-300 rounded-xl p-8 text-center hover:border-blue-500 hover:bg-blue-50 transition">
                        <div class="flex flex-col items-center">
                            <i class="fas fa-cloud-upload-alt text-4xl text-slate-400 mb-3"></i>
                            <p class="text-slate-600 font-medium">Drag & drop atau klik untuk upload</p>
                            <p class="text-slate-500 text-sm mt-1">Format: JPG, PNG, GIF | Max 2MB</p>
                        </div>
                    </div>
                </div>

                @if($post->thumbnail && filter_var($post->thumbnail, FILTER_VALIDATE_URL))
                <div class="mt-4 p-4 bg-slate-50 rounded-xl border border-slate-200">
                    <p class="text-sm font-medium text-slate-700 mb-3">Gambar Saat Ini:</p>
                    <img src="{{ $post->thumbnail }}" alt="Current" class="max-h-64 mx-auto rounded">
                    <p class="text-slate-500 text-xs mt-3">Upload gambar baru untuk mengganti</p>
                </div>
                @endif

                <div id="imagePreview" class="hidden mt-4">
                    <p class="text-sm font-medium text-slate-700 mb-2">Preview Gambar Baru:</p>
                    <div class="bg-slate-100 rounded-xl p-4">
                        <img id="previewImg" src="" alt="Preview" class="max-h-64 mx-auto rounded">
                        <button type="button" id="removeImage" class="mt-3 text-red-600 hover:text-red-700 text-sm font-medium">
                            <i class="fas fa-trash-alt mr-1"></i> Batal Upload
                        </button>
                    </div>
                </div>

                @error('thumbnail')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="grid grid-cols-2 gap-6">
                <div>
                    <label class="block text-sm font-semibold text-slate-700 mb-2">Tipe</label>
                    <select name="announcement" class="w-full border-slate-200 rounded-xl focus:ring-4 focus:ring-blue-100 focus:border-blue-500 border p-3 transition" required>
                        <option value="">-- Pilih Tipe --</option>
                        <option value="news" {{ old('announcement', $post->announcement) == 'news' ? 'selected' : '' }}>Berita</option>
                        <option value="announcement" {{ old('announcement', $post->announcement) == 'announcement' ? 'selected' : '' }}>Pengumuman</option>
                    </select>
                </div>

                <div>
                    <label class="block text-sm font-semibold text-slate-700 mb-2">Aktif</label>
                    <label class="flex items-center gap-2 cursor-pointer">
                        <input type="checkbox" name="is_active" value="1" {{ old('is_active', $post->is_active) ? 'checked' : '' }} class="w-5 h-5">
                        <span class="text-slate-700">Aktifkan post ini</span>
                    </label>
                </div>
            </div>

            <div class="grid grid-cols-2 gap-6">
                <div>
                    <label class="block text-sm font-semibold text-slate-700 mb-2">Tanggal Terbit</label>
                    <input type="datetime-local" name="published_at" value="{{ old('published_at', $post->published_at->format('Y-m-d\TH:i')) }}" 
                        class="w-full border-slate-200 rounded-xl focus:ring-4 focus:ring-blue-100 focus:border-blue-500 border p-3 transition"
                        required>
                    @error('published_at') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                </div>

                <div>
                    <label class="block text-sm font-semibold text-slate-700 mb-2">Tanggal Berakhir</label>
                    <input type="datetime-local" name="expired_at" value="{{ old('expired_at', $post->expired_at->format('Y-m-d\TH:i')) }}" 
                        class="w-full border-slate-200 rounded-xl focus:ring-4 focus:ring-blue-100 focus:border-blue-500 border p-3 transition"
                        required>
                    @error('expired_at') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                </div>
            </div>

            <div class="flex gap-5 justify-end items-center pt-6 border-t border-slate-200">
                <a href="{{ route('admin.posts.index') }}" class="text-slate-500 font-medium hover:text-slate-700">Batal</a>
                <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white px-6 py-2.5 rounded-xl font-bold transition shadow-lg shadow-blue-100">
                    <i class="fas fa-save mr-2"></i> Update Post
                </button>
            </div>
        </form>
    </div>
</div>

<script>
    const thumbnailInput = document.getElementById('thumbnail');
    const imagePreview = document.getElementById('imagePreview');
    const previewImg = document.getElementById('previewImg');
    const removeImageBtn = document.getElementById('removeImage');

    thumbnailInput.addEventListener('change', function() {
        if (this.files && this.files[0]) {
            const reader = new FileReader();
            reader.onload = function(e) {
                previewImg.src = e.target.result;
                imagePreview.classList.remove('hidden');
            };
            reader.readAsDataURL(this.files[0]);
        }
    });

    removeImageBtn.addEventListener('click', function(e) {
        e.preventDefault();
        thumbnailInput.value = '';
        imagePreview.classList.add('hidden');
    });
</script>
@endsection
