@extends('layouts.master')
@section('title', 'Edit Data Siswa')
@section('content')
<div class="page-inner">
    <div class="page-header">
        <h4 class="page-title">Edit Data Siswa</h4>
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
                        <form action="{{ route('siswa.update', $siswa->nis) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="nama">Nama</label>
                                        <input class="form-control" type="text" value="{{ $siswa->nama }}" name="nama" placeholder="{{ $siswa->nama }}">
                                        @error('nama')
                                            <p class="text-danger timeout">* {{ $message }}</p>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="kelas">Kelas</label>
                                        <select name="id_kelas" class="select-search-no-modal">
                                            <option value="{{ $siswa->id_kelas }}">Default: {{ $siswa->Kelas->nama_kelas }} | {{ $siswa->Kelas->jurusan }}</option>
                                            @foreach ($kelas as $k)
                                                <option value="{{ $k->id }}">{{ $k->nama_kelas }} | {{ $k->jurusan }}</option>
                                            @endforeach
                                        </select>
                                        @error('kelas')
                                            <p class="text-danger timeout">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>
                        
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="no_telp">No Telp</label>
                                        <input class="form-control" type="text" value="{{ $siswa->no_telp }}" name="no_telp" placeholder="{{ $siswa->no_telp }}">
                                        @error('no_telp')
                                            <p class="text-danger timeout">* {{ $message }}</p>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="poin">Poin</label>
                                        <input readonly class="form-control" type="text" value="{{ $siswa->poin }}" name="poin" id="poin" placeholder="Poin">
                                        @error('poin')
                                            <p class="text-danger timeout">* {{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="alamat">Alamat</label>
                                        <textarea class="form-control" name="alamat" placeholder="{{ $siswa->alamat }}" rows="6" cols="100%">{{ $siswa->alamat }}</textarea>
                                        @error('alamat')
                                            <p class="text-danger timeout">* {{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <a href="{{ route('siswa.index') }}" type="button" class="btn btn-secondary">Kembali</a>
                                <button type="submit" class="btn btn-primary">Simpan</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection