@props(['active', 'href'])

@php
$classes = ($active ?? false)
            ? 'flex items-center px-4 py-3 text-sm font-bold text-white bg-blue-600 rounded-xl shadow-[0_8px_20px_-6px_rgba(37,99,235,0.45)] transition-all duration-300 transform scale-[1.02]'
            : 'flex items-center px-4 py-3 text-sm font-medium text-slate-400 hover:text-white hover:bg-slate-800/80 rounded-xl transition-all duration-200 group';
@endphp

<li>
    <a {{ $attributes->merge(['href' => $href, 'class' => $classes]) }}>
        <div class="{{ ($active ?? false) ? 'text-white' : 'text-slate-500 group-hover:text-blue-400' }} transition-colors duration-200">
            {{ $slot }}
        </div>
        @if($active ?? false)
            <div class="ms-auto flex items-center">
                <div class="h-1.5 w-1.5 rounded-full bg-white shadow-[0_0_8px_rgba(255,255,255,0.8)]"></div>
            </div>
        @endif
    </a>
</li>
