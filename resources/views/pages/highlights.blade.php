<section class="section section-light" id="highlights">
    <div class="container">
        <div class="section-title animate-on-scroll">
            <h2>SMPN 4 Genteng dalam Angka</h2>
            <p>Pencapaian dan dedikasi kami dalam dunia pendidikan selama lebih dari tiga dekade</p>
        </div>

        <div class="stats-grid">
            <div class="stat-card animate-on-scroll">
                <div class="stat-icon">
                    <i class="fas fa-user-graduates"></i>
                </div>
                <div class="stat-number" data-target="15000">15.000+</div>
                <div class="stat-label">Alumni Sukses</div>
            </div>

            <div class="stat-card animate-on-scroll">
                <div class="stat-icon">
                    <i class="fas fa-award"></i>
                </div>
                <div class="stat-number" data-target="250">250+</div>
                <div class="stat-label">Penghargaan</div>
            </div>

            <div class="stat-card animate-on-scroll">
                <div class="stat-icon">
                    <i class="fas fa-chalkboard-teacher"></i>
                </div>
                <div class="stat-number" data-target="60">60+</div>
                <div class="stat-label">Guru & Staf Ahli</div>
            </div>

            <div class="stat-card animate-on-scroll">
                <div class="stat-icon">
                    <i class="fas fa-book-reader"></i>
                </div>
                <div class="stat-number" data-target="32">32</div>
                <div class="stat-label">Ekstrakurikuler</div>
            </div>
        </div>

        <div class="highlights-info animate-on-scroll">
            <div class="info-content">
                <h3>Mengapa Memilih Kami?</h3>
                <p>SMPN 4 Genteng bukan sekadar tempat belajar, melainkan kawah candradimuka bagi para calon pemimpin masa depan. Kami menggabungkan kurikulum nasional dengan program pengembangan karakter yang kuat.</p>
                <ul class="highlight-list">
                    <li><i class="fas fa-check-circle"></i> Fasilitas Laboratorium Terpadu (IPA, Bahasa, Komputer)</li>
                    <li><i class="fas fa-check-circle"></i> Lingkungan Sekolah Adiwiyata yang Asri dan Nyaman</li>
                    <li><i class="fas fa-check-circle"></i> Program Tahfidz dan Pengembangan Literasi</li>
                    <li><i class="fas fa-check-circle"></i> Kerjasama dengan Berbagai Institusi (DUDIKA)</li>
                </ul>
                <a href="/visi-misi" class="btn btn-primary">Selengkapnya Tentang Kami</a>
            </div>
            <div class="info-image">
                <img src="https://images.unsplash.com/photo-1577891729319-66dd7e431726?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=2070&q=80" alt="Siswa SMPN 4 Genteng" class="rounded-lg shadow-xl">
            </div>
        </div>
    </div>
</section>

<style>
    .stats-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
        gap: 30px;
        margin-bottom: 80px;
    }

    .stat-card {
        background: var(--white);
        padding: 40px 30px;
        border-radius: var(--radius-lg);
        text-align: center;
        box-shadow: var(--shadow-md);
        transition: var(--transition);
        border-bottom: 5px solid var(--primary);
    }

    .stat-card:hover {
        transform: translateY(-10px);
        box-shadow: var(--shadow-lg);
    }

    .stat-icon {
        font-size: 2.5rem;
        color: var(--primary);
        margin-bottom: 20px;
    }

    .stat-number {
        font-size: 2.5rem;
        font-weight: 800;
        color: var(--dark);
        margin-bottom: 10px;
        font-family: 'Poppins', sans-serif;
    }

    .stat-label {
        font-size: 1.1rem;
        color: var(--gray);
        font-weight: 600;
    }

    .highlights-info {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 60px;
        align-items: center;
        background: var(--white);
        padding: 50px;
        border-radius: var(--radius-lg);
        box-shadow: var(--shadow-lg);
    }

    .info-content h3 {
        font-size: 2rem;
        margin-bottom: 20px;
        color: var(--dark);
    }

    .info-content p {
        margin-bottom: 25px;
        color: var(--gray);
    }

    .highlight-list {
        margin-bottom: 30px;
    }

    .highlight-list li {
        display: flex;
        align-items: center;
        gap: 12px;
        margin-bottom: 15px;
        font-weight: 500;
        color: var(--dark);
    }

    .highlight-list i {
        color: var(--success);
        font-size: 1.2rem;
    }

    .info-image img {
        width: 100%;
        border-radius: var(--radius-lg);
        object-fit: cover;
        height: 400px;
    }

    @media (max-width: 992px) {
        .highlights-info {
            grid-template-columns: 1fr;
            gap: 40px;
            padding: 30px;
        }
        
        .info-image {
            order: -1;
        }
    }
</style>
