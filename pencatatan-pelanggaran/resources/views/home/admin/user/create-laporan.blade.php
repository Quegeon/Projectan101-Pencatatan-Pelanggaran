@extends('layouts.master')
@section('title', 'Laporan Petugas')
@section('content')
<div class="page-inner">
    <div class="page-header">
        <h4 class="page-title">Laporan Petugas</h4>
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
                        <form action="{{ route('laporan.store') }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label>Siswa</label>
                                <select name="nis" class="select-search-no-modal">
                                    <option></option>
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
                                    <option></option>
                                    @foreach ($aturan as $s)
                                        <option value="{{ $s->id }}">{{ $s->nama_aturan }}</option>                                        
                                    @endforeach
                                </select>
                                @error('id_aturan')
                                    <p class="text-danger timeout">* {{ $message }}</p>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Keterangan</label>
                                <input type="text" name="keterangan" placeholder="Masukkan Keterangan" class="form-control">
                                @error('keterangan')
                                    <p class="text-danger timeout">* {{ $message }}</p>
                                @enderror
                            </div>

                            <div class="form-group">
                                <input type="hidden" name="no_pelanggaran" value="{{ $no_pelanggaran }}">
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