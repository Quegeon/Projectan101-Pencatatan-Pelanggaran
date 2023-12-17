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
                <li class="nav-item active">
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
                @if(Auth()->User()->level == 'Admin')
                <li class="nav-item">
                    <a data-toggle="collapse" href="#submenu">
                        <i class="fas fa-table"></i>
                        <p>Kelola Data</p>
                        <span class="caret"></span>
                    </a>
                    <div class="collapse" id="submenu">
                        <ul class="nav nav-collapse">
                            <li>
                                <a href="{{ route('petugas.index') }}">
                                    <span class="sub-item">Kelola Data Petugas</span>
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('bk.index') }}">
                                    <span class="sub-item">Kelola Data Bk</span>
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('siswa.index') }}">
                                    <span class="sub-item">Kelola Data Siswa</span>
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('kelas.index') }}">
                                    <span class="sub-item">Kelola Data Kelas</span>
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('aturan.index') }}">
                                    <span class="sub-item">Kelola Data Aturan</span>
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('hukuman.index') }}">
                                    <span class="sub-item">Kelola Data Hukuman</span>
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('jenis.index') }}">
                                    <span class="sub-item">Kelola Data Jenis</span>
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <span class="sub-item">Kelola Data Pelanggaran</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>
                @endif
                <li class="nav-item">
                    <a href="#">
                        <i class="fas fa-file-signature"></i>
                        <p>Tambah Pelanggaran</p>
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
                                {{-- TODO: add profile --}}
                                <a href="#profile">
                                    <span class="sub-item">Profile</span>
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('logout.user') }}">
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