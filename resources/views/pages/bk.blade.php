<head>
    <title>Bimbingan Konseling - SMPN 4 Genteng</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&family=Inter:wght@400;500;600;700&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="css/style.css">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>


<section class="bg-gradient-to-r mt-16 from-indigo-800 to-blue-900 text-white py-16">
    @extends('components.navbar')
    <div class="container mx-auto px-4">
        <div class="max-w-4xl mx-auto text-center">
            <h1 class="text-4xl md:text-5xl font-extrabold mb-4">Bimbingan Konseling (BK)</h1>
            <p class="text-blue-100 text-lg md:text-lg max-w-2xl mx-auto">Layanan BK membantu siswa mengembangkan
                potensi akademik, sosial, dan persiapan karir melalui konseling profesional dan kegiatan bimbingan.</p>
        </div>
    </div>
</section>

<section class="container mx-auto px-4 py-12 -mt-10">
    <div class="max-w-5xl mx-auto bg-white rounded-3xl shadow-xl overflow-hidden border border-gray-100">
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 p-8">
            <div class="md:col-span-2">
                <h2 class="text-2xl font-bold text-gray-800 mb-3">Layanan BK</h2>
                <p class="text-gray-600 mb-6">Kami menyediakan layanan konseling untuk membimbing siswa dalam masalah
                    pembelajaran, sosial-emosional, dan perencanaan karir. Semua layanan bersifat rahasia dan berpihak
                    pada kepentingan siswa.</p>

                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                    <div class="p-4 border rounded-lg shadow-sm">
                        <div class="flex items-start gap-3">
                            <div
                                class="flex-shrink-0 w-12 h-12 rounded-full bg-blue-100 flex items-center justify-center">
                                <div class="text-xl text-blue-600"><i class="fas fa-user-friends"></i></div>
                            </div>
                            <div>
                                <h3 class="font-semibold">Konseling Personal</h3>
                                <p class="text-sm text-gray-600">Pertemuan satu-satu untuk membantu permasalahan pribadi
                                    dan akademik.</p>
                            </div>
                        </div>
                    </div>

                    <div class="p-4 border rounded-lg shadow-sm">
                        <div class="flex items-start gap-3">
                            <div
                                class="flex-shrink-0 w-12 h-12 rounded-full bg-green-100 flex items-center justify-center">
                                <div class="text-xl text-green-600"><i class="fas fa-users"></i></div>
                            </div>
                            <div>
                                <h3 class="font-semibold">Konseling Kelompok</h3>
                                <p class="text-sm text-gray-600">Sesi kelompok untuk pengembangan keterampilan sosial
                                    dan dinamika kelas.</p>
                            </div>
                        </div>
                    </div>

                    <div class="p-4 border rounded-lg shadow-sm">
                        <div class="flex items-start gap-3">
                            <div
                                class="flex-shrink-0 w-12 h-12 rounded-full bg-purple-100 flex items-center justify-center">
                                <div class="text-xl text-purple-600"><i class="fas fa-briefcase"></i></div>
                            </div>
                            <div>
                                <h3 class="font-semibold">Bimbingan Karir</h3>
                                <p class="text-sm text-gray-600">Panduan pilihan jurusan dan informasi peluang karir
                                    untuk siswa.</p>
                            </div>
                        </div>
                    </div>

                    <div class="p-4 border rounded-lg shadow-sm">
                        <div class="flex items-start gap-3">
                            <div
                                class="flex-shrink-0 w-12 h-12 rounded-full bg-yellow-100 flex items-center justify-center">
                                <div class="text-xl text-yellow-600"><i class="fas fa-chart-line"></i></div>
                            </div>
                            <div>
                                <h3 class="font-semibold">Pengembangan Diri</h3>
                                <p class="text-sm text-gray-600">Workshop dan kegiatan untuk meningkatkan soft-skill dan
                                    prestasi siswa.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <aside class="p-6 bg-gray-50 rounded-xl border border-gray-100">
                <h4 class="font-bold text-gray-800 mb-3">Kontak & Jadwal</h4>
                <p class="text-sm text-gray-600 mb-4">Untuk konsultasi, silakan hubungi guru BK atau isi formulir
                    permintaan konseling di sekolah.</p>
                <div class="text-sm text-gray-700 space-y-2">
                    <div><strong>Telepon:</strong> (0333) 123-456</div>
                    <div><strong>Email:</strong> bk@smpn4genteng.sch.id</div>
                    <div><strong>Jam Pelayanan:</strong> Senin - Jumat, 08:00 - 14:00</div>
                </div>
                <a href="/contact"
                    class="inline-block mt-6 w-full text-center bg-blue-600 text-white px-4 py-2 rounded-lg font-semibold hover:bg-blue-700">Hubungi
                    Guru BK</a>
            </aside>
        </div>
    </div>
</section>

<!-- Section for BK Teacher Team -->
<section class="bg-gray-50 py-12">
    <div class="container mx-auto px-4">
        <div class="max-w-4xl mx-auto text-center mb-8">
            <h2 class="text-3xl font-bold text-gray-800">Tim Guru Bimbingan Konseling</h2>
            <p class="text-gray-600 mt-2">Berdedikasi membantu siswa mencapai potensi penuh mereka.</p>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8 max-w-4xl mx-auto">
            <!-- Teacher 1 -->
            <div class="bg-white rounded-lg shadow-md overflow-hidden text-center p-6 border border-gray-100">
                <img class="w-32 h-32 rounded-full mx-auto mb-4 object-cover"
                    src="https://images.unsplash.com/photo-1573496359142-b8d87734b0a4?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=300&q=80"
                    alt="Nama Guru BK 1">
                <h3 class="text-xl font-semibold text-gray-800">Budi Santoso, S.Pd.</h3>
                <p class="text-blue-600">Koordinator BK</p>
                <p class="text-gray-500 text-sm mt-2">Berpengalaman 15 tahun dalam konseling karir dan pengembangan
                    diri.</p>
            </div>
            <!-- Teacher 2 -->
            <div class="bg-white rounded-lg shadow-md overflow-hidden text-center p-6 border border-gray-100">
                <img class="w-32 h-32 rounded-full mx-auto mb-4 object-cover"
                    src="https://images.unsplash.com/photo-1438761681033-6461ffad8d80?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=300&q=80"
                    alt="Nama Guru BK 2">
                <h3 class="text-xl font-semibold text-gray-800">Dewi Anggraini, M.Psi.</h3>
                <p class="text-green-600">Konselor Akademik</p>
                <p class="text-gray-500 text-sm mt-2">Spesialis dalam membantu siswa mengatasi kesulitan belajar dan
                    motivasi.</p>
            </div>
            <!-- Teacher 3 -->
            <div class="bg-white rounded-lg shadow-md overflow-hidden text-center p-6 border border-gray-100">
                <img class="w-32 h-32 rounded-full mx-auto mb-4 object-cover"
                    src="https://images.unsplash.com/photo-1506794778202-cad84cf45f1d?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=300&q=80"
                    alt="Nama Guru BK 3">
                <h3 class="text-xl font-semibold text-gray-800">Cahyo Wibowo, S.Pd.</h3>
                <p class="text-purple-600">Konselor Sosial</p>
                <p class="text-gray-500 text-sm mt-2">Fokus pada pengembangan keterampilan sosial dan penanganan isu
                    perundungan.</p>
            </div>
        </div>
    </div>
</section>
@include('components.footer')