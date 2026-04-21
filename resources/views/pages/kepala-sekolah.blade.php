<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kepala Sekolah | SMPN 4 Genteng</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>
        /* Page Header */
        .page-header {
            padding: 160px 0 80px;
            background: var(--gradient-primary);
            color: var(--white);
            text-align: center;
            position: relative;
            overflow: hidden;
        }

        .page-header::before {
            content: '';
            position: absolute;
            top: 0;
            right: 0;
            width: 100%;
            height: 100%;
            background: url('https://images.unsplash.com/photo-1523050854058-8df90110c9f1?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=2070&q=80') center/cover no-repeat;
            opacity: 0.1;
        }

        .page-header h1 {
            font-size: 3.5rem;
            margin-bottom: 16px;
            position: relative;
            z-index: 1;
        }

        .page-header p {
            font-size: 1.2rem;
            max-width: 700px;
            margin: 0 auto;
            opacity: 0.9;
            position: relative;
            z-index: 1;
        }

        .breadcrumb {
            display: flex;
            justify-content: center;
            gap: 10px;
            margin-top: 30px;
            font-size: 0.95rem;
            position: relative;
            z-index: 1;
        }

        .breadcrumb a {
            color: rgba(255, 255, 255, 0.9);
            transition: var(--transition-fast);
        }

        .breadcrumb a:hover {
            color: var(--white);
            text-decoration: underline;
        }

        .breadcrumb .separator {
            color: rgba(255, 255, 255, 0.6);
        }

        /* Headmaster Page */
        .headmaster-container {
            display: grid;
            grid-template-columns: 1fr 2fr;
            gap: 60px;
            align-items: start;
        }

        .headmaster-profile {
            background: var(--white);
            border-radius: var(--radius-lg);
            padding: 40px;
            box-shadow: var(--shadow-lg);
            text-align: center;
            position: sticky;
            top: 120px;
        }

        .headmaster-photo {
            width: 200px;
            height: 200px;
            margin: 0 auto 25px;
            border-radius: 50%;
            overflow: hidden;
            border: 5px solid var(--white);
            box-shadow: var(--shadow-md);
        }

        .headmaster-photo img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .headmaster-name {
            font-size: 1.8rem;
            margin-bottom: 8px;
            color: var(--dark);
        }

        .headmaster-position {
            font-size: 1.1rem;
            color: var(--primary);
            font-weight: 600;
            margin-bottom: 20px;
        }

        .headmaster-details {
            text-align: left;
            margin-top: 30px;
        }

        .detail-item {
            display: flex;
            align-items: flex-start;
            gap: 12px;
            margin-bottom: 20px;
        }

        .detail-icon {
            width: 40px;
            height: 40px;
            flex-shrink: 0;
            border-radius: 50%;
            background: rgba(37, 99, 235, 0.1);
            display: flex;
            align-items: center;
            justify-content: center;
            color: var(--primary);
        }

        .headmaster-bio {
            background: var(--white);
            border-radius: var(--radius-lg);
            padding: 50px;
            box-shadow: var(--shadow-lg);
        }

        .headmaster-bio h2 {
            font-size: 2rem;
            margin-bottom: 25px;
            color: var(--dark);
            position: relative;
            padding-bottom: 15px;
        }

        .headmaster-bio h2::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 0;
            width: 80px;
            height: 4px;
            background: var(--gradient-primary);
            border-radius: 2px;
        }

        .headmaster-bio p {
            margin-bottom: 20px;
            color: var(--gray);
        }

        .headmaster-quote {
            background: rgba(37, 99, 235, 0.05);
            border-left: 4px solid var(--primary);
            padding: 25px;
            border-radius: 0 var(--radius-md) var(--radius-md) 0;
            margin: 40px 0;
            font-style: italic;
            font-size: 1.1rem;
            color: var(--dark);
        }

        .headmaster-quote i {
            color: var(--primary);
            font-size: 1.5rem;
            margin-right: 10px;
        }

        .headmaster-achievements {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(250px, 1fr));
            gap: 25px;
            margin-top: 40px;
        }

        .achievement-item {
            background: var(--white);
            border-radius: var(--radius-md);
            padding: 25px;
            box-shadow: var(--shadow-sm);
            border: 1px solid var(--gray-light);
            text-align: center;
            transition: var(--transition);
        }

        .achievement-item:hover {
            transform: translateY(-5px);
            box-shadow: var(--shadow-md);
            border-color: var(--primary);
        }

        .achievement-icon {
            width: 60px;
            height: 60px;
            margin: 0 auto 15px;
            border-radius: 50%;
            background: rgba(37, 99, 235, 0.1);
            display: flex;
            align-items: center;
            justify-content: center;
            color: var(--primary);
            font-size: 1.5rem;
        }

        @media (max-width: 1024px) {
            .headmaster-container {
                grid-template-columns: 1fr;
                gap: 50px;
            }
            .headmaster-profile {
                position: static;
            }
        }

        @media (max-width: 768px) {
            .page-header {
                padding: 140px 0 60px;
            }
            .page-header h1 {
                font-size: 2.5rem;
            }
            .headmaster-bio {
                padding: 30px;
            }
        }

        @media (max-width: 576px) {
            .page-header h1 {
                font-size: 2rem;
            }
            .headmaster-profile, .headmaster-bio {
                padding: 20px;
            }
        }
    </style>
