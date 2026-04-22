@extends('layouts.app')

@section('content')
<div class="max-w-4xl mx-auto p-6">
    <div class="bg-white rounded-2xl shadow-sm border border-slate-200 p-8">
        <h2 class="text-2xl font-bold text-slate-900 mb-6">Tambah Kepala Sekolah</h2>

        @php
            $routePrefix = auth()->user()->role === 'administrator' ? 'admin' : auth()->user()->role;
        @endphp

        <form action="{{ route($routePrefix . '.kepala-sekolah.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
            @csrf

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <label class="block text-sm font-semibold text-slate-700 mb-2">Nama Lengkap & Gelar</label>
                    <input type="text" name="name" value="{{ old('name') }}" 
                        class="w-full border-slate-200 rounded-xl focus:ring-4 focus:ring-blue-100 focus:border-blue-500 border p-3 transition @error('name') border-red-500 @enderror" 
                        placeholder="Contoh: Dr. Sukaryanto, S.Pd."
                        required>
                    @error('name') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                </div>

                <div>
                    <label class="block text-sm font-semibold text-slate-700 mb-2">Jurusan (Opsional)</label>
                    <input type="text" name="major" value="{{ old('major') }}" 
                        class="w-full border-slate-200 rounded-xl focus:ring-4 focus:ring-blue-100 focus:border-blue-500 border p-3 transition @error('major') border-red-500 @enderror" 
                        placeholder="Contoh: Pendidikan Matematika">
                    @error('major') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                </div>

                <div>
                    <label class="block text-sm font-semibold text-slate-700 mb-2">Jabatan</label>
                    <input type="text" name="position" value="{{ old('position', 'Kepala Sekolah SMPN 4 Genteng') }}" 
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
                            <p class="text-slate-600 font-medium">Drag & drop atau klik untuk upload</p>
                            <p class="text-slate-500 text-sm mt-1">Format: JPG, PNG, GIF | Max 2MB</p>
                        </div>
                    </div>
                </div>

                <div id="imagePreview" class="hidden mt-4">
                    <p class="text-sm font-medium text-slate-700 mb-2">Preview Foto:</p>
                    <div class="bg-slate-100 rounded-xl p-4">
                        <img id="previewImg" src="" alt="Preview" class="max-h-64 mx-auto rounded">
                        <button type="button" id="removeImage" class="mt-3 text-red-600 hover:text-red-700 text-sm font-medium">
                            <i class="fas fa-trash-alt mr-1"></i> Hapus Foto
                        </button>
                    </div>
                </div>
                @error('image') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
            </div>

            <div>
                <label class="block text-sm font-semibold text-slate-700 mb-2">Deskripsi Singkat (Samping Foto)</label>
                <textarea name="bio_short" rows="3" 
                    class="w-full border-slate-200 rounded-xl focus:ring-4 focus:ring-blue-100 focus:border-blue-500 border p-3 transition" 
                    placeholder="Contoh: Memimpin SMPN 4 Genteng sejak tahun 2018...">{{ old('bio_short') }}</textarea>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <label class="block text-sm font-semibold text-slate-700 mb-2">Pendidikan Terakhir</label>
                    <input type="text" name="education" value="{{ old('education') }}" 
                        class="w-full border-slate-200 rounded-xl focus:ring-4 focus:ring-blue-100 focus:border-blue-500 border p-3 transition" 
                        placeholder="Contoh: S3 Pendidikan Universitas Negeri Malang">
                </div>

                <div>
                    <label class="block text-sm font-semibold text-slate-700 mb-2">Sertifikasi/Prestasi</label>
                    <input type="text" name="certification" value="{{ old('certification') }}" 
                        class="w-full border-slate-200 rounded-xl focus:ring-4 focus:ring-blue-100 focus:border-blue-500 border p-3 transition" 
                        placeholder="Contoh: Guru Berprestasi Nasional 2019">
                </div>

                <div>
                    <label class="block text-sm font-semibold text-slate-700 mb-2">Masa Jabatan</label>
                    <input type="text" name="period" value="{{ old('period') }}" 
                        class="w-full border-slate-200 rounded-xl focus:ring-4 focus:ring-blue-100 focus:border-blue-500 border p-3 transition" 
                        placeholder="Contoh: 2018 - Sekarang">
                </div>

                <div>
                    <label class="block text-sm font-semibold text-slate-700 mb-2">Email</label>
                    <input type="email" name="email" value="{{ old('email') }}" 
                        class="w-full border-slate-200 rounded-xl focus:ring-4 focus:ring-blue-100 focus:border-blue-500 border p-3 transition" 
                        placeholder="Contoh: kepsek@smpn4genteng.sch.id">
                </div>
            </div>

            <div>
                <label class="block text-sm font-semibold text-slate-700 mb-2">Biografi Lengkap</label>
                <textarea name="biography" rows="6" 
                    class="w-full border-slate-200 rounded-xl focus:ring-4 focus:ring-blue-100 focus:border-blue-500 border p-3 transition" 
                    placeholder="Tulis biografi lengkap di sini...">{{ old('biography') }}</textarea>
            </div>

            <div>
                <label class="block text-sm font-semibold text-slate-700 mb-2">Quote / Kata Mutiara</label>
                <textarea name="quote" rows="3" 
                    class="w-full border-slate-200 rounded-xl focus:ring-4 focus:ring-blue-100 focus:border-blue-500 border p-3 transition" 
                    placeholder="Contoh: Pendidikan bukan hanya tentang transfer pengetahuan...">{{ old('quote') }}</textarea>
            </div>

            <div>
                <label class="flex items-center gap-2 cursor-pointer">
                    <input type="checkbox" name="is_active" value="1" {{ old('is_active', true) ? 'checked' : '' }} class="w-5 h-5">
                    <span class="text-slate-700 font-semibold">Aktifkan profil ini</span>
                </label>
                <p class="text-xs text-slate-500 mt-1">Jika diaktifkan, profil lain akan otomatis dinonaktifkan.</p>
            </div>

            <div class="flex gap-5 justify-end items-center pt-6 border-t border-slate-200">
                <a href="{{ route($routePrefix . '.kepala-sekolah.index') }}" class="text-slate-500 font-medium hover:text-slate-700">Batal</a>
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
