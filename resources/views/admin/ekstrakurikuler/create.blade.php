@extends('layouts.app')

@section('content')
<div class="max-w-4xl mx-auto p-6">
    <div class="bg-white rounded-2xl shadow-sm border border-slate-200 p-8">
        <h2 class="text-2xl font-bold text-slate-900 mb-6">Tambah Ekstrakurikuler</h2>

        <form action="{{ route('admin.ekstrakurikulers.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
            @csrf
            
            <div>
                <label class="block text-sm font-semibold text-slate-700 mb-2">Nama Ekstrakurikuler</label>
                <input type="text" name="name" value="{{ old('name') }}" 
                    class="w-full border-slate-200 rounded-xl focus:ring-4 focus:ring-blue-100 focus:border-blue-500 border p-3 transition @error('name') border-red-500 @enderror" 
                    placeholder="Contoh: Pramuka, Basket, PMR..."
                    required>
                @error('name') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
            </div>

            <div>
                <label class="block text-sm font-semibold text-slate-700 mb-2">Deskripsi</label>
                <textarea name="description" rows="4" 
                    class="w-full border-slate-200 rounded-xl focus:ring-4 focus:ring-blue-100 focus:border-blue-500 border p-3 transition @error('description') border-red-500 @enderror" 
                    placeholder="Jelaskan mengenai kegiatan ekstrakurikuler ini...">{{ old('description') }}</textarea>
                @error('description') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <label class="block text-sm font-semibold text-slate-700 mb-2">Jumlah Siswa (Estimasi)</label>
                    <input type="number" name="student_count" value="{{ old('student_count', 0) }}" 
                        class="w-full border-slate-200 rounded-xl focus:ring-4 focus:ring-blue-100 focus:border-blue-500 border p-3 transition @error('student_count') border-red-500 @enderror" 
                        min="0">
                    @error('student_count') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                </div>

                <div>
                    <label class="block text-sm font-semibold text-slate-700 mb-2">Pembina (Opsional)</label>
                    <select name="teacher_id" class="w-full border-slate-200 rounded-xl focus:ring-4 focus:ring-blue-100 focus:border-blue-500 border p-3 transition @error('teacher_id') border-red-500 @enderror">
                        <option value="">-- Pilih Pembina --</option>
                        @foreach($teachers as $teacher)
                            <option value="{{ $teacher->id }}" {{ old('teacher_id') == $teacher->id ? 'selected' : '' }}>{{ $teacher->name }}</option>
                        @endforeach
                    </select>
                    @error('teacher_id') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                </div>
            </div>

            <div>
                <label class="block text-sm font-semibold text-slate-700 mb-2">Gambar / Foto Kegiatan</label>
                <div class="relative">
                    <input type="file" name="image" id="image" accept="image/*"
                        class="absolute inset-0 w-full h-full opacity-0 cursor-pointer">
                    <div class="border-2 border-dashed border-slate-300 rounded-xl p-8 text-center hover:border-blue-500 hover:bg-blue-50 transition">
                        <div class="flex flex-col items-center">
                            <i class="fas fa-cloud-upload-alt text-4xl text-slate-400 mb-3"></i>
                            <p class="text-slate-600 font-medium">Drag & drop atau klik untuk upload</p>
                            <p class="text-slate-500 text-sm mt-1">Format: JPG, PNG, WEBP | Max 2MB</p>
                        </div>
                    </div>
                </div>

                <div id="imagePreview" class="hidden mt-4">
                    <p class="text-sm font-medium text-slate-700 mb-2">Preview Gambar:</p>
                    <div class="bg-slate-100 rounded-xl p-4">
                        <img id="previewImg" src="" alt="Preview" class="max-h-64 mx-auto rounded">
                        <button type="button" id="removeImage" class="mt-3 text-red-600 hover:text-red-700 text-sm font-medium">
                            <i class="fas fa-trash-alt mr-1"></i> Hapus Gambar
                        </button>
                    </div>
                </div>
                @error('image') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
            </div>

            <div class="flex gap-5 justify-end items-center pt-6 border-t border-slate-200">
                <a href="{{ route('admin.ekstrakurikulers.index') }}" class="text-slate-500 font-medium hover:text-slate-700">Batal</a>
                <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white px-6 py-2.5 rounded-xl font-bold transition shadow-lg shadow-blue-100">
                    <i class="fas fa-save mr-2"></i> Simpan Data
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

    removeImageBtn.addEventListener('click', function(e) {
        e.preventDefault();
        imageInput.value = '';
        imagePreview.classList.add('hidden');
    });
</script>
@endsection