</head>
<body>
    <!-- Header & Navigation -->
    @include('components.navbar')

    <main class="main-content">
        <!-- Page Header -->
        <section class="page-header">
            <div class="container">
                <h1>Kepala Sekolah</h1>
                <p>Profil dan kepemimpinan {{ $kepalaSekolah->name ?? 'Dr. Sukaryanto, S.Pd.' }} sebagai Kepala SMPN 4 Genteng</p>
                
                <div class="breadcrumb">
                    <a href="/">Beranda</a>
                    <span class="separator">/</span>
                    <span>Kepala Sekolah</span>
                </div>
            </div>
        </section>

        <!-- Headmaster Content -->
        <section class="section">
            <div class="container">
                <div class="headmaster-container">
                    <!-- Headmaster Profile -->
                    <div class="headmaster-profile animate-on-scroll">
                        <div class="headmaster-photo">
                            @if(isset($kepalaSekolah) && $kepalaSekolah->image)
                                <img src="{{ asset('storage/' . $kepalaSekolah->image) }}" alt="Kepala Sekolah SMPN 4 Genteng">
                            @else
                                <img src="https://images.unsplash.com/photo-1560250097-0b93528c311a?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=987&q=80" alt="Kepala Sekolah SMPN 4 Genteng">
                            @endif
                        </div>
                        
                        <h2 class="headmaster-name">{{ $kepalaSekolah->name ?? 'Dr. Sukaryanto, S.Pd.' }}</h2>
                        <p class="headmaster-position">{{ $kepalaSekolah->position ?? 'Kepala Sekolah SMPN 4 Genteng' }}</p>
                        
                        <p style="color: var(--gray); margin-bottom: 20px;">
                            {{ $kepalaSekolah->bio_short ?? 'Memimpin SMPN 4 Genteng sejak tahun 2018 dengan dedikasi tinggi untuk memajukan pendidikan di Kabupaten Banyuwangi.' }}
                        </p>
                        
                        <div class="headmaster-details">
                            @if(isset($kepalaSekolah->education) || !isset($kepalaSekolah))
                            <div class="detail-item">
                                <div class="detail-icon">
                                    <i class="fas fa-graduation-cap"></i>
                                </div>
                                <div>
                                    <h4>Pendidikan</h4>
                                    <p>{{ $kepalaSekolah->education ?? 'S3 Pendidikan Universitas Negeri Malang' }}</p>
                                </div>
                            </div>
                            @endif
                            
                            @if(isset($kepalaSekolah->certification) || !isset($kepalaSekolah))
                            <div class="detail-item">
                                <div class="detail-icon">
                                    <i class="fas fa-award"></i>
                                </div>
                                <div>
                                    <h4>Sertifikasi</h4>
                                    <p>{{ $kepalaSekolah->certification ?? 'Guru Berprestasi Nasional 2019' }}</p>
                                </div>
                            </div>
                            @endif
                            
                            @if(isset($kepalaSekolah->period) || !isset($kepalaSekolah))
                            <div class="detail-item">
                                <div class="detail-icon">
                                    <i class="fas fa-calendar-alt"></i>
                                </div>
                                <div>
                                    <h4>Masa Jabatan</h4>
                                    <p>{{ $kepalaSekolah->period ?? '2018 - Sekarang' }}</p>
                                </div>
                            </div>
                            @endif
                            
                            @if(isset($kepalaSekolah->email) || !isset($kepalaSekolah))
                            <div class="detail-item">
                                <div class="detail-icon">
                                    <i class="fas fa-envelope"></i>
                                </div>
                                <div>
                                    <h4>Email</h4>
                                    <p>{{ $kepalaSekolah->email ?? 'kepsek@smpn4genteng.sch.id' }}</p>
                                </div>
                            </div>
                            @endif
                        </div>
                    </div>
                    
                    <!-- Headmaster Biography -->
                    <div class="headmaster-bio animate-on-scroll">
                        <h2>Biografi & Kepemimpinan</h2>
                        
                        @if(isset($kepalaSekolah->biography))
                            <div class="prose max-w-none">
                                {!! nl2br(e($kepalaSekolah->biography)) !!}
                            </div>
                        @else
                            <p>Dr. Sukaryanto, M.Pd. adalah seorang pendidik yang telah mendedikasikan hidupnya untuk dunia pendidikan selama lebih dari 25 tahun. Beliau memulai karir sebagai guru Matematika di SMPN 1 Genteng sebelum akhirnya dipercaya untuk memimpin SMPN 4 Genteng sejak tahun 2018.</p>
                            
                            <p>Dengan latar belakang pendidikan S3 dari Universitas Negeri Malang, Dr. Suryadi membawa pendekatan inovatif dalam memimpin SMPN 4 Genteng. Visinya untuk mengintegrasikan teknologi dalam pembelajaran telah membawa transformasi signifikan dalam proses belajar mengajar di sekolah.</p>
                        @endif
                        
                        @if(isset($kepalaSekolah->quote) || !isset($kepalaSekolah))
                        <div class="headmaster-quote">
                            <i class="fas fa-quote-left"></i>
                            {{ $kepalaSekolah->quote ?? 'Pendidikan bukan hanya tentang transfer pengetahuan, tetapi tentang membentuk karakter, mengasah keterampilan, dan menyiapkan generasi muda untuk menghadapi tantangan masa depan dengan percaya diri.' }}
                        </div>
                        @endif

                        @if(!isset($kepalaSekolah))
                        <p>Di bawah kepemimpinannya, SMPN 4 Genteng telah meraih berbagai prestasi baik di tingkat kabupaten, provinsi, maupun nasional. Beliau juga aktif dalam berbagai organisasi pendidikan dan sering menjadi pembicara dalam seminar dan workshop pengembangan pendidikan.</p>
                        
                        <h3 style="margin-top: 40px; margin-bottom: 20px;">Pencapaian Kepemimpinan</h3>
                        
                        <div class="headmaster-achievements">
                            <div class="achievement-item">
                                <div class="achievement-icon">
                                    <i class="fas fa-trophy"></i>
                                </div>
                                <h4>Sekolah Adiwiyata</h4>
                                <p>Membawa SMPN 4 Genteng meraih penghargaan Sekolah Adiwiyata tingkat kabupaten (2020) dan provinsi (2022).</p>
                            </div>
                            
                            <div class="achievement-item">
                                <div class="achievement-icon">
                                    <i class="fas fa-chart-line"></i>
                                </div>
                                <h4>Peningkatan Prestasi</h4>
                                <p>Rata-rata nilai UN meningkat 15% selama periode kepemimpinannya (2018-2023).</p>
                            </div>
                            
                            <div class="achievement-item">
                                <div class="achievement-icon">
                                    <i class="fas fa-laptop"></i>
                                </div>
                                <h4>Digitalisasi Sekolah</h4>
                                <p>Menginisiasi program digitalisasi sekolah dengan melengkapi semua ruang kelas dengan proyektor dan akses internet.</p>
                            </div>
                            
                            <div class="achievement-item">
                                <div class="achievement-icon">
                                    <i class="fas fa-handshake"></i>
                                </div>
                                <h4>Kemitraan Strategis</h4>
                                <p>Menjalin 12 kemitraan dengan dunia usaha dan industri untuk pengembangan pembelajaran kontekstual.</p>
                            </div>
                        </div>
                        
                        <h3 style="margin-top: 40px; margin-bottom: 20px;">Filosofi Pendidikan</h3>
                        <p>Dr. Sukaryanto percaya bahwa setiap siswa memiliki potensi unik yang perlu dikembangkan. Pendekatan pendidikannya berfokus pada pengembangan holistik yang mencakup aspek kognitif, afektif, dan psikomotorik. Beliau menekankan pentingnya pendidikan karakter yang seimbang dengan penguasaan akademik dan teknologi.</p>
                        
                        <p>Visi besarnya adalah menjadikan SMPN 4 Genteng sebagai sekolah rujukan di Kabupaten Banyuwangi yang menghasilkan lulusan yang tidak hanya pintar secara akademik tetapi juga berkarakter kuat, kreatif, dan mampu berkontribusi positif bagi masyarakat.</p>
                        @endif
                    </div>
                </div>
            </div>
        </section>
    </main>

    <!-- Footer -->
    @include('components.footer')

    <script src="{{ asset('js/script.js') }}"></script>
</body>
</html>
