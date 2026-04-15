<section id="announcements" class="section bg-white">
    <div class="container">
        <div class="flex flex-col md:flex-row items-end justify-between mb-12 animate-on-scroll">
            <div class="section-title text-left mb-0">
                <span class="text-red-500 font-bold tracking-wider uppercase text-sm mb-2 block">Pusat Informasi</span>
                <h2 class="text-4xl font-bold mb-0">Pengumuman <span class="text-red-500">Terbaru</span></h2>
                <div class="w-20 h-1 bg-red-500 mt-4 rounded-full"></div>
            </div>
            <a href="{{ route('announcements.public.index') }}" class="text-red-500 font-bold flex items-center gap-2 hover:gap-3 transition-all mt-4 md:mt-0">
                Lihat Semua <i class="fas fa-arrow-right"></i>
            </a>
        </div>

        @if($announcements->count() > 0)
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            @foreach($announcements as $announcement)
            <div class="group bg-slate-50 rounded-2xl overflow-hidden border border-slate-100 hover:border-red-200 hover:bg-white hover:shadow-2xl hover:shadow-red-500/10 transition-all duration-300 flex flex-col h-full animate-on-scroll">
                <a href="{{ route('announcements.public.show', $announcement) }}" class="block relative h-48 overflow-hidden">
                    @if($announcement->image)
                    <img src="{{ asset('storage/' . $announcement->image) }}" alt="{{ $announcement->title }}" 
                         class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-110" loading="lazy">
                    <div class="absolute inset-0 bg-gradient-to-t from-black/60 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                    @else
                    <div class="h-full bg-gradient-to-br from-red-500 to-rose-600 flex items-center justify-center text-white">
                        <i class="fas fa-bullhorn text-5xl opacity-30 group-hover:scale-110 transition-transform duration-300"></i>
                    </div>
                    @endif
                </a>
                
                <div class="p-6 flex flex-col flex-grow">
                    <div class="flex items-center gap-2 mb-4">
                        <span class="bg-red-100 text-red-600 px-3 py-1 rounded-full text-[10px] font-extrabold uppercase tracking-widest">
                            PENTING
                        </span>
                        <span class="text-slate-400 text-xs flex items-center gap-1">
                            <i class="far fa-calendar-alt"></i>
                            {{ $announcement->created_at->format('d M Y') }}
                        </span>
                    </div>
                    
                    <h3 class="text-xl font-bold text-slate-800 mb-3 group-hover:text-red-500 transition-colors line-clamp-2">
                        <a href="{{ route('announcements.public.show', $announcement) }}">{{ $announcement->title }}</a>
                    </h3>
                    
                    <p class="text-slate-500 text-sm mb-6 line-clamp-3 leading-relaxed flex-grow">
                        {{ Str::limit(strip_tags($announcement->content), 120) }}
                    </p>
                    
                    <div class="pt-4 border-t border-slate-200/60 mt-auto">
                        <a href="{{ route('announcements.public.show', $announcement) }}" class="flex items-center text-slate-800 font-bold text-sm group/btn">
                            Baca Selengkapnya
                            <div class="ml-2 w-8 h-8 rounded-full bg-slate-200 group-hover/btn:bg-red-500 group-hover/btn:text-white flex items-center justify-center transition-all duration-300">
                                <i class="fas fa-chevron-right text-[10px]"></i>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        @else
        <div class="flex flex-col items-center justify-center py-20 bg-slate-50 rounded-3xl border-2 border-dashed border-slate-200 animate-on-scroll">
            <div class="w-20 h-20 bg-white rounded-full shadow-sm flex items-center justify-center mb-6">
                <i class="fas fa-bullhorn text-3xl text-slate-300"></i>
            </div>
            <h3 class="text-2xl font-bold text-slate-700">Belum Ada Pengumuman</h3>
            <p class="text-slate-400 mt-2 text-center max-w-md">Saat ini belum ada pengumuman terbaru yang dipublikasikan. Tetap pantau halaman ini untuk update mendatang.</p>
        </div>
        @endif
    </div>
</section>

<style>
/* Any additional custom styles can go here if Tailwind isn't enough */
#announcements .section-title h2 {
    background: none;
    -webkit-background-clip: initial;
    background-clip: initial;
    color: #1e293b;
}
</style>
