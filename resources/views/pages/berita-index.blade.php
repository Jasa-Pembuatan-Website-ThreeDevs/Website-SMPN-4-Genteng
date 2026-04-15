<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Berita & Kegiatan | SMPN 4 Genteng</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-slate-50">
    @include('components.navbar')

    <main class="main-content-section pt-32 pb-20">
        <div class="container">
            <!-- Header Section -->
            <div class="text-center mb-16">
                <span class="text-blue-600 font-bold tracking-wider uppercase text-sm mb-2 block">Informasi Terkini</span>
                <h1 class="text-4xl md:text-5xl font-bold mb-4 text-slate-900">Berita & Kegiatan</h1>
                <div class="w-24 h-1 bg-blue-600 mx-auto mb-6 rounded-full"></div>
                <p class="text-slate-500 max-w-2xl mx-auto text-lg">Ikuti perkembangan terbaru, kegiatan siswa, dan prestasi membanggakan dari SMPN 4 Genteng.</p>
            </div>

            <!-- News Grid -->
            @if ($posts->isNotEmpty())
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                    @foreach ($posts as $post)
                        <div class="group bg-white rounded-2xl overflow-hidden shadow-sm hover:shadow-2xl hover:shadow-blue-500/10 transition-all duration-300 flex flex-col h-full border border-slate-100">
                            <!-- Image Container -->
                            <a href="{{ route('posts.public.show', $post) }}" class="relative overflow-hidden h-60 block">
                                @if ($post->thumbnail)
                                    @php
                                        $thumbUrl = filter_var($post->thumbnail, FILTER_VALIDATE_URL) 
                                            ? $post->thumbnail 
                                            : asset('storage/' . $post->thumbnail);
                                    @endphp
                                    <img class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-110" 
                                         src="{{ $thumbUrl }}" alt="{{ $post->title }}" loading="lazy">
                                @else
                                    <div class="w-full h-full bg-gradient-to-br from-blue-500 to-indigo-600 flex items-center justify-center text-white">
                                        <i class="fas fa-newspaper text-6xl opacity-30"></i>
                                    </div>
                                @endif
                                
                                <!-- Overlay gradient -->
                                <div class="absolute inset-0 bg-gradient-to-t from-black/60 via-black/0 to-black/0 opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>

                                <!-- Badge -->
                                <div class="absolute top-4 left-4 z-10">
                                    <span class="bg-white/95 backdrop-blur-sm text-blue-600 px-4 py-1.5 rounded-full text-[10px] font-extrabold shadow-sm uppercase tracking-widest">
                                        {{ $post->announcement == 'news' ? 'Berita' : 'Pengumuman' }}
                                    </span>
                                </div>
                            </a>
                            
                            <!-- Content Container -->
                            <div class="p-8 flex flex-col flex-grow">
                                <!-- Meta Info -->
                                <div class="flex items-center text-slate-400 text-xs mb-4 gap-4 font-medium">
                                    <span class="flex items-center gap-1.5">
                                        <i class="far fa-calendar-alt text-blue-500"></i>
                                        {{ $post->published_at->format('d M Y') }}
                                    </span>
                                    <span class="w-1 h-1 rounded-full bg-slate-300"></span>
                                    <span class="flex items-center gap-1.5">
                                        <i class="far fa-user text-blue-500"></i>
                                        Admin
                                    </span>
                                </div>
                                
                                <!-- Title -->
                                <h2 class="text-xl font-bold text-slate-800 mb-4 group-hover:text-blue-600 transition-colors line-clamp-2 leading-snug">
                                    <a href="{{ route('posts.public.show', $post) }}">{{ $post->title }}</a>
                                </h2>
                                
                                <!-- Excerpt -->
                                <p class="text-slate-500 text-sm mb-8 line-clamp-3 leading-relaxed flex-grow">
                                    {{ Str::limit(strip_tags($post->content), 150) }}
                                </p>
                                
                                <!-- Read More Button -->
                                <div class="pt-6 border-t border-slate-100 mt-auto">
                                    <a href="{{ route('posts.public.show', $post) }}" 
                                       class="inline-flex items-center justify-between w-full text-blue-600 font-bold text-sm group/btn">
                                        <span>Baca Selengkapnya</span>
                                        <div class="w-8 h-8 rounded-full bg-blue-50 flex items-center justify-center group-hover/btn:bg-blue-600 group-hover/btn:text-white transition-all duration-300">
                                            <i class="fas fa-arrow-right transform group-hover/btn:-rotate-45 transition-transform duration-300"></i>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                
                <!-- Pagination -->
                <div class="mt-16 flex justify-center">
                    {{ $posts->links() }}
                </div>
            @else
                <!-- Empty State -->
                <div class="flex flex-col items-center justify-center py-24 bg-white rounded-[2rem] shadow-sm border-2 border-dashed border-slate-200">
                    <div class="w-24 h-24 bg-slate-50 rounded-full flex items-center justify-center mb-6">
                        <i class="fas fa-newspaper text-4xl text-slate-300"></i>
                    </div>
                    <h3 class="text-2xl font-bold text-slate-800 mb-2">Belum Ada Berita</h3>
                    <p class="text-slate-500 text-center max-w-md mb-8">Saat ini belum ada berita atau kegiatan terbaru yang dipublikasikan. Silakan periksa kembali nanti.</p>
                    <a href="/" class="px-8 py-3 bg-blue-600 text-white font-bold rounded-xl hover:bg-blue-700 transition-colors shadow-lg shadow-blue-600/20">
                        Kembali ke Beranda
                    </a>
                </div>
            @endif
        </div>
    </main>

    @include('components.footer')
</body>
</html>