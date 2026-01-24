<section class="section section-light main-content-section" id="facilities">
        <div class="container">
            <div class="section-title animate-on-scroll">
                <h2>Fasilitas Sekolah</h2>
                <p>Didukung dengan fasilitas lengkap dan modern untuk mendukung proses belajar mengajar yang optimal</p>
            </div>
            
            <div class="card-grid">
                @foreach($facilities as $facility)
                <div class="card animate-on-scroll">
                    <div class="card-img">
                        <img src="{{ asset('storage/' . $facility->image) }}" alt="{{ $facility->name }}">
                    </div>
                    <div class="card-content">
                        <h3 class="card-title">{{ $facility->name }}</h3>
                        <p class="card-text">{{ $facility->description }}</p>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>