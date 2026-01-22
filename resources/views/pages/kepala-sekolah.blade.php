<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SMPN 4 Genteng - Kepala Sekolah</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <style>
        /* Modern CSS Variables & Reset */
        :root {
            --primary: #2563eb;
            --primary-dark: #1d4ed8;
            --secondary: #7c3aed;
            --accent: #06b6d4;
            --light: #f8fafc;
            --dark: #0f172a;
            --gray: #64748b;
            --gray-light: #e2e8f0;
            --white: #ffffff;
            --success: #10b981;
            --warning: #f59e0b;
            
            --radius-lg: 16px;
            --radius-md: 12px;
            --radius-sm: 8px;
            
            --shadow-sm: 0 2px 8px rgba(0, 0, 0, 0.08);
            --shadow-md: 0 6px 20px rgba(0, 0, 0, 0.12);
            --shadow-lg: 0 10px 40px rgba(0, 0, 0, 0.15);
            --shadow-xl: 0 20px 60px rgba(0, 0, 0, 0.2);
            
            --transition-fast: 0.2s ease;
            --transition: 0.3s ease;
            --transition-slow: 0.5s ease;
            
            --gradient-primary: linear-gradient(135deg, var(--primary), var(--secondary));
            --gradient-accent: linear-gradient(135deg, var(--accent), var(--secondary));
            --gradient-dark: linear-gradient(135deg, var(--dark), #1e293b);
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        html {
            scroll-behavior: smooth;
            font-size: 16px;
        }

        body {
            font-family: 'Inter', sans-serif;
            line-height: 1.7;
            color: var(--dark);
            background-color: var(--white);
            overflow-x: hidden;
        }

        h1, h2, h3, h4, h5, h6 {
            font-family: 'Poppins', sans-serif;
            font-weight: 700;
            line-height: 1.3;
        }

        a {
            text-decoration: none;
            color: inherit;
            transition: var(--transition-fast);
        }

        ul {
            list-style: none;
        }

        img {
            max-width: 100%;
            height: auto;
            display: block;
        }

        .container {
            width: 100%;
            max-width: 1280px;
            margin: 0 auto;
            padding: 0 24px;
        }

        .section {
            padding: 100px 0;
            position: relative;
        }

        .section-light {
            background-color: var(--light);
        }

        .section-dark {
            background: var(--gradient-dark);
            color: var(--white);
        }

        .section-title {
            text-align: center;
            margin-bottom: 60px;
            position: relative;
        }

        .section-title h2 {
            font-size: 2.8rem;
            margin-bottom: 16px;
            background: var(--gradient-primary);
            -webkit-background-clip: text;
            background-clip: text;
            color: transparent;
            display: inline-block;
        }

        .section-dark .section-title h2 {
            background: linear-gradient(135deg, var(--accent), #a5b4fc);
            -webkit-background-clip: text;
            background-clip: text;
            color: transparent;
        }

        .section-title p {
            font-size: 1.1rem;
            color: var(--gray);
            max-width: 600px;
            margin: 0 auto;
        }

        .section-dark .section-title p {
            color: var(--gray-light);
        }

        .btn {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 10px;
            padding: 14px 32px;
            font-weight: 600;
            font-size: 1rem;
            border-radius: var(--radius-md);
            border: none;
            cursor: pointer;
            transition: var(--transition);
            font-family: 'Poppins', sans-serif;
            position: relative;
            overflow: hidden;
            z-index: 1;
        }

        .btn::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: var(--gradient-primary);
            z-index: -1;
            transition: var(--transition);
            opacity: 1;
        }

        .btn:hover::before {
            opacity: 0.9;
            transform: scale(1.05);
        }

        .btn-primary {
            background: var(--gradient-primary);
            color: var(--white);
            box-shadow: var(--shadow-md);
        }

        .btn-secondary {
            background: transparent;
            color: var(--primary);
            border: 2px solid var(--primary);
        }

        .btn-secondary::before {
            background: var(--primary);
            opacity: 0;
        }

        .btn-secondary:hover {
            color: var(--white);
            border-color: transparent;
        }

        .btn-secondary:hover::before {
            opacity: 1;
        }

        .btn-lg {
            padding: 18px 40px;
            font-size: 1.1rem;
        }

        /* Modern Header & Navigation */
        .header {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            z-index: 1000;
            background-color: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(10px);
            border-bottom: 1px solid rgba(0, 0, 0, 0.05);
            transition: var(--transition);
        }

        .header.scrolled {
            box-shadow: var(--shadow-md);
            background-color: rgba(255, 255, 255, 0.98);
        }

        .header-container {
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 20px 0;
        }

        .logo {
            display: flex;
            align-items: center;
            gap: 16px;
        }

        .logo-icon {
            width: 60px;
            height: 60px;
            border-radius: var(--radius-md);
            background: var(--gradient-primary);
            display: flex;
            align-items: center;
            justify-content: center;
            color: var(--white);
            font-size: 1.8rem;
            box-shadow: var(--shadow-md);
        }

        .logo-text h1 {
            font-size: 1.6rem;
            color: var(--dark);
            line-height: 1.2;
        }

        .logo-text p {
            font-size: 0.9rem;
            color: var(--gray);
        }

        .nav {
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .nav-list {
            display: flex;
            gap: 6px;
        }

        .nav-item {
            position: relative;
        }

        .nav-link {
            padding: 12px 20px;
            font-weight: 500;
            border-radius: var(--radius-md);
            transition: var(--transition-fast);
            color: var(--dark);
        }

        .nav-link:hover {
            background-color: rgba(37, 99, 235, 0.08);
            color: var(--primary);
        }

        .nav-link.active {
            background: var(--gradient-primary);
            color: var(--white);
            box-shadow: var(--shadow-sm);
        }

        .dropdown {
            position: absolute;
            top: 100%;
            left: 0;
            min-width: 220px;
            background: var(--white);
            border-radius: var(--radius-md);
            box-shadow: var(--shadow-lg);
            opacity: 0;
            visibility: hidden;
            transform: translateY(10px);
            transition: var(--transition);
            z-index: 100;
            padding: 8px;
        }

        .dropdown-item {
            padding: 12px 16px;
            display: block;
            border-radius: var(--radius-sm);
            font-weight: 500;
            transition: var(--transition-fast);
        }

        .dropdown-item:hover {
            background-color: rgba(37, 99, 235, 0.08);
            color: var(--primary);
        }

        .nav-item:hover .dropdown {
            opacity: 1;
            visibility: visible;
            transform: translateY(0);
        }

        .mobile-menu-btn {
            display: none;
            width: 48px;
            height: 48px;
            border-radius: var(--radius-md);
            background: var(--gradient-primary);
            color: var(--white);
            border: none;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            font-size: 1.4rem;
            box-shadow: var(--shadow-sm);
        }

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

        /* Footer */
        .footer {
            background: var(--dark);
            color: var(--white);
            padding: 80px 0 30px;
        }

        .footer-top {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 50px;
            margin-bottom: 60px;
        }

        .footer-logo .logo-text h1 {
            color: var(--white);
        }

        .footer-logo .logo-text p {
            color: var(--gray-light);
            margin-top: 16px;
        }

        .footer-title {
            font-size: 1.2rem;
            margin-bottom: 24px;
            color: var(--white);
            position: relative;
            padding-bottom: 12px;
        }

        .footer-title::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 0;
            width: 40px;
            height: 3px;
            background: var(--gradient-primary);
            border-radius: 3px;
        }

        .footer-links {
            display: flex;
            flex-direction: column;
            gap: 12px;
        }

        .footer-link {
            color: var(--gray-light);
            transition: var(--transition-fast);
        }

        .footer-link:hover {
            color: var(--primary);
            padding-left: 8px;
        }

        .contact-info {
            display: flex;
            flex-direction: column;
            gap: 16px;
        }

        .contact-item {
            display: flex;
            align-items: flex-start;
            gap: 12px;
        }

        .contact-icon {
            width: 40px;
            height: 40px;
            flex-shrink: 0;
            border-radius: 50%;
            background: rgba(37, 99, 235, 0.1);
            display: flex;
            align-items: center;
            justify-content: center;
            color: var(--primary);
            flex-shrink: 0;
        }

        .social-links {
            display: flex;
            gap: 16px;
            margin-top: 24px;
        }

        .social-link {
            width: 44px;
            height: 44px;
            border-radius: 50%;
            background: rgba(255, 255, 255, 0.1);
            display: flex;
            align-items: center;
            justify-content: center;
            color: var(--white);
            font-size: 1.2rem;
            transition: var(--transition);
        }

        .social-link:hover {
            background: var(--gradient-primary);
            transform: translateY(-5px);
        }

        .footer-bottom {
            text-align: center;
            padding-top: 30px;
            border-top: 1px solid rgba(255, 255, 255, 0.1);
            color: var(--gray-light);
            font-size: 0.9rem;
        }

        /* Responsive Design */
        @media (max-width: 1024px) {
            .headmaster-container {
                grid-template-columns: 1fr;
                gap: 50px;
            }
            
            .headmaster-profile {
                position: static;
            }
            
            .page-header h1 {
                font-size: 3rem;
            }
        }

        @media (max-width: 768px) {
            .mobile-menu-btn {
                display: flex;
            }
            
            .nav {
                position: fixed;
                top: 100px;
                left: 0;
                width: 100%;
                background: var(--white);
                padding: 24px;
                box-shadow: var(--shadow-lg);
                border-radius: 0 0 var(--radius-lg) var(--radius-lg);
                opacity: 0;
                visibility: hidden;
                transform: translateY(-20px);
                transition: var(--transition);
            }
            
            .nav.active {
                opacity: 1;
                visibility: visible;
                transform: translateY(0);
            }
            
            .nav-list {
                flex-direction: column;
                gap: 8px;
            }
            
            .dropdown {
                position: static;
                box-shadow: none;
                opacity: 1;
                visibility: visible;
                transform: none;
                background: transparent;
                padding: 0;
                max-height: 0;
                overflow: hidden;
                transition: max-height 0.3s ease;
            }
            
            .dropdown.active {
                max-height: 500px;
                margin-top: 8px;
                padding-left: 20px;
            }
            
            .page-header {
                padding: 140px 0 60px;
            }
            
            .page-header h1 {
                font-size: 2.5rem;
            }
            
            .section-title h2 {
                font-size: 2.4rem;
            }
            
            .section {
                padding: 80px 0;
            }
        }

        @media (max-width: 576px) {
            .page-header {
                padding: 120px 0 50px;
            }
            
            .page-header h1 {
                font-size: 2.2rem;
            }
            
            .section-title h2 {
                font-size: 2rem;
            }
            
            .section {
                padding: 60px 0;
            }
            
            .container {
                padding: 0 20px;
            }
            
            .headmaster-profile,
            .headmaster-bio {
                padding: 30px 20px;
            }
        }

        /* Animation Effects */
        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(30px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .animate-on-scroll {
            opacity: 0;
            transform: translateY(30px);
            transition: opacity 0.6s ease, transform 0.6s ease;
        }

        .animate-on-scroll.visible {
            opacity: 1;
            transform: translateY(0);
        }
    </style>
</head>
<body>
    <!-- Header & Navigation -->
    <header class="header">
        <div class="container header-container">
            <a href="index.html" class="logo">
                <div class="logo-icon">
                    <i class="fas fa-graduation-cap"></i>
                </div>
                <div class="logo-text">
                    <h1>SMPN 4 GENTENG</h1>
                    <p>Sekolah Berprestasi & Berkarakter</p>
                </div>
            </a>
            
            <button class="mobile-menu-btn" id="mobileMenuBtn">
                <i class="fas fa-bars"></i>
            </button>
            
            <nav class="nav" id="mainNav">
                <ul class="nav-list">
                    <li class="nav-item">
                        <a href="index.html" class="nav-link">Beranda</a>
                    </li>
                    <li class="nav-item has-dropdown">
                        <a href="#" class="nav-link active">
                            Tentang <i class="fas fa-chevron-down"></i>
                        </a>
                        <ul class="dropdown">
                            <li><a href="/kepala-sekolah" class="dropdown-item active">Kepala Sekolah</a></li>
                            <li><a href="/visi-misi" class="dropdown-item">Visi & Misi</a></li>
                            <li><a href="#facilities" class="dropdown-item">Fasilitas</a></li>
                            <li><a href="/dudika" class="dropdown-item">DUDIKA</a></li>
                            <li><a href="#contact" class="dropdown-item">Kontak Kami</a></li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a href="news.html" class="nav-link">Berita</a>
                    </li>
                    <li class="nav-item">
                        <a href="extracurricular.html" class="nav-link">Ekstrakurikuler</a>
                    </li>
                    <li class="nav-item">
                        <a href="achievements.html" class="nav-link">Prestasi</a>
                    </li>
                    <li class="nav-item">
                        <a href="ppdb.html" class="nav-link">PPDB</a>
                    </li>
                </ul>
            </nav>
        </div>
    </header>

    <!-- Page Header -->
    <main class="main-content">
        <section class="page-header" id="pageHeader">
            <div class="container">
                <h1 id="pageTitle">Kepala Sekolah</h1>
                <p id="pageDescription">Profil dan kepemimpinan Dr. Suryadi, M.Pd. sebagai Kepala SMPN 4 Genteng</p>
                
                <div class="breadcrumb">
                    <a href="index.html">Beranda</a>
                    <span class="separator">/</span>
                    <a href="#">Tentang</a>
                    <span class="separator">/</span>
                    <span id="currentPage">Kepala Sekolah</span>
                </div>
            </div>
        </section>

        <!-- Headmaster Content -->
        <section class="section" id="headmaster" style="display: block;">
            <div class="container">
                <div class="headmaster-container">
                    <!-- Headmaster Profile -->
                    <div class="headmaster-profile animate-on-scroll">
                        <div class="headmaster-photo">
                            <img src="https://images.unsplash.com/photo-1560250097-0b93528c311a?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=987&q=80" alt="Kepala Sekolah SMPN 4 Genteng">
                        </div>
                        
                        <h2 class="headmaster-name">Sukaryanto, S.Pd.</h2>
                        <p class="headmaster-position">Kepala Sekolah SMPN 4 Genteng</p>
                        
                        <p style="color: var(--gray); margin-bottom: 20px;">Memimpin SMPN 4 Genteng sejak tahun 2018 dengan dedikasi tinggi untuk memajukan pendidikan di Kabupaten Banyuwangi.</p>
                        
                        <div class="headmaster-details">
                            <div class="detail-item">
                                <div class="detail-icon">
                                    <i class="fas fa-graduation-cap"></i>
                                </div>
                                <div>
                                    <h4>Pendidikan</h4>
                                    <p>S3 Pendidikan Universitas Negeri Malang</p>
                                </div>
                            </div>
                            
                            <div class="detail-item">
                                <div class="detail-icon">
                                    <i class="fas fa-award"></i>
                                </div>
                                <div>
                                    <h4>Sertifikasi</h4>
                                    <p>Guru Berprestasi Nasional 2019</p>
                                </div>
                            </div>
                            
                            <div class="detail-item">
                                <div class="detail-icon">
                                    <i class="fas fa-calendar-alt"></i>
                                </div>
                                <div>
                                    <h4>Masa Jabatan</h4>
                                    <p>2018 - Sekarang (6 Tahun)</p>
                                </div>
                            </div>
                            
                            <div class="detail-item">
                                <div class="detail-icon">
                                    <i class="fas fa-envelope"></i>
                                </div>
                                <div>
                                    <h4>Email</h4>
                                    <p>kepsek@smpn4genteng.sch.id</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Headmaster Biography -->
                    <div class="headmaster-bio animate-on-scroll">
                        <h2>Biografi & Kepemimpinan</h2>
                        
                        <p>Dr. Suryadi, M.Pd. adalah seorang pendidik yang telah mendedikasikan hidupnya untuk dunia pendidikan selama lebih dari 25 tahun. Beliau memulai karir sebagai guru Matematika di SMPN 1 Genteng sebelum akhirnya dipercaya untuk memimpin SMPN 4 Genteng sejak tahun 2018.</p>
                        
                        <p>Dengan latar belakang pendidikan S3 dari Universitas Negeri Malang, Dr. Suryadi membawa pendekatan inovatif dalam memimpin SMPN 4 Genteng. Visinya untuk mengintegrasikan teknologi dalam pembelajaran telah membawa transformasi signifikan dalam proses belajar mengajar di sekolah.</p>
                        
                        <div class="headmaster-quote">
                            <i class="fas fa-quote-left"></i>
                            "Pendidikan bukan hanya tentang transfer pengetahuan, tetapi tentang membentuk karakter, mengasah keterampilan, dan menyiapkan generasi muda untuk menghadapi tantangan masa depan dengan percaya diri."
                        </div>
                        
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
                        <p>Dr. Suryadi percaya bahwa setiap siswa memiliki potensi unik yang perlu dikembangkan. Pendekatan pendidikannya berfokus pada pengembangan holistik yang mencakup aspek kognitif, afektif, dan psikomotorik. Beliau menekankan pentingnya pendidikan karakter yang seimbang dengan penguasaan akademik dan teknologi.</p>
                        
                        <p>Visi besarnya adalah menjadikan SMPN 4 Genteng sebagai sekolah rujukan di Kabupaten Banyuwangi yang menghasilkan lulusan yang tidak hanya pintar secara akademik tetapi juga berkarakter kuat, kreatif, dan mampu berkontribusi positif bagi masyarakat.</p>
                    </div>
                </div>
            </div>
        </section>
    </main>

    <!-- Footer -->
    <footer class="footer main-footer">
        <div class="container">
            <div class="footer-top">
                <div class="footer-logo">
                    <div class="logo">
                        <div class="logo-icon">
                            <i class="fas fa-graduation-cap"></i>
                        </div>
                        <div class="logo-text">
                            <h1>SMPN 4 GENTENG</h1>
                            <p>Sekolah Berprestasi & Berkarakter di Kabupaten Banyuwangi</p>
                        </div>
                    </div>
                    <p style="margin-top: 20px; color: var(--gray-light);">SMP Negeri 4 Genteng berkomitmen untuk memberikan pendidikan terbaik yang mengintegrasikan keunggulan akademik, pengembangan karakter, dan teknologi modern.</p>
                    <div class="social-links">
                        <a href="#" class="social-link">
                            <i class="fab fa-facebook-f"></i>
                        </a>
                        <a href="#" class="social-link">
                            <i class="fab fa-instagram"></i>
                        </a>
                        <a href="#" class="social-link">
                            <i class="fab fa-youtube"></i>
                        </a>
                        <a href="#" class="social-link">
                            <i class="fab fa-twitter"></i>
                        </a>
                    </div>
                </div>
                
                <div class="footer-column">
                    <h3 class="footer-title">Menu Cepat</h3>
                    <ul class="footer-links">
                        <li><a href="index.html" class="footer-link">Beranda</a></li>
                        <li><a href="/visi-misi" class="footer-link">Visi & Misi</a></li>
                        <li><a href="/kepala-sekolah" class="footer-link active">Kepala Sekolah</a></li>
                        <li><a href="/dudika" class="footer-link">DUDIKA</a></li>
                        <li><a href="news.html" class="footer-link">Berita & Kegiatan</a></li>
                        <li><a href="ppdb.html" class="footer-link">PPDB 2024</a></li>
                    </ul>
                </div>
                
                <div class="footer-column">
                    <h3 class="footer-title">Kontak Kami</h3>
                    <div class="contact-info">
                        <div class="contact-item">
                            <div class="contact-icon">
                                <i class="fas fa-map-marker-alt"></i>
                            </div>
                            <div>
                                <h4>Alamat</h4>
                                <p>Jl. Raya Genteng No. 123, Genteng, Banyuwangi, Jawa Timur</p>
                            </div>
                        </div>
                        <div class="contact-item">
                            <div class="contact-icon">
                                <i class="fas fa-phone"></i>
                            </div>
                            <div>
                                <h4>Telepon</h4>
                                <p>(0333) 123456 / 081234567890</p>
                            </div>
                        </div>
                        <div class="contact-item">
                            <div class="contact-icon">
                                <i class="fas fa-envelope"></i>
                            </div>
                            <div>
                                <h4>Email</h4>
                                <p>kepsek@smpn4genteng.sch.id</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="footer-bottom">
                <p>&copy; 2023 SMP Negeri 4 Genteng. Hak Cipta Dilindungi.</p>
                <p style="margin-top: 10px;">Dikembangkan dengan <i class="fas fa-heart" style="color: #ef4444;"></i> untuk dunia pendidikan Indonesia</p>
            </div>
        </div>
    </footer>

    <script>
        // Mobile menu functionality
        const mobileMenuBtn = document.getElementById('mobileMenuBtn');
        const mainNav = document.getElementById('mainNav');
        const dropdowns = document.querySelectorAll('.has-dropdown');
        
        mobileMenuBtn.addEventListener('click', () => {
            mainNav.classList.toggle('active');
            mobileMenuBtn.innerHTML = mainNav.classList.contains('active') 
                ? '<i class="fas fa-times"></i>' 
                : '<i class="fas fa-bars"></i>';
        });
        
        // Mobile dropdown functionality
        dropdowns.forEach(dropdown => {
            const dropdownMenu = dropdown.querySelector('.dropdown');
            
            dropdown.addEventListener('click', (e) => {
                if (window.innerWidth <= 768) {
                    e.preventDefault();
                    dropdownMenu.classList.toggle('active');
                }
            });
        });
        
        // Close menu when clicking outside
        document.addEventListener('click', (e) => {
            if (!e.target.closest('.nav') && !e.target.closest('.mobile-menu-btn')) {
                mainNav.classList.remove('active');
                mobileMenuBtn.innerHTML = '<i class="fas fa-bars"></i>';
                
                dropdowns.forEach(dropdown => {
                    const dropdownMenu = dropdown.querySelector('.dropdown');
                    dropdownMenu.classList.remove('active');
                });
            }
        });
        
        // Header scroll effect
        const header = document.querySelector('.header');
        
        window.addEventListener('scroll', () => {
            if (window.scrollY > 100) {
                header.classList.add('scrolled');
            } else {
                header.classList.remove('scrolled');
            }
        });
        
        // Scroll animation
        const observerOptions = {
            threshold: 0.1,
            rootMargin: '0px 0px -50px 0px'
        };
        
        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.classList.add('visible');
                }
            });
        }, observerOptions);
        
        // Observe all animate-on-scroll elements
        document.querySelectorAll('.animate-on-scroll').forEach(el => {
            observer.observe(el);
        });
    </script>
</body>
</html>