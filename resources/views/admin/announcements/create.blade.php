@extends('layouts.app')

@section('content')
<div class="max-w-4xl mx-auto p-6">
    <div class="bg-white rounded-2xl shadow-sm border border-slate-200 p-8">
        <h2 class="text-2xl font-bold text-slate-900 mb-6">
            <i class="fas fa-bell mr-2 text-blue-600"></i> Buat Pengumuman Baru
        </h2>

        <form action="{{ route('announcements.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
            @csrf

            <!-- Title -->
            <div>
                <label class="block text-sm font-semibold text-slate-700 mb-2">Judul Pengumuman</label>
                <input type="text" name="title" value="{{ old('title') }}" 
                    class="w-full border-slate-200 rounded-xl focus:ring-4 focus:ring-blue-100 focus:border-blue-500 border p-3 transition @error('title') border-red-500 @enderror" 
                    placeholder="Contoh: Pengumuman Libur Akhir Tahun 2026"
                    required>
                @error('title')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Content -->
            <div>
                <label class="block text-sm font-semibold text-slate-700 mb-2">Isi Pengumuman</label>
                <textarea name="content" rows="6"
                    class="w-full border-slate-200 rounded-xl focus:ring-4 focus:ring-blue-100 focus:border-blue-500 border p-3 transition @error('content') border-red-500 @enderror"
                    placeholder="Tuliskan isi pengumuman di sini..."
                    required>{{ old('content') }}</textarea>
                @error('content')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Image Upload -->
            <div>
                <label class="block text-sm font-semibold text-slate-700 mb-2">Poster/Banner Pengumuman</label>
                <div class="relative">
                    <input type="file" name="image" id="image" accept="image/*"
                        class="absolute inset-0 w-full h-full opacity-0 cursor-pointer"
                        @error('image') aria-invalid="true" @enderror>
                    <div class="border-2 border-dashed border-slate-300 rounded-xl p-8 text-center hover:border-blue-500 hover:bg-blue-50 transition">
                        <div class="flex flex-col items-center">
                            <i class="fas fa-cloud-upload-alt text-4xl text-slate-400 mb-3"></i>
                            <p class="text-slate-600 font-medium">Drag & drop atau klik untuk upload</p>
                            <p class="text-slate-500 text-sm mt-1">Format: JPG, PNG, GIF | Max 2MB</p>
                        </div>
                    </div>
                </div>

                <!-- Image Preview -->
                <div id="imagePreview" class="hidden mt-4">
                    <p class="text-sm font-medium text-slate-700 mb-2">Preview Gambar:</p>
                    <div class="bg-slate-100 rounded-xl p-4">
                        <img id="previewImg" src="" alt="Preview" class="max-h-64 mx-auto rounded">
                        <button type="button" id="removeImage" class="mt-3 text-red-600 hover:text-red-700 text-sm font-medium">
                            <i class="fas fa-trash-alt mr-1"></i> Hapus Gambar
                        </button>
                    </div>
                </div>

                @error('image')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Status and Publishing -->
            <div class="grid grid-cols-2 gap-6">
                <div>
                    <label class="block text-sm font-semibold text-slate-700 mb-2">Status</label>
                    <select name="status" class="w-full border-slate-200 rounded-xl focus:ring-4 focus:ring-blue-100 focus:border-blue-500 border p-3 transition">
                        <option value="draft" {{ old('status') == 'draft' ? 'selected' : '' }}>Draft</option>
                        <option value="publish" {{ old('status') == 'publish' ? 'selected' : '' }}>Publikasikan</option>
                    </select>
                </div>

                <div>
                    <label class="block text-sm font-semibold text-slate-700 mb-2">Tanggal Terbit (Opsional)</label>
                    <input type="datetime-local" name="published_at" value="{{ old('published_at') }}"
                        class="w-full border-slate-200 rounded-xl focus:ring-4 focus:ring-blue-100 focus:border-blue-500 border p-3 transition">
                    <p class="text-slate-500 text-xs mt-1">Biarkan kosong untuk terbit sekarang</p>
                </div>
            </div>

            <!-- Action Buttons -->
            <div class="flex gap-5 justify-end items-center pt-6 border-t border-slate-200">
                <a href="{{ route('announcements.index') }}" class="text-slate-500 font-medium hover:text-slate-700">Batal</a>
                <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white px-6 py-2.5 rounded-xl font-bold transition shadow-lg shadow-blue-100">
                    <i class="fas fa-save mr-2"></i> Simpan Pengumuman
                </button>
            </div>
        </form>
    </div>
</div>

<script>
    const imageInput = document.getElementById('image');
    const imagePreview = document.getElementById('imagePreview');
    const previewImg = document.getElementById('previewImg');
    const removeImageBtn = document.getElementById('removeImage');

    imageInput.addEventListener('change', function() {
        if (this.files && this.files[0]) {
            const reader = new FileReader();
            reader.onload = function(e) {
                previewImg.src = e.target.result;
                imagePreview.classList.remove('hidden');
            };
            reader.readAsDataURL(this.files[0]);
        }
    });

    removeImageBtn.addEventListener('click', function() {
        imageInput.value = '';
        imagePreview.classList.add('hidden');
    });
</script>
@endsection
