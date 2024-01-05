@extends('layouts.master')
@section('title', 'Edit Laporan Petugas')
@section('content')
<div class="page-inner">
    <div class="page-header">
        <h4 class="page-title">Edit Laporan Petugas</h4>
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
                        <form action="{{ route('laporan.update', $pelanggaran->id) }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label>Siswa</label>
                                <select name="nis" class="select-search-no-modal">
                                    <option value="{{ $pelanggaran->nis }}" selected>Default: {{ $pelanggaran->Siswa->nama }} | {{ $pelanggaran->Siswa->Kelas->nama_kelas }}</option>
                                    @foreach ($siswa as $s)
                                        <option value="{{ $s->nis }}">{{ $s->nama }} | {{ $s->Kelas->nama_kelas }}</option>                                        
                                    @endforeach
                                </select>
                                @error('nis')
                                    <p class="text-danger timeout">* {{ $message }}</p>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Aturan</label>
                                <select name="id_aturan" class="select-search-no-modal">
                                    <option value="{{ $tempaturan->id_aturan }}" selected>Default: {{ $tempaturan->Aturan->nama_aturan }}</option>
                                    @foreach ($aturan as $s)
                                        <option value="{{ $s->id }}">{{ $s->nama_aturan }}</option>                                        
                                    @endforeach
                                </select>
                                @error('id_aturan')
                                    <p class="text-danger timeout">* {{ $message }}</p>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Tanggal Pelanggaran</label>
                                <input type="date" name="tgl_pelanggaran" value="{{ $pelanggaran->tgl_pelanggaran }}" placeholder="{{ $pelanggaran->tgl_pelanggaran }}" class="form-control">
                                @error('tgl_pelanggaran')
                                    <p class="text-danger timeout">* {{ $message }}</p>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Keterangan</label>
                                <input type="text" name="keterangan" value="{{ $pelanggaran->keterangan }}" placeholder="{{ $pelanggaran->keterangan }}" class="form-control">
                                @error('keterangan')
                                    <p class="text-danger timeout">* {{ $message }}</p>
                                @enderror
                            </div>
                            <div class="modal-footer">
                                <a href="{{ route('dashboard') }}" class="btn btn-secondary"><i class="fa fa-ban mr-2"></i>Kembali</a>
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