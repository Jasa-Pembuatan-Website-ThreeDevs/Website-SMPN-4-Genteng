 <section class="section main-content-section" id="news">
        <div class="container">
            <div class="section-title animate-on-scroll">
                <h2>Berita & Kegiatan</h2>
                <p>Informasi terbaru seputar kegiatan, prestasi, dan perkembangan di SMPN 4 Genteng</p>
            </div>
            
            <div class="card-grid">
                @foreach($posts as $post)
                <div class="card animate-on-scroll">
                    <div class="card-img">
                        <img src="{{ $post->thumbnail }}" alt="{{ $post->title }}">
                    </div>
                    <div class="card-content">
                        <span class="card-category">{{ $post->announcement == 'news' ? 'Berita' : 'Pengumuman' }}</span>
                        <h3 class="card-title">{{ $post->title }}</h3>
                        <p class="card-text">{{ Str::limit(strip_tags($post->content), 100) }}</p>
                        <div style="display: flex; justify-content: space-between; align-items: center; margin-top: 20px;">
                            <span style="font-size: 0.9rem; color: var(--gray);">
                                <i class="far fa-calendar"></i> {{ $post->published_at->format('d F Y') }}
                            </span>
                            <a href="{{ route('posts.public.show', $post) }}" class="btn btn-primary">Baca Selengkapnya</a>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>