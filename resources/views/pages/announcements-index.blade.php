<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pengumuman | SMPN 4 Genteng</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-slate-50">
    @include('components.navbar')

    <main class="main-content-section pt-32 pb-20">
        <div class="container">
            <div class="text-center mb-16">
                <span class="text-red-500 font-bold tracking-wider uppercase text-sm mb-2 block">Pusat Informasi</span>
                <h1 class="text-4xl md:text-5xl font-bold mb-4">Pengumuman Sekolah</h1>
                <div class="w-24 h-1 bg-red-500 mx-auto mb-6 rounded-full"></div>
                <p class="text-gray-500 max-w-2xl mx-auto">Dapatkan informasi resmi, jadwal kegiatan, dan pengumuman penting lainnya dari SMPN 4 Genteng.</p>
            </div>

            @if($announcements->count() > 0)
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                @foreach($announcements as $announcement)
                <div class="group bg-white rounded-2xl overflow-hidden border border-slate-100 hover:shadow-2xl hover:shadow-red-500/10 transition-all duration-300 flex flex-col h-full">
                    <a href="{{ route('announcements.public.show', $announcement) }}" class="block relative h-56 overflow-hidden">
                        @if($announcement->image)
                        <img src="{{ asset('storage/' . $announcement->image) }}" alt="{{ $announcement->title }}" 
                             class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-110" loading="lazy">
                        @else
                        <div class="w-full h-full bg-gradient-to-br from-red-500 to-rose-600 flex items-center justify-center text-white">
                            <i class="fas fa-bullhorn text-5xl opacity-30"></i>
                        </div>
                        @endif
                        <div class="absolute inset-0 bg-black/20 group-hover:bg-black/0 transition-colors duration-300"></div>
                    </a>
                    
                    <div class="p-8 flex flex-col flex-grow">
                        <div class="flex items-center gap-3 mb-4">
                            <span class="bg-red-50 text-red-600 px-3 py-1 rounded-full text-[10px] font-extrabold uppercase tracking-widest">
                                Penting
                            </span>
                            <span class="text-slate-400 text-xs flex items-center gap-1">
                                <i class="far fa-calendar-alt"></i>
                                {{ $announcement->created_at->format('d M Y') }}
                            </span>
                        </div>
                        
                        <h2 class="text-xl font-bold text-slate-800 mb-3 group-hover:text-red-500 transition-colors line-clamp-2 leading-tight">
                            <a href="{{ route('announcements.public.show', $announcement) }}">{{ $announcement->title }}</a>
                        </h2>
                        
                        <p class="text-slate-500 text-sm mb-8 line-clamp-3 leading-relaxed flex-grow">
                            {{ Str::limit(strip_tags($announcement->content), 150) }}
                        </p>
                        
                        <div class="pt-6 border-t border-slate-100 mt-auto">
                            <a href="{{ route('announcements.public.show', $announcement) }}" 
                               class="inline-flex items-center text-red-500 font-bold text-sm group/btn">
                                Baca Pengumuman
                                <i class="fas fa-arrow-right ml-2 transform group-hover/btn:translate-x-1 transition-transform"></i>
                            </a>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>

            <div class="mt-16">
                {{ $announcements->links() }}
            </div>
            @else
            <div class="flex flex-col items-center justify-center py-24 bg-white rounded-3xl border-2 border-dashed border-slate-200">
                <div class="w-24 h-24 bg-slate-50 rounded-full flex items-center justify-center mb-6">
                    <i class="fas fa-bullhorn text-4xl text-slate-300"></i>
                </div>
                <h3 class="text-2xl font-bold text-slate-700">Belum Ada Pengumuman</h3>
                <p class="text-slate-400 mt-2 text-center max-w-md">Saat ini belum ada pengumuman terbaru yang dipublikasikan. Silakan periksa kembali beberapa saat lagi.</p>
                <a href="/" class="mt-8 px-8 py-3 bg-red-500 text-white font-bold rounded-full hover:bg-red-600 transition-all shadow-lg shadow-red-500/30">
                    Kembali ke Beranda
                </a>
            </div>
            @endif
        </div>
    </main>

    @include('components.footer')
</body>
</html>