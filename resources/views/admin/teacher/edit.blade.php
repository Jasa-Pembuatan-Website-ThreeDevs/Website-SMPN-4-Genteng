@extends('layouts.app')

@section('content')

{{-- {{ dd($teacher) }} --}}

<div class="max-w-4xl mx-auto p-6">
    <div class="bg-white rounded-2xl shadow-sm border border-slate-200 p-8">
        <h2 class="text-2xl font-bold text-slate-900 mb-6">Edit Guru</h2>

        @php
            $routePrefix = auth()->user()->role === 'administrator' ? 'admin' : auth()->user()->role;
        @endphp

        <form action="{{ route($routePrefix . '.teacher.update', $teacher->id) }}" method="POST" enctype="multipart/form-data" class="space-y-6">
            @csrf
            @method('PUT')

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <label class="block text-sm font-semibold text-slate-700 mb-2">Nama Lengkap</label>
                    <input type="text" name="full_name" value="{{ old('full_name', $teacher->full_name) }}"
                        class="w-full border-slate-200 rounded-xl focus:ring-4 focus:ring-blue-100 focus:border-blue-500 border p-3 transition @error('full_name') border-red-500 @enderror"
                        required>
                    @error('full_name') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                </div>

                <div>
                    <label class="block text-sm font-semibold text-slate-700 mb-2">Mata Pelajaran</label>
                    <input type="text" name="subject_specialization" value="{{ old('subject_specialization', $teacher->subject_specialization) }}"
                        class="w-full border-slate-200 rounded-xl focus:ring-4 focus:ring-blue-100 focus:border-blue-500 border p-3 transition @error('subject_specialization') border-red-500 @enderror"
                        required>
                    @error('subject_specialization') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                </div>
            </div>

            <div>
                <label class="block text-sm font-semibold text-slate-700 mb-2">Foto Guru</label>
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

                <div id="imagePreview" class="{{ $teacher->image ? '' : 'hidden' }} mt-4">
                    <p class="text-sm font-medium text-slate-700 mb-2">Preview Foto:</p>
                    <div class="bg-slate-100 rounded-xl p-4">
                        <img id="previewImg" src="{{ $teacher->image ? asset('storage/' . $teacher->image) : '' }}" alt="Preview" class="max-h-64 mx-auto rounded">
                        <button type="button" id="removeImage" class="mt-3 text-red-600 hover:text-red-700 text-sm font-medium">
                            <i class="fas fa-trash-alt mr-1"></i> Hapus Foto
                        </button>
                    </div>
                </div>
                @error('image') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
            </div>

            <div>
                <label class="block text-sm font-semibold text-slate-700 mb-2">Email</label>
                <input type="email" name="email" value="{{ old('email', $teacher->email) }}"
                    class="w-full border-slate-200 rounded-xl focus:ring-4 focus:ring-blue-100 focus:border-blue-500 border p-3 transition @error('email') border-red-500 @enderror">
                @error('email') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
            </div>

            <div>
                <label class="block text-sm font-semibold text-slate-700 mb-2">Nomor HP</label>
                <input type="text" name="phone_number" value="{{ old('phone_number', $teacher->phone_number) }}"
                    class="w-full border-slate-200 rounded-xl focus:ring-4 focus:ring-blue-100 focus:border-blue-500 border p-3 transition @error('phone_number') border-red-500 @enderror">
                @error('phone_number') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
            </div>

            <div class="flex gap-5 justify-end items-center pt-6 border-t border-slate-200">
                <a href="{{ route($routePrefix . '.teacher.index') }}" class="text-slate-500 font-medium hover:text-slate-700">Batal</a>
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
        @if($teacher->image)
            previewImg.src = "{{ asset('storage/' . $teacher->image) }}";
        @else
            imagePreview.classList.add('hidden');
        @endif
    });
</script>
@endsection
