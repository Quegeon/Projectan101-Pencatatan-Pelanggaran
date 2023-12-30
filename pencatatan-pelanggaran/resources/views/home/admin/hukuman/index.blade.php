@extends('layouts.master')
@section('title', 'Kelola Data Hukuman')
@section('content')
    <div class="page-inner">
        <div class="page-header">
            <h4 class="page-title">Kelola Data Hukuman</h4>
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
                        <a href="#" class="btn btn-primary mb-2 ml-3" data-toggle="modal" data-target="#modalCreate"><i class="fa fa-plus mr-2"></i>Tambah Data</a>
                        <div class="table-responsive">
                            <table id="basic-datatables" class="display table table-striped table-hover" >
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Hukuman</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($hukuman as $h)
                                        <tr>
                                            <td align="center">{{ $loop->iteration }}</td>
                                            <td>{{ $h->hukuman }}</td>
                                            <td align="center" colspan="3">
                                                <a href="{{ route('hukuman.edit', $h->id) }}" class="btn btn-link">
                                                    <i class="fa fa-edit fa-lg"></i>
                                                </a>
                                                <a class="btn btn-link" onclick="confirmDel('{{ route('hukuman.destroy', $h->id) }}')">
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
                    <form action="{{ route('hukuman.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label>Hukuman</label>
                            <input class="form-control" type="text" name="hukuman" placeholder="Masukkan Hukuman">
                            @error('hukuman')
                                <p class="text-danger timeout">* {{ $message }}</p>
                            @enderror
                        </div>
                </div>
                <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fa fa-ban mr-2"></i>Kembali </button>
                        <button type="submit" class="btn btn-primary"><i class="fa fa-save mr-2"></i>Simpan</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection