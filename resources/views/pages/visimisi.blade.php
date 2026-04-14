<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Visi & Misi | SMPN 4 Genteng</title>
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

        /* Vision Mission Page */
        .vision-mission-container {
            max-width: 900px;
            margin: 0 auto;
        }

        .vision-card {
            background: var(--white);
            border-radius: var(--radius-lg);
            padding: 60px;
            box-shadow: var(--shadow-lg);
            margin-bottom: 60px;
            text-align: center;
            position: relative;
            overflow: hidden;
        }

        .vision-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 6px;
            background: var(--gradient-primary);
        }

        .vision-icon {
            width: 100px;
            height: 100px;
            margin: 0 auto 30px;
            border-radius: 50%;
            background: rgba(37, 99, 235, 0.1);
            display: flex;
            align-items: center;
            justify-content: center;
            color: var(--primary);
            font-size: 2.5rem;
        }

        .vision-card h2 {
            font-size: 2.2rem;
            margin-bottom: 20px;
            color: var(--dark);
        }

        .vision-card p {
            font-size: 1.3rem;
            color: var(--gray);
            font-weight: 500;
            line-height: 1.6;
        }

        .vision-card p.highlight {
            color: var(--primary);
            font-weight: 600;
        }

        .mission-list {
            display: flex;
            flex-direction: column;
            gap: 30px;
        }

        .mission-item {
            background: var(--white);
            border-radius: var(--radius-lg);
            padding: 40px;
            box-shadow: var(--shadow-md);
            display: flex;
            align-items: flex-start;
            gap: 25px;
            transition: var(--transition);
        }

        .mission-item:hover {
            transform: translateY(-5px);
            box-shadow: var(--shadow-lg);
        }

        .mission-number {
            width: 60px;
            height: 60px;
            flex-shrink: 0;
            border-radius: 50%;
            background: var(--gradient-primary);
            color: var(--white);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.5rem;
            font-weight: 700;
            box-shadow: var(--shadow-md);
        }

        .mission-content h3 {
            font-size: 1.5rem;
            margin-bottom: 12px;
            color: var(--dark);
        }

        .mission-content p {
            color: var(--gray);
        }

        @media (max-width: 768px) {
            .page-header {
                padding: 140px 0 60px;
            }
            .page-header h1 {
                font-size: 2.5rem;
            }
            .vision-card {
                padding: 40px 30px;
            }
            .vision-card h2 {
                font-size: 1.8rem;
            }
            .mission-item {
                flex-direction: column;
                text-align: center;
                align-items: center;
            }
        }

        @media (max-width: 576px) {
            .page-header h1 {
                font-size: 2rem;
            }
            .vision-card p {
                font-size: 1.1rem;
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
                <h1>Visi & Misi</h1>
                <p>Mengenal lebih dalam tentang visi, misi, dan tujuan pendidikan SMPN 4 Genteng</p>
                
                <div class="breadcrumb">
                    <a href="/">Beranda</a>
                    <span class="separator">/</span>
                    <span>Visi & Misi</span>
                </div>
            </div>
        </section>

        <!-- Visi Misi Content -->
        <section class="section">
            <div class="container vision-mission-container">
                <div class="section-title animate-on-scroll">
                    <h2>Visi Kami</h2>
                    <p>Menjadi sekolah unggulan yang melahirkan generasi cerdas, berkarakter mulia, berwawasan global, dan berjiwa kepemimpinan.</p>
                </div>
                
                <div class="vision-card animate-on-scroll">
                    <div class="vision-icon">
                        <i class="fas fa-lightbulb"></i>
                    </div>
                    <h2>"Terwujudnya Peserta Didik yang Berprestasi, Berakhlak Mulia, Terampil, dan Peduli Lingkungan."</h2>
                    <p class="highlight">Visi ini mencerminkan komitmen SMPN 4 Genteng untuk mengembangkan potensi akademik dan non-akademik siswa secara seimbang.</p>
                </div>
                
                <div class="section-title animate-on-scroll">
                    <h2>Misi Kami</h2>
                    <p>Langkah-langkah strategis untuk mencapai visi pendidikan SMPN 4 Genteng</p>
                </div>
                
                <div class="mission-list">
                    <div class="mission-item animate-on-scroll">
                        <div class="mission-number">1</div>
                        <div class="mission-content">
                            <h3>Meningkatkan Kualitas Pembelajaran</h3>
                            <p>Menyelenggarakan proses pembelajaran yang inovatif, kreatif, efektif, dan berbasis teknologi untuk mengoptimalkan potensi akademik siswa.</p>
                        </div>
                    </div>
                    
                    <div class="mission-item animate-on-scroll">
                        <div class="mission-number">2</div>
                        <div class="mission-content">
                            <h3>Membentuk Karakter Unggul</h3>
                            <p>Membangun lingkungan sekolah yang religius, berbudaya, dan menjunjung tinggi nilai-nilai Pancasila untuk membentuk siswa berakhlak mulia.</p>
                        </div>
                    </div>
                    
                    <div class="mission-item animate-on-scroll">
                        <div class="mission-number">3</div>
                        <div class="mission-content">
                            <h3>Mengembangkan Potensi Non-Akademik</h3>
                            <p>Menyediakan beragam kegiatan ekstrakurikuler dan pembinaan bakat untuk mengembangkan keterampilan dan minat siswa.</p>
                        </div>
                    </div>
                    
                    <div class="mission-item animate-on-scroll">
                        <div class="mission-number">4</div>
                        <div class="mission-content">
                            <h3>Meningkatkan Kepedulian Lingkungan</h3>
                            <p>Menerapkan program Adiwiyata untuk menumbuhkan kesadaran dan kepedulian siswa terhadap kelestarian lingkungan.</p>
                        </div>
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
