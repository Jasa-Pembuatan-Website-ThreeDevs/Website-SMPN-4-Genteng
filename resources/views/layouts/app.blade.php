<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ ucfirst(Auth::user()->role) }} - SMPN 4 Genteng</title>

    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="font-sans antialiased bg-slate-50 overflow-x-hidden" x-data="{ sidebarOpen: false }">

    <!-- Mobile Overlay -->
    <div x-show="sidebarOpen" x-transition:enter="transition-opacity ease-linear duration-300"
        x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100"
        x-transition:leave="transition-opacity ease-linear duration-300" x-transition:leave-start="opacity-100"
        x-transition:leave-end="opacity-0" @click="sidebarOpen = false"
        class="fixed inset-0 bg-slate-900/60 backdrop-blur-sm z-30 lg:hidden">
    </div>

    @include('layouts.sidebar')

    <div class="flex-1 flex flex-col min-h-screen transition-all duration-300 lg:pl-72">

        @include('layouts.navigation')

        @isset($header)
            <header class="bg-white border-b border-slate-200">
                <div class="px-4 sm:px-6 lg:px-8 py-5">
                    {{ $header }}
                </div>
            </header>
        @endisset

        <main class="flex-1 p-4 sm:p-6 lg:p-8">
            <div class="w-full mx-auto">
                @yield('content')
            </div>
        </main>

    </div>

    <!-- Scroll to Top Button -->
    <button id="scrollToTopBtn" class="fixed bottom-6 right-6 w-12 h-12 bg-blue-600 text-white rounded-full shadow-lg flex items-center justify-center transition-all duration-300 transform translate-y-20 opacity-0 z-50 hover:bg-blue-700 hover:scale-110 focus:outline-none">
        <i class="fas fa-chevron-up"></i>
    </button>

    <script>
        const scrollBtn = document.getElementById('scrollToTopBtn');
        window.onscroll = function() {
            if (document.body.scrollTop > 300 || document.documentElement.scrollTop > 300) {
                scrollBtn.classList.remove('translate-y-20', 'opacity-0');
                scrollBtn.classList.add('translate-y-0', 'opacity-100');
            } else {
                scrollBtn.classList.add('translate-y-20', 'opacity-0');
                scrollBtn.classList.remove('translate-y-0', 'opacity-100');
            }
        };
        scrollBtn.onclick = function() {
            window.scrollTo({
                top: 0,
                behavior: 'smooth'
            });
        };
    </script>
</body>

</html>
