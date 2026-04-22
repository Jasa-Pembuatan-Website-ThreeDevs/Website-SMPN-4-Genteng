<style>
    .spmb-form-card {
        background: #ffffff;
        border-radius: 20px;
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.05);
        border: 1px solid #f1f5f9;
        overflow: hidden;
        margin-top: 2rem;
    }

    .spmb-form-header {
        background: linear-gradient(135deg, #2563eb 0%, #1d4ed8 100%);
        padding: 2rem;
        color: white;
    }

    .spmb-form-header h2 {
        font-size: 1.5rem;
        font-weight: 700;
        margin-bottom: 0.5rem;
    }

    .spmb-form-header p {
        opacity: 0.9;
        font-size: 0.9rem;
    }

    .spmb-form-body {
        padding: 2.5rem;
    }

    .spmb-section-title {
        font-size: 1.1rem;
        font-weight: 700;
        color: #1e293b;
        margin-bottom: 1.5rem;
        display: flex;
        align-items: center;
        gap: 0.75rem;
        padding-bottom: 0.75rem;
        border-bottom: 2px solid #f1f5f9;
    }

    .spmb-section-title i {
        color: #2563eb;
    }

    .spmb-grid {
        display: grid;
        grid-template-columns: repeat(2, 1fr);
        gap: 1.5rem;
        margin-bottom: 2.5rem;
    }

    .spmb-field {
        display: flex;
        flex-direction: column;
        gap: 0.5rem;
    }

    .spmb-field.full-width {
        grid-column: span 2;
    }

    .spmb-label {
        font-size: 0.875rem;
        font-weight: 600;
        color: #475569;
    }

    .spmb-input-group {
        position: relative;
    }

    .spmb-input-group i {
        position: absolute;
        left: 1rem;
        top: 50%;
        transform: translateY(-50%);
        color: #94a3b8;
        transition: color 0.2s;
    }

    .spmb-input {
        width: 100%;
        padding: 0.75rem 1rem 0.75rem 2.75rem;
        border: 1.5px solid #e2e8f0;
        border-radius: 12px;
        font-size: 0.95rem;
        color: #1e293b;
        transition: all 0.2s;
        background: #f8fafc;
    }

    .spmb-input:focus {
        outline: none;
        border-color: #2563eb;
        background: #fff;
        box-shadow: 0 0 0 4px rgba(37, 99, 235, 0.1);
    }

    .spmb-input:focus + i {
        color: #2563eb;
    }

    .spmb-textarea {
        padding-top: 0.75rem;
        min-height: 100px;
    }

    .spmb-input-group textarea + i {
        top: 1.25rem;
        transform: none;
    }

    .spmb-file-upload {
        display: grid;
        grid-template-columns: repeat(2, 1fr);
        gap: 1.5rem;
    }

    .spmb-file-box {
        border: 2px dashed #e2e8f0;
        border-radius: 12px;
        padding: 1.5rem;
        text-align: center;
        cursor: pointer;
        transition: all 0.2s;
        background: #f8fafc;
        position: relative;
    }

    .spmb-file-box:hover {
        border-color: #2563eb;
        background: rgba(37, 99, 235, 0.02);
    }

    .spmb-file-box i {
        font-size: 1.5rem;
        color: #94a3b8;
        margin-bottom: 0.5rem;
    }

    .spmb-file-info {
        font-size: 0.8rem;
        color: #64748b;
        margin-top: 0.5rem;
    }

    .spmb-submit-btn {
        width: 100%;
        padding: 1rem;
        background: #2563eb;
        color: white;
        border: none;
        border-radius: 12px;
        font-size: 1rem;
        font-weight: 700;
        cursor: pointer;
        transition: all 0.2s;
        margin-top: 2rem;
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 0.75rem;
    }

    .spmb-submit-btn:hover {
        background: #1d4ed8;
        transform: translateY(-2px);
        box-shadow: 0 10px 20px rgba(37, 99, 235, 0.2);
    }

    @media (max-width: 768px) {
        .spmb-grid, .spmb-file-upload {
            grid-template-columns: 1fr;
        }
        .spmb-field.full-width {
            grid-column: span 1;
        }
        .spmb-form-body {
            padding: 1.5rem;
        }
    }
</style>

<div class="spmb-form-card">
    <div class="spmb-form-header">
        <h2>Formulir Pendaftaran</h2>
        <p>Silakan isi data calon siswa dengan lengkap dan benar sesuai dokumen resmi.</p>
    </div>

    <div class="spmb-form-body">
        @if ($errors->any())
            <div class="bg-red-50 border-l-4 border-red-500 p-4 mb-6 rounded-r-xl" role="alert">
                <div class="flex">
                    <div class="flex-shrink-0">
                        <i class="fas fa-exclamation-circle text-red-500"></i>
                    </div>
                    <div class="ml-3">
                        <p class="text-sm text-red-700 font-bold">Terjadi kesalahan pendaftaran:</p>
                        <ul class="mt-1 list-disc list-inside text-xs text-red-600">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        @endif

        <form action="{{ route('spmb.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="batch_id" value="{{ $batch->id ?? '' }}">

            <!-- Section: Data Calon Siswa -->
            <div class="spmb-section-title">
                <i class="fas fa-user-graduate"></i> Identitas Calon Siswa
            </div>

            <div class="spmb-grid">
                <div class="spmb-field full-width">
                    <label class="spmb-label">Nama Lengkap</label>
                    <div class="spmb-input-group">
                        <input type="text" name="name" value="{{ old('name') }}" class="spmb-input" placeholder="Nama sesuai Ijazah SD/MI" required>
                        <i class="fas fa-user"></i>
                    </div>
                    @error('name') <small class="text-red-500 text-xs">{{ $message }}</small> @enderror
                </div>

                <div class="spmb-field">
                    <label class="spmb-label">NISN</label>
                    <div class="spmb-input-group">
                        <input type="number" name="nisn" value="{{ old('nisn') }}" class="spmb-input" placeholder="10 Digit NISN" required>
                        <i class="fas fa-id-card"></i>
                    </div>
                    @error('nisn') <small class="text-red-500 text-xs">{{ $message }}</small> @enderror
                </div>

                <div class="spmb-field">
                    <label class="spmb-label">Jenis Kelamin</label>
                    <div class="spmb-input-group">
                        <select name="gender" class="spmb-input" required>
                            <option value="" disabled {{ old('gender') ? '' : 'selected' }}>Pilih Jenis Kelamin</option>
                            <option value="L" {{ old('gender') == 'L' ? 'selected' : '' }}>Laki-laki</option>
                            <option value="P" {{ old('gender') == 'P' ? 'selected' : '' }}>Perempuan</option>
                        </select>
                        <i class="fas fa-venus-mars"></i>
                    </div>
                    @error('gender') <small class="text-red-500 text-xs">{{ $message }}</small> @enderror
                </div>

                <div class="spmb-field">
                    <label class="spmb-label">Tempat Lahir</label>
                    <div class="spmb-input-group">
                        <input type="text" name="birth_place" value="{{ old('birth_place') }}" class="spmb-input" placeholder="Kota Kelahiran" required>
                        <i class="fas fa-map-marker-alt"></i>
                    </div>
                    @error('birth_place') <small class="text-red-500 text-xs">{{ $message }}</small> @enderror
                </div>

                <div class="spmb-field">
                    <label class="spmb-label">Tanggal Lahir</label>
                    <div class="spmb-input-group">
                        <input type="date" name="birth_date" value="{{ old('birth_date') }}" class="spmb-input" required>
                        <i class="fas fa-calendar-alt"></i>
                    </div>
                    @error('birth_date') <small class="text-red-500 text-xs">{{ $message }}</small> @enderror
                </div>

                <div class="spmb-field full-width">
                    <label class="spmb-label">Asal Sekolah</label>
                    <div class="spmb-input-group">
                        <input type="text" name="origin_school" value="{{ old('origin_school') }}" class="spmb-input" placeholder="Nama SD/MI Asal" required>
                        <i class="fas fa-school"></i>
                    </div>
                    @error('origin_school') <small class="text-red-500 text-xs">{{ $message }}</small> @enderror
                </div>
            </div>

            <!-- Section: Kontak & Alamat -->
            <div class="spmb-section-title">
                <i class="fas fa-home"></i> Kontak & Domisili
            </div>

            <div class="spmb-grid">
                <div class="spmb-field full-width">
                    <label class="spmb-label">Alamat Lengkap</label>
                    <div class="spmb-input-group">
                        <textarea name="address" class="spmb-input spmb-textarea" placeholder="Jalan, RT/RW, Dusun, Desa, Kecamatan" required>{{ old('address') }}</textarea>
                        <i class="fas fa-map-marked-alt"></i>
                    </div>
                    @error('address') <small class="text-red-500 text-xs">{{ $message }}</small> @enderror
                </div>

                <div class="spmb-field">
                    <label class="spmb-label">Nama Orang Tua / Wali</label>
                    <div class="spmb-input-group">
                        <input type="text" name="parent_name" value="{{ old('parent_name') }}" class="spmb-input" placeholder="Nama Ayah / Ibu / Wali" required>
                        <i class="fas fa-user-friends"></i>
                    </div>
                    @error('parent_name') <small class="text-red-500 text-xs">{{ $message }}</small> @enderror
                </div>

                <div class="spmb-field">
                    <label class="spmb-label">Nomor WhatsApp Aktif</label>
                    <div class="spmb-input-group">
                        <input type="tel" name="whatsapp" value="{{ old('whatsapp') }}" class="spmb-input" placeholder="08xxxxxxxxxx" required>
                        <i class="fab fa-whatsapp"></i>
                    </div>
                    @error('whatsapp') <small class="text-red-500 text-xs">{{ $message }}</small> @enderror
                </div>
            </div>

            <!-- Section: Berkas -->
            <div class="spmb-section-title">
                <i class="fas fa-file-upload"></i> Unggah Dokumen Pendukung
            </div>

            <div class="spmb-file-upload">
                <div class="spmb-field">
                    <label class="spmb-label">Pas Foto (3x4)</label>
                    <div class="spmb-file-box">
                        <input type="file" name="photo" accept="image/*" class="absolute inset-0 opacity-0 cursor-pointer">
                        <i class="fas fa-camera"></i>
                        <p class="text-xs font-semibold text-slate-600">Klik atau seret foto</p>
                        <p class="spmb-file-info">JPG/PNG, Max 2MB</p>
                    </div>
                    @error('photo') <small class="text-red-500 text-xs">{{ $message }}</small> @enderror
                </div>

                <div class="spmb-field">
                    <label class="spmb-label">Kartu Keluarga (KK)</label>
                    <div class="spmb-file-box">
                        <input type="file" name="kk" accept=".pdf,image/*" class="absolute inset-0 opacity-0 cursor-pointer">
                        <i class="fas fa-file-pdf"></i>
                        <p class="text-xs font-semibold text-slate-600">Klik atau seret file KK</p>
                        <p class="spmb-file-info">PDF/JPG, Max 2MB</p>
                    </div>
                    @error('kk') <small class="text-red-500 text-xs">{{ $message }}</small> @enderror
                </div>
            </div>

            <button type="submit" class="spmb-submit-btn">
                <i class="fas fa-paper-plane"></i> Kirim Pendaftaran Sekarang
            </button>
        </form>
    </div>
</div>
