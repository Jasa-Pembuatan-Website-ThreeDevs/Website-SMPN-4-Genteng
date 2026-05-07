<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/cropperjs@1.6.2/dist/cropper.min.css">
<script src="https://cdn.jsdelivr.net/npm/cropperjs@1.6.2/dist/cropper.min.js"></script>

<div class="form-container">
    <div class="form-card">
        @if ($errors->any())
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-4" role="alert">
                <strong class="font-bold">Oops!</strong>
                <span class="block sm:inline">Terjadi kesalahan saat mengisi form. Silakan cek kembali inputan
                    Anda.</span>
                <ul class="mt-2 list-disc list-inside text-sm">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form action="{{ route('spmb.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="batch_id" value="{{ $batch->id ?? '' }}">
            <div class="form-section-title">
                <i class="fas fa-user-graduate"></i> Data Calon Siswa
            </div>
            <div class="form-grid">
                <div class="form-group">
                    <label>Nama Lengkap</label>
                    <div class="input-wrapper text-black">
                        <i class="fas fa-user"></i>
                        <input type="text" name="name" value="{{ old('name') }}"
                            placeholder="Sesuai Ijazah SD/MI" required>
                    </div>
                    @error('name')
                        <small class="text-red-500">{{ $message }}</small>
                    @enderror
                </div>
                <div class="form-group">
                    <label>NISN</label>
                    <div class="input-wrapper text-black">
                        <i class="fas fa-id-card"></i>
                        <input type="number" name="nisn" value="{{ old('nisn') }}" placeholder="10 digit NISN"
                            required>
                    </div>
                    @error('nisn')
                        <small class="text-red-500">{{ $message }}</small>
                    @enderror
                </div>
                <div class="form-group">
                    <label>Tempat Lahir</label>
                    <div class="input-wrapper text-black">
                        <i class="fas fa-map-marker-alt"></i>
                        <input type="text" name="birth_place" value="{{ old('birth_place') }}"
                            placeholder="Kota Kelahiran" required>
                    </div>
                    @error('birth_place')
                        <small class="text-red-500">{{ $message }}</small>
                    @enderror
                </div>
                <div class="form-group">
                    <label>Tanggal Lahir</label>
                    <div class="input-wrapper text-black">
                        <i class="fas fa-calendar-alt"></i>
                        <input type="date" name="birth_date" value="{{ old('birth_date') }}" required>
                    </div>
                    @error('birth_date')
                        <small class="text-red-500">{{ $message }}</small>
                    @enderror
                </div>
                <div class="form-group">
                    <label>Jenis Kelamin</label>
                    <div class="input-wrapper text-black">
                        <i class="fas fa-venus-mars"></i>
                        <select name="gender" required>
                            <option value="" disabled {{ old('gender') ? '' : 'selected' }}>Pilih Jenis Kelamin
                            </option>
                            <option value="L" {{ old('gender') == 'L' ? 'selected' : '' }}>Laki-laki</option>
                            <option value="P" {{ old('gender') == 'P' ? 'selected' : '' }}>Perempuan</option>
                        </select>
                    </div>
                    @error('gender')
                        <small class="text-red-500">{{ $message }}</small>
                    @enderror
                </div>
                <div class="form-group">
                    <label>Asal Sekolah</label>
                    <div class="input-wrapper text-black">
                        <i class="fas fa-school"></i>
                        <input type="text" name="origin_school" value="{{ old('origin_school') }}"
                            placeholder="Nama SD/MI Asal" required>
                    </div>
                    @error('origin_school')
                        <small class="text-red-500">{{ $message }}</small>
                    @enderror
                </div>
            </div>

            <hr class="form-divider">

            <div class="form-section-title">
                <i class="fas fa-home"></i> Kontak & Orang Tua
            </div>

            <div class="form-grid">
                <div class="form-group full-width">
                    <label>Alamat Lengkap</label>
                    <div class="input-wrapper text-black">
                        <i class="fas fa-map"></i>
                        <textarea name="address" rows="3" placeholder="Nama Jalan, RT/RW, Desa/Kelurahan, Kecamatan" required>{{ old('address') }}</textarea>
                    </div>
                    @error('address')
                        <small class="text-red-500">{{ $message }}</small>
                    @enderror
                </div>
                <div class="form-group">
                    <label>Nama Wali / Orang Tua</label>
                    <div class="input-wrapper text-black">
                        <i class="fas fa-user-friends"></i>
                        <input type="text" name="parent_name" value="{{ old('parent_name') }}"
                            placeholder="Nama Ayah/Ibu" required>
                    </div>
                    @error('parent_name')
                        <small class="text-red-500">{{ $message }}</small>
                    @enderror
                </div>
                <div class="form-group">
                    <label>Nomor WhatsApp (Aktif)</label>
                    <div class="input-wrapper text-black">
                        <i class="fab fa-whatsapp"></i>
                        <input type="tel" name="whatsapp" value="{{ old('whatsapp') }}" placeholder="08xxxxxxxxxx"
                            required>
                    </div>
                    @error('whatsapp')
                        <small class="text-red-500">{{ $message }}</small>
                    @enderror
                </div>
            </div>

            <hr class="form-divider">

            <div class="form-section-title">
                <i class="fas fa-file-upload"></i> Upload Berkas
            </div>

            <div class="file-upload-container">

                <!-- FOTO -->
                <div class="form-group">
                    <label>Foto Resmi (3x4)</label>

                    <div class="file-drop-area flex flex-col" id="photoArea">

                        <span class="file-msg" id="photoMsg">
                            Drag & drop atau klik untuk upload
                        </span>

                        <img id="photoPreview" class="hidden mx-auto mt-2 rounded object-cover"
                            style="width:120px; height:160px;">

                        <input class="file-input" type="file" id="photoInput" accept="image/*">

                        <!-- hasil crop -->
                        <input type="hidden" name="photo" id="croppedPhoto">
                    </div>

                    <small class="text-help">
                        Format JPG/PNG, Max 2MB, Background Merah/Biru
                    </small>

                    @error('photo')
                        <div class="text-red-500 text-xs mt-1">
                            {{ $message }}
                        </div>
                    @enderror
                </div>


                <!-- KK -->
                <div class="form-group">
                    <label>Scan Kartu Keluarga (KK)</label>

                    <div class="file-drop-area">

                        <span class="file-msg" id="kkMsg">
                            Drag & drop atau klik untuk upload
                        </span>

                        <input class="file-input" type="file" id="kkInput" name="kk"
                            accept=".pdf,image/*">
                    </div>

                    <small class="text-help">
                        Format PDF/JPG, Max 2MB
                    </small>

                    @error('kk')
                        <div class="text-red-500 text-xs mt-1">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

            </div>

            <div class="form-actions">
                <button type="submit" class="btn btn-primary btn-lg btn-block">
                    <i class="fas fa-paper-plane"></i> Kirim Formulir Pendaftaran
                </button>
            </div>

        </form>
    </div>
