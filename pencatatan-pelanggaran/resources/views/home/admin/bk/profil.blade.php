@extends('layouts.master')
@section('title','Profil BK')
@section('content')
    <div class="page-inner">
        <h4 class="page-title">{{ Auth::user()->username }} Profile</h4>
        <div class="row">
            <div class="col-md-8">
                <div class="card card-with-nav">
                    <div class="card-header">
                        <div class="row row-nav-line">
                            <ul class="nav nav-tabs nav-line nav-color-secondary" role="tablist">
                                <li class="nav-item"> <a class="nav-link active show" data-toggle="tab" href="#home" role="tab" aria-selected="true">Profile</a> </li>
                            </ul>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row mt-3">
                            <div class="col-md-6">
                                <div class="form-group form-group-default">
                                    <label>Nama</label>
                                    <input type="text" class="form-control" name="nama" placeholder="Nama" value="{{ Auth::user()->nama }}" disabled>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group form-group-default">
                                    <label>Username</label>
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
                            <a href="#" class="btn btn-primary" data-toggle="modal" data-target="#modalUpdate">Ubah Profil</a>
                            <a href="#" class="btn btn-secondary" data-toggle="modal" data-target="#modalChangePassword">Ubah Password</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card card-profile card-secondary">
                    {{-- TODO: BUAT BG SCALED BLURED --}}
                    <div class="card-header" style="background-image: url('../assets/img/blogpost.jpg')">
                        <div class="profile-picture">
                            <div class="avatar avatar-xl">
                                <img src="{{ asset('fotobk/' .  Auth::user()->foto) }}" alt="..." class="avatar-img rounded-circle">
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="user-profile text-center">
                            <div class="name">{{ Auth::user()->nama }}</div>
                            <div class="job">Guru BK</div>
                            {{-- <div class="social-media">
                                <a class="btn btn-info btn-twitter btn-sm btn-link" href="#"> 
                                    <span class="btn-label just-icon"><i class="flaticon-twitter"></i> </span>
                                </a>
                                <a class="btn btn-danger btn-sm btn-link" rel="publisher" href="#"> 
                                    <span class="btn-label just-icon"><i class="flaticon-google-plus"></i> </span> 
                                </a>
                                <a class="btn btn-primary btn-sm btn-link" rel="publisher" href="#"> 
                                    <span class="btn-label just-icon"><i class="flaticon-facebook"></i> </span> 
                                </a>
                                <a class="btn btn-danger btn-sm btn-link" rel="publisher" href="#"> 
                                    <span class="btn-label just-icon"><i class="flaticon-dribbble"></i> </span> 
                                </a>
                            </div> --}}
                        </div>
                    </div>
                    <div class="card-footer">
                        {{-- <div class="row user-stats text-center">
                            <div class="col">
                                <div class="number">125</div>
                                <div class="title">Post</div>
                            </div>
                            <div class="col">
                                <div class="number">25K</div>
                                <div class="title">Followers</div>
                            </div>
                            <div class="col">
                                <div class="number">134</div>
                                <div class="title">Following</div>
                            </div>
                        </div> --}}
                    </div>
                </div>
            </div>
        </div>
    </div>  
    
    <div class="modal fade" id="modalUpdate" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ubah Profil</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('profile.bk.update') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label>Nama</label>
                            <input type="text" name="nama" class="form-control" value="{{ Auth::user()->nama }}" placeholder="{{ Auth::user()->nama }}">
                            @error('nama')
                                <p class="text-danger">* {{ $message }}</p>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Username</label>
                            <input type="text" name="username" class="form-control" value="{{ Auth::user()->username }}" placeholder="{{ Auth::user()->username }}">
                            @error('username')
                                <p class="text-danger">* {{ $message }}</p>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Foto</label>
                            <input type="file" name="foto" class="form-control">
                            @if ($errors->first('foto'))
                                @error('foto')
                                    <p class="text-danger">* {{ $message }}</p>
                                @enderror
                            @else
                                <p class="text-muted">* Optional</p>
                            @endif
                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Kembali</button>
                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </div>
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
                    <form action="{{ route('profile.bk.change_password') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label>Password Baru</label>
                            <input type="text" name="new_password" class="form-control" placeholder="Masukkan Password Baru">
                            @error('new_password')
                                <p class="text-danger">* {{ $message }}</p>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Konfirmasi Password</label>
                            <input type="text" name="confirm_password" class="form-control" placeholder="Masukkan Kembali Password">
                            @error('confirm_password')
                                <p class="text-danger">* {{ $message }}</p>
                            @enderror
                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Kembali</button>
                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection