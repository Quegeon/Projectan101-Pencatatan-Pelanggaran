@extends('layouts.master')
@section('title', 'Petugas')
@section('content')
<div class="page-inner">
    <h4 class="page-title">{{ Auth::user()->username }} Profile</h4>
    <div class="row">
        <div class="col-md-8">
            <div class="card card-with-nav">
                <div class="card-header">
                    <div class="row row-nav-line">
                        <ul class="nav nav-tabs nav-line nav-color-secondary" role="tablist">
                            <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#profile" role="tab" aria-selected="false">Profile</a> </li>
                        </ul>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row mt-3">
                        <div class="col-md-4">
                            <div class="form-group form-group-default">
                                <label>Nama</label>
                                <input type="text" class="form-control" name="nama" placeholder="Nama" value="{{ Auth::user()->nama }}" disabled>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group form-group-default">
                                <label>Username</label>
                                <input type="text" class="form-control" name="username" placeholder="Username" value="{{ Auth::user()->username }}" disabled>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group form-group-default">
                                <label>Level</label>
                                <input type="text" class="form-control" name="username" placeholder="Username" value="{{ Auth::user()->username }}" disabled>
                            </div>
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-md-12">
                            <div class="form-group form-group-default">
                                <label>ID</label>
                                <input type="text" class="form-control" name="id" placeholder="ID" value="{{ Auth::user()->id }}" disabled>
                            </div>
                        </div>
                    </div>
                    <div class="text-right mt-3 mb-3">
                        <a href="#" class="btn btn-primary mb-2 ml-3" data-toggle="modal" data-target="#modalUpdate">Ubah Profile</a>
                        <a href="#" class="btn btn-primary mb-2 ml-3" data-toggle="modal" data-target="#modalChangePassword">Ubah Password</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card card-profile card-secondary">
                <div class="card-header" style="background-image: url('../assets/img/blogpost.jpg')">
                    <div class="profile-picture">
                        <div class="avatar avatar-xl">
                            <img src="{{asset('fotopetugas/' . Auth::user()->foto )}}" alt="..." class="avatar-img rounded-circle">
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="user-profile text-center">
                        <div class="name">{{ Auth()->User()->nama}}</div>
                        <div class="job">{{ Auth()->User()->level}}</div>
                        <div class="view-profile">
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <div class="row user-stats text-center">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="modalUpdate" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Ubah Profile</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('aturan.store') }}" method="POST" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label>Username</label>
                        <input type="text" name="username" class="form-control" placeholder="Masukkan Username" value="{{Auth::user()->username}}">
                    </div>
                    <div class="form-group">
                        <label>Nama</label>
                        <input type="text" name="nama" class="form-control" placeholder="Masukkan Nama" value="{{Auth::user()->nama}}">
                    </div>
                    <div class="form-group">
                        <label>Foto</label>
                        <input type="file" name="nama" class="form-control" placeholder="Masukkan Nama" value="{{Auth::user()->nama}}">
                    </div>
            </div>
            <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </form>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="modalChangePassword" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Ubah Password</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('aturan.store') }}" method="POST" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label>Password Baru</label>
                        <input type="text" name="password_baru" class="form-control" placeholder="Masukkan Password Baru">
                    </div>
                    <div class="form-group">
                        <label>Konfirmasi Password</label>
                        <input type="text" name="konfirmasi_password" class="form-control" placeholder="Konfirmasi Password">
                    </div>
            </div>
            <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection