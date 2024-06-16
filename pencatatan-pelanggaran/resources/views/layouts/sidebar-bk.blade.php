@php
    $currentRoute = Route::currentRouteName();
    $activeRoutes = ['review.inbox', 'review.review', 'review.edit', 'view_siswa', 'view_aturan'];
    $kelola = in_array($currentRoute, $activeRoutes) ? 'active' : '';
@endphp
<div class="sidebar">
    <div class="sidebar-background"></div>
    <div class="sidebar-wrapper scrollbar-inner">
        <div class="sidebar-content">
            <div class="user">
                <div class="avatar-sm float-left mr-2">
                    <img src="{{ asset('fotobk/' . Auth()->User()->foto) }}" alt="..."
                        class="avatar-img rounded-circle">
                </div>
                <div class="info">
                    <a data-toggle="collapse" href="#collapseExample" aria-expanded="true">
                        <span>
                            {{ Auth()->User()->nama }}
                            <span class="user-level">Guru BK</span>
                        </span>
                    </a>
                    <div class="clearfix"></div>
                </div>
            </div>
            <ul class="nav">
                <li class="nav-item {{ $currentRoute === 'dashboard.bk' ? 'active' : '' }}">
                    <a href="{{ route('dashboard.bk') }}">
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
                <li class="nav-item {{ $currentRoute === 'review.create' ? 'active' : '' }}">
                    <a href="{{ route('review.create') }}">
                        <i class="fas fa-file-signature"></i>
                        <p>Tambah Pelanggaran</p>
                    </a>
                </li>
                <li class="nav-item {{ $kelola }}">
                    <a data-toggle="collapse" href="#submenu">
                        <i class="fas fa-table"></i>
                        <p>Menu</p>
                        <span class="caret"></span>
                    </a>
                    <div class="collapse" id="submenu">
                        <ul class="nav nav-collapse">
                            <li>
                                <a href="{{ route('view_siswa') }}">
                                    <span class="sub-item">Data Siswa</span>
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('view_aturan') }}">
                                    <span class="sub-item">Data Aturan</span>
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('view_pelanggaran') }}">
                                    <span class="sub-item">Data Pelanggaran</span>
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('review.inbox') }}">
                                    <span class="sub-item">Inbox</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>
                <li class="nav-item {{ $currentRoute === 'log-poin' ? 'active' : '' }}">
                    <a href="{{ route('log-poin') }}">
                        <i class="fas fa-history"></i>
                        <p>Riwayat Poin</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a data-toggle="collapse" href="#settings">
                        <i class="fas fa-cog"></i>
                        <p>Pengaturan</p>
                        <span class="caret"></span>
                    </a>
                    <div class="collapse" id="settings">
                        <ul class="nav nav-collapse">
                            <li>
                                <a href="{{ route('profile.bk') }}">
                                    <span class="sub-item">Profile</span>
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('logout') }}">
                                    <span class="sub-item">Logout</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>
            </ul>
        </div>
    </div>
</div>
