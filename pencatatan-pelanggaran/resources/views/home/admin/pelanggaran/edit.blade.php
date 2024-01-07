@extends('layouts.master')
@section('title', 'Edit Data Pelanggaran')
@section('content')
    <div class="page-inner">
        <div class="page-header">
            <h4 class="page-title">Edit Data Pelanggaran</h4>
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
                            <form action="{{ route('pelanggaran.update', $pelanggaran->id) }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Siswa</label>
                                            <select name="nis" class="select-search-no-modal">
                                                <option value="{{ $pelanggaran->nis }}" selected>Default: {{ $pelanggaran->Siswa->nama }}</option>
                                                @foreach ($siswa as $s)
                                                    <option value="{{ $s->nis }}">{{ $s->nama }}</option>
                                                @endforeach
                                            </select>
                                            @error('nis')
                                                <p class="text-danger timeout">* {{ $message }}</p>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>BK</label>
                                            <select class="select-search-no-modal" name="id_bk">
                                                <option value="{{ $pelanggaran->id_bk }}" selected>Default: {{ $pelanggaran->Bk->nama }}</option>
                                                @foreach ($bk as $b)
                                                    <option value="{{ $b->id }}">{{ $b->nama }}</option>
                                                @endforeach
                                            </select>
                                            @error('id_bk')
                                                <p class="text-danger timeout">* {{ $message }}</p>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Aturan</label>
                                            <select name="id_aturan" onchange="displayPoint({{ $aturan }}, this)" class="select-search-no-modal">
                                                <option value="{{ $pelanggaran->id_aturan }}" selected>Default: {{ optional($pelanggaran->Aturan)->nama_aturan ?? "Kosong" }}</option>
                                                @foreach ($aturan as $s)
                                                    <option value="{{ $s->id }}">{{ $s->nama_aturan }}</option>
                                                @endforeach
                                            </select>
                                            @error('id_aturan')
                                                <p class="text-danger timeout">* {{ $message }}</p>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Poin</label>
                                            <input type="text" name="total_poin" value="{{ $pelanggaran->total_poin }}" id="poin" class="form-control" value="" readonly>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>Keterangan</label>
                                            <input type="text" name="keterangan" value="{{ $pelanggaran->keterangan }}" class="form-control">
                                            @error('keterangan')
                                                <p class="text-danger timeout">* {{ $message }}</p>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Tanggal Pelanggaran</label>
                                            <input type="date" class="form-control" name="tgl_pelanggaran" value="{{ $pelanggaran->tgl_pelanggaran }}" placeholder="{{ $pelanggaran->tgl_pelanggaran }}">
                                            @error('tgl_pelanggaran')
                                                <p class="text-danger timeout">* {{ $message }}</p>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Status</label>
                                            <select class="form-control" name="status">
                                                <option value="Belum">Belum di proses</option>
                                                <option value="Beres">Sudah di proses</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <a href="{{ route('pelanggaran.index') }}" class="btn btn-secondary"><i class="fa fa-ban mr-2"></i>Kembali</a>
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