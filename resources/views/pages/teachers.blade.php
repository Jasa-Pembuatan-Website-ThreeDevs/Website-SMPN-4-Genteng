<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Guru | SMPN 4 Genteng</title>
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

        /* Teacher Card Styling */
        .teacher-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(280px, 1fr));
            gap: 30px;
            margin-top: 40px;
        }

        .teacher-card {
            background: var(--white);
            border-radius: var(--radius-lg);
            overflow: hidden;
            box-shadow: var(--shadow-md);
            transition: var(--transition);
            border: 1px solid rgba(0,0,0,0.05);
            display: flex;
            flex-direction: column;
            height: 100%;
        }

        .teacher-card:hover {
            transform: translateY(-10px);
            box-shadow: var(--shadow-lg);
        }

        .teacher-image-container {
            position: relative;
            height: 320px;
            overflow: hidden;
        }

        .teacher-image {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: var(--transition-slow);
        }

        .teacher-card:hover .teacher-image {
            transform: scale(1.05);
        }

        .teacher-info {
            padding: 25px;
            text-align: center;
            flex-grow: 1;
            display: flex;
            flex-direction: column;
            justify-content: center;
        }

        .teacher-name {
            font-size: 1.25rem;
            font-weight: 700;
            color: var(--dark);
            margin-bottom: 8px;
            line-height: 1.3;
        }

        .teacher-subject {
            font-size: 0.95rem;
            color: var(--primary);
            font-weight: 600;
            margin-bottom: 15px;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        .teacher-contact {
            display: flex;
            justify-content: center;
            gap: 15px;
            margin-top: auto;
            padding-top: 15px;
            border-top: 1px solid rgba(0,0,0,0.05);
        }

        .contact-icon {
            width: 35px;
            height: 35px;
            border-radius: 50%;
            background: rgba(37, 99, 235, 0.1);
            color: var(--primary);
            display: flex;
            align-items: center;
            justify-content: center;
            transition: var(--transition);
            font-size: 0.9rem;
        }

        .contact-icon:hover {
            background: var(--primary);
            color: var(--white);
        }

        @media (max-width: 768px) {
            .page-header {
                padding: 140px 0 60px;
            }
            .page-header h1 {
                font-size: 2.5rem;
            }
            .teacher-grid {
                grid-template-columns: repeat(auto-fill, minmax(240px, 1fr));
                gap: 20px;
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
                <h1>Guru & Staf</h1>
                <p>Mengenal lebih dekat para pendidik dan tenaga kependidikan SMP Negeri 4 Genteng</p>
                
                <div class="breadcrumb">
                    <a href="/">Beranda</a>
                    <span class="separator">/</span>
                    <span>Guru & Staf</span>
                </div>
            </div>
        </section>

        <!-- Teacher List Content -->
        <section class="section">
            <div class="container">
                <div class="section-title animate-on-scroll">
                    <h2>Tenaga Pendidik Kami</h2>
                    <p>Profesional, berpengalaman, dan berdedikasi tinggi dalam membimbing siswa meraih prestasi terbaik.</p>
                </div>
                
                @if($teachers->count() > 0)
                    <div class="teacher-grid">
                        @foreach($teachers as $teacher)
                            <div class="teacher-card animate-on-scroll">
                                <div class="teacher-image-container">
                                    @if($teacher->image)
                                        <img src="{{ asset('storage/' . $teacher->image) }}" alt="{{ $teacher->full_name }}" class="teacher-image">
                                    @else
                                        <img src="https://ui-avatars.com/api/?name={{ urlencode($teacher->full_name) }}&background=2563eb&color=fff&size=512" alt="{{ $teacher->full_name }}" class="teacher-image">
                                    @endif
                                </div>
                                <div class="teacher-info">
                                    <h3 class="teacher-name">{{ $teacher->full_name }}</h3>
                                    @if($teacher->nip)
                                        <p class="text-sm text-slate-500 mb-2">NIP: {{ $teacher->nip }}</p>
                                    @endif
                                    <p class="teacher-subject">{{ $teacher->subject_specialization }}</p>
                                    
                                    @if($teacher->description)
                                        <p class="text-sm text-slate-600 italic mb-4 line-clamp-2" title="{{ $teacher->description }}">
                                            "{{ $teacher->description }}"
                                        </p>
                                    @endif
                                </div>
                            </div>
                        @endforeach
                    </div>
                @else
                    <div class="text-center py-20 bg-slate-50 rounded-2xl border-2 border-dashed border-slate-200">
                        <i class="fas fa-user-friends text-4xl text-slate-300 mb-4"></i>
                        <p class="text-slate-500">Data guru belum tersedia saat ini.</p>
                    </div>
                @endif
            </div>
        </section>
    </main>

    <!-- Footer -->
    @include('components.footer')

    <script src="{{ asset('js/script.js') }}"></script>
</body>
</html>
