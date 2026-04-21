<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Open Graph -->
    <meta property="og:title" content="@yield('title', 'Website Sekolah SMP NEGERI 4 GENTENG')">
    <meta property="og:description" content="@yield('description', 'Website resmi sekolah')">
    <meta property="og:image" content="@yield('image', asset('images/default.jpg'))">
    <meta property="og:url" content="{{ url()->current() }}">
    <meta property="og:type" content="website">

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

</body>

</html>
