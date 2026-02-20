<div id="ppdb" class="min-h-screen bg-gray-50 pb-20">
    @if($activeBatch)
        <div class="relative bg-white overflow-hidden mt-10">
            <div class="absolute inset-0 z-0">
                <div class="absolute inset-0 bg-gradient-to-r from-blue-900 to-indigo-900 opacity-90"></div>
                <div class="absolute top-0 left-0 -ml-20 -mt-20 w-80 h-80 rounded-full bg-blue-500 opacity-10 blur-3xl">
                </div>
                <div class="absolute bottom-0 right-0 -mr-20 -mb-20 w-80 h-80 rounded-full bg-teal-400 opacity-10 blur-3xl">
                </div>
            </div>

            <div class="container mx-auto px-4 py-16 relative z-10 text-center">
                <span
                    class="inline-block py-1 px-3 rounded-full bg-green-500/20 text-green-300 text-sm font-semibold mb-4 border border-green-500/30 animate-pulse">
                    🟢 Status: Pendaftaran Dibuka
                </span>

                <h1 class="text-4xl md:text-5xl font-extrabold text-white mb-4 tracking-tight">
                    PPDB Online <span class="text-transparent bg-clip-text bg-gradient-to-r from-blue-200 to-teal-200">SMPN
                        4 Genteng</span>
                </h1>

                <p class="text-blue-100 text-lg md:text-xl max-w-2xl mx-auto mb-8">
                    Bergabunglah menjadi bagian dari keluarga besar kami. Daftar sekarang melalui jalur <strong
                        class="text-white bg-white/10 px-2 py-1 rounded">{{ $activeBatch->name }}</strong>
                </p>

                <div
                    class="bg-white/10 backdrop-blur-md border border-white/20 rounded-2xl p-6 max-w-3xl mx-auto mb-10 flex flex-col md:flex-row justify-between items-center gap-6">
                    <div class="text-center md:text-left">
                        <p class="text-blue-200 text-sm uppercase tracking-wider mb-1">Gelombang Saat Ini</p>
                        <p class="text-2xl font-bold text-white">{{ $activeBatch->name }}</p>
                    </div>
                    <div class="hidden md:block w-px h-12 bg-white/20"></div>
                    <div class="text-center md:text-right">
                        <p class="text-blue-200 text-sm uppercase tracking-wider mb-1">Batas Pendaftaran</p>
                        <p class="text-2xl font-bold text-yellow-300">
                            <i class="far fa-clock mr-2"></i>{{ $activeBatch->end_date->format('d F Y') }}
                        </p>
                    </div>
                </div>

                <a href="#registration-form"
                    class="group inline-flex items-center bg-white text-blue-900 px-8 py-4 rounded-full text-lg font-bold shadow-[0_0_20px_rgba(255,255,255,0.3)] hover:shadow-[0_0_30px_rgba(255,255,255,0.5)] transition-all duration-300 transform hover:-translate-y-1">
                    Isi Formulir Pendaftaran
                    <i class="fas fa-arrow-down ml-3 group-hover:animate-bounce"></i>
                </a>
            </div>

            <div class="absolute bottom-0 left-0 right-0">
                <svg class="fill-gray-50" viewBox="0 0 1440 120" xmlns="http://www.w3.org/2000/svg">
                    <path
                        d="M0,64L80,69.3C160,75,320,85,480,80C640,75,800,53,960,48C1120,43,1280,53,1360,58.7L1440,64L1440,320L1360,320C1280,320,1120,320,960,320C800,320,640,320,480,320C320,320,160,320,80,320L0,320Z">
                    </path>
                </svg>
            </div>
        </div>

        <div id="registration-form" class="container mx-auto px-4 -mt-10 relative z-20 scroll-mt-24">
            <div class="max-w-4xl mx-auto">
                <div class="bg-white rounded-3xl shadow-xl overflow-hidden border border-gray-100">
                    <div class="bg-gray-50 px-8 py-6 border-b border-gray-100 flex items-center justify-between">
                        <h3 class="text-xl font-bold text-gray-800 flex items-center">
                            <span
                                class="bg-blue-600 text-white w-8 h-8 rounded-full flex items-center justify-center mr-3 text-sm">1</span>
                            Formulir Data Diri
                        </h3>
                        <span class="text-xs font-medium text-gray-500 uppercase tracking-wide">Step 1 of 1</span>
                    </div>

                    <div class="p-2 md:p-8">
                        @include('components.form-ppdb', ['batch' => $activeBatch])
                    </div>
                </div>

                <div class="mt-8 grid md:grid-cols-3 gap-6 text-center">
                    <div class="p-4">
                        <div
                            class="w-12 h-12 bg-blue-100 text-blue-600 rounded-full flex items-center justify-center mx-auto mb-3">
                            <i class="fas fa-check-circle text-xl"></i>
                        </div>
                        <h4 class="font-bold text-gray-800">Isi Data</h4>
                        <p class="text-sm text-gray-600 mt-1">Lengkapi data diri dengan benar sesuai ijazah/KK.</p>
                    </div>
                    <div class="p-4">
                        <div
                            class="w-12 h-12 bg-purple-100 text-purple-600 rounded-full flex items-center justify-center mx-auto mb-3">
                            <i class="fas fa-user-clock text-xl"></i>
                        </div>
                        <h4 class="font-bold text-gray-800">Verifikasi</h4>
                        <p class="text-sm text-gray-600 mt-1">Admin akan memverifikasi data yang masuk.</p>
                    </div>
                    <div class="p-4">
                        <div
                            class="w-12 h-12 bg-green-100 text-green-600 rounded-full flex items-center justify-center mx-auto mb-3">
                            <i class="fas fa-bullhorn text-xl"></i>
                        </div>
                        <h4 class="font-bold text-gray-800">Pengumuman</h4>
                        <p class="text-sm text-gray-600 mt-1">Hasil seleksi akan diumumkan di website ini.</p>
                    </div>
                </div>
            </div>
        </div>

    @else
        <div class="min-h-[80vh] flex items-center justify-center bg-gray-50 px-4">
            <div
                class="max-w-lg w-full text-center bg-white p-10 rounded-3xl shadow-2xl border border-gray-100 relative overflow-hidden">
                <div class="absolute top-0 right-0 -mr-10 -mt-10 w-40 h-40 bg-red-50 rounded-full blur-2xl opacity-50">
                </div>

                <div class="relative z-10">
                    <div
                        class="w-24 h-24 bg-red-100 text-red-500 rounded-full flex items-center justify-center mx-auto mb-6 text-4xl animate-bounce">
                        <i class="fas fa-calendar-times"></i>
                    </div>

                    <h2 class="text-3xl font-extrabold text-gray-800 mb-2">Pendaftaran Ditutup</h2>
                    <p class="text-gray-500 mb-8 text-lg">
                        Mohon maaf, saat ini tidak ada gelombang pendaftaran yang aktif. Silakan kembali lagi nanti.
                    </p>

                    <div class="space-y-3">
                        <a href="{{ route('dashboard') }}"
                            class="block w-full bg-gray-900 text-white px-8 py-3 rounded-xl font-bold hover:bg-gray-800 transition shadow-lg transform hover:-translate-y-1">
                            Kembali ke Beranda
                        </a>
                        <a href="#"
                            class="block w-full bg-white text-gray-700 border-2 border-gray-200 px-8 py-3 rounded-xl font-bold hover:bg-gray-50 transition">
                            Lihat Pengumuman Lain
                        </a>
                    </div>
                </div>
            </div>
        </div>
    @endif
</div>

<style>
    html {
        scroll-behavior: smooth;
    }
</style>