    @extends('layouts.app')

    @section('content')
    <x-slot name="header">
        <div class="flex items-center gap-4">
            <img src="/Logo.jpg" alt="Logo" style="width:48px;height:48px;border-radius:12px;box-shadow:0 2px 8px #2563eb22;">
            <div>
                <h2 class="font-bold text-2xl text-blue-800 leading-tight mb-1">Dashboard SMPN 4 Genteng</h2>
                <div class="text-sm text-blue-500 font-medium">Selamat datang, {{ Auth::user()->name }} ({{ ucfirst(Auth::user()->role) }})</div>
            </div>
        </div>
    </x-slot>

    <div class="py-10 bg-gradient-to-br from-blue-50 via-white to-blue-100 min-h-[80vh]">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-10">
                <div class="bg-white rounded-2xl shadow p-6 flex items-center gap-4">
                    <div class="bg-blue-100 text-blue-600 rounded-full p-3 text-2xl"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person" viewBox="0 0 16 16">
  <path d="M8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6m2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0m4 8c0 1-1 1-1 1H3s-1 0-1-1 1-4 6-4 6 3 6 4m-1-.004c-.001-.246-.154-.986-.832-1.664C11.516 10.68 10.289 10 8 10s-3.516.68-4.168 1.332c-.678.678-.83 1.418-.832 1.664z"/>
</svg></div>
                    <div>
                        <div class="text-lg font-bold">Siswa</div>
                        <div class="text-2xl font-extrabold">{{ \App\Models\User::where('role','student')->count() }}</div>
                    </div>
                </div>
                <div class="bg-white rounded-2xl shadow p-6 flex items-center gap-4">
                    <div class="bg-green-100 text-green-600 rounded-full p-3 text-2xl"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-workspace" viewBox="0 0 16 16">
  <path d="M4 16s-1 0-1-1 1-4 5-4 5 3 5 4-1 1-1 1zm4-5.95a2.5 2.5 0 1 0 0-5 2.5 2.5 0 0 0 0 5"/>
  <path d="M2 1a2 2 0 0 0-2 2v9.5A1.5 1.5 0 0 0 1.5 14h.653a5.4 5.4 0 0 1 1.066-2H1V3a1 1 0 0 1 1-1h12a1 1 0 0 1 1 1v9h-2.219c.554.654.89 1.373 1.066 2h.653a1.5 1.5 0 0 0 1.5-1.5V3a2 2 0 0 0-2-2z"/>
</svg></div>
                    <div>
                        <div class="text-lg font-bold">Guru</div>
                        <div class="text-2xl font-extrabold">{{ \App\Models\User::where('role','teacher')->count() }}</div>
                    </div>
                </div>
                <div class="bg-white rounded-2xl shadow p-6 flex items-center gap-4">
                    <div class="bg-yellow-100 text-yellow-600 rounded-full p-3 text-2xl"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-lightning-charge-fill" viewBox="0 0 16 16">
  <path d="M11.251.068a.5.5 0 0 1 .227.58L9.677 6.5H13a.5.5 0 0 1 .364.843l-8 8.5a.5.5 0 0 1-.842-.49L6.323 9.5H3a.5.5 0 0 1-.364-.843l8-8.5a.5.5 0 0 1 .615-.09z"/>
</svg></div>
                    <div>
                        <div class="text-lg font-bold">Prestasi</div>
                        <div class="text-2xl font-extrabold">{{ \App\Models\Achievement::count() }}</div>
                    </div>
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                <a href="{{ route('ppdb.register') }}" class="block bg-gradient-to-br from-blue-600 to-blue-400 text-white rounded-2xl shadow-lg p-8 text-center hover:scale-105 transition-transform">
                    <i class="fas fa-user-plus text-3xl mb-3"></i>
                    <div class="font-bold text-lg">PPDB</div>
                    <div class="text-sm mt-1">Pendaftaran Peserta Didik Baru</div>
                </a>
                <a href="{{ route('admin.facilities.index') }}" class="block bg-gradient-to-br from-green-600 to-green-400 text-white rounded-2xl shadow-lg p-8 text-center hover:scale-105 transition-transform">
                    <i class="fas fa-school text-3xl mb-3"></i>
                    <div class="font-bold text-lg">Fasilitas</div>
                    <div class="text-sm mt-1">Kelola data fasilitas sekolah</div>
                </a>
                <a href="{{ route('admin.ekstrakurikulers.index') }}" class="block bg-gradient-to-br from-indigo-600 to-blue-400 text-white rounded-2xl shadow-lg p-8 text-center hover:scale-105 transition-transform">
                    <i class="fas fa-users text-3xl mb-3"></i>
                    <div class="font-bold text-lg">Ekstrakurikuler</div>
                    <div class="text-sm mt-1">Kelola kegiatan ekstrakurikuler</div>
                </a>
                <a href="{{ route('admin.achievements.index') }}" class="block bg-gradient-to-br from-yellow-500 to-yellow-300 text-white rounded-2xl shadow-lg p-8 text-center hover:scale-105 transition-transform">
                    <i class="fas fa-trophy text-3xl mb-3"></i>
                    <div class="font-bold text-lg">Prestasi</div>
                    <div class="text-sm mt-1">Kelola prestasi siswa</div>
                </a>
                <a href="{{ route('admin.posts.index') }}" class="block bg-gradient-to-br from-pink-500 to-pink-300 text-white rounded-2xl shadow-lg p-8 text-center hover:scale-105 transition-transform">
                    <i class="fas fa-bullhorn text-3xl mb-3"></i>
                    <div class="font-bold text-lg">Pengumuman</div>
                    <div class="text-sm mt-1">Kelola berita & pengumuman</div>
                </a>
                <a href="{{ route('admin.ppdb-batches.index') }}" class="block bg-gradient-to-br from-teal-600 to-teal-400 text-white rounded-2xl shadow-lg p-8 text-center hover:scale-105 transition-transform">
                    <i class="fas fa-calendar-alt text-3xl mb-3"></i>
                    <div class="font-bold text-lg">Gelombang PPDB</div>
                    <div class="text-sm mt-1">Kelola gelombang pendaftaran</div>
                </a>
            </div>
        </div>
    </div>
@endsection