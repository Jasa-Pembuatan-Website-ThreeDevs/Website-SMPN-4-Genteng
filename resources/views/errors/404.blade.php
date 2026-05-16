<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>404 - Halaman Tidak Ditemukan | SMPN 4 Genteng</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap" rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>
        body {
            font-family: 'Poppins', sans-serif;
        }
    </style>
</head>
<body class="bg-gray-100 flex items-center justify-center min-h-screen p-6">
    <div class="max-w-md w-full text-center">
        <div class="mb-8 flex justify-center">
            <script src="https://unpkg.com/@lottiefiles/dotlottie-wc@0.9.14/dist/dotlottie-wc.js" type="module"></script>
<dotlottie-wc src="https://lottie.host/46167d0d-b728-4ff7-b0c1-0b880b5e5964/k7qIWQX37K.lottie" style="width: 300px;height: 300px" autoplay loop></dotlottie-wc>
        </div>
        <h1 class="text-6xl font-bold text-blue-600 mb-4">404</h1>
        <h2 class="text-2xl font-semibold text-gray-800 mb-4">Ups! Halaman Tidak Ditemukan</h2>
        <p class="text-gray-600 mb-8">
            Maaf, halaman yang Anda cari tidak tersedia atau telah dipindahkan. Silakan kembali ke beranda.
        </p>
        <a href="{{ url('/') }}" class="inline-block bg-blue-600 hover:bg-blue-700 text-white font-semibold px-6 py-3 rounded-lg transition duration-300 shadow-md">
            Kembali ke Beranda
        </a>
    </div>
</body>
</html>
