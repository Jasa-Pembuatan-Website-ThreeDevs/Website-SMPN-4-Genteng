<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $post->title }} | SMPN 4 Genteng</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body>
    <!-- Header & Navigation -->
    @include('components.navbar')

    <main class="main-content" style="padding-top: 120px; background-color: #f9fafb; min-h-screen;">
        <div class="container mx-auto px-4 sm:px-6 lg:px-8 py-12">
            <div class="max-w-4xl mx-auto bg-white shadow-xl rounded-3xl overflow-hidden border border-gray-100">
                @if($post->thumbnail)
                    <div class="w-full h-[400px] overflow-hidden">
                        @if(filter_var($post->thumbnail, FILTER_VALIDATE_URL))
                            <img src="{{ $post->thumbnail }}" alt="{{ $post->title }}" class="w-full h-full object-cover">
                        @else
                            <img src="{{ asset('storage/' . $post->thumbnail) }}" alt="{{ $post->title }}" class="w-full h-full object-cover">
                        @endif
                    </div>
                @endif

                <div class="p-8 md:p-12">
                    <div class="flex items-center gap-4 mb-6">
                        <span class="px-4 py-1 bg-blue-100 text-blue-600 rounded-full text-xs font-bold uppercase tracking-wider">
                            {{ $post->announcement == 'news' ? 'Berita' : 'Pengumuman' }}
                        </span>
                        <span class="text-gray-500 text-sm">
                            <i class="far fa-calendar-alt mr-2"></i> {{ $post->published_at->format('d F Y') }}
                        </span>
                    </div>

                    <h1 class="text-3xl md:text-4xl font-extrabold text-gray-900 mb-8 leading-tight">
                        {{ $post->title }}
                    </h1>

                    <div class="prose prose-lg max-w-full text-gray-700 leading-relaxed mb-12">
                        {!! $post->content !!}
                    </div>

                    <div class="pt-8 border-t border-gray-100">
                        <a href="/#news" class="inline-flex items-center text-blue-600 font-bold hover:text-blue-800 transition-colors">
                            <i class="fas fa-arrow-left mr-3"></i> Kembali ke Berita & Kegiatan
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <!-- Footer -->
    @include('components.footer')

    <script src="{{ asset('js/script.js') }}"></script>
</body>

</html>
