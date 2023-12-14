@extends('layouts.master')
@section('title', 'Siswa')
@section('content')
<div class="page-inner">
    <div class="page-header">
        <h4 class="page-title">Data Siswa</h4>
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
                    <a href=" " class="btn btn-primary mb-2 ml-3" data-toggle="modal" data-target="#modalCreate">Tambah Data</a>
                    <div class="table-responsive">
                        <table id="basic-datatables" class="display table table-striped table-hover" >
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nis</th>
                                    <th>Kelas</th>
                                    <th>Nama</th>
                                    <th>No Telp</th>
                                    <th>Poin</th>
                                    <th>Status</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($siswa as $s)
                                <tr>
                                    <td>{{$loop->iteration}}</td>
                                    <td>{{$s->nis}}</td>
                                    <td>{{$s->Kelas->nama_kelas}} | {{$s->Kelas->jurusan}}</td>
                                    <td>{{$s->nama}}</td>
                                    <td>{{$s->no_telp}}</td>
                                    <td>{{$s->poin}}</td>
                                    <td>{{$s->status}}</td>
                                    <td align="center" colspan="3">
                                        <a href="{{ route('siswa.edit', (string) $s->nis) }}" class="fa fa-edit" style="margin-right: 20%;"></a>
                                        <a onclick="confirmDel('{{ route('siswa.destroy', $s->nis) }}')" class="fa fa-trash text-danger"></a>
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
                <form action="{{ route('siswa.store') }}" method="POST" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="nis">NIS</label>
                                <input class="form-control" type="text" name="nis" id="nis" placeholder="NIS">
                                @error('nis')
                                <div class="alert alert-danger alert-dismisible fade show" role="alert">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="nama">Nama</label>
                                <input class="form-control" type="text" name="nama" id="nama" placeholder="Nama siswa">
                                @error('nama')
                                <div class="alert alert-danger alert-dismisible fade show" role="alert">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="kelas">Kelas</label>
                                <select name="id_kelas" id="kelas" class="select-search">
                                    @foreach ($kelas as $k)
                                        <option value="{{ $k->id }}">{{ $k->nama_kelas }} | {{ $k->jurusan }}</option>
                                    @endforeach
                                </select>
                                @error('id_kelas')
                                <div class="alert alert-danger alert-dismisible fade show" role="alert">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="no_telp">No Telp</label>
                                <input class="form-control" type="text" name="no_telp" id="no_telp" placeholder="No Telp Siswa">
                                @error('no_telp')
                                <div class="alert alert-danger alert-dismisible fade show" role="alert">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="alamat">Alamat</label>
                                <textarea class="form-control" name="alamat" id="alamat" placeholder="Alamat Siswa" rows="4"></textarea>
                                @error('alamat')
                                <div class="alert alert-danger alert-dismisible fade show" role="alert">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save changes</button>
                    </div>
                </form>

            </div>
        </div>
    </div>
</div>
@endsection
