@extends('layouts.app')

@section('content')
<x-slot name="header">
    <div class="flex items-center gap-4">
        <img src="/Logo.jpg" alt="Logo" style="width:48px;height:48px;border-radius:12px;box-shadow:0 2px 8px #2563eb22;">
        <div>
            <h2 class="font-bold text-2xl text-blue-800 leading-tight mb-1">Informasi Terpusat SMPN 4 Genteng</h2>
            <div class="text-sm text-blue-500 font-medium">Selamat datang, {{ Auth::user()->name }} ({{ ucfirst(Auth::user()->role) }})</div>
        </div>
    </div>
</x-slot>

<div class="py-10 bg-gradient-to-br from-slate-50 via-white to-blue-50 min-h-[80vh]">
    <div class="max-w-full mx-auto px-4 sm:px-6 lg:px-8">
        
        <!-- Statistik Utama -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-10">
            <!-- Total Berita -->
            <div class="bg-white rounded-3xl shadow-sm border border-slate-100 p-6 hover:shadow-md transition-shadow">
                <div class="flex items-center justify-between mb-4">
                    <div class="bg-blue-50 text-blue-600 rounded-2xl p-3">
                        <i class="fas fa-newspaper text-xl"></i>
                    </div>
                    <span class="text-xs font-bold text-blue-500 bg-blue-50 px-2 py-1 rounded-lg uppercase">Total Berita</span>
                </div>
                <div>
                    <div class="text-3xl font-black text-slate-800">{{ \App\Models\Post::count() }}</div>
                    <div class="text-xs text-slate-400 mt-1 font-medium">Berita & informasi dipublikasikan</div>
                </div>
            </div>

            <!-- Total Guru -->
            <div class="bg-white rounded-3xl shadow-sm border border-slate-100 p-6 hover:shadow-md transition-shadow">
                <div class="flex items-center justify-between mb-4">
                    <div class="bg-emerald-50 text-emerald-600 rounded-2xl p-3">
                        <i class="fas fa-chalkboard-teacher text-xl"></i>
                    </div>
                    <span class="text-xs font-bold text-emerald-500 bg-emerald-50 px-2 py-1 rounded-lg uppercase">Tenaga Pendidik</span>
                </div>
                <div>
                    <div class="text-3xl font-black text-slate-800">{{ \App\Models\User::where('role','teacher')->count() }}</div>
                    <div class="text-xs text-slate-400 mt-1 font-medium">Guru aktif saat ini</div>
                </div>
            </div>

            <!-- Prestasi Sekolah -->
            <div class="bg-white rounded-3xl shadow-sm border border-slate-100 p-6 hover:shadow-md transition-shadow">
                <div class="flex items-center justify-between mb-4">
                    <div class="bg-amber-50 text-amber-600 rounded-2xl p-3">
                        <i class="fas fa-trophy text-xl"></i>
                    </div>
                    <span class="text-xs font-bold text-amber-500 bg-amber-50 px-2 py-1 rounded-lg uppercase">Prestasi</span>
                </div>
                <div>
                    <div class="text-3xl font-black text-slate-800">{{ \App\Models\Achievement::count() }}</div>
                    <div class="text-xs text-slate-400 mt-1 font-medium">Prestasi berhasil dicatat</div>
                </div>
            </div>

            <!-- Pendaftar SPMB -->
            <div class="bg-white rounded-3xl shadow-sm border border-slate-100 p-6 hover:shadow-md transition-shadow">
                <div class="flex items-center justify-between mb-4">
                    <div class="bg-indigo-50 text-indigo-600 rounded-2xl p-3">
                        <i class="fas fa-user-plus text-xl"></i>
                    </div>
