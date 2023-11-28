<div class="sidebar">
			
    <div class="sidebar-background"></div>
    <div class="sidebar-wrapper scrollbar-inner">
        <div class="sidebar-content">
            <div class="user">
                <div class="avatar-sm float-left mr-2">
                    <img src="../assets/img/profile.jpg" alt="..." class="avatar-img rounded-circle">
                </div>
                <div class="info">
                    <a data-toggle="collapse" href="#collapseExample" aria-expanded="true">
                        <span>
                            Husen
                            <span class="user-level">Petugas</span>
                            <span class="caret"></span>
                        </span>
                    </a>
                    <div class="clearfix"></div>

                    <div class="collapse in" id="collapseExample">
                        <ul class="nav">
                            <li>
                                <a href="#profile">
                                    <span class="link-collapse">My Profile</span>
                                </a>
                            </li>
                            <li>
                                <a href="#edit">
                                    <span class="link-collapse">Edit Profile</span>
                                </a>
                            </li>
                            <li>
                                <a href="#settings">
                                    <span class="link-collapse">Settings</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <ul class="nav">
                <li class="nav-item active">
                    <a href="/dashboard">
                        <i class="fas fa-home"></i>
                        <p>Dashboard</p>
                        <span class="badge badge-count">5</span>
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
                                <a href="{{ route('user.index') }}">
                                    <span class="sub-item">Kelola Data Petugas</span>
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
                                <a href="{{ route('pelanggaran.index') }}">
                                    <span class="sub-item">Kelola Data Pelanggaran</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>
                @endif
                <li class="nav-item">
                    <a href="#">
                        <i class="fas fa-home"></i>
                        <p>Tambah Pelanggaran</p>
                        <span class="badge badge-count">5</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a data-toggle="collapse" href="#logout">
                        <i class="fas fa-bars"></i>
                        <p>Setting</p>
                        <span class="caret"></span>
                    </a>
                    <div class="collapse" id="logout">
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{ route('logout') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i> 
                                <p>Logout</p>
                            </li>
                        </ul>
                    </div>
                </li>
            </ul>
        </div>
    </div>
</div>