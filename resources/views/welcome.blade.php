<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Open Graph / Facebook / WhatsApp -->
    <meta property="og:type" content="website">
    <meta property="og:url" content="{{ url()->current() }}">
    <meta property="og:title" content="SMPN 4 Genteng | Sekolah Berprestasi & Berkarakter">
    <meta property="og:description" content="Website Resmi SMP Negeri 4 Genteng - Sekolah Berprestasi & Berkarakter di Kabupaten Banyuwangi.">
    <meta property="og:image" content="{{ asset('Logo.jpg') }}">
    <meta property="og:image:width" content="1200">
    <meta property="og:image:height" content="630">

    <!-- Twitter -->
    <meta property="twitter:card" content="summary_large_image">
    <meta property="twitter:url" content="{{ url()->current() }}">
    <meta property="twitter:title" content="SMPN 4 Genteng | Sekolah Berprestasi & Berkarakter">
    <meta property="twitter:description" content="Website Resmi SMP Negeri 4 Genteng - Sekolah Berprestasi & Berkarakter di Kabupaten Banyuwangi.">
    <meta property="twitter:image" content="{{ asset('Logo.jpg') }}">

    <title>SMPN 4 Genteng | Sekolah Berprestasi & Berkarakter</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&family=Inter:wght@400;500;600;700&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body>
    <!-- Header & Navigation -->
    @include('components.navbar')

    <main class="main-content">
        <!-- Hero Section -->
        @include('pages.hero')

        <!-- About Section -->
        @include('pages.about')

        <!-- Announcements Section -->
        @include('pages.announcements')

        <!-- Facilities Section -->
        @include('pages.fasilitas')

        <!-- News & Activities Section -->
        @include('pages.berita')

        <!-- Extracurricular Section -->
        @include('pages.ekskul')

        <!-- Achievements Section -->
        @include('pages.achievements')

        <!-- Highlights Section -->
        @include('pages.highlights')
    </main>

    <!-- Footer -->
    @include('components.footer')

    <!-- Scroll to Top Button -->
    <button id="scrollToTopBtn" class="fixed bottom-28 right-10 w-12 h-12 bg-blue-600 text-white rounded-full shadow-lg flex items-center justify-center transition-all duration-300 transform translate-y-20 opacity-0 z-50 hover:bg-blue-700 hover:scale-110 focus:outline-none">
        <i class="fas fa-chevron-up"></i>
    </button>

    <script src="js/script.js"></script>
    <script>
        const scrollBtn = document.getElementById('scrollToTopBtn');
        window.onscroll = function() {
            if (document.body.scrollTop > 300 || document.documentElement.scrollTop > 300) {
                scrollBtn.classList.remove('translate-y-20', 'opacity-0');
                scrollBtn.classList.add('translate-y-0', 'opacity-100');
            } else {
                scrollBtn.classList.add('translate-y-20', 'opacity-0');
                scrollBtn.classList.remove('translate-y-0', 'opacity-100');
            }
        };
        scrollBtn.onclick = function() {
            window.scrollTo({
                top: 0,
                behavior: 'smooth'
            });
        };
    </script>
</body>

</html>
