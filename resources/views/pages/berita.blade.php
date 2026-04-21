<section class="section bg-slate-50" id="news">
    <div class="container">
        <div class="section-title animate-on-scroll">
            <span class="text-blue-600 font-bold tracking-wider uppercase text-sm mb-2 block">Informasi Terkini</span>
            <h2 class="text-4xl font-bold mb-4 py-2">Berita & Kegiatan</h2>
            <div class="w-24 h-1 bg-blue-600 mx-auto mb-6 rounded-full"></div>
            <p class="text-gray-600 max-w-2xl mx-auto">Pantau terus kegiatan terbaru, prestasi membanggakan, dan perkembangan terkini dari lingkungan SMPN 4 Genteng.</p>
        </div>

        @if ($posts->isNotEmpty())
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8 mt-12">
                @foreach ($posts as $post)
                    <div class="group bg-white rounded-2xl overflow-hidden shadow-sm hover:shadow-xl transition-all duration-300 flex flex-col h-full border border-gray-100 animate-on-scroll">
                        <div class="relative overflow-hidden h-56">
                            @if ($post->thumbnail)
                                @php
                                    $thumbUrl = filter_var($post->thumbnail, FILTER_VALIDATE_URL) 
                                        ? $post->thumbnail 
                                        : asset('storage/' . $post->thumbnail);
                                @endphp
                                <img class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-110" 
                                     src="{{ $thumbUrl }}" alt="{{ $post->title }}" loading="lazy">
                            @else
                                <div class="w-full h-full bg-gradient-to-br from-blue-500 to-purple-600 flex items-center justify-center text-white">
                                    <i class="fas fa-newspaper text-5xl opacity-30"></i>
                                </div>
                            @endif
                            <div class="absolute top-4 left-4">
                                <span class="bg-white/90 backdrop-blur-sm text-blue-600 px-3 py-1 rounded-full text-xs font-bold shadow-sm uppercase">
                                    {{ $post->announcement == 'news' ? 'Berita' : 'Pengumuman' }}
                                </span>
                            </div>
                        </div>
                        
                        <div class="p-6 flex flex-col flex-grow">
                            <div class="flex items-center text-gray-400 text-xs mb-3 gap-3">
                                <span class="flex items-center gap-1">
                                    <i class="far fa-calendar-alt"></i>
                                    {{ $post->published_at->format('d M Y') }}
                                </span>
                                <span class="flex items-center gap-1">
                                    <i class="far fa-user"></i>
                                    Admin
                                </span>
                            </div>
                            
                            <h3 class="text-xl font-bold text-gray-800 mb-3 group-hover:text-blue-600 transition-colors line-clamp-2 leading-snug">
                                {{ $post->title }}
                            </h3>
                            
                            <p class="text-gray-500 text-sm mb-6 line-clamp-3 leading-relaxed flex-grow">
                                {{ Str::limit(strip_tags($post->content), 120) }}
                            </p>
                            
                            <div class="pt-4 border-t border-gray-50 mt-auto">
                                <a href="{{ route('posts.public.show', $post) }}" 
                                   class="inline-flex items-center text-blue-600 font-bold text-sm group/btn transition-all">
                                    Baca Selengkapnya 
                                    <i class="fas fa-arrow-right ml-2 transform group-hover/btn:translate-x-1 transition-transform"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            
            <div class="text-center mt-12 animate-on-scroll">
                <a href="{{ route('posts.public.index') }}" class="inline-flex items-center px-8 py-3 bg-white border-2 border-blue-600 text-blue-600 font-bold rounded-full hover:bg-blue-600 hover:text-white transition-all duration-300 shadow-sm">
                    Lihat Semua Berita
                </a>
            </div>
        @else
            <div class="flex flex-col items-center justify-center py-20 bg-white rounded-3xl shadow-inner mt-10 border-2 border-dashed border-gray-100 animate-on-scroll">
                <div class="w-20 h-20 bg-gray-50 rounded-full flex items-center justify-center mb-6">
                    <i class="fas fa-newspaper text-3xl text-gray-300"></i>
                </div>
                <h3 class="text-2xl font-bold text-gray-700">Belum Ada Berita</h3>
                <p class="text-gray-400 mt-2 text-center max-w-md">Saat ini belum ada berita atau kegiatan terbaru yang dipublikasikan. Silakan periksa kembali nanti.</p>
            </div>
        @endif
    </div>
</section>