</div>

<div id="cropModal" class="fixed inset-0 bg-black/70 z-[1001] hidden items-center justify-center p-4">

    <div class="bg-white w-full max-w-3xl rounded-2xl shadow-xl overflow-hidden flex flex-col">

        <!-- HEADER -->
        <div class="px-6 py-4 border-b">
            <h3 class="text-lg font-semibold">
                Crop Foto
            </h3>
        </div>

        <!-- BODY -->
        <div class="p-4 overflow-auto">

            <div class="w-full h-[70vh]">
                <img id="cropImage" class="block max-w-full" style="max-height:70vh;">
            </div>

        </div>

        <!-- FOOTER -->
        <div class="px-6 py-4 border-t flex justify-end gap-3">

            <button class="bg-gray-500 hover:bg-gray-600 text-white px-4 py-2 rounded-lg" type="button"
                id="closeCrop">
                Batal
            </button>

            <button class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-lg" type="button"
                id="cropBtn">
                Gunakan Foto
            </button>

        </div>
    </div>
</div>

<script>
    let cropper;

    const photoInput = document.getElementById('photoInput');
    const cropModal = document.getElementById('cropModal');
    const cropImage = document.getElementById('cropImage');
    const cropBtn = document.getElementById('cropBtn');
    const closeCrop = document.getElementById('closeCrop');

    const photoPreview = document.getElementById('photoPreview');
    const photoMsg = document.getElementById('photoMsg');
    const croppedPhoto = document.getElementById('croppedPhoto');


    // ==================================
    // FOTO DIPILIH
    // ==================================
    photoInput.addEventListener('change', function(e) {

        const file = e.target.files[0];
        if (!file) return;

        const reader = new FileReader();

        reader.onload = function(event) {

            cropImage.src = event.target.result;

            // tampilkan modal
            cropModal.classList.remove('hidden');
            cropModal.classList.add('flex');

            document.body.style.overflow = 'hidden';

            // destroy lama
            if (cropper) {
                cropper.destroy();
            }

            // tunggu image render
            setTimeout(() => {

                cropper = new Cropper(cropImage, {
                    aspectRatio: 3 / 4,
                    viewMode: 1,
                    responsive: true,
                    autoCropArea: 1,
                });

            }, 100);
        };

        reader.readAsDataURL(file);
    });


    // ==================================
    // HASIL CROP
    // ==================================
    cropBtn.addEventListener('click', function() {
        document.body.style.overflow = 'auto';

        const canvas = cropper.getCroppedCanvas({
            width: 300,
            height: 400
        });

        const croppedImage = canvas.toDataURL('image/jpeg');

        // preview gambar
        photoPreview.src = croppedImage;
        photoPreview.classList.remove('hidden');

        // simpan ke hidden input
        croppedPhoto.value = croppedImage;

        // ganti text
        photoMsg.innerText = 'Foto berhasil dipilih';

        // tutup modal
        cropModal.style.display = 'none';

        cropper.destroy();
    });


    // ==================================
    // TUTUP MODAL
    // ==================================
    closeCrop.addEventListener('click', function() {

        cropModal.classList.add('hidden');
        cropModal.classList.remove('flex');

        document.body.style.overflow = 'auto';

        if (cropper) {
            cropper.destroy();
        }
    });


    // ==================================
    // TAMPILKAN NAMA FILE KK
    // ==================================
    document.getElementById('kkInput')
        .addEventListener('change', function(e) {

            const file = e.target.files[0];

            if (file) {
                document.getElementById('kkMsg').innerText = file.name;
            }
        });
</script>
