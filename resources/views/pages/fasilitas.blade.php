<section class="section section-light main-content-section" id="facilities">
        <div class="container">
            <div class="section-title animate-on-scroll">
                <h2>Fasilitas Sekolah</h2>
                <p>Didukung dengan fasilitas lengkap dan modern untuk mendukung proses belajar mengajar yang optimal</p>
            </div>
            
            @if($facilities->isNotEmpty())
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
            @else
                <div class="flex flex-col items-center justify-center p-10 bg-white rounded-lg shadow-inner mt-10">
                    <i class="fas fa-building text-4xl text-gray-400 mb-4"></i>
                    <h3 class="text-xl font-semibold text-gray-700">Fasilitas Belum Ditambahkan</h3>
                    <p class="text-gray-500 mt-2 text-center">Informasi mengenai fasilitas sekolah akan segera diperbarui. <br>Silakan periksa kembali nanti.</p>
                </div>
            @endif
        </div>
    </section>