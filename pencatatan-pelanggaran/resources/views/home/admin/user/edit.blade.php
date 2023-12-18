@extends('layouts.master')
@section('title', 'Edit Data Petugas')
@section('content')
    <div class="page-inner">
        <div class="page-header">
            <h4 class="page-title">Form Edit Data Petugas</h4>
            <div class="btn-group btn-group-page-header ml-auto">
                <button type="button" class="btn btn-light btn-round btn-page-header-dropdown dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="fa fa-ellipsis-h"></i>
                </button>
                <div class="dropdown-menu">
                    <div class="arrow"></div>
                    <a class="dropdown-item" href="#">Action</a>
                    <a class="dropdown-item" href="#">Another action</a>
                    <a class="dropdown-item" href="#">Something else here</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="#">Separated link</a>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="card card-stats card-round">
                    <div class="card-body">
                        <div class="table-responsive">
                            <form action="{{ route('petugas.update', $user->id) }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <label>Nama Petugas</label>
                                    <input class="form-control" type="text" name="nama" value="{{ $user->nama }}" placeholder="{{ $user->nama }}">
                                    @error('nama')
                                        <p class="text-danger timeout">* {{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label>Username</label>
                                    <input class="form-control" type="text" name="username" value="{{ $user->username }}" placeholder="{{ $user->username }}">
                                    @error('username')
                                        <p class="text-danger timeout">* {{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label>Level</label>
                                    <select name="level" class="form-control">
                                        <option value="{{ $user->level }}" selected>Default: {{ $user->level }}</option>
                                        <option value="Admin">Admin</option>
                                        <option value="Petugas">Petugas</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Foto</label>
                                    <input type="file" id="image" class="form-control" name="foto" onchange="imagePreview()">
                                    @error('foto')
                                        <p class="text-danger timeout">* {{ $message }}</p>
                                    @enderror
                                </div>
                                <center>
                                    <img src="{{asset('fotopetugas/'.$user->foto)}}" class="img-preview img-fluid"  height="200" width="200px">
                                </center>
                                <a href="{{ route('petugas.index') }}" class="btn btn-light">Kembali</a>
                                <button type="submit" class="btn btn-primary mr-2">Simpan</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection