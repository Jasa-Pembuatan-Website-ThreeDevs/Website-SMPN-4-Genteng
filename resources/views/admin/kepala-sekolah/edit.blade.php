@extends('layouts.app')

@section('content')
<div class="max-w-4xl mx-auto p-6">
    <div class="bg-white rounded-2xl shadow-sm border border-slate-200 p-8">
        <h2 class="text-2xl font-bold text-slate-900 mb-6">Edit Kepala Sekolah</h2>

        @php
            $routePrefix = auth()->user()->role === 'administrator' ? 'admin' : auth()->user()->role;
        @endphp

        <form action="{{ route($routePrefix . '.kepala-sekolah.update', $kepalaSekolah->id) }}" method="POST" enctype="multipart/form-data" class="space-y-6">
            @csrf
            @method('PUT')

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div class="md:col-span-2">
                    <label class="block text-sm font-semibold text-slate-700 mb-2">Nama Lengkap & Gelar</label>
                    <input type="text" name="name" value="{{ old('name', $kepalaSekolah->name) }}" 
                        class="w-full border-slate-200 rounded-xl focus:ring-4 focus:ring-blue-100 focus:border-blue-500 border p-3 transition @error('name') border-red-500 @enderror" 
                        required>
                    @error('name') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                </div>

                <div>
                    <label class="block text-sm font-semibold text-slate-700 mb-2">Jurusan</label>
                    <input type="text" name="major" value="{{ old('major', $kepalaSekolah->major) }}" 
                        class="w-full border-slate-200 rounded-xl focus:ring-4 focus:ring-blue-100 focus:border-blue-500 border p-3 transition @error('major') border-red-500 @enderror" 
                        placeholder="Contoh: Pendidikan Matematika">
                    @error('major') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                </div>

                <div>
                    <label class="block text-sm font-semibold text-slate-700 mb-2">Jabatan</label>
                    <input type="text" name="position" value="{{ old('position', $kepalaSekolah->position) }}" 
                        class="w-full border-slate-200 rounded-xl focus:ring-4 focus:ring-blue-100 focus:border-blue-500 border p-3 transition @error('position') border-red-500 @enderror" 
                        required>
                    @error('position') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                </div>
            </div>

            <div>
                <label class="block text-sm font-semibold text-slate-700 mb-2">Foto Kepala Sekolah</label>
                <div class="relative">
                    <input type="file" name="image" id="image" accept="image/*"
                        class="absolute inset-0 w-full h-full opacity-0 cursor-pointer">
                    <div class="border-2 border-dashed border-slate-300 rounded-xl p-8 text-center hover:border-blue-500 hover:bg-blue-50 transition">
                        <div class="flex flex-col items-center">
                            <i class="fas fa-cloud-upload-alt text-4xl text-slate-400 mb-3"></i>
                            <p class="text-slate-600 font-medium">Drag & drop atau klik untuk ganti foto</p>
                            <p class="text-slate-500 text-sm mt-1">Biarkan kosong jika tidak ingin mengubah foto</p>
                        </div>
                    </div>
                </div>

                <div id="imagePreview" class="{{ $kepalaSekolah->image ? '' : 'hidden' }} mt-4">
                    <p class="text-sm font-medium text-slate-700 mb-2">Preview Foto:</p>
                    <div class="bg-slate-100 rounded-xl p-4">
                        <img id="previewImg" src="{{ $kepalaSekolah->image ? asset('storage/' . $kepalaSekolah->image) : '' }}" alt="Preview" class="max-h-64 mx-auto rounded">
                        <button type="button" id="removeImage" class="mt-3 text-red-600 hover:text-red-700 text-sm font-medium">
                            <i class="fas fa-trash-alt mr-1"></i> Hapus Foto
                        </button>
                    </div>
                </div>
                @error('image') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
            </div>

            <div>
                <label class="block text-sm font-semibold text-slate-700 mb-2">Biografi</label>
                <textarea name="biography" rows="8" 
                    class="w-full border-slate-200 rounded-xl focus:ring-4 focus:ring-blue-100 focus:border-blue-500 border p-3 transition" 
                    placeholder="Tulis biografi lengkap di sini...">{{ old('biography', $kepalaSekolah->biography) }}</textarea>
            </div>

            <div class="pt-4">
                <button type="button" onclick="document.getElementById('extra-fields').classList.toggle('hidden')" class="text-blue-600 font-medium text-sm flex items-center gap-2">
                    <i class="fas fa-plus-circle"></i> Tampilkan Informasi Tambahan (Opsional)
                </button>
            </div>

            <div id="extra-fields" class="hidden space-y-6 bg-slate-50 p-6 rounded-xl border border-slate-200">
                <div>
                    <label class="block text-sm font-semibold text-slate-700 mb-2">Deskripsi Singkat</label>
                    <textarea name="bio_short" rows="2" 
                        class="w-full border-slate-200 rounded-xl focus:ring-4 focus:ring-blue-100 focus:border-blue-500 border p-3 transition" 
                        placeholder="Deskripsi singkat">{{ old('bio_short', $kepalaSekolah->bio_short) }}</textarea>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label class="block text-sm font-semibold text-slate-700 mb-2">Pendidikan Terakhir</label>
                        <input type="text" name="education" value="{{ old('education', $kepalaSekolah->education) }}" 
                            class="w-full border-slate-200 rounded-xl focus:ring-4 focus:ring-blue-100 focus:border-blue-500 border p-3 transition">
                    </div>

                    <div>
                        <label class="block text-sm font-semibold text-slate-700 mb-2">Sertifikasi/Prestasi</label>
                        <input type="text" name="certification" value="{{ old('certification', $kepalaSekolah->certification) }}" 
                            class="w-full border-slate-200 rounded-xl focus:ring-4 focus:ring-blue-100 focus:border-blue-500 border p-3 transition">
                    </div>

                    <div>
                        <label class="block text-sm font-semibold text-slate-700 mb-2">Masa Jabatan</label>
                        <input type="text" name="period" value="{{ old('period', $kepalaSekolah->period) }}" 
                            class="w-full border-slate-200 rounded-xl focus:ring-4 focus:ring-blue-100 focus:border-blue-500 border p-3 transition">
                    </div>

                    <div>
                        <label class="block text-sm font-semibold text-slate-700 mb-2">Email</label>
                        <input type="email" name="email" value="{{ old('email', $kepalaSekolah->email) }}" 
                            class="w-full border-slate-200 rounded-xl focus:ring-4 focus:ring-blue-100 focus:border-blue-500 border p-3 transition">
                    </div>
                </div>

                <div>
                    <label class="block text-sm font-semibold text-slate-700 mb-2">Quote</label>
                    <textarea name="quote" rows="2" 
                        class="w-full border-slate-200 rounded-xl focus:ring-4 focus:ring-blue-100 focus:border-blue-500 border p-3 transition">{{ old('quote', $kepalaSekolah->quote) }}</textarea>
                </div>
            </div>

            <div>
                <label class="flex items-center gap-2 cursor-pointer">
                    <input type="checkbox" name="is_active" value="1" {{ old('is_active', $kepalaSekolah->is_active) ? 'checked' : '' }} class="w-5 h-5">
                    <span class="text-slate-700 font-semibold">Aktifkan profil ini</span>
                </label>
            </div>

            <div class="flex gap-5 justify-end items-center pt-6 border-t border-slate-200">
                <a href="{{ route($routePrefix . '.kepala-sekolah.index') }}" class="text-slate-500 font-medium hover:text-slate-700">Batal</a>
                <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white px-6 py-2.5 rounded-xl font-bold transition shadow-lg shadow-blue-100">
                    <i class="fas fa-save mr-2"></i> Perbarui Data
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
        @if($kepalaSekolah->image)
            previewImg.src = "{{ asset('storage/' . $kepalaSekolah->image) }}";
            imagePreview.classList.remove('hidden');
        @else
            imagePreview.classList.add('hidden');
        @endif
    });
</script>
@endsection
