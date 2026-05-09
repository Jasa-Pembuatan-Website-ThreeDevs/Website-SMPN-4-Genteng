@extends('layouts.app')

@section('content')
<div class="p-8 max-w-7xl mx-auto">
    <div class="bg-gradient-to-br from-blue-600 to-indigo-600 rounded-2xl p-10 mb-8 text-white shadow-lg">
        <h1 class="text-4xl font-bold mb-2 flex items-center gap-4">
            <span class="text-3xl bg-white bg-opacity-20 w-16 h-16 rounded-full flex items-center justify-center">
                <i class="fas fa-lightbulb"></i>
            </span>
            <span>Manajemen Visi & Misi</span>
        </h1>
        <p class="text-lg opacity-90">Kelola informasi visi dan misi sekolah untuk ditampilkan di halaman publik.</p>
    </div>

    @if(session('success'))
        <div class="mb-6 p-4 bg-green-100 border-l-4 border-green-500 text-green-700 rounded-r-lg shadow-sm flex items-center gap-3">
            <i class="fas fa-check-circle"></i>
            <span>{{ session('success') }}</span>
        </div>
    @endif

    <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
        <!-- Visi Section -->
        <div class="bg-white rounded-2xl shadow-sm border border-slate-200 overflow-hidden">
            <div class="p-6 border-b border-slate-100 bg-slate-50/50">
                <h2 class="text-xl font-bold text-slate-800 flex items-center gap-2">
                    <i class="fas fa-eye text-blue-500"></i> Visi Sekolah
                </h2>
            </div>
            <div class="p-8">
                <form action="{{ route(auth()->user()->role === 'administrator' ? 'admin.visi-misi.vision.update' : (auth()->user()->role === 'teacher' ? 'teacher.visi-misi.vision.update' : 'officer.visi-misi.vision.update')) }}" method="POST">
                    @csrf
                    <div class="mb-6">
                        <label class="block text-sm font-semibold text-slate-700 mb-2">Quote Visi</label>
                        <textarea name="quote" rows="3" class="w-full border-slate-200 rounded-xl focus:ring-4 focus:ring-blue-100 focus:border-blue-500 border p-3 transition" placeholder="Contoh: Terwujudnya Peserta Didik yang Berprestasi...">{{ old('quote', $vision->quote ?? '') }}</textarea>
                        @error('quote') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                    </div>
                    <div class="mb-6">
                        <label class="block text-sm font-semibold text-slate-700 mb-2">Deskripsi Tambahan (Opsional)</label>
                        <textarea name="description" rows="3" class="w-full border-slate-200 rounded-xl focus:ring-4 focus:ring-blue-100 focus:border-blue-500 border p-3 transition" placeholder="Penjelasan singkat mengenai visi tersebut...">{{ old('description', $vision->description ?? '') }}</textarea>
                    </div>
                    <button type="submit" class="w-full bg-blue-600 hover:bg-blue-700 text-white font-bold py-3 rounded-xl transition shadow-lg shadow-blue-100">
                        <i class="fas fa-save mr-2"></i> Simpan Perubahan Visi
                    </button>
                </form>
            </div>
        </div>

        <!-- Misi Section -->
        <div class="bg-white rounded-2xl shadow-sm border border-slate-200 overflow-hidden">
            <div class="p-6 border-b border-slate-100 bg-slate-50/50 flex justify-between items-center">
                <h2 class="text-xl font-bold text-slate-800 flex items-center gap-2">
                    <i class="fas fa-list-ol text-indigo-500"></i> Daftar Misi
                </h2>
                <button onclick="openMissionModal()" class="bg-indigo-600 hover:bg-indigo-700 text-white text-sm font-bold px-4 py-2 rounded-lg transition">
                    <i class="fas fa-plus mr-1"></i> Tambah Misi
                </button>
            </div>
            <div class="p-6">
                <div class="space-y-4">
                    @forelse($missions as $mission)
                        <div class="p-4 border border-slate-100 rounded-xl hover:border-indigo-200 transition-colors bg-slate-50/30 group">
                            <div class="flex justify-between items-start gap-4">
                                <div class="flex gap-3">
                                    <span class="w-8 h-8 rounded-full bg-indigo-100 text-indigo-600 flex items-center justify-center font-bold text-sm shrink-0">
                                        {{ $loop->iteration }}
                                    </span>
                                    <div>
                                        <h3 class="font-bold text-slate-800">{{ $mission->title }}</h3>
                                        <p class="text-sm text-slate-600 mt-1">{{ $mission->content }}</p>
                                    </div>
                                </div>
                                <div class="flex gap-2 opacity-0 group-hover:opacity-100 transition-opacity">
                                    <button onclick="editMission({{ json_encode($mission) }})" class="p-2 text-blue-600 hover:bg-blue-50 rounded-lg transition" title="Edit">
                                        <i class="fas fa-edit"></i>
                                    </button>
                                    <form action="{{ route(auth()->user()->role === 'administrator' ? 'admin.visi-misi.mission.destroy' : (auth()->user()->role === 'teacher' ? 'teacher.visi-misi.mission.destroy' : 'officer.visi-misi.mission.destroy'), $mission->id) }}" method="POST" onsubmit="return confirm('Hapus misi ini?')">
                                        @csrf @method('DELETE')
                                        <button class="p-2 text-red-600 hover:bg-red-50 rounded-lg transition" title="Hapus">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    @empty
                        <div class="text-center py-10">
                            <i class="fas fa-clipboard-list text-4xl text-slate-200 mb-3"></i>
                            <p class="text-slate-400">Belum ada data misi.</p>
                        </div>
                    @endforelse
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Mission Modal -->
<div id="missionModal" class="fixed inset-0 bg-slate-900/50 backdrop-blur-sm z-[100] hidden items-center justify-center p-4">
    <div class="bg-white rounded-3xl shadow-2xl w-full max-w-lg overflow-hidden animate-in fade-in zoom-in duration-200">
        <div class="p-6 border-b border-slate-100 bg-slate-50 flex justify-between items-center">
            <h3 id="modalTitle" class="text-xl font-bold text-slate-800">Tambah Misi Baru</h3>
            <button onclick="closeMissionModal()" class="text-slate-400 hover:text-slate-600 transition">
                <i class="fas fa-times text-xl"></i>
            </button>
        </div>
        <form id="missionForm" action="{{ route(auth()->user()->role === 'administrator' ? 'admin.visi-misi.mission.store' : (auth()->user()->role === 'teacher' ? 'teacher.visi-misi.mission.store' : 'officer.visi-misi.mission.store')) }}" method="POST" class="p-8">
            @csrf
            <div id="methodField"></div>
            <div class="mb-6">
                <label class="block text-sm font-semibold text-slate-700 mb-2">Judul Misi</label>
                <input type="text" name="title" id="missionTitle" class="w-full border-slate-200 rounded-xl focus:ring-4 focus:ring-indigo-100 focus:border-indigo-500 border p-3 transition" required placeholder="Contoh: Meningkatkan Kualitas Pembelajaran">
            </div>
            <div class="mb-6">
                <label class="block text-sm font-semibold text-slate-700 mb-2">Konten Misi</label>
                <textarea name="content" id="missionContent" rows="4" class="w-full border-slate-200 rounded-xl focus:ring-4 focus:ring-indigo-100 focus:border-indigo-500 border p-3 transition" required placeholder="Contoh: Menyelenggarakan proses pembelajaran yang inovatif..."></textarea>
            </div>
            <div class="mb-8">
                <label class="block text-sm font-semibold text-slate-700 mb-2">Urutan (Opsional)</label>
                <input type="number" name="order" id="missionOrder" class="w-full border-slate-200 rounded-xl focus:ring-4 focus:ring-indigo-100 focus:border-indigo-500 border p-3 transition" placeholder="0">
            </div>
            <div class="flex gap-4">
                <button type="button" onclick="closeMissionModal()" class="flex-1 bg-slate-100 hover:bg-slate-200 text-slate-600 font-bold py-3 rounded-xl transition">
                    Batal
                </button>
                <button type="submit" class="flex-1 bg-indigo-600 hover:bg-indigo-700 text-white font-bold py-3 rounded-xl transition shadow-lg shadow-indigo-100">
                    Simpan Misi
                </button>
            </div>
        </form>
    </div>
</div>

<script>
    const modal = document.getElementById('missionModal');
    const form = document.getElementById('missionForm');
    const modalTitle = document.getElementById('modalTitle');
    const methodField = document.getElementById('methodField');
    const baseAction = form.action;

    function openMissionModal() {
        modalTitle.innerText = 'Tambah Misi Baru';
        form.reset();
        form.action = baseAction;
        methodField.innerHTML = '';
        modal.classList.remove('hidden');
        modal.classList.add('flex');
    }

    function closeMissionModal() {
        modal.classList.add('hidden');
        modal.classList.remove('flex');
    }

    function editMission(mission) {
        modalTitle.innerText = 'Edit Misi';
        document.getElementById('missionTitle').value = mission.title;
        document.getElementById('missionContent').value = mission.content;
        document.getElementById('missionOrder').value = mission.order;
        
        let updateUrl = baseAction.replace('/mission', '/mission/' + mission.id);
        form.action = updateUrl;
        methodField.innerHTML = '@method("PUT")';
        
        modal.classList.remove('hidden');
        modal.classList.add('flex');
    }

    modal.addEventListener('click', (e) => {
        if (e.target === modal) closeMissionModal();
    });
</script>
@endsection
