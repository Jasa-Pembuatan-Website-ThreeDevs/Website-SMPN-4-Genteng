@props(['active', 'href'])

@php
$classes = ($active ?? false)
            ? 'flex items-center px-4 py-3 text-sm font-bold text-white bg-blue-600/90 rounded-xl shadow-lg shadow-blue-600/20 transition-all duration-200'
            : 'flex items-center px-4 py-3 text-sm font-medium text-slate-400 hover:text-white hover:bg-slate-800 rounded-xl transition-all duration-200 group';
@endphp

<li>
    <a {{ $attributes->merge(['href' => $href, 'class' => $classes]) }}>
        {{ $slot }}
        @if($active ?? false)
            <span class="ms-auto flex h-2 w-2 rounded-full bg-white animate-pulse"></span>
        @endif
    </a>
</li>
