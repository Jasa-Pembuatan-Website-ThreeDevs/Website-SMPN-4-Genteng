<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SMPN 4 Genteng | Sekolah Berprestasi & Berkarakter</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <!-- Header & Navigation -->
    @include('components.navbar')

    <main class="main-content">
        <!-- Hero Section -->
        @include('pages.hero')

        <!-- About Section -->
        @include('pages.about')

        <!-- Facilities Section -->
        @include('pages.fasilitas')

        <!-- News Section -->
        @include('pages.berita')

        <!-- Extracurricular Section -->
        @include('pages.ekskul')

        <!-- Achievements Section -->
        @include('pages.achievements')

        <!-- PPDB Section -->
        @include('pages.ppdb')
    </main>

    <!-- Footer -->
    @include('components.footer')

    <script src="js/script.js"></script>
</body>
</html>