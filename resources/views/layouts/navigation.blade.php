<nav class="bg-white/80 backdrop-blur-md border-b border-slate-200 sticky top-0 z-30 shrink-0">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <div class="flex items-center">
                <!-- Mobile Menu Button -->
                <button @click="sidebarOpen = !sidebarOpen" 
                        class="lg:hidden inline-flex items-center justify-center p-2.5 rounded-xl text-slate-500 hover:text-blue-600 hover:bg-blue-50 focus:outline-none focus:ring-2 focus:ring-blue-500/20 transition-all duration-200">
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{'hidden': sidebarOpen, 'inline-flex': !sidebarOpen }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{'hidden': !sidebarOpen, 'inline-flex': sidebarOpen }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>

                <!-- Breadcrumbs or Mobile Logo -->
                <div class="flex items-center lg:hidden ms-3">
                    <div class="h-8 w-px bg-slate-200 mx-3"></div>
                    <img class="h-8 w-8 rounded-lg object-cover ring-1 ring-slate-200" src="/Logo.jpg" alt="Logo">
                </div>
                
                <div class="hidden lg:flex items-center">
                    <h2 class="text-sm font-semibold text-slate-600 tracking-tight">
                        Dashboard Panel <span class="mx-2 text-slate-300">/</span> 
                        <span class="text-blue-600">{{ ucfirst(Request::segment(1) ?? 'Home') }}</span>
                    </h2>
                </div>
            </div>
                 
            <div class="flex items-center gap-4">
                @auth
                    <div class="flex items-center gap-3 px-3 py-1.5 rounded-full bg-slate-50 border border-slate-100">
                        <div class="w-2 h-2 rounded-full bg-emerald-500 animate-pulse"></div>
                        <span class="text-[11px] font-bold text-slate-500 uppercase tracking-wider">{{ Auth::user()->role }} Mode</span>
                    </div>
                @else
                    <a href="{{ route('login') }}" class="text-sm font-semibold text-blue-600 hover:text-blue-700 transition-colors">Log in</a>
                @endauth
            </div>
        </div>
    </div>
</nav>