<span class="text-xs font-bold text-indigo-500 bg-indigo-50 px-2 py-1 rounded-lg uppercase">Calon Siswa</span>
                </div>
                <div>
                    <div class="text-3xl font-black text-slate-800">{{ \App\Models\PpdbRegistration::count() }}</div>
                    <div class="text-xs text-slate-400 mt-1 font-medium">Pendaftar SPMB tahun ini</div>
                </div>
            </div>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
            <!-- Kolom Kiri: Aktivitas Terkini -->
            <div class="lg:col-span-2 space-y-8">
                
                <!-- Tabel Pendaftar SPMB Terbaru -->
                <div class="bg-white rounded-3xl shadow-sm border border-slate-100 overflow-hidden">
                    <div class="p-6 border-b border-slate-50 flex justify-between items-center">
                        <div>
                            <h3 class="font-bold text-slate-800 flex items-center gap-2">
                                <span class="w-2 h-6 bg-blue-600 rounded-full"></span>
                                Pendaftar SPMB Terbaru
                            </h3>
                        </div>
                        <a href="{{ route('spmb_registrations.index') }}" class="text-xs font-bold text-blue-600 hover:text-blue-700">
                            Lihat Semua <i class="fas fa-arrow-right ms-1"></i>
                        </a>
                    </div>
                    <div class="overflow-x-auto">
                        <table class="w-full">
                            <thead>
                                <tr class="bg-slate-50/50 text-slate-500 text-[10px] uppercase font-bold tracking-wider">
                                    <th class="px-6 py-4 text-left">Nama Lengkap</th>
                                    <th class="px-6 py-4 text-left">Asal Sekolah</th>
                                    <th class="px-6 py-4 text-left">Status</th>
                                    <th class="px-6 py-4 text-right">Waktu</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-slate-50">
                                @php $recentRegistrations = \App\Models\PpdbRegistration::latest()->take(5)->get(); @endphp
                                @forelse($recentRegistrations as $reg)
                                <tr class="hover:bg-slate-50/30 transition group">
                                    <td class="px-6 py-4">
                                        <div class="flex items-center gap-3">
                                            <div class="w-8 h-8 rounded-lg bg-blue-50 text-blue-600 flex items-center justify-center font-bold text-xs uppercase">
                                                {{ substr($reg->name, 0, 1) }}
                                            </div>
                                            <div class="text-sm font-semibold text-slate-700">{{ $reg->name }}</div>
                                        </div>
                                    </td>
                                    <td class="px-6 py-4 text-xs text-slate-500 font-medium">{{ $reg->origin_school }}</td>
                                    <td class="px-6 py-4">
                                        <span class="px-2 py-1 bg-blue-50 text-blue-600 text-[10px] font-bold rounded-md border border-blue-100 uppercase">Terdaftar</span>
                                    </td>
                                    <td class="px-6 py-4 text-[10px] text-slate-400 text-right font-medium italic">
                                        {{ $reg->created_at ? $reg->created_at->diffForHumans() : '-' }}
                                    </td>
                                </tr>
                                @empty
                                <tr><td colspan="4" class="p-10 text-center text-slate-400 italic text-sm">Belum ada pendaftar terbaru.</td></tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>

                <!-- Berita & Informasi Terbaru -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <!-- Card Berita Terkini -->
                    <div class="bg-white rounded-3xl shadow-sm border border-slate-100 p-6">
                        <h3 class="font-bold text-slate-800 mb-6 flex items-center gap-2">
                            <i class="fas fa-newspaper text-blue-500"></i>
                            Postingan Berita
                        </h3>
                        <div class="space-y-4">
                            @php $recentPosts = \App\Models\Post::latest()->take(3)->get(); @endphp
                            @forelse($recentPosts as $post)
                            <div class="flex items-start gap-4 p-3 rounded-2xl hover:bg-slate-50 transition group">
                                <div class="w-12 h-12 shrink-0 rounded-xl bg-slate-100 overflow-hidden">
                                    @if($post->thumbnail)
                                        <img src="{{ asset('storage/'.$post->thumbnail) }}" class="w-full h-full object-cover">
                                    @else
                                        <div class="w-full h-full flex items-center justify-center text-slate-400">
                                            <i class="fas fa-image"></i>
                                        </div>
                                    @endif
                                </div>
                                <div class="min-w-0">
                                    <h4 class="text-sm font-bold text-slate-700 truncate">{{ $post->title }}</h4>
                                    <div class="flex items-center gap-2 mt-1">
                                        <span class="text-[10px] text-slate-400 italic"><i class="far fa-clock me-1"></i>{{ $post->created_at ? $post->created_at->format('d M Y') : '-' }}</span>
                                        <span class="text-[10px] font-bold text-blue-500 bg-blue-50 px-1.5 rounded uppercase">{{ $post->announcement ?? 'Umum' }}</span>
                                    </div>
                                </div>
                            </div>
                            @empty
                            <p class="text-center text-slate-400 italic text-sm py-4">Belum ada postingan berita.</p>
                            @endforelse
                        </div>
                    </div>

                    <!-- Card Prestasi Terkini -->
                    <div class="bg-white rounded-3xl shadow-sm border border-slate-100 p-6">
                        <h3 class="font-bold text-slate-800 mb-6 flex items-center gap-2">
                            <i class="fas fa-award text-amber-500"></i>
                            Prestasi Terbaru
                        </h3>
                        <div class="space-y-4">
                            @php $recentAchievements = \App\Models\Achievement::latest()->take(3)->get(); @endphp
                            @forelse($recentAchievements as $ach)
                            <div class="flex items-start gap-4 p-3 rounded-2xl hover:bg-slate-50 transition">
                                <div class="w-12 h-12 shrink-0 rounded-full bg-amber-50 flex items-center justify-center text-amber-600">
                                    <i class="fas fa-medal text-xl"></i>
                                </div>
                                <div class="min-w-0">
                                    <h4 class="text-sm font-bold text-slate-700 truncate">{{ $ach->title }}</h4>
                                    <p class="text-[10px] text-slate-500 line-clamp-1 mt-0.5">{{ $ach->description }}</p>
                                    <div class="text-[10px] text-slate-400 mt-1 font-medium"><i class="fas fa-calendar-day me-1"></i>Tahun {{ $ach->year }}</div>
                                </div>
                            </div>
                            @empty
                            <p class="text-center text-slate-400 italic text-sm py-4">Belum ada data prestasi.</p>
                            @endforelse
                        </div>
                    </div>
                </div>
            </div>

            <!-- Kolom Kanan: Status Sistem & Kontrol Cepat -->
            <div class="space-y-8">
                
                <!-- Card Status SPMB -->
                <div class="bg-slate-900 rounded-3xl shadow-xl p-6 text-white relative overflow-hidden">
                    <div class="absolute -right-4 -top-4 w-24 h-24 bg-blue-600 rounded-full opacity-20 blur-2xl"></div>
                    <h3 class="font-bold text-sm text-slate-400 mb-6 flex items-center gap-2 uppercase tracking-widest">
                        Status SPMB Saat Ini
                    </h3>
                    @php $activeBatch = \App\Models\PpdbBatch::where('is_active', true)->first(); @endphp
                    @if($activeBatch)
                        <div class="relative z-10">
                            <div class="text-2xl font-black text-blue-400 mb-1">{{ $activeBatch->name }}</div>
                            <div class="text-xs text-slate-400 mb-6">Berakhir: {{ $activeBatch->end_date ? $activeBatch->end_date->format('d M Y') : '-' }}</div>
                            
                            <div class="space-y-3">
                                <div class="flex justify-between text-xs mb-1">
                                    <span class="text-slate-400">Progress Waktu</span>
                                    @php
                                        $start = $activeBatch->start_date ? \Carbon\Carbon::parse($activeBatch->start_date) : now();
                                        $end = $activeBatch->end_date ? \Carbon\Carbon::parse($activeBatch->end_date) : now()->addDay();
                                        $now = now();
                                        $totalDays = max(1, $start->diffInDays($end));
                                        $elapsedDays = $start->diffInDays($now);
                                        $percentage = min(100, max(0, ($elapsedDays / $totalDays) * 100));
                                    @endphp
                                    <span class="font-bold text-blue-400">{{ round($percentage) }}%</span>
                                </div>
                                <div class="w-full bg-slate-800 h-2 rounded-full overflow-hidden">
                                    <div class="bg-blue-500 h-full transition-all duration-1000" style="width: {{ $percentage }}%"></div>
                                </div>
                            </div>

                            <div class="mt-8 pt-6 border-t border-slate-800 flex items-center justify-between">
                                <div class="flex items-center gap-2">
                                    <span class="w-2 h-2 rounded-full bg-green-500 animate-ping"></span>
                                    <span class="text-[10px] font-bold text-green-500 uppercase">Sistem Online</span>
                                </div>
                                <i class="fas fa-shield-alt text-slate-700"></i>
                            </div>
                        </div>
                    @else
                        <div class="py-10 text-center">
                            <div class="w-16 h-16 bg-slate-800 rounded-2xl flex items-center justify-center mx-auto mb-4 text-slate-600">
                                <i class="fas fa-power-off text-2xl"></i>
                            </div>
                            <p class="text-slate-500 text-sm font-bold">Tidak ada gelombang aktif</p>
                            <a href="{{ route(auth()->user()->role === 'administrator' ? 'admin.spmb-batches.index' : 'officer.spmb-batches.index') }}" class="inline-block mt-4 text-xs font-bold text-blue-500 hover:underline italic">Aktifkan Sekarang</a>
                        </div>
                    @endif
                </div>

                <!-- Card Pintasan Cepat (Quick Access) -->
                <div class="bg-white rounded-3xl shadow-sm border border-slate-100 p-6">
                    <h3 class="font-bold text-slate-800 mb-6 flex items-center gap-2 uppercase text-xs tracking-wider">
                        <i class="fas fa-bolt text-amber-500"></i>
                        Pintasan Cepat
                    </h3>
                    <div class="grid grid-cols-2 gap-3">
                        <a href="{{ route('profile.edit') }}" class="p-4 bg-slate-50 rounded-2xl hover:bg-blue-50 transition group flex flex-col items-center text-center">
                            <div class="w-10 h-10 rounded-xl bg-white shadow-sm flex items-center justify-center text-slate-600 group-hover:text-blue-600 transition mb-2">
                                <i class="fas fa-user-cog"></i>
                            </div>
                            <span class="text-[10px] font-bold text-slate-600 uppercase">Profil</span>
                        </a>
                        @php $prefix = auth()->user()->role === 'administrator' ? 'admin' : auth()->user()->role; @endphp
                        @if(auth()->user()->role == 'administrator')
                        <a href="{{ route('admin.announcements.index') }}" class="p-4 bg-slate-50 rounded-2xl hover:bg-emerald-50 transition group flex flex-col items-center text-center">
                            <div class="w-10 h-10 rounded-xl bg-white shadow-sm flex items-center justify-center text-slate-600 group-hover:text-emerald-600 transition mb-2">
                                <i class="fas fa-bullhorn"></i>
                            </div>
                            <span class="text-[10px] font-bold text-slate-600 uppercase">Pengumuman</span>
                        </a>
                        @endif
                        <a href="{{ route('spmb_registrations.index') }}" class="p-4 bg-slate-50 rounded-2xl hover:bg-indigo-50 transition group flex flex-col items-center text-center">
                            <div class="w-10 h-10 rounded-xl bg-white shadow-sm flex items-center justify-center text-slate-600 group-hover:text-indigo-600 transition mb-2">
                                <i class="fas fa-address-book"></i>
                            </div>
                            <span class="text-[10px] font-bold text-slate-600 uppercase">Data SPMB</span>
                        </a>
                        <a href="/" target="_blank" class="p-4 bg-slate-50 rounded-2xl hover:bg-amber-50 transition group flex flex-col items-center text-center">
                            <div class="w-10 h-10 rounded-xl bg-white shadow-sm flex items-center justify-center text-slate-600 group-hover:text-amber-600 transition mb-2">
                                <i class="fas fa-external-link-alt"></i>
                            </div>
                            <span class="text-[10px] font-bold text-slate-600 uppercase">Web Utama</span>
                        </a>
                    </div>
                </div>

                <!-- Card Catatan Dashboard -->
                <div class="bg-blue-600 rounded-3xl p-6 text-white shadow-lg shadow-blue-200">
                    <div class="flex items-center gap-3 mb-4">
                        <div class="w-10 h-10 bg-white/20 rounded-xl flex items-center justify-center">
                            <i class="fas fa-info-circle"></i>
                        </div>
                        <h4 class="font-bold text-sm">Informasi Penting</h4>
                    </div>
                    <p class="text-xs leading-relaxed text-blue-100">
                        Gunakan sidebar di sebelah kiri untuk navigasi penuh ke fitur manajemen data. Data yang ditampilkan di dashboard ini adalah ringkasan realtime untuk mempermudah monitoring harian.
                    </p>
                </div>

            </div>
        </div>

    </div>
</div>
@endsection
