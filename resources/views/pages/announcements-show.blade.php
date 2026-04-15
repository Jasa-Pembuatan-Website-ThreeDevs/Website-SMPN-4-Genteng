<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $announcement->title }} | Pengumuman SMPN 4 Genteng</title>
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
            <nav class="flex mb-8 text-sm font-medium text-gray-500" aria-label="Breadcrumb">
                <ol class="inline-flex items-center space-x-1 md:space-x-3">
                    <li class="inline-flex items-center">
                        <a href="/" class="hover:text-red-500 flex items-center">
                            <i class="fas fa-home mr-2"></i> Beranda
                        </a>
                    </li>
                    <li>
                        <div class="flex items-center">
                            <i class="fas fa-chevron-right text-gray-300 mx-2"></i>
                            <a href="{{ route('announcements.public.index') }}" class="hover:text-red-500">Pengumuman</a>
                        </div>
                    </li>
                    <li aria-current="page">
                        <div class="flex items-center">
                            <i class="fas fa-chevron-right text-gray-300 mx-2"></i>
                            <span class="text-gray-400 line-clamp-1">{{ $announcement->title }}</span>
                        </div>
                    </li>
                </ol>
            </nav>

            <div class="flex flex-col lg:flex-row gap-12">
                <!-- Main Content -->
                <div class="lg:w-2/3">
                    <article class="bg-white rounded-3xl overflow-hidden shadow-sm border border-slate-100">
                        @if($announcement->image)
                        <div class="w-full h-[400px] overflow-hidden">
                            <img src="{{ asset('storage/' . $announcement->image) }}" alt="{{ $announcement->title }}" class="w-full h-full object-cover">
                        </div>
                        @else
                        <div class="w-full h-64 bg-gradient-to-br from-red-500 to-rose-600 flex items-center justify-center text-white">
                            <i class="fas fa-bullhorn text-7xl opacity-30"></i>
                        </div>
                        @endif

                        <div class="p-8 md:p-12">
                            <div class="flex items-center gap-4 mb-6">
                                <span class="bg-red-100 text-red-600 px-4 py-1.5 rounded-full text-xs font-extrabold uppercase tracking-widest">
                                    Pusat Informasi
                                </span>
                                <span class="text-slate-400 text-sm flex items-center gap-2">
                                    <i class="far fa-calendar-alt"></i>
                                    {{ $announcement->created_at->format('d F Y') }}
                                </span>
                            </div>

                            <h1 class="text-3xl md:text-4xl font-bold text-slate-800 mb-8 leading-tight">
                                {{ $announcement->title }}
                            </h1>

                            <div class="prose prose-slate max-w-none text-slate-600 leading-relaxed announcement-body">
                                {!! nl2br(e($announcement->content)) !!}
                            </div>

                            <div class="mt-12 pt-8 border-t border-slate-100 flex flex-wrap items-center justify-between gap-6">
                                <div class="flex items-center gap-4">
                                    <span class="text-slate-400 text-sm font-bold uppercase tracking-wider">Bagikan:</span>
                                    <div class="flex gap-2">
                                        <a href="#" class="w-10 h-10 rounded-full bg-slate-100 flex items-center justify-center text-slate-500 hover:bg-blue-600 hover:text-white transition-all">
                                            <i class="fab fa-facebook-f"></i>
                                        </a>
                                        <a href="#" class="w-10 h-10 rounded-full bg-slate-100 flex items-center justify-center text-slate-500 hover:bg-sky-400 hover:text-white transition-all">
                                            <i class="fab fa-twitter"></i>
                                        </a>
                                        <a href="#" class="w-10 h-10 rounded-full bg-slate-100 flex items-center justify-center text-slate-500 hover:bg-green-500 hover:text-white transition-all">
                                            <i class="fab fa-whatsapp"></i>
                                        </a>
                                    </div>
                                </div>
                                <a href="{{ route('announcements.public.index') }}" class="text-red-500 font-bold flex items-center gap-2 hover:gap-3 transition-all">
                                    <i class="fas fa-arrow-left"></i> Kembali ke Daftar
                                </a>
                            </div>
                        </div>
                    </article>
                </div>

                <!-- Sidebar -->
                <div class="lg:w-1/3">
                    <div class="sticky top-32 space-y-8">
                        <!-- Search or Call to Action -->
                        <div class="bg-red-500 rounded-3xl p-8 text-white shadow-xl shadow-red-500/20">
                            <h3 class="text-xl font-bold mb-4">Butuh Bantuan?</h3>
                            <p class="text-red-100 text-sm mb-6 leading-relaxed">Jika Anda memiliki pertanyaan lebih lanjut mengenai pengumuman ini, silakan hubungi bagian tata usaha kami.</p>
                            <a href="/#contact" class="inline-block w-full py-3 bg-white text-red-500 text-center font-bold rounded-xl hover:bg-red-50 transition-colors">
                                Hubungi Kami
                            </a>
                        </div>

                        <!-- Recent Announcements -->
                        <div class="bg-white rounded-3xl p-8 shadow-sm border border-slate-100">
                            <h3 class="text-xl font-bold text-slate-800 mb-6 flex items-center gap-3">
                                <span class="w-2 h-8 bg-red-500 rounded-full"></span>
                                Pengumuman Lainnya
                            </h3>
                            <div class="space-y-6">
                                @foreach($recentAnnouncements as $recent)
                                <a href="{{ route('announcements.public.show', $recent) }}" class="flex gap-4 group">
                                    <div class="flex-shrink-0 w-20 h-20 rounded-xl overflow-hidden bg-slate-100">
                                        @if($recent->image)
                                        <img src="{{ asset('storage/' . $recent->image) }}" alt="{{ $recent->title }}" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500">
                                        @else
                                        <div class="w-full h-full flex items-center justify-center text-red-500 bg-red-50">
                                            <i class="fas fa-bullhorn text-xl"></i>
                                        </div>
                                        @endif
                                    </div>
                                    <div class="flex flex-col justify-center">
                                        <h4 class="text-sm font-bold text-slate-800 group-hover:text-red-500 transition-colors line-clamp-2 leading-snug mb-1">
                                            {{ $recent->title }}
                                        </h4>
                                        <span class="text-[10px] text-slate-400 font-medium">
                                            {{ $recent->created_at->format('d M Y') }}
                                        </span>
                                    </div>
                                </a>
                                @endforeach
                            </div>
                            <a href="{{ route('announcements.public.index') }}" class="block text-center mt-8 pt-6 border-t border-slate-100 text-slate-400 text-sm font-bold hover:text-red-500 transition-colors">
                                Lihat Semua Pengumuman
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>

    @include('components.footer')

    <style>
        .announcement-body p {
            margin-bottom: 1.5rem;
        }
    </style>
</body>
</html>