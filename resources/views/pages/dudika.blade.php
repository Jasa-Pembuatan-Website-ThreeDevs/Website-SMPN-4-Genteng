<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SMPN 4 Genteng - DUDIKA</title>
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

        /* DUDIKA Page */
        .dudika-intro {
            max-width: 900px;
            margin: 0 auto 80px;
            text-align: center;
        }

        .dudika-intro h2 {
            font-size: 2.2rem;
            margin-bottom: 20px;
            color: var(--dark);
        }

        .dudika-intro p {
            font-size: 1.1rem;
            color: var(--gray);
        }

        .dudika-partners {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
            gap: 30px;
            margin-bottom: 80px;
        }

        .partner-card {
            background: var(--white);
            border-radius: var(--radius-lg);
            padding: 40px;
            box-shadow: var(--shadow-md);
            text-align: center;
            transition: var(--transition);
            border: 1px solid var(--gray-light);
        }

        .partner-card:hover {
            transform: translateY(-10px);
            box-shadow: var(--shadow-lg);
            border-color: var(--primary);
        }

        .partner-logo {
            width: 120px;
            height: 120px;
            margin: 0 auto 25px;
            border-radius: var(--radius-md);
            background: var(--white);
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 20px;
            box-shadow: var(--shadow-sm);
            border: 1px solid var(--gray-light);
        }

        .partner-logo img {
            max-width: 100%;
            max-height: 100%;
        }

        .partner-name {
            font-size: 1.4rem;
            margin-bottom: 10px;
            color: var(--dark);
        }

        .partner-sector {
            display: inline-block;
            padding: 6px 16px;
            background: rgba(37, 99, 235, 0.1);
            color: var(--primary);
            border-radius: 50px;
            font-size: 0.9rem;
            font-weight: 600;
            margin-bottom: 15px;
        }

        .partner-benefits {
            margin-top: 25px;
            text-align: left;
        }

        .benefit-item {
            display: flex;
            align-items: flex-start;
            gap: 10px;
            margin-bottom: 12px;
        }

        .benefit-icon {
            color: var(--success);
            font-size: 0.9rem;
            margin-top: 5px;
            flex-shrink: 0;
        }

        .collaboration-form {
            background: var(--white);
            border-radius: var(--radius-lg);
            padding: 60px;
            box-shadow: var(--shadow-lg);
            max-width: 800px;
            margin: 0 auto;
        }

        .collaboration-form h3 {
            font-size: 2rem;
            margin-bottom: 30px;
            color: var(--dark);
            text-align: center;
        }

        .form-group {
            margin-bottom: 25px;
        }

        .form-label {
            display: block;
            margin-bottom: 8px;
            font-weight: 600;
            color: var(--dark);
        }

        .form-control {
            width: 100%;
            padding: 14px 18px;
            border: 1px solid var(--gray-light);
            border-radius: var(--radius-md);
            font-family: 'Inter', sans-serif;
            font-size: 1rem;
            transition: var(--transition-fast);
        }

        .form-control:focus {
            outline: none;
            border-color: var(--primary);
            box-shadow: 0 0 0 3px rgba(37, 99, 235, 0.1);
        }

        .form-row {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 20px;
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
            border-radius: 50%;
            background: rgba(37, 99, 235, 0.2);
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
            
            .form-row {
                grid-template-columns: 1fr;
            }
            
            .collaboration-form {
                padding: 40px 30px;
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
            
            .partner-card {
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
    <header class="header main-header">
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
                            <li><a href="/kepala-sekolah" class="dropdown-item">Kepala Sekolah</a></li>
                            <li><a href="/visi-misi" class="dropdown-item">Visi & Misi</a></li>
                            <li><a href="#facilities" class="dropdown-item">Fasilitas</a></li>
                            <li><a href="/dudika" class="dropdown-item active">DUDIKA</a></li>
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

    <main class="main-content">
        <!-- Page Header -->
        <section class="page-header" id="pageHeader">
            <div class="container">
                <h1 id="pageTitle">DUDIKA</h1>
                <p id="pageDescription">Kemitraan strategis dengan dunia usaha, industri, dan dunia kerja</p>
                
                <div class="breadcrumb">
                    <a href="index.html">Beranda</a>
                    <span class="separator">/</span>
                    <a href="#">Tentang</a>
                    <span class="separator">/</span>
                    <span id="currentPage">DUDIKA</span>
                </div>
            </div>
        </section>

        <!-- DUDIKA Content -->
        <section class="section" id="dudika" style="display: block;">
            <div class="container">
                <div class="dudika-intro animate-on-scroll">
                    <h2>DUDIKA (Dunia Usaha, Dunia Industri, dan Dunia Kerja)</h2>
                    <p>SMPN 4 Genteng aktif menjalin kemitraan strategis dengan berbagai pihak untuk meningkatkan relevansi pendidikan dengan kebutuhan dunia kerja dan mempersiapkan siswa menghadapi tantangan masa depan.</p>
                </div>
                
                <div class="section-title animate-on-scroll">
                    <h2>Mitra Strategis Kami</h2>
                    <p>Bekerja sama dengan berbagai perusahaan dan institusi untuk pengembangan pendidikan yang lebih baik</p>
                </div>
                
                <div class="dudika-partners">
                    <div class="partner-card animate-on-scroll">
                        <div class="partner-logo">
                            <img src="https://upload.wikimedia.org/wikipedia/commons/2/2f/Google_2015_logo.svg" alt="Google">
                        </div>
                        <h3 class="partner-name">Google Indonesia</h3>
                        <span class="partner-sector">Teknologi & Pendidikan</span>
                        <p>Kemitraan dalam program Google for Education untuk pengembangan pembelajaran digital dan pelatihan teknologi bagi guru dan siswa.</p>
                        
                        <div class="partner-benefits">
                            <div class="benefit-item">
                                <i class="fas fa-check-circle benefit-icon"></i>
                                <span>Akses Google Workspace for Education</span>
                            </div>
                            <div class="benefit-item">
                                <i class="fas fa-check-circle benefit-icon"></i>
                                <span>Pelatihan teknologi untuk 25 guru</span>
                            </div>
                            <div class="benefit-item">
                                <i class="fas fa-check-circle benefit-icon"></i>
                                <span>Program coding untuk siswa</span>
                            </div>
                        </div>
                    </div>
                    
                    <div class="partner-card animate-on-scroll">
                        <div class="partner-logo">
                            <img src="https://upload.wikimedia.org/wikipedia/commons/4/44/Microsoft_logo.svg" alt="Microsoft">
                        </div>
                        <h3 class="partner-name">Microsoft Indonesia</h3>
                        <span class="partner-sector">Teknologi & Inovasi</span>
                        <p>Kolaborasi dalam program Microsoft Showcase School untuk transformasi pendidikan melalui teknologi Microsoft 365.</p>
                        
                        <div class="partner-benefits">
                            <div class="benefit-item">
                                <i class="fas fa-check-circle benefit-icon"></i>
                                <span>Lisensi Microsoft 365 untuk sekolah</span>
                            </div>
                            <div class="benefit-item">
                                <i class="fas fa-check-circle benefit-icon"></i>
                                <span>Workshop Minecraft Education</span>
                            </div>
                            <div class="benefit-item">
                                <i class="fas fa-check-circle benefit-icon"></i>
                                <span>Program AI untuk pendidikan</span>
                            </div>
                        </div>
                    </div>
                    
                    <div class="partner-card animate-on-scroll">
                        <div class="partner-logo">
                            <img src="https://upload.wikimedia.org/wikipedia/commons/9/96/Telkom_Indonesia_2013.svg" alt="Telkom Indonesia">
                        </div>
                        <h3 class="partner-name">Telkom Indonesia</h3>
                        <span class="partner-sector">Telekomunikasi</span>
                        <p>Kemitraan dalam penyediaan infrastruktur internet sekolah dan program edukasi digital untuk siswa.</p>
                        
                        <div class="partner-benefits">
                            <div class="benefit-item">
                                <i class="fas fa-check-circle benefit-icon"></i>
                                <span>Jaringan internet fiber optic</span>
                            </div>
                            <div class="benefit-item">
                                <i class="fas fa-check-circle benefit-icon"></i>
                                <span>Program kunjungan industri</span>
                            </div>
                            <div class="benefit-item">
                                <i class="fas fa-check-circle benefit-icon"></i>
                                <span>Beasiswa untuk siswa berprestasi</span>
                            </div>
                        </div>
                    </div>
                    
                    <div class="partner-card animate-on-scroll">
                        <div class="partner-logo">
                            <img src="https://upload.wikimedia.org/wikipedia/commons/9/92/UB_logo_%28Universitas_Brawijaya%29.png" alt="Universitas Brawijaya" style="object-fit: contain;">
                        </div>
                        <h3 class="partner-name">Universitas Brawijaya</h3>
                        <span class="partner-sector">Pendidikan Tinggi</span>
                        <p>Kerja sama dalam pengembangan kurikulum, program mentoring, dan pengembangan kapasitas guru.</p>
                        
                        <div class="partner-benefits">
                            <div class="benefit-item">
                                <i class="fas fa-check-circle benefit-icon"></i>
                                <span>Program mentoring akademik</span>
                            </div>
                            <div class="benefit-item">
                                <i class="fas fa-check-circle benefit-icon"></i>
                                <span>Pelatihan penelitian untuk guru</span>
                            </div>
                            <div class="benefit-item">
                                <i class="fas fa-check-circle benefit-icon"></i>
                                <span>Kuliah tamu dari dosen UB</span>
                            </div>
                        </div>
                    </div>
                    
                    <div class="partner-card animate-on-scroll">
                        <div class="partner-logo">
                            <img src="https://upload.wikimedia.org/wikipedia/commons/4/49/BNI_logo.svg" alt="Bank BNI">
                        </div>
                        <h3 class="partner-name">Bank BNI</h3>
                        <span class="partner-sector">Perbankan & Keuangan</span>
                        <p>Kemitraan dalam program edukasi literasi keuangan dan kewirausahaan untuk siswa SMPN 4 Genteng.</p>
                        
                        <div class="partner-benefits">
                            <div class="benefit-item">
                                <i class="fas fa-check-circle benefit-icon"></i>
                                <span>Workshop literasi keuangan</span>
                            </div>
                            <div class="benefit-item">
                                <i class="fas fa-check-circle benefit-icon"></i>
                                <span>Program kewirausahaan siswa</span>
                            </div>
                            <div class="benefit-item">
                                <i class="fas fa-check-circle benefit-icon"></i>
                                <span>Simpanan pelajar</span>
                            </div>
                        </div>
                    </div>
                    
                    <div class="partner-card animate-on-scroll">
                        <div class="partner-logo">
                            <img src="https://upload.wikimedia.org/wikipedia/commons/5/53/Perhutani_Logo.svg" alt="Perhutani">
                        </div>
                        <h3 class="partner-name">Perhutani Banyuwangi</h3>
                        <span class="partner-sector">Lingkungan & Kehutanan</span>
                        <p>Kerja sama dalam program pendidikan lingkungan, konservasi, dan pengembangan sekolah adiwiyata.</p>
                        
                        <div class="partner-benefits">
                            <div class="benefit-item">
                                <i class="fas fa-check-circle benefit-icon"></i>
                                <span>Program penanaman pohon</span>
                            </div>
                            <div class="benefit-item">
                                <i class="fas fa-check-circle benefit-icon"></i>
                                <span>Edukasi lingkungan hidup</span>
                            </div>
                            <div class="benefit-item">
                                <i class="fas fa-check-circle benefit-icon"></i>
                                <span>Kunjungan edukasi ke hutan</span>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- Collaboration Form -->
                <div class="collaboration-form animate-on-scroll">
                    <h3>Ajukan Kemitraan dengan SMPN 4 Genteng</h3>
                    <p style="text-align: center; margin-bottom: 40px; color: var(--gray);">Berminat untuk bermitra dengan kami? Isi formulir di bawah ini dan tim kami akan menghubungi Anda.</p>
                    
                    <form id="partnershipForm">
                        <div class="form-row">
                            <div class="form-group">
                                <label for="companyName" class="form-label">Nama Perusahaan/Institusi</label>
                                <input type="text" id="companyName" class="form-control" placeholder="Contoh: PT. Contoh Indonesia" required>
                            </div>
                            
                            <div class="form-group">
                                <label for="sector" class="form-label">Bidang Usaha</label>
                                <input type="text" id="sector" class="form-control" placeholder="Contoh: Teknologi, Pendidikan, dll." required>
                            </div>
                        </div>
                        
                        <div class="form-row">
                            <div class="form-group">
                                <label for="contactPerson" class="form-label">Nama Penanggung Jawab</label>
                                <input type="text" id="contactPerson" class="form-control" placeholder="Nama lengkap" required>
                            </div>
                            
                            <div class="form-group">
                                <label for="position" class="form-label">Jabatan</label>
                                <input type="text" id="position" class="form-control" placeholder="Contoh: Manager CSR" required>
                            </div>
                        </div>
                        
                        <div class="form-row">
                            <div class="form-group">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" id="email" class="form-control" placeholder="email@perusahaan.com" required>
                            </div>
                            
                            <div class="form-group">
                                <label for="phone" class="form-label">Telepon</label>
                                <input type="tel" id="phone" class="form-control" placeholder="0812-3456-7890" required>
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label for="partnershipType" class="form-label">Jenis Kemitraan yang Diinginkan</label>
                            <select id="partnershipType" class="form-control" required>
                                <option value="" disabled selected>Pilih jenis kemitraan</option>
                                <option value="csr">Program CSR Perusahaan</option>
                                <option value="internship">Magang/Praktik Kerja</option>
                                <option value="training">Pelatihan/Workshop</option>
                                <option value="sponsorship">Sponsorship Kegiatan</option>
                                <option value="research">Penelitian/Pengembangan</option>
                                <option value="other">Lainnya</option>
                            </select>
                        </div>
                        
                        <div class="form-group">
                            <label for="proposal" class="form-label">Deskripsi Proposal Kemitraan</label>
                            <textarea id="proposal" class="form-control" rows="5" placeholder="Jelaskan secara singkat proposal kemitraan yang Anda tawarkan..." required></textarea>
                        </div>
                        
                        <div style="text-align: center; margin-top: 40px;">
                            <button type="submit" class="btn btn-primary btn-lg">
                                <i class="fas fa-paper-plane"></i> Ajukan Kemitraan
                            </button>
                        </div>
                    </form>
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
                        <li><a href="/kepala-sekolah" class="footer-link">Kepala Sekolah</a></li>
                        <li><a href="/dudika" class="footer-link active">DUDIKA</a></li>
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
                                <p>info@smpn4genteng.sch.id</p>
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
        
        // Form submission
        const partnershipForm = document.getElementById('partnershipForm');
        
        partnershipForm.addEventListener('submit', (e) => {
            e.preventDefault();
            
            // Get form data
            const formData = {
                companyName: document.getElementById('companyName').value,
                sector: document.getElementById('sector').value,
                contactPerson: document.getElementById('contactPerson').value,
                position: document.getElementById('position').value,
                email: document.getElementById('email').value,
                phone: document.getElementById('phone').value,
                partnershipType: document.getElementById('partnershipType').value,
                proposal: document.getElementById('proposal').value
            };
            
            // In a real application, you would send this data to a server
            // For now, we'll just show an alert
            alert('Terima kasih! Proposal kemitraan Anda telah berhasil dikirim. Tim kami akan menghubungi Anda dalam waktu 1-3 hari kerja.');
            
            // Reset form
            partnershipForm.reset();
            
            // Scroll to top of form
            partnershipForm.scrollIntoView({ behavior: 'smooth' });
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