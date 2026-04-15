<<<<<<< HEAD
<aside id="sidebar"
    :class="sidebarOpen ? 'translate-x-0' : '-translate-x-full sm:translate-x-0'"
    class="fixed sm:sticky top-0 left-0 z-40 w-72 h-screen transition-transform duration-300 ease-in-out bg-slate-900 text-slate-300 shadow-2xl border-r border-slate-800 shrink-0">
=======
<!-- Mobile Backdrop -->
<div x-show="sidebarOpen" 
     @click="sidebarOpen = false" 
     class="fixed inset-0 z-40 bg-slate-900/60 backdrop-blur-sm lg:hidden"
     x-transition:enter="transition ease-out duration-300"
     x-transition:enter-start="opacity-0"
     x-transition:enter-end="opacity-100"
     x-transition:leave="transition ease-in duration-200"
     x-transition:leave-start="opacity-100"
     x-transition:leave-end="opacity-0"
     style="display: none;">
</div>

<aside id="sidebar" 
    :class="sidebarOpen ? 'translate-x-0' : '-translate-x-full lg:translate-x-0'"
    class="fixed top-0 left-0 z-50 w-72 h-screen transition-transform duration-300 ease-in-out bg-slate-900 text-slate-300 shadow-2xl border-r border-slate-800 shrink-0">
>>>>>>> b572b11 (perbarui beberapa content dan perbaikan sidebar)

    <div class="flex flex-col h-full bg-slate-900">
        <!-- Brand Header -->
        <div class="p-6 bg-slate-900">
            <div class="flex items-center gap-3 px-2 py-3 bg-slate-800 rounded-2xl border border-slate-700 shadow-inner">
                <div class="relative">
                    <img src="/Logo.jpg" class="h-10 w-10 rounded-xl object-cover ring-2 ring-blue-500/30" alt="Logo" />
                    <div class="absolute -bottom-1 -right-1 w-3 h-3 bg-green-500 border-2 border-slate-900 rounded-full"></div>
                </div>
                <div class="flex flex-col">
                    <span class="text-white font-bold text-sm tracking-tight">SMPN 4 Genteng</span>
                    <span class="text-[10px] text-blue-400 font-semibold tracking-wider uppercase">Official Admin</span>
                </div>
            </div>
        </div>

        <!-- Navigation Menu -->
        <div class="flex-1 px-4 py-2 overflow-y-auto custom-scrollbar">
            <div class="space-y-6">
                <!-- Main Section -->
                <div>
                    <p class="px-4 text-[11px] font-bold text-slate-500 uppercase tracking-[0.2em] mb-4">Menu Utama</p>
                    <ul class="space-y-1.5">
                        <x-sidebar-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                            <i class="fa-solid fa-house-chimney w-5 text-center"></i>
                            <span class="ms-3">Dashboard</span>
                        </x-sidebar-link>
                    </ul>
                </div>

                <!-- Management Section -->
                <div>
                    <p class="px-4 text-[11px] font-bold text-slate-500 uppercase tracking-[0.2em] mb-4">Manajemen Data</p>
                    <ul class="space-y-1.5">
                        @if(auth()->user()->role == 'administrator')
                            <x-sidebar-link :href="route('admin.facilities.index')" :active="request()->routeIs('admin.facilities.*')">
                                <i class="fa-solid fa-building w-5 text-center text-orange-400"></i>
                                <span class="ms-3">Fasilitas</span>
                            </x-sidebar-link>
                            <x-sidebar-link :href="route('admin.achievements.index')" :active="request()->routeIs('admin.achievements.*')">
                                <i class="fa-solid fa-award w-5 text-center text-yellow-400"></i>
                                <span class="ms-3">Achievements</span>
                            </x-sidebar-link>
                            <x-sidebar-link :href="route('admin.posts.index')" :active="request()->routeIs('admin.posts.*')">
                                <i class="fa-solid fa-newspaper w-5 text-center text-blue-400"></i>
                                <span class="ms-3">Berita & Post</span>
                            </x-sidebar-link>
                            <x-sidebar-link :href="route('admin.announcements.index')" :active="request()->routeIs('admin.announcements.*')">
                                <i class="fa-solid fa-bullhorn w-5 text-center text-red-400"></i>
                                <span class="ms-3">Pengumuman</span>
                            </x-sidebar-link>
                            <x-sidebar-link :href="route('admin.ekstrakurikulers.index')" :active="request()->routeIs('admin.ekstrakurikulers.*')">
                                <i class="fa-solid fa-volleyball w-5 text-center text-green-400"></i>
                                <span class="ms-3">Ekstrakurikuler</span>
                            </x-sidebar-link>
                        @elseif(auth()->user()->role == 'teacher')
                            <x-sidebar-link :href="route('teacher.facilities.index')" :active="request()->routeIs('teacher.facilities.*')">
                                <i class="fa-solid fa-building w-5 text-center text-orange-400"></i>
                                <span class="ms-3">Fasilitas</span>
                            </x-sidebar-link>
                            <x-sidebar-link :href="route('teacher.achievements.index')" :active="request()->routeIs('teacher.achievements.*')">
                                <i class="fa-solid fa-award w-5 text-center text-yellow-400"></i>
                                <span class="ms-3">Achievements</span>
                            </x-sidebar-link>
                        @elseif(auth()->user()->role == 'officer')
                            <x-sidebar-link :href="route('officer.posts.index')" :active="request()->routeIs('officer.posts.*')">
                                <i class="fa-solid fa-newspaper w-5 text-center text-blue-400"></i>
                                <span class="ms-3">Berita & Post</span>
                            </x-sidebar-link>
                        @endif
                    </ul>
                </div>

                <!-- Academic Section -->
                <div>
                    <p class="px-4 text-[11px] font-bold text-slate-500 uppercase tracking-[0.2em] mb-4">Akademik & PPDB</p>
                    <ul class="space-y-1.5">
