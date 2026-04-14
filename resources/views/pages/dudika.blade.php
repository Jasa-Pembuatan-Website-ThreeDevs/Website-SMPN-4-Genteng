<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DUDIKA | SMPN 4 Genteng</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>
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
        .breadcrumb {
            display: flex;
            justify-content: center;
            gap: 10px;
            margin-top: 30px;
            font-size: 0.95rem;
        }
        .dudika-intro {
            max-width: 900px;
            margin: 0 auto 80px;
            text-align: center;
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
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .partner-logo img {
            max-width: 100%;
            max-height: 100%;
        }
        .collaboration-form {
            background: var(--white);
            border-radius: var(--radius-lg);
            padding: 60px;
            box-shadow: var(--shadow-lg);
            max-width: 800px;
            margin: 0 auto;
        }
        .form-row {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 20px;
        }
        @media (max-width: 768px) {
            .page-header { padding: 140px 0 60px; }
            .form-row { grid-template-columns: 1fr; }
            .collaboration-form { padding: 30px 20px; }
        }
    </style>
</head>
<body>
    @include('components.navbar')

    <main class="main-content">
        <section class="page-header">
            <div class="container">
                <h1>DUDIKA</h1>
                <p>Kemitraan strategis dengan dunia usaha, industri, dan dunia kerja</p>
                <div class="breadcrumb">
                    <a href="/">Beranda</a>
                    <span class="separator">/</span>
                    <span>DUDIKA</span>
                </div>
            </div>
        </section>

        <section class="section">
            <div class="container">
                <div class="dudika-intro animate-on-scroll">
                    <h2>Kemitraan Dunia Usaha & Industri</h2>
                    <p>SMPN 4 Genteng bekerjasama dengan berbagai mitra industri untuk meningkatkan kualitas pendidikan dan kesiapan kerja siswa.</p>
                </div>

                <div class="dudika-partners">
                    <!-- Partner 1 -->
                    <div class="partner-card animate-on-scroll">
                        <div class="partner-logo">
                            <img src="https://upload.wikimedia.org/wikipedia/commons/2/2f/Google_2015_logo.svg" alt="Google">
                        </div>
                        <h3 class="font-bold text-xl mb-2">Google Indonesia</h3>
                        <p class="text-gray-600 text-sm">Pengembangan literasi digital dan akses platform pembelajaran.</p>
                    </div>
                    <!-- Partner 2 -->
                    <div class="partner-card animate-on-scroll">
                        <div class="partner-logo">
                            <img src="https://upload.wikimedia.org/wikipedia/commons/4/44/Microsoft_logo.svg" alt="Microsoft">
                        </div>
                        <h3 class="font-bold text-xl mb-2">Microsoft</h3>
                        <p class="text-gray-600 text-sm">Sertifikasi kompetensi IT bagi guru dan tenaga kependidikan.</p>
                    </div>
                    <!-- Partner 3 -->
                    <div class="partner-card animate-on-scroll">
                        <div class="partner-logo">
                            <img src="https://upload.wikimedia.org/wikipedia/commons/9/96/Telkom_Indonesia_2013.svg" alt="Telkom">
                        </div>
                        <h3 class="font-bold text-xl mb-2">Telkom Indonesia</h3>
                        <p class="text-gray-600 text-sm">Penyediaan infrastruktur jaringan dan edukasi internet sehat.</p>
                    </div>
                </div>

                <div class="collaboration-form animate-on-scroll">
                    <h3 class="text-2xl font-bold text-center mb-8">Ajukan Kemitraan</h3>
                    <form>
                        <div class="form-row">
                            <div class="mb-4">
                                <label class="block text-sm font-semibold mb-2">Nama Perusahaan</label>
                                <input type="text" class="w-full p-3 border rounded-lg" placeholder="PT. ABC">
                            </div>
                            <div class="mb-4">
                                <label class="block text-sm font-semibold mb-2">Email</label>
                                <input type="email" class="w-full p-3 border rounded-lg" placeholder="contact@abc.com">
                            </div>
                        </div>
                        <div class="mb-4">
                            <label class="block text-sm font-semibold mb-2">Pesan / Proposal</label>
                            <textarea class="w-full p-3 border rounded-lg" rows="4" placeholder="Jelaskan rencana kerjasama..."></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary w-full py-4">Kirim Pengajuan</button>
                    </form>
                </div>
            </div>
        </section>
    </main>

    @include('components.footer')
    <script src="{{ asset('js/script.js') }}"></script>
</body>
</html>
