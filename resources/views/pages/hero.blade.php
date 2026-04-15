<section class="hero-premium relative overflow-hidden bg-slate-50 pt-32 pb-20 lg:pt-48 lg:pb-32" id="home">
    <!-- Dekorasi Background -->
    <div class="absolute top-0 right-0 w-1/3 h-full bg-blue-600/5 -skew-x-12 transform origin-top-right"></div>
    <div class="floating-element floating-1 opacity-20"></div>
    <div class="floating-element floating-2 opacity-20"></div>

    <div class="container relative z-10 mx-auto px-6">
        <div class="flex flex-col lg:flex-row items-center justify-between gap-12 lg:gap-20">
            
            <!-- Sisi Kiri: Konten Teks -->
            <div class="w-full lg:w-3/5 animate-on-scroll">
                <div class="inline-flex items-center gap-2 px-4 py-2 rounded-full bg-blue-50 border border-blue-100 text-blue-600 mb-8 shadow-sm">
                    <i class="fas fa-award text-sm"></i>
                    <span class="text-xs font-bold uppercase tracking-wider">Sekolah Unggulan Banyuwangi</span>
                </div>
                
                <h1 class="text-4xl md:text-5xl lg:text-6xl font-extrabold text-slate-900 leading-[1.1] mb-6">
                    Membentuk Generasi <br>
                    <span class="text-transparent bg-clip-text bg-gradient-to-r from-blue-600 to-indigo-600">
                        Cerdas & Berkarakter
                    </span>
                </h1>
                
                <p class="text-lg text-slate-600 mb-10 leading-relaxed max-w-xl">
                    SMPN 4 Genteng menghadirkan ekosistem belajar modern yang menggabungkan keunggulan akademik dengan pembentukan karakter mulia untuk masa depan cemerlang.
                </p>
                
                <div class="flex flex-wrap gap-4 mb-12">
                    <a href="/ppdb" class="px-8 py-4 bg-blue-600 text-white font-bold rounded-2xl hover:bg-blue-700 transition-all shadow-xl shadow-blue-600/25 flex items-center gap-3 group pulse-animation">
                        <i class="fas fa-user-plus"></i>
                        Daftar PPDB 2024
                        <i class="fas fa-arrow-right text-xs group-hover:translate-x-1 transition-transform"></i>
                    </a>
                    <a href="#about" class="px-8 py-4 bg-white text-slate-700 font-bold rounded-2xl hover:bg-slate-50 transition-all border border-slate-200 flex items-center gap-3">
                        <i class="fas fa-play-circle text-blue-600"></i>
                        Jelajahi Sekolah
                    </a>
                </div>

                <!-- Statistik Grid -->
                <div class="grid grid-cols-2 sm:grid-cols-4 gap-4">
                    <div class="p-4 rounded-2xl bg-white/60 backdrop-blur-md border border-white shadow-sm hover:shadow-md transition-shadow text-center sm:text-left">
                        <span class="block text-2xl font-black text-blue-600 mb-1">98%</span>
                        <span class="text-[10px] font-bold uppercase tracking-widest text-slate-400">Kelulusan</span>
                    </div>
                    <div class="p-4 rounded-2xl bg-white/60 backdrop-blur-md border border-white shadow-sm hover:shadow-md transition-shadow text-center sm:text-left">
                        <span class="block text-2xl font-black text-blue-600 mb-1">{{ $totalAchievements }}+</span>
                        <span class="text-[10px] font-bold uppercase tracking-widest text-slate-400">Prestasi</span>
                    </div>
                    <div class="p-4 rounded-2xl bg-white/60 backdrop-blur-md border border-white shadow-sm hover:shadow-md transition-shadow text-center sm:text-left">
                        <span class="block text-2xl font-black text-blue-600 mb-1">24</span>
                        <span class="text-[10px] font-bold uppercase tracking-widest text-slate-400">Guru Ahli</span>
                    </div>
                    <div class="p-4 rounded-2xl bg-white/60 backdrop-blur-md border border-white shadow-sm hover:shadow-md transition-shadow text-center sm:text-left">
                        <span class="block text-2xl font-black text-blue-600 mb-1">{{ $ekskulCount }}</span>
                        <span class="text-[10px] font-bold uppercase tracking-widest text-slate-400">Ekskul</span>
                    </div>
                </div>
            </div>

            <!-- Sisi Kanan: Gambar -->
            <div class="w-full lg:w-2/5 relative animate-on-scroll">
                <!-- Dekorasi Gambar -->
                <div class="absolute -top-6 -right-6 w-32 h-32 bg-yellow-400/20 rounded-full blur-3xl"></div>
                <div class="absolute -bottom-10 -left-10 w-48 h-48 bg-blue-600/10 rounded-full blur-3xl"></div>
                
                <div class="relative z-10 p-3 bg-white rounded-[2.5rem] shadow-2xl shadow-blue-900/10 transform hover:rotate-2 transition-transform duration-500">
                    <img src="https://i.pinimg.com/1200x/12/cc/93/12cc93e5bd10f66ab337ca29d028bc2b.jpg" 
                         alt="Siswa SMPN 4 Genteng" 
                         class="w-full h-auto rounded-[2rem] object-cover aspect-[4/5]">
                    
                    <!-- Floating Badge -->
                    <div class="absolute -bottom-6 -right-6 md:right-10 bg-white p-5 rounded-3xl shadow-2xl flex items-center gap-4 animate-bounce-slow border border-slate-50">
                        <div class="w-12 h-12 bg-green-500 rounded-2xl flex items-center justify-center text-white shadow-lg shadow-green-500/30">
                            <i class="fas fa-check-circle text-xl"></i>
                        </div>
                        <div>
                            <span class="block text-lg font-bold text-slate-800 leading-none">Terakreditasi</span>
                            <span class="text-xs font-medium text-slate-400 tracking-wider uppercase">Grade A (Unggul)</span>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>

<style>
@keyframes bounce-slow {
    0%, 100% { transform: translateY(0); }
    50% { transform: translateY(-10px); }
}
.animate-bounce-slow {
    animation: bounce-slow 4s ease-in-out infinite;
}

.pulse-animation {
    animation: pulse-ring 2s infinite;
}

@keyframes pulse-ring {
    0% { box-shadow: 0 0 0 0 rgba(37, 99, 235, 0.4); }
    70% { box-shadow: 0 0 0 15px rgba(37, 99, 235, 0); }
    100% { box-shadow: 0 0 0 0 rgba(37, 99, 235, 0); }
}

.hero-premium h1 {
    font-family: 'Poppins', sans-serif;
}
</style>
