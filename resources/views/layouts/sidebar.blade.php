<aside id="sidebar"
    :class="sidebarOpen ? 'translate-x-0' : '-translate-x-full lg:translate-x-0'"
    class="fixed top-0 left-0 z-40 w-72 h-screen transition-transform duration-300 ease-in-out bg-[#0f172a] text-slate-300 border-r border-slate-800/50 shadow-xl lg:shadow-none">

    <div class="flex flex-col h-full">
        <!-- Brand Header -->
        <div class="px-6 py-8">
            <div class="flex items-center gap-4 px-2">
                <div class="relative group">
                    <div class="absolute -inset-1 bg-gradient-to-r from-blue-600 to-indigo-600 rounded-xl blur opacity-25 group-hover:opacity-50 transition duration-1000 group-hover:duration-200"></div>
                    <img src="/Logo.jpg" class="relative h-11 w-11 rounded-xl object-cover ring-2 ring-slate-800 shadow-lg" alt="Logo" />
                    <div class="absolute -bottom-0.5 -right-0.5 w-3.5 h-3.5 bg-emerald-500 border-2 border-[#0f172a] rounded-full shadow-sm"></div>
                </div>
                <div class="flex flex-col">
                    <span class="text-white font-extrabold text-base tracking-tight leading-none">SMPN 4</span>
                    <span class="text-blue-500 font-medium text-xs tracking-wider mt-1 uppercase">Genteng Admin</span>
                </div>
            </div>
        </div>

        <!-- Navigation Menu -->
        <div class="flex-1 px-4 py-2 overflow-y-auto custom-scrollbar space-y-8">
            <!-- Main Section -->
            <div class="space-y-1">
                <p class="px-4 text-[10px] font-bold text-slate-500 uppercase tracking-[0.2em] mb-4">Utama</p>
                <x-sidebar-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                    <i class="fas fa-th-large w-5 text-lg"></i>
                    <span class="ms-3">Dashboard</span>
                </x-sidebar-link>
            </div>

            <!-- Management Section -->
            <div class="space-y-1">
                <p class="px-4 text-[10px] font-bold text-slate-500 uppercase tracking-[0.2em] mb-4">Manajemen Konten</p>
                @if(auth()->user()->role == 'administrator')
                    <x-sidebar-link :href="route('admin.posts.index')" :active="request()->routeIs('admin.posts.*')">
                        <i class="fas fa-newspaper w-5 text-blue-400/80"></i>
                        <span class="ms-3">Berita & Artikel</span>
                    </x-sidebar-link>
                    <x-sidebar-link :href="route('admin.announcements.index')" :active="request()->routeIs('admin.announcements.*')">
                        <i class="fas fa-bullhorn w-5 text-rose-400/80"></i>
                        <span class="ms-3">Pengumuman</span>
                    </x-sidebar-link>
                    <x-sidebar-link :href="route('admin.facilities.index')" :active="request()->routeIs('admin.facilities.*')">
                        <i class="fas fa-building-columns w-5 text-amber-400/80"></i>
                        <span class="ms-3">Fasilitas Sekolah</span>
                    </x-sidebar-link>
                    <x-sidebar-link :href="route('admin.achievements.index')" :active="request()->routeIs('admin.achievements.*')">
                        <i class="fas fa-trophy w-5 text-yellow-400/80"></i>
                        <span class="ms-3">Prestasi Siswa</span>
                    </x-sidebar-link>
                    <x-sidebar-link :href="route('admin.ekstrakurikulers.index')" :active="request()->routeIs('admin.ekstrakurikulers.*')">
                        <i class="fas fa-icons w-5 text-emerald-400/80"></i>
                        <span class="ms-3">Ekstrakurikuler</span>
                    </x-sidebar-link>
                @elseif(auth()->user()->role == 'teacher')
                    <x-sidebar-link :href="route('teacher.facilities.index')" :active="request()->routeIs('teacher.facilities.*')">
                        <i class="fas fa-building-columns w-5 text-amber-400/80"></i>
                        <span class="ms-3">Fasilitas</span>
                    </x-sidebar-link>
                    <x-sidebar-link :href="route('teacher.achievements.index')" :active="request()->routeIs('teacher.achievements.*')">
                        <i class="fas fa-trophy w-5 text-yellow-400/80"></i>
                        <span class="ms-3">Achievements</span>
                    </x-sidebar-link>
                @elseif(auth()->user()->role == 'officer')
                    <x-sidebar-link :href="route('officer.posts.index')" :active="request()->routeIs('officer.posts.*')">
                        <i class="fas fa-newspaper w-5 text-blue-400/80"></i>
                        <span class="ms-3">Berita & Post</span>
                    </x-sidebar-link>
                @endif
            </div>

            <!-- Academic Section -->
            <div class="space-y-1">
                <p class="px-4 text-[10px] font-bold text-slate-500 uppercase tracking-[0.2em] mb-4">Administrasi</p>
                @if(auth()->user()->role == 'admin' || auth()->user()->role == 'officer' || auth()->user()->role == 'administrator')
                    @php
                        $rolePrefix = auth()->user()->role == 'administrator' ? 'admin' : auth()->user()->role;
                    @endphp
                    <x-sidebar-link :href="route($rolePrefix.'.ppdb-batches.index')" :active="request()->routeIs('*.ppdb-batches.*')">
                        <i class="fas fa-calendar-alt w-5 text-teal-400/80"></i>
                        <span class="ms-3">Gelombang PPDB</span>
                    </x-sidebar-link>
                @endif
                <x-sidebar-link :href="route('ppdb_registrations.index')" :active="request()->routeIs('ppdb_registrations.*')">
                    <i class="fas fa-user-graduate w-5 text-indigo-400/80"></i>
                    <span class="ms-3">Pendaftar PPDB</span>
                </x-sidebar-link>
                <x-sidebar-link :href="route((auth()->user()->role == 'administrator' ? 'admin' : (auth()->user()->role == 'teacher' ? 'teacher' : 'officer')).'.team-members.index')" :active="request()->routeIs('*.team-members.*')">
                    <i class="fas fa-users-cog w-5 text-violet-400/80"></i>
                    <span class="ms-3">Tim UKS & BK</span>
                </x-sidebar-link>
            </div>
        </div>

        <!-- User Profile Footer -->
        <div class="p-4 mt-auto border-t border-slate-800/50 bg-[#0f172a]/50">
            <div class="flex flex-col gap-3">
                <a href="{{ route('profile.edit') }}" class="flex items-center gap-3 p-2.5 rounded-xl hover:bg-slate-800/50 transition-all duration-300 group">
                    <div class="relative">
                        <div class="h-10 w-10 rounded-lg bg-gradient-to-br from-blue-500 to-indigo-600 flex items-center justify-center text-white font-bold shadow-lg ring-2 ring-white/10 group-hover:ring-white/20 transition-all">
                            {{ substr(Auth::user()->name, 0, 1) }}
                        </div>
                    </div>
                    <div class="flex flex-col overflow-hidden">
                        <span class="text-sm font-bold text-white truncate">{{ Auth::user()->name }}</span>
                        <span class="text-[10px] text-slate-500 truncate capitalize tracking-wider font-medium">{{ Auth::user()->role }}</span>
                    </div>
                    <i class="fas fa-chevron-right ms-auto text-[10px] text-slate-600 group-hover:text-slate-400 transition-colors"></i>
                </a>

                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="w-full flex items-center gap-3 px-4 py-3 text-[11px] font-bold text-slate-400 hover:text-rose-400 hover:bg-rose-500/5 rounded-xl transition-all duration-300 group">
                        <i class="fas fa-power-off text-sm group-hover:scale-110 transition-transform"></i>
                        <span class="tracking-widest uppercase">Logout System</span>
                    </button>
                </form>
            </div>
        </div>
    </div>
</aside>

<style>
    .custom-scrollbar::-webkit-scrollbar {
        width: 3px;
    }
    .custom-scrollbar::-webkit-scrollbar-track {
        background: transparent;
    }
    .custom-scrollbar::-webkit-scrollbar-thumb {
        background: #1e293b;
        border-radius: 10px;
    }
    .custom-scrollbar::-webkit-scrollbar-thumb:hover {
        background: #334155;
    }
</style>