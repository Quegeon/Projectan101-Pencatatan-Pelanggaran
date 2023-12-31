@extends('layouts.master')
@section('title', 'Edit Data BK')
@section('content')
    <div class="page-inner">
        <div class="page-header">
            <h4 class="page-title">Form Edit Data BK</h4>
            {{-- <div class="btn-group btn-group-page-header ml-auto">
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
            </div> --}}
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="card card-stats card-round">
                    <div class="card-body">
                        <div class="table-responsive">
                            <form action="{{ route('bk.update', $bk->id) }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <label>Nama</label>
                                    <input class="form-control" type="text" name="nama" value="{{ $bk->nama }}" placeholder="{{ $bk->nama }}">
                                    @error('nama')
                                        <p class="text-danger timeout">* {{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label>Username</label>
                                    <input class="form-control" type="text" name="username" value="{{ $bk->username }}" placeholder="{{ $bk->username }}">
                                    @error('username')
                                        <p class="text-danger timeout">* {{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label>Foto</label>
                                    <input type="file" id="image" class="form-control" name="foto" onchange="imagePreview()">
                                    @error('foto')
                                        <p class="text-danger timeout">* {{ $message }}</p>
                                    @enderror
                                </div>
                                <center>
                                    <img src="{{ asset('fotobk/' . $bk->foto) }}" class="img-preview img-fluid" height="200" width="200px">
                                </center>
                                <div class="modal-footer">
                                    <a href="{{ route('bk.index') }}" class="btn btn-secondary"><i class="fa fa-ban mr-2"></i>Kembali</a>
                                    <button type="submit" class="btn btn-primary"><i class="fa fa-save mr-2"></i>Simpan</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection