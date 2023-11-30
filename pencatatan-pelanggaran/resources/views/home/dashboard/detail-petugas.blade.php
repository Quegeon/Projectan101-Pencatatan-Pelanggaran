@extends('layouts.master')
@section('title', 'Pelanggaran')
@section('content')
<div class="page-inner">
    <div class="page-header">
        <h4 class="page-title">Detail Data pelanggaran</h4>
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
                        <form action="{{ route('pelanggaran.update', $pelanggaran->id) }}" method="POST" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="">Siswa</label>
                                        <select red name="nis" class="form-control" id="" disabled>
                                            <option value="{{ $pelanggaran->nis }}">default | {{ $pelanggaran->Siswa->nama }}</option>
                                            @foreach ($siswa as $s)
                                                <option value="{{ $s->nis }}">{{ $s->nama }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="">Aturan</label>
                                        <select name="id_aturan" onclick="anjay({{ $aturan }}, this)" class="form-control" id="" disabled>
                                            <option value="{{ $pelanggaran->id_aturan }}">default | {{ $pelanggaran->Aturan->nama_aturan }}</option>
                                            @foreach ($aturan as $s)
                                                <option value="{{ $s->id }}">{{ $s->nama_aturan }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="">Bk</label>
                                <select class="form-control" name="id_bk" id="" disabled>
                                    @foreach ($bk as $b)
                                        <option value="{{ $b->id }}">{{ $b->nama }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="">Keterangan</label>
                                <input readonly type="text" name="keterangan" value="{{ $pelanggaran->keterangan }}" class="form-control">
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="">Poin</label>
                                        <input readonly type="text" name="total_poin" value="{{ $pelanggaran->total_poin }}" id="poin" class="form-control" value="" readonly>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="">Status</label>
                                        <select class="form-control" name="status" id="" disabled>
                                            <option value="Belum">Belum di proses</option>
                                            <option value="Beres">Sudah di proses</option>
                                        </select>
                                    </div>
        
                                </div>
                            </div>
                            <div class="form-group">
                                <input type="hidden" name="tgl_pelanggaran" value="{{ $pelanggaran->tgl_pelanggaran }}">
                            </div>
                            <a href="{{ route('pelanggaran.edit', (string) $pelanggaran->id) }}" class="btn btn-warning">Edit</a>
                            <a href="{{ route('pelanggaran.destroy', (string) $pelanggaran->id) }}" class="btn btn-danger">Hapus</a>                            
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection