<link rel="stylesheet" href="css/style.css">
@include('components.navbar')
 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
<section class="section section-dark" id="ppdb-form">
    <div class="container">
        <div class="section-title">
            <h2>Formulir Pendaftaran</h2>
            <p>Isi data diri calon siswa dengan benar dan lengkap</p>
        </div>

        <div class="form-container">
        <div class="form-card">
            <form action="#" method="POST" enctype="multipart/form-data">
                
                <div class="form-section-title">
                    <i class="fas fa-user-graduate"></i> Data Calon Siswa
                </div>
                
                <div class="form-grid">
                    <div class="form-group">
                        <label>Nama Lengkap</label>
                        <div class="input-wrapper">
                            <i class="fas fa-user"></i>
                            <input type="text" placeholder="Sesuai Ijazah SD/MI" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <label>NISN</label>
                        <div class="input-wrapper">
                            <i class="fas fa-id-card"></i>
                            <input type="number" placeholder="10 digit NISN" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <label>Tempat Lahir</label>
                        <div class="input-wrapper">
                            <i class="fas fa-map-marker-alt"></i>
                            <input type="text" placeholder="Kota Kelahiran" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <label>Tanggal Lahir</label>
                        <div class="input-wrapper">
                            <i class="fas fa-calendar-alt"></i>
                            <input type="date" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <label>Jenis Kelamin</label>
                        <div class="input-wrapper">
                            <i class="fas fa-venus-mars"></i>
                            <select required>
                                <option value="" disabled selected>Pilih Jenis Kelamin</option>
                                <option value="L">Laki-laki</option>
                                <option value="P">Perempuan</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <label>Asal Sekolah</label>
                        <div class="input-wrapper">
                            <i class="fas fa-school"></i>
                            <input type="text" placeholder="Nama SD/MI Asal" required>
                        </div>
                    </div>
                </div>

                <hr class="form-divider">

                <div class="form-section-title">
                    <i class="fas fa-home"></i> Kontak & Orang Tua
                </div>

                <div class="form-grid">
                    <div class="form-group full-width">
                        <label>Alamat Lengkap</label>
                        <div class="input-wrapper">
                            <i class="fas fa-map"></i>
                            <textarea rows="3" placeholder="Nama Jalan, RT/RW, Desa/Kelurahan, Kecamatan" required></textarea>
                        </div>
                    </div>

                    <div class="form-group">
                        <label>Nama Wali / Orang Tua</label>
                        <div class="input-wrapper">
                            <i class="fas fa-user-friends"></i>
                            <input type="text" placeholder="Nama Ayah/Ibu" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <label>Nomor WhatsApp (Aktif)</label>
                        <div class="input-wrapper">
                            <i class="fab fa-whatsapp"></i>
                            <input type="tel" placeholder="08xxxxxxxxxx" required>
                        </div>
                    </div>
                </div>

                <hr class="form-divider">

                <div class="form-section-title">
                    <i class="fas fa-file-upload"></i> Upload Berkas
                </div>
                
                <div class="file-upload-container">
                    <div class="form-group">
                        <label>Foto Resmi (3x4)</label>
                        <div class="file-drop-area">
                            <span class="file-msg">Drag & drop atau klik untuk upload</span>
                            <input class="file-input" type="file" accept="image/*">
                        </div>
                        <small class="text-help">Format JPG/PNG, Max 2MB, Background Merah/Biru</small>
                    </div>

                    <div class="form-group">
                        <label>Scan Kartu Keluarga (KK)</label>
                        <div class="file-drop-area">
                            <span class="file-msg">Drag & drop atau klik untuk upload</span>
                            <input class="file-input" type="file" accept=".pdf,image/*">
                        </div>
                        <small class="text-help">Format PDF/JPG, Max 2MB</small>
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
</div>
</section>

@include('components.footer')