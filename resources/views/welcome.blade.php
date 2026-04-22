<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Open Graph -->
    <meta property="og:title" content="SMP Negeri 4 Genteng - Sekolah Unggul & Berprestasi">
    <meta property="og:description"
        content="Website resmi SMP Negeri 4 Genteng. Informasi sekolah, guru, fasilitas, dan prestasi terbaru.">
    <meta property="og:image" content="{{ asset('smpn4genteng.webp') }}">
    <meta property="og:url" content="{{ url('/') }}">
    <meta property="og:type" content="website">

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

    <script src="js/script.js"></script>
</body>

</html>
