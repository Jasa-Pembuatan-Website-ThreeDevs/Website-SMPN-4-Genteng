@php
    $ekstrakurikuler = $ekstrakurikuler ?? [];
@endphp
<section class="section section-light main-content-section" id="extracurricular">
    <div class="container">
        <div class="section-title animate-on-scroll text-center">
            <span class="text-blue-600 font-bold tracking-wider uppercase text-sm mb-2 block">Pengembangan Diri</span>
            <h2 class="text-4xl font-bold mb-4 py-2 text-slate-900">Ekstrakurikuler</h2>
            <div class="w-24 h-1 bg-blue-600 mx-auto mb-6 rounded-full"></div>
            <p class="text-slate-600 max-w-2xl mx-auto">Berbagai kegiatan ekstrakurikuler untuk mengembangkan bakat dan minat siswa di luar pembelajaran akademik</p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8 mt-12">
            @forelse($ekstrakurikuler as $ekskul)
                <div class="group bg-white rounded-3xl overflow-hidden shadow-sm hover:shadow-2xl hover:shadow-blue-500/15 transition-all duration-500 flex flex-col h-full border border-slate-100/80 animate-on-scroll">
                    <!-- Image/Icon Container (Header Card) -->
                    <div class="relative overflow-hidden h-52 block bg-slate-100">
                        @php
                            $imageUrl = filter_var($ekskul->image, FILTER_VALIDATE_URL) 
                                ? $ekskul->image 
                                : asset('storage/' . $ekskul->image);
                        @endphp

                        <img src="{{ $imageUrl }}" alt="{{ $ekskul->name }}" 
                             class="w-full h-full object-cover transform transition-all duration-700 group-hover:scale-110">
                        
                        <!-- Overlay Gradient for better contrast -->
                        <div class="absolute inset-0 bg-gradient-to-t from-black/20 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-500"></div>

                        <!-- Badge -->
                        <div class="absolute top-4 left-4 z-10">
                            <span class="bg-blue-600 text-white px-3 py-1 rounded-lg text-[10px] font-bold shadow-lg uppercase tracking-wider">
                                Ekskul
                            </span>
                        </div>
                    </div>

                    <!-- Content Container -->
                    <div class="p-8 flex flex-col flex-grow relative bg-white">
                        <!-- Title & Accent -->
                        <div class="mb-4 relative">
                            <h3 class="text-2xl font-black text-slate-800 mb-2 group-hover:text-blue-600 transition-colors duration-300 leading-none">
                                {{ $ekskul->name }}
                            </h3>
                            <div class="h-1.5 w-8 bg-blue-600 rounded-full group-hover:w-16 transition-all duration-500"></div>
                        </div>
                        
                        <!-- Description -->
                        <p class="text-slate-500 text-sm mb-8 line-clamp-3 leading-relaxed flex-grow font-medium">
                            {{ $ekskul->description }}
                        </p>

                        <!-- Teacher Info -->
                        @if($ekskul->teacher && $ekskul->teacher->name)
                            <div class="flex items-center gap-4 pt-6 border-t border-slate-50 mt-auto">
                                <div class="relative flex-shrink-0">
                                    <div class="w-12 h-12 rounded-2xl overflow-hidden border-2 border-white shadow-md bg-slate-50 group-hover:border-blue-100 transition-all duration-300">
                                        @if($ekskul->teacher->photo)
                                            <img src="{{ asset('storage/' . $ekskul->teacher->photo) }}" alt="{{ $ekskul->teacher->name }}" class="w-full h-full object-cover">
                                        @else
                                            <div class="w-full h-full flex items-center justify-center bg-blue-50 text-blue-600 font-black text-lg">
                                                {{ mb_substr($ekskul->teacher->name, 0, 1) }}
                                            </div>
                                        @endif
                                    </div>
                                    <div class="absolute -bottom-1 -right-1 w-5 h-5 bg-green-500 rounded-full border-2 border-white flex items-center justify-center shadow-sm">
                                        <i class="fas fa-check text-[7px] text-white"></i>
                                    </div>
                                </div>
                                <div class="flex flex-col min-w-0">
                                    <span class="text-[9px] uppercase tracking-widest text-slate-400 font-extrabold leading-none mb-1">Pembina Utama</span>
                                    <span class="text-sm font-bold text-slate-700 group-hover:text-blue-600 transition-colors duration-300 truncate">{{ $ekskul->teacher->name }}</span>
                                </div>
                            </div>
                        @else
                            <div class="pt-6 border-t border-slate-50 mt-auto">
                                 <span class="text-[10px] italic text-slate-400 font-medium">Informasi pembina segera hadir</span>
                            </div>
                        @endif
                    </div>
                </div>
            @empty
                <div class="col-span-full flex flex-col items-center justify-center py-20 bg-white rounded-3xl shadow-inner border-2 border-dashed border-slate-100 animate-on-scroll">
                    <div class="w-20 h-20 bg-slate-50 rounded-full flex items-center justify-center mb-6">
                        <i class="fas fa-users text-3xl text-slate-300"></i>
                    </div>
                    <h3 class="text-2xl font-bold text-slate-700">Belum Ada Data</h3>
                    <p class="text-slate-400 mt-2 text-center max-w-md">Belum ada data kegiatan ekstrakurikuler yang tersedia saat ini.</p>
                </div>
            @endforelse
        </div>
    </div>
</section>