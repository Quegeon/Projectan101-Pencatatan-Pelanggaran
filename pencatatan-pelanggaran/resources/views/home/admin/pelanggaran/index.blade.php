@extends('layouts.master')
@section('title', 'Kelola Data Pelanggaran')
@section('content')
<div class="page-inner">
    <div class="page-header">
        <h4 class="page-title">Kelola Data Pelanggaran</h4>
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
                    <a href="#" class="btn btn-primary mb-2 ml-3" data-toggle="modal" data-target="#modalCreate"><i class="fa fa-plus mr-2"></i> Tambah Data</a>
                    <div class="table-responsive">
                        <table id="basic-datatables" class="display table table-striped table-hover" >
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Siswa</th>
                                    <th>Petugas</th>
                                    <th>Aturan</th>
                                    <th>Keterangan</th>
                                    <th>Status</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($pelanggaran as $k)
                                    <tr>
                                        <td align="center">{{$loop->iteration}}</td>
                                        <td>{{$k->Siswa->nama}}</td>
                                        <td>{{$k->User->nama}}</td>
                                        <td>{{ optional($k->Aturan)->nama_aturan ?? 'Kosong' }}</td>
                                        <td>{{$k->keterangan}}</td>
                                        <td>{{$k->status}}</td>
                                        <td align="center" colspan="3">
                                            <a href="{{ route('pelanggaran.edit', (string) $k->id) }}" class="btn btn-link">
                                                <i class="fa fa-edit fa-lg"></i>
                                            </a>
                                            <a href="{{ route('pelanggaran.destroy', (string) $k->id ) }}" class="btn btn-link">
                                                <i class="fa fa-trash text-danger fa-lg"></i>
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="modalCreate" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Data</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('pelanggaran.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Siswa</label>
                                <select name="nis" class="select-search">
                                    <option></option>
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
                                <select class="select-search" name="id_bk">
                                    <option></option>
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
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Aturan</label>
                                <select name="id_aturan" onchange="displayPoint({{ $aturan }}, this)" class="select-search">
                                    <option></option>
                                    @foreach ($aturan as $s)
                                        <option value="{{ $s->id }}">{{ $s->nama_aturan }}</option>
                                    @endforeach
                                </select>
                                @error('id_aturan')
                                    <p class="text-danger timeout">* {{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Keterangan</label>
                                <input type="text" name="keterangan" class="form-control" placeholder="Masukkan Keterangan">
                                @error('keterangan')
                                    <p class="text-danger timeout">* {{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Poin</label>
                                <input type="text" name="total_poin" id="poin" class="form-control" value="" readonly>
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
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fa fa-ban mr-2"></i>Kembali</button>
                <button type="submit" class="btn btn-primary"><i class="fa fa-save mr-2"></i>Simpan</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

