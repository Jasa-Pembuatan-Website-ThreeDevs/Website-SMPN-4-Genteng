<section class="section main-content-section" id="achievements">
        <div class="container">
            <div class="section-title animate-on-scroll">
                <h2>Prestasi Terbaru</h2>
                <p>Bukti nyata dedikasi dan kerja keras siswa-siswi SMPN 4 Genteng dalam berbagai kompetisi</p>
            </div>
            
            @if($achievements->isNotEmpty())
                <div class="achievement-grid">
                    @foreach($achievements as $achievement)
                    <div class="achievement-card animate-on-scroll">
                        <div class="achievement-img-container">
                            @if($achievement->image)
                                @if(filter_var($achievement->image, FILTER_VALIDATE_URL))
                                    <img src="{{ $achievement->image }}" alt="{{ $achievement->title }}">
                                @else
                                    <img src="{{ asset('storage/' . $achievement->image) }}" alt="{{ $achievement->title }}">
                                @endif
                            @else
                                <div class="achievement-placeholder">
                                    <i class="fas fa-trophy"></i>
                                </div>
                            @endif
                            <div class="achievement-badge">{{ $achievement->level }}</div>
                        </div>
                        <div class="achievement-body">
                            <div class="achievement-meta">
                                <span class="achievement-tag">
                                    <i class="fas fa-calendar-alt"></i> {{ $achievement->year }}
                                </span>
                            </div>
                            <h3 class="achievement-title">{{ $achievement->title }}</h3>
                            <p class="achievement-text">{{ \Illuminate\Support\Str::limit($achievement->description, 100) }}</p>
                        </div>
                    </div>
                    @endforeach
                </div>
            @else
                <div class="flex flex-col items-center justify-center p-10 bg-gray-50 rounded-lg shadow-inner mt-10">
                    <i class="fas fa-trophy text-4xl text-gray-400 mb-4"></i>
                    <h3 class="text-xl font-semibold text-gray-700">Belum Ada Prestasi</h3>
                    <p class="text-gray-500 mt-2 text-center">Data prestasi akan segera kami perbarui. <br>Silakan periksa kembali nanti.</p>
                </div>
            @endif
        </div>
    </section>