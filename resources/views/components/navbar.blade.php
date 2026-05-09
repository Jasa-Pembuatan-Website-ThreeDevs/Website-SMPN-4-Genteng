<header class="header main-header">
  <div class="container header-container">
    <a href="#" class="logo">
      <img src="{{ asset('Logo-removebg-preview.png') }}" alt="SMPN 4 Genteng Logo" width="60" style="border-radius: 35%">
      <div class="logo-text">
        <h1>SMPN 4 GENTENG</h1>
        <p>
          Sekolah Berprestasi & Berkarakter
        </p>
      </div>
    </a>

    <button class="mobile-menu-btn relative z-50" id="mobileMenuBtn">
      <i class="fas fa-bars pointer-events-none"></i>
    </button>

    <nav class="nav" id="mainNav">
      <ul class="nav-list">
        <li class="nav-item">
          <a href="/#" class="nav-link {{ Request::is('/') && !Request::getQueryString() ? 'active' : '' }}">Beranda</a>
        </li>
        <li class="nav-item has-dropdown">
          <a href="#" class="nav-link {{ Request::is('kepala-sekolah', 'visi-misi', 'guru') || Request::routeIs('teachers.index') ? 'active' : '' }}">
            Tentang <i class="fas fa-chevron-down"></i>
          </a>
          <ul class="dropdown">
            <li><a href="/kepala-sekolah" class="dropdown-item {{ Request::is('kepala-sekolah') ? 'active' : '' }}">Kepala Sekolah</a></li>
            <li><a href="/visi-misi" class="dropdown-item {{ Request::is('visi-misi') ? 'active' : '' }}">Visi & Misi</a></li>
            <li><a href="{{ route('teachers.index') }}" class="dropdown-item {{ Request::routeIs('teachers.index') ? 'active' : '' }}">Guru & Staf</a></li>
            <li><a href="/#facilities" class="dropdown-item">Fasilitas</a></li>
            <li><a href="/#contact" class="dropdown-item">Kontak Kami</a></li>
          </ul>
        </li>
        <li class="nav-item">
          <a href="/#news" class="nav-link">Berita</a>
        </li>
        <li class="nav-item">
          <a href="/#extracurricular" class="nav-link">Ekstrakurikuler</a>
        </li>
        <li class="nav-item">
          <a href="/#achievements" class="nav-link">Prestasi</a>
        </li>
        <li class="nav-item">
          <a href="/spmb" class="nav-link {{ Request::is('spmb*') ? 'active' : '' }}">SPMB</a>
        </li>
        <li class="nav-item">
          <a href="/uks" class="nav-link {{ Request::is('uks') ? 'active' : '' }}">UKS</a>
        </li>
        <li class="nav-item">
          <a href="/bk" class="nav-link {{ Request::is('bk') ? 'active' : '' }}">BK</a>
        </li>
      </ul>
    </nav>
  </div>
</header>
