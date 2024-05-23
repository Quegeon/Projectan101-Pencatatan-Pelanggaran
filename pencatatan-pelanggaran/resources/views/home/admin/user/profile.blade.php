@extends('layouts.master')
@section('title', 'Profil Petugas')
@section('content')
<div class="page-inner">
    <h4 class="page-title">{{ Auth::user()->username }} Profil</h4>
    <div class="row">
        <div class="col-md-8">
            <div class="card card-with-nav">
                {{-- <div class="card-header">
                    <div class="row row-nav-line">
                        <ul class="nav nav-tabs nav-line nav-color-secondary" role="tablist">
                            <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#profile" role="tab" aria-selected="false">Profile</a> </li>
                        </ul>
                    </div>
                </div> --}}
                <div class="card-body">
                    <div class="row mt-3">
                        <div class="col">
                            <div class="form-group form-group-default">
                                <label>Nama</label>
                                <input type="text" class="form-control px-2" placeholder="{{ Auth::user()->nama }}" value="{{ Auth::user()->nama }}" readonly>
                            </div>
                        </div>
                    </div>
                   <div class="row">
                    <div class="col-6">
                        <div class="form-group form-group-default">
                            <label>Username</label>
                            <input type="text" class="form-control px-2" placeholder="{{ Auth::user()->username }}" value="{{ Auth::user()->username }}" readonly>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group form-group-default">
                            <label>Level</label>
                            <input type="text" class="form-control px-2" placeholder="{{ Auth::user()->username }}" value="{{ Auth::user()->username }}" readonly>
                        </div>
                    </div>
                   </div>
                    {{-- <div class="row mt-3">
                        <div class="col-md-12">
                            <div class="form-group form-group-default">
                                <label>ID</label>
                                <input type="text" class="form-control" placeholder="{{ Auth::user()->id }}" value="{{ Auth::user()->id }}" readonly>
                            </div>
                        </div>
                    </div> --}}
                    <div class="text-right mt-3 mb-3">
                        <a href="#" class="btn btn-primary mb-2 ml-3" data-toggle="modal" data-target="#modalUpdate"><i class="fa fa-edit mr-2"></i>Ubah Profile</a>
                        <a href="#" class="btn btn-secondary mb-2 ml-3" data-toggle="modal" data-target="#modalChangePassword"><i class="fa fa-key mr-2"></i>Ubah Password</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4 rounded">
            <div class="card card-profile card-secondary rounded">
                <div class="card-header" style="background-image: url('{{ asset('assets/img/blogpost.jpg') }}')">
                    <div class="profile-picture rounded-top">
                        <div class="avatar avatar-xl ">
                            <img src="{{ asset('fotopetugas/' . Auth::user()->foto ) }}" alt="{{ Auth::user()->foto }}" class="avatar-img rounded-circle">
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="user-profile text-center">
                        <div class="name">{{ Auth()->User()->nama}}</div>
                        <div class="job">{{ Auth()->User()->level}}</div>
                    </div>
                </div>
                <div class="card-footer"></div>
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
                <form action="{{ route('profile.user.update', Auth::user()->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label>Nama</label>
                        <input type="text" name="nama" class="form-control" placeholder="{{ Auth::user()->nama }}" value="{{ Auth::user()->nama }}">
                        @error('nama')
                            <p class="text-danger timeout">* {{ $message }}</p>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label>Username</label>
                        <input type="text" name="username" class="form-control" placeholder="{{ Auth::user()->username }}" value="{{ Auth::user()->username }}">
                        @error('username')
                            <p class="text-danger timeout">*{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label>Foto</label>
                        <input type="file" name="foto" class="form-control">
                        @if ($errors->first('foto'))
                            @error('foto')
                                <p class="text-danger timeout">* {{ $message }}</p>
                            @enderror
                        @else
                            <p class="text-muted">* Optional</p>
                        @endif
                    </div>
            </div>
            <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fa fa-ban mr-2"></i>Kembali</button>
                    <button type="submit" class="btn btn-primary"><i class="fa fa-save mr-2"></i>Simpan</button>
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
                <form action="{{ route('profile.user.change_password', Auth::user()->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label>Password Baru</label>
                        <input type="text" name="password_baru" class="form-control" placeholder="Masukkan Password Baru">
                        @error('password_baru')
                            <p class="text-danger timeout">* {{ $message }}</p>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label>Konfirmasi Password</label>
                        <input type="text" name="konfirmasi_password" class="form-control" placeholder="Konfirmasi Password">
                        @error('konfirmasi_password')
                            <p class="text-danger timeout">* {{ $message }}</p>
                        @enderror
                    </div>
            </div>
            <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fa fa-ban mr-2"></i>Kembali</button>
                    <button type="submit" class="btn btn-primary"><i class="fa fa-save mr-2"></i>Simpan</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
