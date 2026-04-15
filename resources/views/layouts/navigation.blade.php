<nav class="bg-white border-b border-gray-100 shrink-0">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <div class="flex">
                <div class="-me-2 flex items-center lg:hidden">
                    <button @click="sidebarOpen = !sidebarOpen" class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 focus:text-gray-500 transition duration-150 ease-in-out">
                        <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                            <path class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        </svg>
                    </button>
                </div>

                <div class="shrink-0 flex items-center lg:hidden ms-4">
                    <a href="{{ route('dashboard') }}">
                        <img class="logo" src="/Logo.jpg" alt="Logo SMPN 4 Genteng" style="width: 32px; height: 32px; border-radius: 8px; box-shadow: 0 2px 4px #2563eb22; background: #fff; object-fit: cover; border: 1px solid #2563eb;">
                    </a>
                </div>
            </div>
                 
            <div class="flex items-center ms-6">
                @auth
                @else
                    <a href="{{ route('login') }}" class="text-sm text-gray-700 underline">Log in</a>
                @endauth
            </div>
        </div>
    </div>
</nav>