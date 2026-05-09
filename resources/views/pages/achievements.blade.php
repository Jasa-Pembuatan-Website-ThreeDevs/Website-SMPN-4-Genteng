<section class="section main-content-section" id="achievements">
    <div class="container">
        <div class="section-title animate-on-scroll text-center">
            <span class="text-blue-600 font-bold tracking-wider uppercase text-sm mb-2 block">Prestasi Membanggakan</span>
            <h2 class="text-4xl font-bold mb-4 py-2 text-slate-900">Prestasi Terbaru</h2>
            <div class="w-24 h-1 bg-blue-600 mx-auto mb-6 rounded-full"></div>
            <p class="text-slate-600 max-w-2xl mx-auto">Bukti nyata dedikasi dan kerja keras siswa-siswi SMPN 4 Genteng dalam berbagai kompetisi</p>
        </div>

        @if($achievements->isNotEmpty())
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8 mt-12">
                @foreach($achievements as $achievement)
                    <div class="group bg-white rounded-2xl overflow-hidden shadow-sm hover:shadow-2xl hover:shadow-blue-500/10 transition-all duration-300 flex flex-col h-full border border-slate-100 animate-on-scroll">
                        <!-- Image Container -->
                        <div class="relative overflow-hidden h-60 block">
                            @if($achievement->image)
                                @php
                                    $achievementUrl = filter_var($achievement->image, FILTER_VALIDATE_URL) 
                                        ? $achievement->image 
                                        : asset('storage/' . $achievement->image);
                                @endphp
                                <img class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-110" 
                                     src="{{ $achievementUrl }}" alt="{{ $achievement->title }}" loading="lazy">
                            @else
                                <div class="w-full h-full bg-gradient-to-br from-blue-500 to-indigo-600 flex items-center justify-center text-white">
                                    <i class="fas fa-trophy text-6xl opacity-30"></i>
                                </div>
                            @endif
                            
                            <!-- Overlay gradient -->
                            <div class="absolute inset-0 bg-gradient-to-t from-black/60 via-black/0 to-black/0 opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>

                            <!-- Badge -->
                            <div class="absolute top-4 left-4 z-10">
                                <span class="bg-white/95 backdrop-blur-sm text-blue-600 px-4 py-1.5 rounded-full text-[10px] font-extrabold shadow-sm uppercase tracking-widest">
                                    {{ $achievement->level }}
                                </span>
                            </div>
                        </div>
                        
                        <!-- Content Container -->
                        <div class="p-8 flex flex-col flex-grow">
                            <!-- Meta Info -->
                            <div class="flex items-center text-slate-400 text-xs mb-4 font-medium">
                                <span class="flex items-center gap-1.5">
                                    <i class="far fa-calendar-alt text-blue-500"></i>
                                    Tahun {{ $achievement->year }}
                                </span>
                            </div>

                            <!-- Title -->
                            <h3 class="text-xl font-bold text-slate-800 mb-4 group-hover:text-blue-600 transition-colors leading-snug">
                                {{ $achievement->title }}
                            </h3>
                            
                            <!-- Description -->
                            <p class="text-slate-500 text-sm line-clamp-3 leading-relaxed mt-auto">
                                {{ $achievement->description }}
                            </p>
                        </div>
                    </div>
                @endforeach
            </div>
        @else
            <div class="flex flex-col items-center justify-center py-20 bg-white rounded-3xl shadow-inner border-2 border-dashed border-slate-100 mt-10 animate-on-scroll">
                <div class="w-20 h-20 bg-slate-50 rounded-full flex items-center justify-center mb-6">
                    <i class="fas fa-trophy text-3xl text-slate-300"></i>
                </div>
                <h3 class="text-2xl font-bold text-slate-700">Belum Ada Prestasi</h3>
                <p class="text-slate-400 mt-2 text-center max-w-md">Data prestasi akan segera kami perbarui. Silakan periksa kembali nanti.</p>
            </div>
        @endif
    </div>
</section>
