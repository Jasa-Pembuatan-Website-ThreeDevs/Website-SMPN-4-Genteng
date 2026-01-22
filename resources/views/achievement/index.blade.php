@extends('layouts.app')

@section('content')
<div class="achievements-container">
    <!-- Header Section -->
    <div class="achievements-header">
        <div class="header-content">
            <h1 class="page-title">
                <i class="fas fa-trophy"></i> Data Prestasi SMPN 4 Genteng
            </h1>
            <p class="page-subtitle">
                Kelola data prestasi yang telah diraih oleh siswa-siswi SMPN 4 Genteng
            </p>
        </div>
        
        <!-- Stats Cards -->
        <div class="achievement-stats">
            <div class="stat-card">
                <div class="stat-icon">
                    <i class="fas fa-medal"></i>
                </div>
                <div class="stat-content">
                    <h3>{{ $achievements->count() }}</h3>
                    <p>Total Prestasi</p>
                </div>
            </div>
            
            <div class="stat-card">
                <div class="stat-icon">
                    <i class="fas fa-star"></i>
                </div>
                <div class="stat-content">
                    <h3>{{ $achievements->where('level', 'Nasional')->count() }}</h3>
                    <p>Prestasi Nasional</p>
                </div>
            </div>
            
            <div class="stat-card">
                <div class="stat-icon">
                    <i class="fas fa-calendar-alt"></i>
                </div>
                <div class="stat-content">
                    <h3>{{ $achievements->max('year') ?? 'N/A' }}</h3>
                    <p>Tahun Terakhir</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Flash Message -->
    @if(session('success'))
        <div class="alert alert-success">
            <div class="alert-icon">
                <i class="fas fa-check-circle"></i>
            </div>
            <div class="alert-content">
                <h4>Sukses!</h4>
                <p>{{ session('success') }}</p>
            </div>
            <button class="alert-close" onclick="this.parentElement.style.display='none'">
                <i class="fas fa-times"></i>
            </button>
        </div>
    @endif

    @if(session('error'))
        <div class="alert alert-error">
            <div class="alert-icon">
                <i class="fas fa-exclamation-circle"></i>
            </div>
            <div class="alert-content">
                <h4>Error!</h4>
                <p>{{ session('error') }}</p>
            </div>
            <button class="alert-close" onclick="this.parentElement.style.display='none'">
                <i class="fas fa-times"></i>
            </button>
        </div>
    @endif

    <!-- Action Bar -->
    <div class="action-bar">
        <a href="{{ route('achievements.create') }}" class="btn btn-primary">
            <i class="fas fa-plus"></i> Tambah Prestasi Baru
        </a>
        
        <div class="search-filter">
            <div class="search-box">
                <i class="fas fa-search"></i>
                <input type="text" id="searchInput" placeholder="Cari prestasi...">
            </div>
            
            <select id="levelFilter" class="filter-select">
                <option value="">Semua Tingkat</option>
                <option value="Kecamatan">Kecamatan</option>
                <option value="Kabupaten">Kabupaten</option>
                <option value="Provinsi">Provinsi</option>
                <option value="Nasional">Nasional</option>
            </select>
            
            <select id="yearFilter" class="filter-select">
                <option value="">Semua Tahun</option>
                @foreach($years as $year)
                    <option value="{{ $year }}">{{ $year }}</option>
                @endforeach
            </select>
        </div>
    </div>

    <!-- Achievements Table -->
    <div class="table-container">
        @if($achievements->count() > 0)
            <div class="table-responsive">
                <table class="achievements-table">
                    <thead>
                        <tr>
                            <th class="text-center">No</th>
                            <th>Judul Prestasi</th>
                            <th>Tingkat</th>
                            <th class="text-center">Tahun</th>
                            <th>Gambar</th>
                            <th>Deskripsi</th>
                            <th class="text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($achievements as $achievement)
                            <tr class="achievement-row" 
                                data-level="{{ $achievement->level }}"
                                data-year="{{ $achievement->year }}"
                                data-title="{{ strtolower($achievement->title) }}">
                                <td class="text-center">{{ $loop->iteration }}</td>
                                
                                <td>
                                    <div class="achievement-title">
                                        <strong>{{ $achievement->title }}</strong>
                                    </div>
                                </td>
                                
                                <td>
                                    <span class="level-badge level-{{ strtolower($achievement->level) }}">
                                        {{ $achievement->level }}
                                    </span>
                                </td>
                                
                                <td class="text-center">
                                    <span class="year-badge">{{ $achievement->year }}</span>
                                </td>
                                
                                <td>
                                    @if ($achievement->image)
                                        <div class="image-preview">
                                            <img src="{{ asset('storage/'.$achievement->image) }}" 
                                                 alt="{{ $achievement->title }}"
                                                 class="achievement-image"
                                                 onclick="openImageModal('{{ asset('storage/'.$achievement->image) }}')">
                                            <div class="image-overlay">
                                                <i class="fas fa-search-plus"></i>
                                            </div>
                                        </div>
                                    @else
                                        <div class="no-image">
                                            <i class="fas fa-image"></i>
                                            <span>Tidak ada gambar</span>
                                        </div>
                                    @endif
                                </td>
                                
                                <td>
                                    <div class="description-truncate" 
                                         title="{{ $achievement->description }}">
                                        {{ Str::limit($achievement->description, 100) }}
                                    </div>
                                </td>
                                
                                <td>
                                    <div class="action-buttons">
                                        <a href="{{ route('achievements.edit', $achievement->id) }}" 
                                           class="btn-action btn-edit"
                                           title="Edit Prestasi">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        
                                        <a href="{{ route('achievements.show', $achievement->id) }}" 
                                           class="btn-action btn-view"
                                           title="Detail Prestasi">
                                            <i class="fas fa-eye"></i>
                                        </a>
                                        
                                        <form action="{{ route('achievements.destroy', $achievement->id) }}" 
                                              method="POST"
                                              class="delete-form">
                                            @csrf
                                            @method('DELETE')
                                            <button type="button" 
                                                    class="btn-action btn-delete"
                                                    title="Hapus Prestasi"
                                                    onclick="confirmDelete(this)">
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
                <div class="pagination-container">
                    {{ $achievements->links() }}
                </div>
            @endif
            
        @else
            <!-- Empty State -->
            <div class="empty-state">
                <div class="empty-icon">
                    <i class="fas fa-trophy"></i>
                </div>
                <h3>Belum Ada Data Prestasi</h3>
                <p>Mulai dengan menambahkan prestasi pertama Anda</p>
                <a href="{{ route('achievements.create') }}" class="btn btn-primary">
                    <i class="fas fa-plus"></i> Tambah Prestasi Pertama
                </a>
            </div>
        @endif
    </div>
</div>

<!-- Image Modal -->
<div id="imageModal" class="modal">
    <div class="modal-content">
        <span class="close-modal" onclick="closeImageModal()">&times;</span>
        <img id="modalImage" src="" alt="Preview Gambar">
    </div>
</div>

<!-- Delete Confirmation Modal -->
<div id="deleteModal" class="modal">
    <div class="modal-content modal-sm">
        <div class="modal-header">
            <h3><i class="fas fa-exclamation-triangle"></i> Konfirmasi Hapus</h3>
        </div>
        <div class="modal-body">
            <p>Apakah Anda yakin ingin menghapus prestasi ini?</p>
            <p class="text-muted">Data yang dihapus tidak dapat dikembalikan.</p>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" onclick="closeDeleteModal()">Batal</button>
            <form id="deleteForm" method="POST" style="display: inline;">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">Hapus</button>
            </form>
        </div>
    </div>
</div>

<!-- Add this script at the bottom -->
<script src="{{ asset('js/achievements.js') }}"></script>
@endsection