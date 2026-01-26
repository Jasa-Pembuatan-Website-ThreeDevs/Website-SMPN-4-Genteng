@extends('layouts.app')

@section('content')
<div class="p-8 max-w-7xl mx-auto">
    <!-- Header Section -->
    <div class="bg-gradient-to-br from-blue-600 to-purple-600 rounded-2xl p-10 mb-8 text-white shadow-lg">
        <div class="mb-8">
            <h1 class="text-4xl font-bold mb-2 flex items-center gap-4">
                <span class="text-3xl bg-white bg-opacity-20 w-16 h-16 rounded-full flex items-center justify-center">
                    <i class="fas fa-trophy"></i>
                </span>
                <span>Data Prestasi SMPN 4 Genteng</span>
            </h1>
            <p class="text-lg opacity-90 max-w-2xl">
                Kelola data prestasi yang telah diraih oleh siswa-siswi SMPN 4 Genteng
            </p>
        </div>
        
        <!-- Stats Cards -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mt-8">
            <div class="bg-white bg-opacity-10 backdrop-blur-md rounded-xl p-6 flex items-center gap-4 border border-white border-opacity-20 transition hover:-translate-y-1 hover:bg-opacity-15">
                <div class="w-12 h-12 rounded-lg bg-white bg-opacity-20 flex items-center justify-center text-2xl">
                    <i class="fas fa-medal"></i>
                </div>
                <div>
                    <h3 class="text-3xl font-bold">{{ $achievements->count() }}</h3>
                    <p class="text-sm opacity-80 mt-1">Total Prestasi</p>
                </div>
            </div>
            
            <div class="bg-white bg-opacity-10 backdrop-blur-md rounded-xl p-6 flex items-center gap-4 border border-white border-opacity-20 transition hover:-translate-y-1 hover:bg-opacity-15">
                <div class="w-12 h-12 rounded-lg bg-white bg-opacity-20 flex items-center justify-center text-2xl">
                    <i class="fas fa-star"></i>
                </div>
                <div>
                    <h3 class="text-3xl font-bold">{{ $achievements->where('level', 'Nasional')->count() }}</h3>
                    <p class="text-sm opacity-80 mt-1">Prestasi Nasional</p>
                </div>
            </div>
            
            <div class="bg-white bg-opacity-10 backdrop-blur-md rounded-xl p-6 flex items-center gap-4 border border-white border-opacity-20 transition hover:-translate-y-1 hover:bg-opacity-15">
                <div class="w-12 h-12 rounded-lg bg-white bg-opacity-20 flex items-center justify-center text-2xl">
                    <i class="fas fa-calendar-alt"></i>
                </div>
                <div>
                    <h3 class="text-3xl font-bold">{{ $achievements->max('year') ?? 'N/A' }}</h3>
                    <p class="text-sm opacity-80 mt-1">Tahun Terakhir</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Flash Message -->
    @if(session('success'))
        <div class="mb-6 flex items-center gap-4 rounded-xl border-l-4 border-green-500 bg-gradient-to-r from-green-100 to-green-200 p-5 text-green-800">
            <div class="text-2xl">
                <i class="fas fa-check-circle"></i>
            </div>
            <div>
                <h4 class="font-semibold">Sukses!</h4>
                <p class="text-sm">{{ session('success') }}</p>
            </div>
            <button onclick="this.parentElement.style.display='none'" class="ml-auto text-lg opacity-70 transition hover:opacity-100">
                <i class="fas fa-times"></i>
            </button>
        </div>
    @endif

    @if(session('error'))
        <div class="mb-6 flex items-center gap-4 rounded-xl border-l-4 border-red-500 bg-gradient-to-r from-red-100 to-red-200 p-5 text-red-800">
            <div class="text-2xl">
                <i class="fas fa-exclamation-circle"></i>
            </div>
            <div>
                <h4 class="font-semibold">Error!</h4>
                <p class="text-sm">{{ session('error') }}</p>
            </div>
            <button onclick="this.parentElement.style.display='none'" class="ml-auto text-lg opacity-70 transition hover:opacity-100">
                <i class="fas fa-times"></i>
            </button>
        </div>
    @endif

    <!-- Action Bar -->
    <div class="flex flex-col md:flex-row justify-between items-center gap-6 mb-8">
        <a href="{{ route('admin.achievements.create') }}" class="inline-flex items-center gap-2 px-5 py-3 font-semibold text-white bg-gradient-to-br from-blue-600 to-purple-600 rounded-lg shadow-md hover:-translate-y-0.5 hover:shadow-lg transition-transform">
            <i class="fas fa-plus"></i>
            <span>Tambah Prestasi Baru</span>
        </a>
        
        <div class="flex flex-col md:flex-row items-center gap-4">
            <div class="relative w-full md:w-64">
                <i class="fas fa-search absolute left-4 top-1/2 -translate-y-1/2 text-gray-400"></i>
                <input type="text" id="searchInput" placeholder="Cari prestasi..." class="w-full pl-11 pr-4 py-2.5 border-2 border-gray-200 rounded-lg focus:ring-blue-500 focus:border-blue-500 transition">
            </div>
            
            <select id="levelFilter" class="w-full md:w-auto px-4 py-2.5 border-2 border-gray-200 rounded-lg focus:ring-blue-500 focus:border-blue-500 transition">
                <option value="">Semua Tingkat</option>
                <option value="Kecamatan">Kecamatan</option>
                <option value="Kabupaten">Kabupaten</option>
                <option value="Provinsi">Provinsi</option>
                <option value="Nasional">Nasional</option>
            </select>
            
            <select id="yearFilter" class="w-full md:w-auto px-4 py-2.5 border-2 border-gray-200 rounded-lg focus:ring-blue-500 focus:border-blue-500 transition">
                <option value="">Semua Tahun</option>
                @foreach($years as $year)
                    <option value="{{ $year }}">{{ $year }}</option>
                @endforeach
            </select>
        </div>
    </div>

    <!-- Achievements Table -->
    <div class="bg-white rounded-2xl shadow-lg overflow-hidden">
        @if($achievements->count() > 0)
            <div class="overflow-x-auto">
                <table class="w-full min-w-[1000px]">
                    <thead class="bg-gray-50">
                        <tr>
                            <th class="px-6 py-4 text-center text-xs font-semibold text-gray-700 uppercase tracking-wider border-b-2 border-gray-200">No</th>
                            <th class="px-6 py-4 text-left text-xs font-semibold text-gray-700 uppercase tracking-wider border-b-2 border-gray-200">Judul Prestasi</th>
                            <th class="px-6 py-4 text-left text-xs font-semibold text-gray-700 uppercase tracking-wider border-b-2 border-gray-200">Tingkat</th>
                            <th class="px-6 py-4 text-center text-xs font-semibold text-gray-700 uppercase tracking-wider border-b-2 border-gray-200">Tahun</th>
                            <th class="px-6 py-4 text-left text-xs font-semibold text-gray-700 uppercase tracking-wider border-b-2 border-gray-200">Gambar</th>
                            <th class="px-6 py-4 text-left text-xs font-semibold text-gray-700 uppercase tracking-wider border-b-2 border-gray-200">Deskripsi</th>
                            <th class="px-6 py-4 text-center text-xs font-semibold text-gray-700 uppercase tracking-wider border-b-2 border-gray-200">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200">
                        @foreach ($achievements as $achievement)
                            <tr class="hover:bg-gray-50 transition-colors achievement-row"
                                data-level="{{ $achievement->level }}"
                                data-year="{{ $achievement->year }}"
                                data-title="{{ strtolower($achievement->title) }}">
                                <td class="px-6 py-5 align-middle text-center text-sm text-gray-500">{{ $loop->iteration }}</td>
                                
                                <td class="px-6 py-5 align-middle">
                                    <div class="font-semibold text-gray-800">{{ $achievement->title }}</div>
                                </td>
                                
                                <td class="px-6 py-5 align-middle">
                                    @php
                                        $levelClasses = [
                                            'Kecamatan' => 'bg-blue-100 text-blue-800',
                                            'Kabupaten' => 'bg-green-100 text-green-800',
                                            'Provinsi' => 'bg-yellow-100 text-yellow-800',
                                            'Nasional' => 'bg-amber-300 text-amber-900 border border-amber-400',
                                        ];
                                        $badgeClass = $levelClasses[$achievement->level] ?? 'bg-gray-100 text-gray-800';
                                    @endphp
                                    <span class="inline-block px-3 py-1 text-xs font-semibold rounded-full text-center min-w-[100px] {{ $badgeClass }}">
                                        {{ $achievement->level }}
                                    </span>
                                </td>
                                
                                <td class="px-6 py-5 align-middle text-center">
                                    <span class="inline-block px-3 py-1 bg-gray-100 rounded-md font-semibold text-gray-600 text-sm">{{ $achievement->year }}</span>
                                </td>
                                
                                <td class="px-6 py-5 align-middle">
                                    @if ($achievement->image)
                                        <div class="relative w-20 h-20 rounded-lg overflow-hidden cursor-pointer group" onclick="openImageModal('{{ asset('storage/'.$achievement->image) }}')">
                                            <img src="{{ asset('storage/'.$achievement->image) }}" 
                                                 alt="{{ $achievement->title }}"
                                                 class="w-full h-full object-cover transition-transform duration-300 group-hover:scale-110">
                                            <div class="absolute inset-0 bg-black bg-opacity-50 flex items-center justify-center opacity-0 group-hover:opacity-100 transition-opacity">
                                                <i class="fas fa-search-plus text-white"></i>
                                            </div>
                                        </div>
                                    @else
                                        <div class="w-20 h-20 bg-gray-100 rounded-lg flex flex-col items-center justify-center text-gray-500">
                                            <i class="fas fa-image text-2xl mb-1"></i>
                                            <span class="text-xs">No Image</span>
                                        </div>
                                    @endif
                                </td>
                                
                                <td class="px-6 py-5 align-middle">
                                    <div class="max-w-xs text-gray-600 line-clamp-3" title="{{ $achievement->description }}">
                                        {{ $achievement->description }}
                                    </div>
                                </td>
                                
                                <td class="px-6 py-5 align-middle">
                                    <div class="flex items-center justify-center gap-2">
                                        <a href="{{ route('admin.achievements.edit', $achievement->id) }}" 
                                           class="w-9 h-9 flex items-center justify-center rounded-lg text-white bg-blue-500 hover:bg-blue-600 transition-transform hover:-translate-y-0.5"
                                           title="Edit Prestasi">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        
                                        <a href="{{ route('admin.achievements.show', $achievement->id) }}" 
                                           class="w-9 h-9 flex items-center justify-center rounded-lg text-white bg-green-500 hover:bg-green-600 transition-transform hover:-translate-y-0.5"
                                           title="Detail Prestasi">
                                            <i class="fas fa-eye"></i>
                                        </a>
                                        
                                        <form action="{{ route('admin.achievements.destroy', $achievement->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="button" 
                                                    onclick="openDeleteModal('{{ route('admin.achievements.destroy', $achievement->id) }}')"
                                                    class="w-9 h-9 flex items-center justify-center rounded-lg text-white bg-red-500 hover:bg-red-600 transition-transform hover:-translate-y-0.5"
                                                    title="Hapus Prestasi">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            
            <!-- Pagination -->
            @if($achievements->hasPages())
                <div class="p-6 bg-gray-50 border-t border-gray-200">
                    {{ $achievements->links() }}
                </div>
            @endif
            
        @else
            <!-- Empty State -->
            <div class="text-center py-20 px-6">
                <div class="text-7xl text-gray-300 mb-4">
                    <i class="fas fa-trophy"></i>
                </div>
                <h3 class="text-2xl font-bold text-gray-800 mb-2">Belum Ada Data Prestasi</h3>
                <p class="text-gray-500 mb-6 text-lg">Mulai dengan menambahkan prestasi pertama Anda</p>
                <a href="{{ route('admin.achievements.create') }}" class="inline-flex items-center gap-2 px-5 py-3 font-semibold text-white bg-gradient-to-br from-blue-600 to-purple-600 rounded-lg shadow-md hover:-translate-y-0.5 hover:shadow-lg transition-transform">
                    <i class="fas fa-plus"></i>
                    <span>Tambah Prestasi Pertama</span>
                </a>
            </div>
        @endif
    </div>
