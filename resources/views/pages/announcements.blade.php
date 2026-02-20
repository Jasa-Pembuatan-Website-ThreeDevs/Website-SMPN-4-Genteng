<section id="announcements" class="section section-light">
    <div class="container">
        <div class="section-title">
            <h2><i class="fas fa-bell" style="margin-right: 10px; color: #ff6b6b;"></i> Pengumuman Terbaru</h2>
            <p>Informasi penting dari SMPN 4 Genteng</p>
        </div>

        @if($announcements->count() > 0)
        <div class="announcements-container">
            @foreach($announcements as $announcement)
            <div class="announcement-card">
                @if($announcement->image)
                <div class="announcement-image">
                    <img src="{{ asset('storage/' . $announcement->image) }}" alt="{{ $announcement->title }}" loading="lazy">
                    <div class="announcement-overlay"></div>
                </div>
                @endif
                
                <div class="announcement-content">
                    <h3 class="announcement-title">{{ $announcement->title }}</h3>
                    <p class="announcement-text">{{ Str::limit(strip_tags($announcement->content), 120) }}</p>
                    <p class="announcement-date">
                        <i class="fas fa-calendar-alt"></i>
                        {{ $announcement->created_at->format('d F Y') }}
                    </p>
                </div>
            </div>
            @endforeach
        </div>
        @else
        <div style="text-align: center; padding: 40px 20px; color: #999;">
            <p><i class="fas fa-inbox" style="font-size: 2rem; margin-bottom: 10px; display: block;"></i> Belum ada pengumuman</p>
        </div>
        @endif
    </div>
</section>

<style>
.announcements-container {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
    gap: 25px;
    margin-top: 40px;
}

.announcement-card {
    background: white;
    border-radius: 12px;
    overflow: hidden;
    box-shadow: 0 4px 15px rgba(0, 0, 0, 0.08);
    transition: all 0.3s ease;
    display: flex;
    flex-direction: column;
}

.announcement-card:hover {
    transform: translateY(-8px);
    box-shadow: 0 12px 30px rgba(0, 0, 0, 0.15);
}

.announcement-image {
    position: relative;
    width: 100%;
    height: 200px;
    overflow: hidden;
    background: #f0f0f0;
}

.announcement-image img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    transition: transform 0.3s ease;
}

.announcement-card:hover .announcement-image img {
    transform: scale(1.05);
}

.announcement-overlay {
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background: linear-gradient(to bottom, rgba(0,0,0,0), rgba(0,0,0,0.2));
    pointer-events: none;
}

.announcement-content {
    padding: 25px;
    flex: 1;
    display: flex;
    flex-direction: column;
}

.announcement-title {
    font-size: 1.2rem;
    font-weight: 600;
    color: #2c3e50;
    margin: 0 0 12px 0;
    line-height: 1.4;
}

.announcement-text {
    color: #666;
    font-size: 0.95rem;
    line-height: 1.6;
    margin: 0 0 15px 0;
    flex: 1;
}

.announcement-date {
    color: #999;
    font-size: 0.85rem;
    margin: 0;
    padding-top: 15px;
    border-top: 1px solid #eee;
}

.announcement-date i {
    margin-right: 6px;
    color: #ff6b6b;
}

@media (max-width: 768px) {
    .announcements-container {
        grid-template-columns: 1fr;
        gap: 20px;
    }

    .announcement-image {
        height: 180px;
    }

    .announcement-title {
        font-size: 1.1rem;
    }
}
</style>
