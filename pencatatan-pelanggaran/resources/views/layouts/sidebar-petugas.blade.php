@php
    $currentRoute = Route::currentRouteName();
    $activeRoutes = ['dashboard', 'petugas.index', 'bk.index', 'siswa.index', 'kelas.index', 'aturan.index', 'hukuman.index', 'jenis.index', 'laporan.create', 'profile.user', 'logout.user'];
    $isAdmin = (Auth()->User()->level === 'Admin');
    $isPetugas = (Auth()->User()->level === 'Petugas');
@endphp

<div class="sidebar">
    <div class="sidebar-background"></div>
    <div class="sidebar-wrapper scrollbar-inner">
        <div class="sidebar-content">
            <div class="user">
                <div class="avatar-sm float-left mr-2">
                    <img src="{{ asset('fotopetugas/'.Auth()->User()->foto) }}" alt="..." class="avatar-img rounded-circle">
                </div>
                <div class="info">
                    <a data-toggle="collapse" href="#collapseExample" aria-expanded="true">
                        <span>
                            {{ Auth()->User()->nama }}
                            <span class="user-level">{{ Auth()->User()->level }}</span>
                        </span>
                    </a>
                    <div class="clearfix"></div>
                </div>
            </div>
            <ul class="nav">
                <li class="nav-item {{ ($currentRoute === 'dashboard') ? 'active' : '' }}">
                    <a href="{{ route('dashboard') }}">
                        <i class="fas fa-home"></i>
                        <p>Dashboard</p>
                    </a>
                </li>
                <li class="nav-section">
                    <span class="sidebar-mini-icon">
                        <i class="fa fa-ellipsis-h"></i>
                    </span>
                    <h4 class="text-section">Pilihan</h4>
                </li>
                @if($isAdmin)
                <li class="nav-item {{ ($currentRoute === 'petugas.index' || $currentRoute === 'bk.index') ? 'active' : '' }}">
                    <a data-toggle="collapse" href="#submenu" class="{{ ($currentRoute === 'petugas.index' || $currentRoute === 'bk.index') ? 'collapsed' : '' }}">
                        <i class="fas fa-solid fa-users"></i>
                        <p>Kelola User</p>
                        <span class="caret"></span>
                    </a>
                    <div class="collapse {{ ($currentRoute === 'petugas.index' || $currentRoute === 'bk.index') ? 'show' : '' }}" id="submenu">
                        <ul class="nav nav-collapse">
                            <li class="{{ ($currentRoute === 'petugas.index') ? 'active' : '' }}">
                                <a href="{{ route('petugas.index') }}">
                                    <span class="sub-item">Kelola Data Petugas</span>
                                </a>
                            </li>
                            <li class="{{ ($currentRoute === 'bk.index') ? 'active' : '' }}">
                                <a href="{{ route('bk.index') }}">
                                    <span class="sub-item">Kelola Data Bk</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>
                <li class="nav-item {{ ($currentRoute === 'siswa.index' || $currentRoute === 'kelas.index') ? 'active' : '' }}">
                    <a data-toggle="collapse" href="#submenu2" class="{{ ($currentRoute === 'siswa.index' || $currentRoute === 'kelas.index') ? 'collapsed' : '' }}">
                        <i class="fas fa-solid fa-school"></i>
                        <p>Master Data</p>
                        <span class="caret"></span>
                    </a>
                    <div class="collapse {{ ($currentRoute === 'siswa.index' || $currentRoute === 'kelas.index') ? 'show' : '' }}" id="submenu2">
                        <ul class="nav nav-collapse">
                            <li class="{{ ($currentRoute === 'siswa.index') ? 'active' : '' }}">
                                <a href="{{ route('siswa.index') }}">
                                    <span class="sub-item">Kelola Data Siswa</span>
                                </a>
                            </li>
                            <li class="{{ ($currentRoute === 'kelas.index') ? 'active' : '' }}">
                                <a href="{{ route('kelas.index') }}">
                                    <span class="sub-item">Kelola Data Kelas</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>
                <li class="nav-item {{ ($currentRoute === 'aturan.index' || $currentRoute === 'hukuman.index' || $currentRoute === 'jenis.index') ? 'active' : '' }}">
                    <a data-toggle="collapse" href="#submenu3" class="{{ ($currentRoute === 'aturan.index' || $currentRoute === 'hukuman.index' || $currentRoute === 'jenis.index') ? 'collapsed' : '' }}">
                        <i class="fas fa-table"></i>
                        <p>Master Data Sistem</p>
                        <span class="caret"></span>
                    </a>
                    <div class="collapse {{ ($currentRoute === 'aturan.index' || $currentRoute === 'hukuman.index' || $currentRoute === 'jenis.index') ? 'show' : '' }}" id="submenu3">
                        <ul class="nav nav-collapse">
                            <li class="{{ ($currentRoute === 'aturan.index') ? 'active' : '' }}">
                                <a href="{{ route('aturan.index') }}">
                                    <span class="sub-item">Kelola Data Aturan</span>
                                </a>
                            </li>
                            <li class="{{ ($currentRoute === 'hukuman.index') ? 'active' : '' }}">
                                <a href="{{ route('hukuman.index') }}">
                                    <span class="sub-item">Kelola Data Hukuman</span>
                                </a>
                            </li>
                            <li class="{{ ($currentRoute === 'jenis.index') ? 'active' : '' }}">
                                <a href="{{ route('jenis.index') }}">
                                    <span class="sub-item">Kelola Data Jenis</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>
                @endif
                @if ($isPetugas)
                <li class="nav-item {{ ($currentRoute === 'laporan.create') ? 'active' : '' }}">
                    <a href="{{ route('laporan.create') }}">
                        <i class="fas fa-file-signature"></i>
                        <p>Tambah Laporan</p>
                    </a>
                </li>
                @endif
                <li class="nav-item {{ ($currentRoute === 'profile.user') ? 'active' : '' }}">
                    <a href="{{ route('profile.user') }}">
                        <i class="fas fa-cog"></i>
                        <p>Pengaturan</p>
                    </a>
                </li>
                <li class="nav-item {{ ($currentRoute === 'logout.user') ? 'active' : '' }}">
                    <a href="{{ route('logout.user') }}">
                        <i class="fas fa-sign-out-alt"></i>
                        <p>Logout</p>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</div>
