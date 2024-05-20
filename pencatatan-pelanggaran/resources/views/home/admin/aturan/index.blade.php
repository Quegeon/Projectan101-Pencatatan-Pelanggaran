@extends('layouts.master')
@section('title', 'Kelola Data Aturan')
@section('content')
    <div class="page-inner">
        <div class="page-header">
            <h4 class="page-title">Kelola Data Aturan</h4>
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
                        <a href="#" class="btn btn-primary mb-2 ml-3" data-toggle="modal" data-target="#modalCreate"><i
                                class="fa fa-plus mr-2"></i>Tambah Data</a>
                        <div class="table-responsive">
                            <table id="basic-datatables" class="display table table-striped table-hover">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Jenis</th>
                                        <th>Nama Aturan</th>
                                        <th>Poin</th>
                                        <th>Hukuman</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($aturan as $a)
                                        <tr>
                                            <td align="center">{{ $loop->iteration }}</td>
                                            <td>{{ $a->Jenis->nama_jenis }}</td>
                                            <td>{{ $a->nama_aturan }}</td>
                                            <td align="center">{{ $a->poin }}</td>
                                            <td>{{ $a->Hukuman->hukuman }}</td>
                                            <td align="center" colspan="3">
                                                <a href="{{ route('aturan.edit', $a->id) }}" class="btn btn-link"
                                                    data-toggle="tooltip" title="Edit">
                                                    <i class="fa fa-edit fa-lg"></i>
                                                </a>
                                                <a class="btn btn-link"
                                                    onclick="confirmDel('{{ route('aturan.destroy', $a->id) }}')" data-toggle="tooltip" title="Hapus">
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

    <div class="modal fade" id="modalCreate" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Tambah Data</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('aturan.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label>Nama Aturan</label>
                            <input type="text" name="nama_aturan" class="form-control"
                                placeholder="Masukkan Nama Aturan">
                            @error('nama_aturan')
                                <p class="text-danger timeout">* {{ $message }}</p>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Jenis</label>
                            <select name="id_jenis" class="select-search">
                                <option></option>
                                @foreach ($jenis as $j)
                                    <option value="{{ $j->id }}">{{ $j->nama_jenis }}</option>
                                @endforeach
                            </select>
                            @error('id_jenis')
                                <p class="text-danger timeout">* {{ $message }}</p>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Hukuman</label>
                            <select class="select-search" name="id_hukuman">
                                <option></option>
                                @foreach ($hukuman as $h)
                                    <option value="{{ $h->id }}">{{ $h->hukuman }}</option>
                                @endforeach
                            </select>
                            @error('id_jenis')
                                <p class="text-danger timeout">* {{ $message }}</p>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Poin</label>
                            <input type="text" name="poin" class="form-control" placeholder="Masukkan Poin Aturan">
                            @error('poin')
                                <p class="text-danger timeout">* {{ $message }}</p>
                            @enderror
                        </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal"><i
                            class="fa fa-ban mr-2"></i>Kembali</button>
                    <button type="submit" class="btn btn-primary"><i class="fa fa-save mr-2"></i>Simpan</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