<<<<<<< HEAD
                        @if(auth()->user()->role == 'admin' || auth()->user()->role == 'officer')
                            <x-sidebar-link :href="route(auth()->user()->role.'.ppdb-batches.index')" :active="request()->routeIs('*.ppdb-batches.*')">
                                <i class="fas fa-calendar-check w-5 text-center text-teal-400"></i>
=======
                        @if(auth()->user()->role == 'administrator' || auth()->user()->role == 'officer')
                            <x-sidebar-link :href="route((auth()->user()->role == 'administrator' ? 'admin' : 'officer').'.ppdb-batches.index')" :active="request()->routeIs('*.ppdb-batches.*')">
                                <i class="fa-solid fa-calendar-check w-5 text-center text-teal-400"></i>
>>>>>>> b572b11 (perbarui beberapa content dan perbaikan sidebar)
                                <span class="ms-3">Gelombang PPDB</span>
                            </x-sidebar-link>
                        @endif
                        <x-sidebar-link :href="route('ppdb_registrations.index')" :active="request()->routeIs('ppdb_registrations.*')">
                            <i class="fa-solid fa-user-graduate w-5 text-center text-indigo-400"></i>
                            <span class="ms-3">PPDB Registrasi</span>
                        </x-sidebar-link>
                        <x-sidebar-link :href="route((auth()->user()->role == 'administrator' ? 'admin' : (auth()->user()->role == 'teacher' ? 'teacher' : 'officer')).'.team-members.index')" :active="request()->routeIs('*.team-members.*')">
                            <i class="fa-solid fa-user-shield w-5 text-center text-purple-400"></i>
                            <span class="ms-3">Tim UKS & BK</span>
                        </x-sidebar-link>
                    </ul>
                </div>
            </div>
        </div>

        <!-- User Profile Footer -->
        <div class="p-4 bg-slate-800/30 border-t border-slate-800">
            <div class="flex flex-col gap-2">
                <a href="{{ route('profile.edit') }}" class="flex items-center gap-3 p-2 rounded-xl hover:bg-slate-700/50 transition-all duration-200 group">
                    <div class="h-9 w-9 rounded-lg bg-blue-600 flex items-center justify-center text-white font-bold ring-2 ring-blue-600/20 group-hover:ring-blue-600/40">
                        {{ substr(Auth::user()->name, 0, 1) }}
                    </div>
                    <div class="flex flex-col overflow-hidden">
                        <span class="text-sm font-semibold text-white truncate">{{ Auth::user()->name }}</span>
                        <span class="text-[10px] text-slate-500 truncate capitalize">{{ Auth::user()->role }}</span>
                    </div>
                </a>

                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="w-full flex items-center gap-3 px-4 py-2.5 text-xs font-bold text-red-400 hover:text-red-300 hover:bg-red-500/10 rounded-xl transition-all duration-200">
                        <i class="fa-solid fa-power-off text-sm"></i>
                        <span>LOGOUT SYSTEM</span>
                    </button>
                </form>
            </div>
        </div>
    </div>
</aside>

<style>
    .custom-scrollbar::-webkit-scrollbar {
        width: 4px;
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
