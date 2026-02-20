<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SMPN 4 Genteng | Sekolah Berprestasi & Berkarakter</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&family=Inter:wght@400;500;600;700&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="css/style.css">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<div class="min-h-screen bg-gradient-to-br from-green-50 to-blue-50 flex items-center justify-center px-4 py-20">
    <div class="max-w-2xl w-full">
        <!-- Success Card -->
        <div class="bg-white rounded-3xl shadow-2xl overflow-hidden border border-green-100">
            <!-- Header with Success Animation -->
            <div class="bg-gradient-to-r from-green-500 to-teal-500 px-8 py-12 text-center relative overflow-hidden">
                <div class="absolute top-0 right-0 -mr-10 -mt-10 w-40 h-40 bg-white opacity-10 rounded-full"></div>
                <div class="absolute bottom-0 left-0 -ml-10 -mb-10 w-32 h-32 bg-white opacity-10 rounded-full"></div>

                <div class="relative z-10">
                    <div class="inline-flex items-center justify-center mb-6">
                        <div class="relative">
                            <div class="absolute inset-0 bg-white/30 rounded-full animate-ping"></div>
                            <div class="relative w-20 h-20 bg-white rounded-full flex items-center justify-center">
                                <svg class="w-10 h-10 text-green-500 animate-bounce" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3"
                                        d="M5 13l4 4L19 7"></path>
                                </svg>
                            </div>
                        </div>
                    </div>

                    <h1 class="text-4xl md:text-5xl font-extrabold text-white mb-3">
                        Pendaftaran Berhasil!
                    </h1>
                    <p class="text-green-100 text-lg">
                        Terima kasih telah mendaftar di SMPN 4 Genteng
                    </p>
                </div>
            </div>

            <!-- Content -->
            <div class="px-8 py-12">
                <!-- Photo Section -->
                @if($registration->photo_path)
                    <div class="mb-10 flex justify-center">
                        <div class="relative">
                            <div class="w-32 h-40 rounded-2xl overflow-hidden border-4 border-blue-200 shadow-lg">
                                <img src="{{ asset('storage/' . $registration->photo_path) }}"
                                    alt="Foto {{ $registration->name }}" class="w-full h-full object-cover">
                            </div>
                            <div
                                class="absolute -bottom-2 left-1/2 transform -translate-x-1/2 bg-green-500 text-white px-3 py-1 rounded-full text-xs font-semibold whitespace-nowrap">
                                Foto Terverifikasi</div>
                        </div>
                    </div>
                @endif

                <!-- Success Message -->
                <div class="mb-10 text-center">
                    <p class="text-gray-700 text-lg leading-relaxed mb-6">
                        Data pendaftaran Anda telah kami terima dan sedang diproses. Tim kami akan menghubungi Anda
                        melalui <strong class="text-blue-600">WhatsApp</strong> untuk tahap selanjutnya.
                    </p>
                    <div class="bg-green-50 border-l-4 border-green-500 p-4 rounded text-left">
                        <p class="text-gray-700">
                            <span class="font-semibold text-green-700">📱 Nomor yang akan kami hubungi:</span><br>
                            <span class="text-lg font-mono text-green-600">{{ $registration->whatsapp }}</span>
                        </p>
                    </div>
                </div>

                <!-- Registration Details Card -->
                <div class="bg-gray-50 rounded-2xl p-6 mb-10 border border-gray-200">
                    <h2 class="text-xl font-bold text-gray-800 mb-6 flex items-center">
                        <i class="fas fa-user-check text-blue-600 mr-3"></i>
                        Data yang Kami Terima
                    </h2>

                    <div class="grid md:grid-cols-2 gap-6">
                        <!-- Personal Data -->
                        <div class="space-y-4">
                            <div class="pb-4 border-b border-gray-200">
                                <p class="text-gray-600 text-sm font-semibold uppercase tracking-wide">Nama Lengkap</p>
                                <p class="text-gray-800 text-lg font-semibold mt-1">{{ $registration->name }}</p>
                            </div>

                            <div class="pb-4 border-b border-gray-200">
                                <p class="text-gray-600 text-sm font-semibold uppercase tracking-wide">NISN</p>
                                <p class="text-gray-800 text-lg font-semibold mt-1">{{ $registration->nisn }}</p>
                            </div>

                            <div class="pb-4 border-b border-gray-200">
                                <p class="text-gray-600 text-sm font-semibold uppercase tracking-wide">Tempat Lahir</p>
                                <p class="text-gray-800 text-lg font-semibold mt-1">{{ $registration->birth_place }}</p>
                            </div>

                            <div>
                                <p class="text-gray-600 text-sm font-semibold uppercase tracking-wide">Tanggal Lahir</p>
                                <p class="text-gray-800 text-lg font-semibold mt-1">
                                    {{ $registration->birth_date->format('d F Y') }}</p>
                            </div>
                        </div>

                        <!-- Contact Data -->
                        <div class="space-y-4">
                            <div class="pb-4 border-b border-gray-200">
                                <p class="text-gray-600 text-sm font-semibold uppercase tracking-wide">Jenis Kelamin</p>
                                <p class="text-gray-800 text-lg font-semibold mt-1">
                                    {{ $registration->gender === 'L' ? 'Laki-laki' : 'Perempuan' }}
                                </p>
                            </div>

                            <div class="pb-4 border-b border-gray-200">
                                <p class="text-gray-600 text-sm font-semibold uppercase tracking-wide">Asal Sekolah</p>
                                <p class="text-gray-800 text-lg font-semibold mt-1">{{ $registration->origin_school }}
                                </p>
                            </div>

                            <div class="pb-4 border-b border-gray-200">
                                <p class="text-gray-600 text-sm font-semibold uppercase tracking-wide">Nama Orang Tua
                                </p>
                                <p class="text-gray-800 text-lg font-semibold mt-1">{{ $registration->parent_name }}</p>
                            </div>

                            <div>
                                <p class="text-gray-600 text-sm font-semibold uppercase tracking-wide">Alamat</p>
                                <p class="text-gray-800 text-lg font-semibold mt-1 line-clamp-2">
                                    {{ $registration->address }}</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Next Steps -->
                <div class="bg-blue-50 rounded-2xl p-6 mb-10 border border-blue-200">
                    <h3 class="text-lg font-bold text-gray-800 mb-4 flex items-center">
                        <i class="fas fa-tasks text-blue-600 mr-3"></i>
                        Langkah Selanjutnya
                    </h3>

                    <ol class="space-y-3">
                        <li class="flex items-start">
                            <span
                                class="flex-shrink-0 flex items-center justify-center h-6 w-6 rounded-full bg-blue-600 text-white text-sm font-bold mr-3">1</span>
                            <span class="text-gray-700"><strong>Tunggu Konfirmasi</strong> - Tim kami akan menghubungi
                                Anda melalui WhatsApp dalam 1-2 hari kerja</span>
                        </li>
                        <li class="flex items-start">
                            <span
                                class="flex-shrink-0 flex items-center justify-center h-6 w-6 rounded-full bg-blue-600 text-white text-sm font-bold mr-3">2</span>
                            <span class="text-gray-700"><strong>Verifikasi Data</strong> - Kami akan memverifikasi
                                dokumen dan data yang Anda kirimkan</span>
                        </li>
                        <li class="flex items-start">
                            <span
                                class="flex-shrink-0 flex items-center justify-center h-6 w-6 rounded-full bg-blue-600 text-white text-sm font-bold mr-3">3</span>
                            <span class="text-gray-700"><strong>Pengumuman Hasil</strong> - Hasil seleksi akan diumumkan
                                melalui website dan WhatsApp</span>
                        </li>
                    </ol>
                </div>

                <!-- Important Notes -->
                <div class="bg-yellow-50 rounded-2xl p-6 mb-10 border border-yellow-200">
                    <h3 class="text-lg font-bold text-gray-800 mb-4 flex items-center">
                        <i class="fas fa-lightbulb text-yellow-600 mr-3"></i>
                        Catatan Penting
                    </h3>

                    <ul class="space-y-2 text-gray-700">
                        <li class="flex items-start">
                            <span class="text-yellow-600 mr-3">•</span>
                            <span>Pastikan nomor WhatsApp Anda aktif dan mudah dihubungi</span>
                        </li>
                        <li class="flex items-start">
                            <span class="text-yellow-600 mr-3">•</span>
                            <span>Jangan hapus pesan WhatsApp dari kami untuk keperluan verifikasi</span>
                        </li>
                        <li class="flex items-start">
                            <span class="text-yellow-600 mr-3">•</span>
                            <span>Persiapkan dokumen asli untuk tahap selanjutnya</span>
                        </li>
                        <li class="flex items-start">
                            <span class="text-yellow-600 mr-3">•</span>
                            <span>Pantau website kami untuk pengumuman hasil seleksi</span>
                        </li>
                    </ul>
                </div>

                <!-- Action Buttons -->
                <div class="flex flex-col sm:flex-row gap-4 justify-center">
                    <a href="/"
                        class="inline-flex items-center justify-center bg-blue-600 text-white px-8 py-3 rounded-full font-bold hover:bg-blue-700 transition transform hover:-translate-y-1 shadow-lg">
                        <i class="fas fa-home mr-2"></i>
                        Kembali ke Beranda
                    </a>
                    <a href="https://wa.me/62{{ substr($registration->whatsapp, 1) }}" target="_blank"
                        class="inline-flex items-center justify-center bg-green-600 text-white px-8 py-3 rounded-full font-bold hover:bg-green-700 transition transform hover:-translate-y-1 shadow-lg">
                        <i class="fab fa-whatsapp mr-2"></i>
                        Hubungi Admin
                    </a>
                </div>
            </div>
        </div>

        <!-- Footer Info -->
        <div class="mt-8 text-center text-gray-600">
            <p class="text-sm">
                Pertanyaan? Hubungi kami di WhatsApp atau kunjungi kantor sekolah kami.
            </p>
        </div>
    </div>
</div>

<style>
    .line-clamp-2 {
        display: -webkit-box;
        -webkit-line-clamp: 2;
        -webkit-box-orient: vertical;
        overflow: hidden;
    }
</style>