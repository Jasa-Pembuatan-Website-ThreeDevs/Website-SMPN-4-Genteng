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
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

@include('components.navbar')
<section class="bg-gradient-to-r mt-16 from-green-700 to-teal-600 text-white py-16">
    <div class="container mx-auto px-4">
        <div class="max-w-4xl mx-auto text-center">
            <h1 class="text-4xl md:text-5xl font-extrabold mb-4">UKS - Usaha Kesehatan Sekolah</h1>
            <p class="text-teal-100 text-lg md:text-lg max-w-2xl mx-auto">Menjaga kesehatan siswa melalui pemeriksaan,
                promosi kesehatan, dan program gizi yang berkelanjutan.</p>
        </div>
    </div>
</section>

<section class="container mx-auto px-4 py-12 -mt-10">
    <div class="max-w-5xl mx-auto bg-white rounded-3xl shadow-xl overflow-hidden border border-gray-100">
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 p-8">
            <div class="md:col-span-2">
                <h2 class="text-2xl font-bold text-gray-800 mb-3">Layanan UKS</h2>
                <p class="text-gray-600 mb-6">UKS menyediakan layanan kesehatan untuk memastikan siswa tumbuh sehat dan
                    siap belajar. Kami bekerja sama dengan staf medis dan komunitas sekolah.</p>

                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                    <div class="p-4 border rounded-lg shadow-sm">
                        <div class="flex items-start gap-3">
                            <div
                                class="flex-shrink-0 w-12 h-12 rounded-full bg-green-100 flex items-center justify-center">
                                <div class="text-xl text-green-600"><i class="fas fa-stethoscope"></i></div>
                            </div>
                            <div>
                                <h3 class="font-semibold">Pemeriksaan Kesehatan</h3>
                                <p class="text-sm text-gray-600">Pemeriksaan berkala untuk deteksi dini masalah
                                    kesehatan.</p>
                            </div>
                        </div>
                    </div>

                    <div class="p-4 border rounded-lg shadow-sm">
                        <div class="flex items-start gap-3">
                            <div
                                class="flex-shrink-0 w-12 h-12 rounded-full bg-blue-100 flex items-center justify-center">
                                <div class="text-xl text-blue-600"><i class="fas fa-hand-holding-heart"></i></div>
                            </div>
                            <div>
                                <h3 class="font-semibold">Promosi Kesehatan</h3>
                                <p class="text-sm text-gray-600">Kegiatan penyuluhan higiene, sanitasi, dan pola hidup
                                    sehat.</p>
                            </div>
                        </div>
                    </div>

                    <div class="p-4 border rounded-lg shadow-sm">
                        <div class="flex items-start gap-3">
                            <div
                                class="flex-shrink-0 w-12 h-12 rounded-full bg-yellow-100 flex items-center justify-center">
                                <div class="text-xl text-yellow-600"><i class="fas fa-apple-alt"></i></div>
                            </div>
                            <div>
                                <h3 class="font-semibold">Gizi & Imunisasi</h3>
                                <p class="text-sm text-gray-600">Program gizi dan imunisasi kerja sama dengan dinas
                                    kesehatan.</p>
                            </div>
                        </div>
                    </div>

                    <div class="p-4 border rounded-lg shadow-sm">
                        <div class="flex items-start gap-3">
                            <div
                                class="flex-shrink-0 w-12 h-12 rounded-full bg-indigo-100 flex items-center justify-center">
                                <div class="text-xl text-indigo-600"><i class="fas fa-briefcase-medical"></i></div>
                            </div>
                            <div>
                                <h3 class="font-semibold">Pelayanan Darurat</h3>
                                <p class="text-sm text-gray-600">Respon pertama ketika terjadi kecelakaan di lingkungan
                                    sekolah.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <aside class="p-6 bg-gray-50 rounded-xl border border-gray-100">
                <h4 class="font-bold text-gray-800 mb-3">Kontak UKS</h4>
                <p class="text-sm text-gray-600 mb-4">Hubungi petugas UKS untuk jadwal pemeriksaan atau laporan
                    kesehatan.</p>
                <div class="text-sm text-gray-700 space-y-2">
                    <div><strong>Telepon:</strong> (0333) 123-456</div>
                    <div><strong>Email:</strong> uks@smpn4genteng.sch.id</div>
                    <div><strong>Tempat:</strong> Ruang UKS - Gedung Utama Lantai 1</div>
                </div>
                <a href="/contact"
                    class="inline-block mt-6 w-full text-center bg-green-600 text-white px-4 py-2 rounded-lg font-semibold hover:bg-green-700">Hubungi
                    Petugas UKS</a>
            </aside>
        </div>
    </div>
</section>

<!-- Section for UKS Team -->
<section class="bg-gray-50 py-12">
    <div class="container mx-auto px-4">
        <div class="max-w-4xl mx-auto text-center mb-8">
            <h2 class="text-3xl font-bold text-gray-800">Tim Pelaksana UKS</h2>
            <p class="text-gray-600 mt-2">Staf medis dan sukarelawan yang berdedikasi untuk kesehatan siswa.</p>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8 max-w-4xl mx-auto">
            <!-- Staff 1 -->
            <div class="bg-white rounded-lg shadow-md overflow-hidden text-center p-6 border border-gray-100">
                <img class="w-32 h-32 rounded-full mx-auto mb-4 object-cover"
                    src="https://images.unsplash.com/photo-1621252033503-4c9c1b1c3e3a?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=300&q=80"
                    alt="Nama Petugas UKS 1">
                <h3 class="text-xl font-semibold text-gray-800">Dr. Citra Lestari</h3>
                <p class="text-green-600">Dokter Pembina UKS</p>
                <p class="text-gray-500 text-sm mt-2">Bertanggung jawab atas program kesehatan dan penanganan kasus
                    darurat.</p>
            </div>
            <!-- Staff 2 -->
            <div class="bg-white rounded-lg shadow-md overflow-hidden text-center p-6 border border-gray-100">
                <img class="w-32 h-32 rounded-full mx-auto mb-4 object-cover"
                    src="https://images.unsplash.com/photo-1579684385127-be080d9c8659?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=300&q=80"
                    alt="Nama Petugas UKS 2">
                <h3 class="text-xl font-semibold text-gray-800">Suster Ana Wijaya, Amd.Kep.</h3>
                <p class="text-blue-600">Perawat UKS</p>
                <p class="text-gray-500 text-sm mt-2">Pelayanan P3K, pemeriksaan rutin, dan penyuluhan kesehatan.</p>
            </div>
            <!-- Staff 3 -->
            <div class="bg-white rounded-lg shadow-md overflow-hidden text-center p-6 border border-gray-100">
                <img class="w-32 h-32 rounded-full mx-auto mb-4 object-cover"
                    src="https://images.unsplash.com/photo-1559839734-2b71d9120257?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=300&q=80"
                    alt="Nama Petugas UKS 3">
                <h3 class="text-xl font-semibold text-gray-800">Pak Surya, S.Pd.</h3>
                <p class="text-purple-600">Guru Pembina UKS</p>
                <p class="text-gray-500 text-sm mt-2">Koordinasi program UKS dengan pihak sekolah dan orang tua.</p>
            </div>
        </div>
    </div>
</section>
@include('components.footer')