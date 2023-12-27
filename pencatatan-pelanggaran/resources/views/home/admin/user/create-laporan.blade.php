@extends('layouts.master')
@section('title', 'Laporan Petugas')
@section('content')
<div class="page-inner">
    <div class="page-header">
        <h4 class="page-title">Laporan Petugas</h4>
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
                        <form action="{{ route('laporan.store') }}" method="POST">
                            {{ csrf_field() }}
                            <div class="form-group">
                                <label for="">Siswa</label>
                                <input list="siswa" type="text" name="nis" class="form-control" placeholder="Masukkan Nama Siswa">
                                <datalist id="siswa">
                                    @foreach ($siswa as $s)
                                        <option value="{{ $s->nis }}">{{ $s->nama }} | {{ $s->Kelas->nama_kelas }}</option>
                                    @endforeach
                                </datalist>
                                @error('nis')
                                    <p class="text-danger">* {{ $errors->first('nis') }}</p>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="">Keterangan</label>
                                <input type="text" name="keterangan" placeholder="Masukkan Keterangan" class="form-control">
                                @error('keterangan')
                                    <p class="text-danger">* {{ $errors->first('keterangan') }}</p>
                                @enderror
                            </div>
                            <button type="submit" class="btn btn-primary mr-2">Simpan</button>
                            <a href="{{ route('dashboard') }}" class="btn btn-secondary">Batal</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection