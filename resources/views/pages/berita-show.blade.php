@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 sm:px-6 lg:px-8 py-8">
    <div class="bg-white shadow-md rounded-lg p-8">
        <h1 class="text-3xl font-bold mb-4">{{ $post->title }}</h1>
        <div class="text-gray-500 text-sm mb-4">
            <i class="far fa-calendar"></i> Dipublikasikan pada {{ $post->published_at->format('d F Y') }}
        </div>
        @if($post->thumbnail)
            @if(filter_var($post->thumbnail, FILTER_VALIDATE_URL))
                <img src="{{ $post->thumbnail }}" alt="{{ $post->title }}" class="w-full h-auto object-cover rounded-lg mb-6" loading="lazy">
            @else
                <img src="{{ asset('storage/' . $post->thumbnail) }}" alt="{{ $post->title }}" class="w-full h-auto object-cover rounded-lg mb-6" loading="lazy">
            @endif
        @endif
        <div class="prose max-w-full">
            {!! $post->content !!}
        </div>

        <div class="mt-8">
            <a href="{{ route('posts.public.index') }}" class="text-blue-500 hover:text-blue-700">
                <i class="fas fa-arrow-left"></i> Kembali ke Berita
            </a>
        </div>
    </div>
</div>
@endsection
