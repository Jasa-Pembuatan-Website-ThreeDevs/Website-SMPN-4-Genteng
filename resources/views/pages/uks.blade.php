<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>UKS | SMPN 4 Genteng</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>
    @include('components.navbar')

    <main class="main-content main-content--below-header">
        <section class="bg-gradient-to-r from-green-700 to-teal-600 text-white py-16">
            <div class="container mx-auto px-4">
                <div class="max-w-4xl mx-auto text-center">
                    <h1 class="text-4xl md:text-5xl font-extrabold mb-4">UKS - Usaha Kesehatan Sekolah</h1>
                    <p class="text-teal-100 text-lg md:text-xl max-w-2xl mx-auto">Menjaga kesehatan siswa melalui pemeriksaan, promosi kesehatan, dan program gizi yang berkelanjutan.</p>
                </div>
            </div>
        </section>

        <section class="container mx-auto px-4 py-12 -mt-10">
            <div class="max-w-5xl mx-auto bg-white rounded-3xl shadow-xl overflow-hidden border border-gray-100">
                <div class="grid grid-cols-1 md:grid-cols-3 gap-6 p-6 md:p-10">
                    <div class="md:col-span-2">
                        <h2 class="text-2xl md:text-3xl font-bold text-gray-800 mb-4">Layanan UKS</h2>
                        <p class="text-gray-600 mb-8">UKS menyediakan layanan kesehatan untuk memastikan siswa tumbuh sehat dan siap belajar. Kami bekerja sama dengan staf medis dan komunitas sekolah.</p>

                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                            <div class="p-5 border border-gray-100 rounded-2xl shadow-sm hover:shadow-md transition-shadow">
                                <div class="flex items-start gap-4">
                                    <div class="flex-shrink-0 w-12 h-12 rounded-full bg-green-100 flex items-center justify-center">
                                        <div class="text-xl text-green-600"><i class="fas fa-stethoscope"></i></div>
                                    </div>
                                    <div>
                                        <h3 class="font-bold text-gray-800">Pemeriksaan Kesehatan</h3>
                                        <p class="text-sm text-gray-600 mt-1">Pemeriksaan berkala untuk deteksi dini masalah kesehatan.</p>
                                    </div>
                                </div>
                            </div>

                            <div class="p-5 border border-gray-100 rounded-2xl shadow-sm hover:shadow-md transition-shadow">
                                <div class="flex items-start gap-4">
                                    <div class="flex-shrink-0 w-12 h-12 rounded-full bg-blue-100 flex items-center justify-center">
                                        <div class="text-xl text-blue-600"><i class="fas fa-hand-holding-heart"></i></div>
                                    </div>
                                    <div>
                                        <h3 class="font-bold text-gray-800">Promosi Kesehatan</h3>
                                        <p class="text-sm text-gray-600 mt-1">Kegiatan penyuluhan higiene, sanitasi, dan pola hidup sehat.</p>
                                    </div>
                                </div>
                            </div>

                            <div class="p-5 border border-gray-100 rounded-2xl shadow-sm hover:shadow-md transition-shadow">
                                <div class="flex items-start gap-4">
                                    <div class="flex-shrink-0 w-12 h-12 rounded-full bg-yellow-100 flex items-center justify-center">
                                        <div class="text-xl text-yellow-600"><i class="fas fa-apple-alt"></i></div>
                                    </div>
                                    <div>
                                        <h3 class="font-bold text-gray-800">Gizi & Imunisasi</h3>
                                        <p class="text-sm text-gray-600 mt-1">Program gizi dan imunisasi kerja sama dengan dinas kesehatan.</p>
                                    </div>
                                </div>
                            </div>

                            <div class="p-5 border border-gray-100 rounded-2xl shadow-sm hover:shadow-md transition-shadow">
                                <div class="flex items-start gap-4">
                                    <div class="flex-shrink-0 w-12 h-12 rounded-full bg-indigo-100 flex items-center justify-center">
                                        <div class="text-xl text-indigo-600"><i class="fas fa-briefcase-medical"></i></div>
                                    </div>
                                    <div>
                                        <h3 class="font-bold text-gray-800">Pelayanan Darurat</h3>
                                        <p class="text-sm text-gray-600 mt-1">Respon pertama ketika terjadi kecelakaan di lingkungan sekolah.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <aside class="p-8 bg-gray-50 rounded-2xl border border-gray-100">
                        <h4 class="font-bold text-gray-800 mb-4">Kontak UKS</h4>
                        <p class="text-sm text-gray-600 mb-6">Hubungi petugas UKS untuk jadwal pemeriksaan atau laporan kesehatan.</p>
                        <div class="text-sm text-gray-700 space-y-4">
                            <div class="flex items-center gap-3">
                                <i class="fas fa-phone text-green-600"></i>
                                <span>(0333) 123-456</span>
                            </div>
                            <div class="flex items-center gap-3">
                                <i class="fas fa-envelope text-green-600"></i>
                                <span>uks@smpn4genteng.sch.id</span>
                            </div>
                            <div class="flex items-start gap-3">
                                <i class="fas fa-map-marker-alt text-green-600 mt-1"></i>
                                <span>Ruang UKS - Gedung Utama Lantai 1</span>
                            </div>
                        </div>
                        <a href="#" class="inline-block mt-8 w-full text-center bg-green-600 text-white px-6 py-3 rounded-xl font-bold hover:bg-green-700 transition-colors">Hubungi Petugas UKS</a>
                    </aside>
                </div>
            </div>
        </section>

        <!-- Section for UKS Team -->
        <section class="bg-gray-50 py-20">
            <div class="container mx-auto px-4">
                <div class="max-w-4xl mx-auto text-center mb-12">
                    <h2 class="text-3xl md:text-4xl font-bold text-gray-800">Tim Pelaksana UKS</h2>
                    <p class="text-gray-600 mt-4">Staf medis dan sukarelawan yang berdedikasi untuk kesehatan siswa.</p>
                </div>
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8 max-w-6xl mx-auto">
                    @forelse ($teamMembers as $member)
                        <!-- Staff -->
                        <div class="bg-white rounded-2xl shadow-md overflow-hidden text-center p-8 border border-gray-100 transform hover:-translate-y-2 transition-all">
                            @php
                                $imageUrl = $member->image;
                                if ($imageUrl && !filter_var($imageUrl, FILTER_VALIDATE_URL)) {
                                    $imageUrl = Storage::url($imageUrl);
                                }
                                if (!$imageUrl) {
                                    $imageUrl = 'https://ui-avatars.com/api/?name=' . urlencode($member->name) . '&color=7F9CF5&background=EBF4FF';
                                }
                            @endphp
                            <img class="w-32 h-32 rounded-full mx-auto mb-6 object-cover border-4 border-green-50"
                                src="{{ $imageUrl }}"
                                alt="{{ $member->name }}">
                            <h3 class="text-xl font-bold text-gray-800">{{ $member->name }}</h3>
                            <p class="text-green-600 font-semibold mb-4">{{ $member->role }}</p>
                            <p class="text-gray-500 text-sm">{{ $member->description }}</p>
                        </div>
                    @empty
                        <div class="col-span-full text-center py-10">
                            <p class="text-gray-500 italic">Data tim belum tersedia.</p>
                        </div>
                    @endforelse
                </div>
            </div>
        </section>
    </main>

    @include('components.footer')
    <script src="{{ asset('js/script.js') }}"></script>
</body>
</html>
