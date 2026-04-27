@php
    $ekstrakurikuler = $ekstrakurikuler ?? [];
@endphp
<section class="section bg-slate-50" id="extracurricular">
    <div class="container mx-auto px-4">
        <div class="section-title text-center mb-12 animate-on-scroll">
            <span class="text-purple-600 font-bold tracking-wider uppercase text-sm mb-2 block">Kegiatan Siswa</span>
            <h2 class="text-4xl font-bold mb-4 py-2">Ekstrakurikuler</h2>
            <div class="w-24 h-1 bg-purple-600 mx-auto mb-6 rounded-full"></div>
            <p class="text-gray-600 max-w-2xl mx-auto">Berbagai kegiatan ekstrakurikuler untuk mengembangkan bakat dan minat siswa di luar pembelajaran akademik.</p>
        </div>

        @if(count($ekstrakurikuler) > 0)
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8 mt-12">
                @foreach($ekstrakurikuler as $ekskul)
                    <div class="group bg-white rounded-2xl overflow-hidden shadow-sm hover:shadow-xl transition-all duration-300 flex flex-col h-full border border-gray-100 animate-on-scroll">
                        <div class="relative overflow-hidden h-56">
                            @if($ekskul->image)
                                <img class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-110" 
                                     src="{{ asset('storage/' . $ekskul->image) }}" alt="{{ $ekskul->name }}" loading="lazy">
                            @else
                                <div class="w-full h-full bg-gradient-to-br from-purple-500 to-indigo-600 flex items-center justify-center text-white">
                                    <i class="fas fa-users text-5xl opacity-30"></i>
                                </div>
                            @endif
                            <div class="absolute top-4 left-4">
                                <span class="bg-white/90 backdrop-blur-sm text-purple-600 px-3 py-1 rounded-full text-xs font-bold shadow-sm uppercase">
                                    Ekskul
                                </span>
                            </div>
                        </div>
                        
                        <div class="p-6 flex flex-col flex-grow">
                            <h3 class="text-xl font-bold text-gray-800 mb-3 group-hover:text-purple-600 transition-colors line-clamp-2 leading-snug">
                                {{ $ekskul->name }}
                            </h3>
                            
                            <p class="text-gray-500 text-sm line-clamp-3 leading-relaxed flex-grow">
                                {{ $ekskul->description }}
                            </p>
                        </div>
                    </div>
                @endforeach
            </div>
        @else
            <div class="flex flex-col items-center justify-center py-20 bg-white rounded-3xl shadow-inner mt-10 border-2 border-dashed border-gray-100 animate-on-scroll">
                <div class="w-20 h-20 bg-gray-50 rounded-full flex items-center justify-center mb-6">
                    <i class="fas fa-users text-3xl text-gray-300"></i>
                </div>
                <h3 class="text-2xl font-bold text-gray-700">Belum Ada Data</h3>
                <p class="text-gray-400 mt-2 text-center max-w-md">Saat ini belum ada data ekstrakurikuler yang tersedia.</p>
            </div>
        @endif
    </div>
</section>