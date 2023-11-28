@extends('layouts.master')
@section('title', 'Kelola Jenis')
@section('content')
<div class="page-inner">
    <div class="page-header">
        <h4 class="page-title">Kelola Data Jenis</h4>
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
                    <a href="#" class="btn btn-primary mb-2 ml-3" data-toggle="modal" data-target="#modalCreate">Tambah Data</a>
                    <div class="table-responsive">
                        <table id="basic-datatables" class="display table table-striped table-hover" >
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama Jenis</th>
                                    <th>Keterngan</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($jenis as $j)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $j->nama_jenis }}</td>
                                    <td>{{ $j->keterangan }}</td>
                                    <td>
                                        <a href="{{ route('jenis.edit', $j->id) }}" class="btn btn-link">
                                            <i class="fa fa-edit fa-lg"></i>
                                        </a>
                                        <a class="btn btn-link" onclick="confirmDel('{{ route('jenis.destroy', $j->id) }}')">
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

<!-- Modal -->
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
                <form action="{{ route('jenis.store') }}" method="POST" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label>Nama Jenis</label>
                        <input class="form-control" type="text" name="nama_jenis" placeholder="Masukkan Nama Jenis">
                        @if($errors->first('nama_jenis'))
                            <p class="text-danger">* {{ $errors->first('nama_jenis') }}</p>
                        @endif
                    </div>
                    <div class="form-group">
                        <label>Keterangan</label>
                        <input class="form-control" type="text" name="keterangan" placeholder="Masukkan Keterangan">
                        @if($errors->first('keterangan'))
                            <p class="text-danger">* {{ $errors->first('keterangan') }}</p>
                        @endif
                    </div>
            </div>
            <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection