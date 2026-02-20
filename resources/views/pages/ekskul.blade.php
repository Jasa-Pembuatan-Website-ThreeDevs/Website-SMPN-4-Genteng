@php
    $ekstrakurikuler = $ekstrakurikuler ?? [];
@endphp
<section class="section section-light main-content-section" id="extracurricular">
        <div class="container">
            <div class="section-title animate-on-scroll">
                <h2>Ekstrakurikuler</h2>
                <p>Berbagai kegiatan ekstrakurikuler untuk mengembangkan bakat dan minat siswa di luar pembelajaran akademik</p>
            </div>
            <div class="extracurricular-grid" style="display: grid; grid-template-columns: repeat(auto-fit, minmax(260px, 1fr)); gap: 2rem; margin-top: 2rem;">
                @forelse($ekstrakurikuler as $ekskul)
                <div class="extracurricular-card animate-on-scroll" style="background: #fff; border-radius: 1.25rem; box-shadow: 0 2px 12px rgba(0,0,0,0.06); padding: 2rem; display: flex; flex-direction: column; align-items: center;">
                    <div class="extracurricular-icon" style="width: 100px; height: 100px; margin-bottom: 1.2rem; display: flex; align-items: center; justify-content: center; border-radius: 1.2rem; background: linear-gradient(135deg, #e0e7ef 60%, #dbeafe 100%); box-shadow: 0 4px 24px 0 rgba(37,99,235,0.10); overflow: hidden; position: relative; transition: box-shadow 0.3s;">
                        <img src="{{ asset('storage/' . $ekskul->image) }}" alt="Logo {{ $ekskul->name }}" style="width: 90px; height: 90px; object-fit: cover; border-radius: 1rem; box-shadow: 0 2px 12px 0 rgba(37,99,235,0.13); border: 3px solid #fff; transition: transform 0.3s; background: #fff;">
                    </div>
                    <h3 style="font-size: 1.25rem; font-weight: 700; color: #2563eb; margin-bottom: 0.5rem;">{{ $ekskul->name }}</h3>
                    <p style="color: #334155; text-align: center; min-height: 48px;">{{ $ekskul->description }}</p>
                    @if($ekskul->teacher && $ekskul->teacher->name)
                    <div style="margin-top: 18px; display: flex; align-items: center; gap: 0.75rem;">
                        <div style="width: 48px; height: 48px; border-radius: 50%; overflow: hidden; border: 2px solid #2563eb; background: #e0e7ef; display: flex; align-items: center; justify-content: center;">
                            @if($ekskul->teacher->photo)
                                <img src="{{ asset('storage/' . $ekskul->teacher->photo) }}" alt="Foto {{ $ekskul->teacher->name }}" style="width: 100%; height: 100%; object-fit: cover;">
                            @else
                                <span style="font-size: 1.5rem; color: #2563eb; font-weight: bold;">{{ mb_substr($ekskul->teacher->name, 0, 1) }}</span>
                            @endif
                        </div>
                        <span style="font-size: 1rem; color: #2563eb; font-weight: 600;">{{ $ekskul->teacher->name }}</span>
                    </div>
                    @endif
                    <div style="margin-top: 20px;">
                        <span style="background: rgba(37, 99, 235, 0.1); color: #2563eb; padding: 4px 12px; border-radius: 50px; font-size: 0.85rem; font-weight: 600;">40 Siswa</span>
                    </div>
                </div>
                @empty
                    <p class="text-center text-gray-500" style="grid-column: 1/-1;">Belum ada data ekstrakurikuler.</p>
                @endforelse
            </div>
        </div>
    </section>