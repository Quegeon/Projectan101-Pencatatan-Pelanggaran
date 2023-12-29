@extends('layouts.master')
@section('title', 'Pelanggaran')
@section('content')
<div class="page-inner">
    <div class="page-header">
        <h4 class="page-title">Edit Data Pelanggaran</h4>
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
                        <form action="{{ route('review.update', $pelanggaran->id) }}" method="POST" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            <div class="form-group">
                                <label for="">Siswa</label>
                                <select name="nis" class="select-search-no-modal" id="">
                                    <option value="{{ $pelanggaran->nis }}">default | {{ $pelanggaran->Siswa->nama }}</option>
                                    @foreach ($siswa as $s)
                                        <option value="{{ $s->nis }}">{{ $s->nama }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="">Keterangan</label>
                                <input type="text" name="keterangan" value="{{ $pelanggaran->keterangan }}" class="form-control">
                            </div>
                            <div class="form-group">
                                <input type="hidden" name="tgl_pelanggaran" value="{{ $pelanggaran->tgl_pelanggaran }}">
                            </div>
                            <a href="{{ route('review.inbox') }}" type="button" class="btn btn-secondary"><i class="fa fa-ban mr-2"></i>Kembali</a>
                            <button type="submit" class="btn btn-primary"><i class="fa fa-save mr-2"></i>Simpan Perubahan</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection