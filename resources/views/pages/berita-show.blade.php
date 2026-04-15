<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $post->title }} | Berita SMPN 4 Genteng</title>
    <meta name="description" content="{{ $seo_description ?? '' }}">
    <meta name="keywords" content="{{ $seo_keywords ?? '' }}">
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-slate-50">
    @include('components.navbar')

    <main class="main-content-section pt-32 pb-20">
        <div class="container">
            <!-- Breadcrumbs -->
            <nav class="flex mb-8 text-sm font-medium text-slate-500" aria-label="Breadcrumb">
                <ol class="inline-flex items-center space-x-1 md:space-x-3">
                    <li class="inline-flex items-center">
                        <a href="/" class="hover:text-blue-600 flex items-center transition-colors">
                            <i class="fas fa-home mr-2"></i> Beranda
                        </a>
                    </li>
                    <li>
                        <div class="flex items-center">
                            <i class="fas fa-chevron-right text-slate-300 mx-2 text-xs"></i>
                            <a href="{{ route('posts.public.index') }}" class="hover:text-blue-600 transition-colors">Berita & Kegiatan</a>
                        </div>
                    </li>
                    <li aria-current="page">
                        <div class="flex items-center">
                            <i class="fas fa-chevron-right text-slate-300 mx-2 text-xs"></i>
                            <span class="text-slate-400 line-clamp-1 max-w-[200px] md:max-w-md">{{ $post->title }}</span>
                        </div>
                    </li>
                </ol>
            </nav>

            <div class="flex flex-col lg:flex-row gap-12">
                <!-- Main Content -->
                <div class="lg:w-2/3">
                    <article class="bg-white rounded-[2rem] overflow-hidden shadow-sm border border-slate-100">
                        <!-- Image Container -->
                        @if($post->thumbnail)
                        <div class="w-full h-[300px] md:h-[450px] overflow-hidden relative group">
                            @php
                                $thumbUrl = filter_var($post->thumbnail, FILTER_VALIDATE_URL) 
                                    ? $post->thumbnail 
                                    : asset('storage/' . $post->thumbnail);
                            @endphp
                            <img src="{{ $thumbUrl }}" alt="{{ $post->title }}" class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-105">
                            <div class="absolute inset-0 bg-gradient-to-t from-black/60 via-black/0 to-black/0 opacity-60"></div>
                            
                            <div class="absolute bottom-6 left-6 md:bottom-8 md:left-8 flex gap-3">
                                <span class="bg-blue-600 text-white px-4 py-1.5 rounded-full text-xs font-extrabold uppercase tracking-widest shadow-lg shadow-blue-600/30">
                                    {{ $post->announcement == 'news' ? 'Berita' : 'Pengumuman' }}
                                </span>
                            </div>
                        </div>
                        @else
                        <div class="w-full h-64 bg-gradient-to-br from-blue-600 to-indigo-700 flex items-center justify-center text-white relative">
                            <i class="fas fa-newspaper text-7xl opacity-20"></i>
                            <span class="absolute bottom-6 left-6 bg-white/20 backdrop-blur-md text-white px-4 py-1.5 rounded-full text-xs font-extrabold uppercase tracking-widest">
                                {{ $post->announcement == 'news' ? 'Berita' : 'Pengumuman' }}
                            </span>
                        </div>
                        @endif

                        <!-- Article Content -->
                        <div class="p-8 md:p-12">
                            <!-- Meta Data -->
                            <div class="flex flex-wrap items-center gap-6 mb-8 text-slate-500 text-sm font-medium">
                                <span class="flex items-center gap-2 bg-slate-50 px-4 py-2 rounded-xl">
                                    <div class="w-8 h-8 rounded-full bg-blue-100 flex items-center justify-center text-blue-600">
                                        <i class="far fa-user"></i>
                                    </div>
                                    Oleh Admin
                                </span>
                                <span class="flex items-center gap-2 bg-slate-50 px-4 py-2 rounded-xl">
                                    <div class="w-8 h-8 rounded-full bg-indigo-100 flex items-center justify-center text-indigo-600">
                                        <i class="far fa-calendar-alt"></i>
                                    </div>
                                    {{ $post->published_at->format('d F Y') }}
                                </span>
                            </div>

                            <h1 class="text-3xl md:text-4xl lg:text-5xl font-extrabold text-slate-900 mb-10 leading-[1.2]">
                                {{ $post->title }}
                            </h1>

                            <div class="prose prose-lg md:prose-xl prose-slate max-w-none text-slate-600 leading-relaxed article-body">
                                {!! $post->content !!}
                            </div>

                            <!-- Footer Article: Share & Navigation -->
                            <div class="mt-16 pt-8 border-t border-slate-100 flex flex-wrap items-center justify-between gap-6">
                                <div class="flex items-center gap-4">
                                    <span class="text-slate-400 text-sm font-bold uppercase tracking-wider">Bagikan Berita:</span>
                                    <div class="flex gap-2">
                                        <a href="#" class="w-12 h-12 rounded-full bg-slate-50 border border-slate-100 flex items-center justify-center text-slate-500 hover:bg-blue-600 hover:text-white hover:border-blue-600 transition-all shadow-sm">
                                            <i class="fab fa-facebook-f"></i>
                                        </a>
                                        <a href="#" class="w-12 h-12 rounded-full bg-slate-50 border border-slate-100 flex items-center justify-center text-slate-500 hover:bg-sky-500 hover:text-white hover:border-sky-500 transition-all shadow-sm">
                                            <i class="fab fa-twitter"></i>
                                        </a>
                                        <a href="#" class="w-12 h-12 rounded-full bg-slate-50 border border-slate-100 flex items-center justify-center text-slate-500 hover:bg-green-500 hover:text-white hover:border-green-500 transition-all shadow-sm">
                                            <i class="fab fa-whatsapp text-lg"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </article>
                </div>

                <!-- Sidebar -->
                <div class="lg:w-1/3">
                    <div class="sticky top-32 space-y-8">
                        
                        <!-- Call to Action Banner -->
                        <div class="bg-gradient-to-br from-blue-600 to-indigo-700 rounded-3xl p-8 text-white shadow-xl shadow-blue-600/20 relative overflow-hidden">
                            <div class="absolute -right-6 -top-6 w-32 h-32 bg-white/10 rounded-full blur-2xl"></div>
                            <div class="relative z-10">
                                <div class="w-12 h-12 bg-white/20 backdrop-blur-sm rounded-xl flex items-center justify-center mb-6">
                                    <i class="fas fa-graduation-cap text-2xl"></i>
                                </div>
                                <h3 class="text-2xl font-bold mb-4">PPDB SMPN 4 Genteng</h3>
                                <p class="text-blue-100 text-sm mb-8 leading-relaxed">Bergabunglah bersama kami dan wujudkan masa depan yang cemerlang. Pendaftaran peserta didik baru telah dibuka.</p>
                                <a href="/ppdb" class="inline-flex items-center justify-center gap-2 w-full py-4 bg-white text-blue-600 font-bold rounded-xl hover:bg-blue-50 transition-colors shadow-lg">
                                    Daftar Sekarang <i class="fas fa-arrow-right"></i>
                                </a>
                            </div>
                        </div>

                        <!-- Recent News Widget -->
                        @if(isset($recentPosts) && $recentPosts->count() > 0)
                        <div class="bg-white rounded-3xl p-8 shadow-sm border border-slate-100">
                            <h3 class="text-xl font-bold text-slate-800 mb-8 flex items-center gap-3">
                                <span class="w-2 h-8 bg-blue-600 rounded-full"></span>
                                Berita Terbaru
                            </h3>
                            <div class="space-y-6">
                                @foreach($recentPosts as $recent)
                                <a href="{{ route('posts.public.show', $recent) }}" class="flex gap-5 group">
                                    <div class="flex-shrink-0 w-24 h-24 rounded-2xl overflow-hidden bg-slate-100 shadow-sm">
                                        @if($recent->thumbnail)
                                            @php
                                                $recentThumbUrl = filter_var($recent->thumbnail, FILTER_VALIDATE_URL) 
                                                    ? $recent->thumbnail 
                                                    : asset('storage/' . $recent->thumbnail);
                                            @endphp
                                            <img src="{{ $recentThumbUrl }}" alt="{{ $recent->title }}" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500">
                                        @else
                                            <div class="w-full h-full flex items-center justify-center text-blue-500 bg-blue-50">
                                                <i class="fas fa-image text-2xl opacity-50"></i>
                                            </div>
                                        @endif
                                    </div>
                                    <div class="flex flex-col justify-center py-1">
                                        <div class="flex items-center gap-2 mb-2">
                                            <span class="text-[10px] font-bold uppercase tracking-wider text-blue-600 bg-blue-50 px-2 py-0.5 rounded-md">
                                                {{ $recent->announcement == 'news' ? 'Berita' : 'Info' }}
                                            </span>
                                        </div>
                                        <h4 class="text-sm font-bold text-slate-800 group-hover:text-blue-600 transition-colors line-clamp-2 leading-snug mb-2">
                                            {{ $recent->title }}
                                        </h4>
                                        <span class="text-[11px] text-slate-400 font-medium flex items-center gap-1.5">
                                            <i class="far fa-clock"></i> {{ $recent->published_at->diffForHumans() }}
                                        </span>
                                    </div>
                                </a>
                                @endforeach
                            </div>
                            <a href="{{ route('posts.public.index') }}" class="flex items-center justify-center gap-2 w-full mt-8 pt-6 border-t border-slate-100 text-slate-500 text-sm font-bold hover:text-blue-600 transition-colors group">
                                Lihat Semua Berita 
                                <i class="fas fa-arrow-right text-xs group-hover:translate-x-1 transition-transform"></i>
                            </a>
                        </div>
                        @endif

                    </div>
                </div>
            </div>
        </div>
    </main>

    @include('components.footer')

    <style>
        .article-body p { margin-bottom: 1.5rem; }
        .article-body h2 { font-size: 1.8rem; font-weight: 700; color: #0f172a; margin-top: 2.5rem; margin-bottom: 1.25rem; }
        .article-body h3 { font-size: 1.5rem; font-weight: 600; color: #1e293b; margin-top: 2rem; margin-bottom: 1rem; }
        .article-body ul { list-style-type: disc; padding-left: 1.5rem; margin-bottom: 1.5rem; }
        .article-body ol { list-style-type: decimal; padding-left: 1.5rem; margin-bottom: 1.5rem; }
        .article-body li { margin-bottom: 0.5rem; }
        .article-body img { border-radius: 1rem; margin: 2rem auto; box-shadow: 0 4px 6px -1px rgb(0 0 0 / 0.1); }
        .article-body blockquote { border-left: 4px solid #2563eb; padding-left: 1.5rem; font-style: italic; color: #475569; margin: 2rem 0; background: #f8fafc; padding: 1.5rem; border-radius: 0 1rem 1rem 0; }
        .article-body a { color: #2563eb; text-decoration: none; font-weight: 500; }
        .article-body a:hover { text-decoration: underline; }
    </style>
</body>
</html>