</div>

<!-- Modals -->
<div id="imageModal" class="hidden fixed inset-0 bg-black bg-opacity-75 items-center justify-center p-4 z-[2000]">
    <div class="relative bg-white rounded-2xl shadow-2xl max-w-4xl max-h-[90vh] p-4">
        <img id="modalImage" src="" alt="Preview Gambar" class="rounded-xl w-full h-full object-contain">
        <button id="closeImageModal" class="absolute -top-4 -right-4 w-10 h-10 bg-gray-800 rounded-full text-white flex items-center justify-center cursor-pointer">
            <i class="fas fa-times"></i>
        </button>
    </div>
</div>

<div id="deleteModal" class="hidden fixed inset-0 bg-black bg-opacity-75 items-center justify-center p-4 z-[2000]">
    <div class="relative bg-white rounded-2xl shadow-2xl w-full max-w-md transform transition-all">
        <div class="px-6 py-4 border-b">
            <h3 class="font-bold text-lg flex items-center gap-2"><i class="fas fa-exclamation-triangle text-red-500"></i>Konfirmasi Hapus</h3>
        </div>
        <div class="p-6">
            <p>Apakah Anda yakin ingin menghapus prestasi ini?</p>
            <p class="text-sm text-gray-500 mt-2">Data yang dihapus tidak dapat dikembalikan.</p>
        </div>
        <div class="px-6 py-4 bg-gray-50 rounded-b-2xl flex justify-end gap-4">
            <button id="closeDeleteModal" type="button" class="px-4 py-2 bg-gray-200 text-gray-800 rounded-lg hover:bg-gray-300 transition">Batal</button>
            <form id="deleteForm" action="" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit" class="px-4 py-2 bg-red-600 text-white rounded-lg hover:bg-red-700 transition">Hapus</button>
            </form>
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        // Modal Handling
        const imageModal = document.getElementById('imageModal');
        const modalImage = document.getElementById('modalImage');
        const closeImageModalBtn = document.getElementById('closeImageModal');

        const deleteModal = document.getElementById('deleteModal');
        const deleteForm = document.getElementById('deleteForm');
        const closeDeleteModalBtn = document.getElementById('closeDeleteModal');

        window.openImageModal = function(url) {
            modalImage.src = url;
            imageModal.classList.remove('hidden');
            imageModal.classList.add('flex');
        }

        function closeImageModal() {
            imageModal.classList.add('hidden');
            imageModal.classList.remove('flex');
            modalImage.src = '';
        }

        window.openDeleteModal = function(url) {
            deleteForm.action = url;
            deleteModal.classList.remove('hidden');
            deleteModal.classList.add('flex');
        }

        function closeDeleteModal() {
            deleteModal.classList.add('hidden');
            deleteModal.classList.remove('flex');
            deleteForm.action = '';
        }

        closeImageModalBtn.addEventListener('click', closeImageModal);
        imageModal.addEventListener('click', function(e) {
            if (e.target === imageModal) {
                closeImageModal();
            }
        });

        closeDeleteModalBtn.addEventListener('click', closeDeleteModal);
        deleteModal.addEventListener('click', function(e) {
            if (e.target === deleteModal) {
                closeDeleteModal();
            }
        });

        document.addEventListener('keydown', function(e) {
            if (e.key === 'Escape') {
                closeImageModal();
                closeDeleteModal();
            }
        });

        // Filtering Logic
        const searchInput = document.getElementById('searchInput');
        const levelFilter = document.getElementById('levelFilter');
        const yearFilter = document.getElementById('yearFilter');
        const achievementRows = document.querySelectorAll('.achievement-row');
        const tbody = document.querySelector('.divide-y');
        let noResultsRow;

        if (tbody) {
            noResultsRow = document.createElement('tr');
            noResultsRow.id = 'no-results-row';
            noResultsRow.style.display = 'none';
            noResultsRow.innerHTML = `<td colspan="7" class="text-center p-8 text-gray-500">No achievements found matching your criteria.</td>`;
            tbody.appendChild(noResultsRow);
        }

        function filterAchievements() {
            const searchTerm = searchInput.value.toLowerCase();
            const level = levelFilter.value;
            const year = yearFilter.value;
            let visibleCount = 0;

            achievementRows.forEach(row => {
                const title = row.dataset.title.toLowerCase();
                const rowLevel = row.dataset.level;
                const rowYear = row.dataset.year;

                const searchMatch = title.includes(searchTerm);
                const levelMatch = level === '' || rowLevel === level;
                const yearMatch = year === '' || rowYear === year;

                if (searchMatch && levelMatch && yearMatch) {
                    row.style.display = '';
                    visibleCount++;
                } else {
                    row.style.display = 'none';
                }
            });

            if (noResultsRow) {
                noResultsRow.style.display = visibleCount === 0 ? '' : 'none';
            }
        }

        if(searchInput) searchInput.addEventListener('input', filterAchievements);
        if(levelFilter) levelFilter.addEventListener('change', filterAchievements);
        if(yearFilter) yearFilter.addEventListener('change', filterAchievements);
    });
</script>
@endsection
