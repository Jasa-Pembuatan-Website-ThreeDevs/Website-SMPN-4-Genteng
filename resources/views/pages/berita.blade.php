<section class="section main-content-section" id="news">
    <div class="container">
        <div class="section-title animate-on-scroll">
            <h2>Berita & Kegiatan</h2>
            <p>Informasi terbaru seputar kegiatan, prestasi, dan perkembangan di SMPN 4 Genteng</p>
        </div>

        @if ($posts->isNotEmpty())
            <div class="card-grid grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                @foreach ($posts as $post)
                    <div class="card animate-on-scroll flex flex-col h-full overflow-hidden">
                        <div class="card-img">
                            @if ($post->thumbnail)
                                @if (filter_var($post->thumbnail, FILTER_VALIDATE_URL))
                                    <img class="w-full h-[200px] object-cover" src="{{ $post->thumbnail }}"
                                        alt="{{ $post->title }}" loading="lazy">
                                @else
                                    <img class="w-full h-[200px] object-cover"
                                        src="{{ asset('storage/' . $post->thumbnail) }}" alt="{{ $post->title }}"
                                        loading="lazy">
                                @endif
                            @else
                                <div
                                    style="width: 100%; height: 200px; background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); display: flex; align-items: center; justify-content: center; color: white; font-size: 1rem;">
                                    <i class="fas fa-image" style="font-size: 2rem;"></i>
                                </div>
                            @endif
                        </div>
                        <div class="card-content flex flex-col">
                            <span
                                class="card-category w-fit">{{ $post->announcement == 'news' ? 'Berita' : 'Pengumuman' }}</span>
                            <h3 class="card-title line-clamp-2">{{ $post->title }}</h3>
                            <p class="card-text" style="flex-grow: 1;">{{ Str::limit(strip_tags($post->content), 100) }}
                            </p>
                            <div
                                style="display: flex; justify-content: space-between; align-items: center; margin-top: auto;">
                                <span style="font-size: 0.9rem; color: var(--gray);">
                                    <i class="far fa-calendar"></i> {{ $post->published_at->format('d F Y') }}
                                </span>
                                <a href="{{ route('posts.public.show', $post) }}" class="btn btn-primary">
                                    Baca
                                </a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @else
            <div class="flex flex-col items-center justify-center p-10 bg-gray-50 rounded-lg shadow-inner mt-10">
                <i class="fas fa-newspaper text-4xl text-gray-400 mb-4"></i>
                <h3 class="text-xl font-semibold text-gray-700">Belum Ada Berita</h3>
                <p class="text-gray-500 mt-2 text-center">Saat ini belum ada berita atau kegiatan terbaru yang
                    dipublikasikan. <br>Silakan periksa kembali nanti.</p>
            </div>
        @endif
    </div>
</section>
