@extends('layouts.master')
@section('title', 'Kelola Data Siswa')
@section('content')
    <div class="page-inner">
        <div class="page-header">
            <h4 class="page-title">Kelola Data Siswa</h4>
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
                                        <th>Nama</th>
                                        <th>Kelas</th>
                                        <th>No Telp</th>
                                        <th>Alamat</th>
                                        <th>Poin</th>
                                        <th>Status</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($siswa as $s)
                                        <tr>
                                            <td align="center">{{$loop->iteration}}</td>
                                            <td>{{$s->nis}}</td>
                                            <td>{{$s->nama}}</td>
                                            <td>{{$s->Kelas->nama_kelas}} | {{$s->Kelas->jurusan}}</td>
                                            <td>{{$s->no_telp}}</td>
                                            <td>{{ ($s->alamat) ?? 'Kosong' }}</td>
                                            <td align="center">{{$s->poin}}</td>
                                            <td>{{$s->status}}</td>
                                            <td align="center" colspan="3">
                                                <a href="{{ route('siswa.edit', (string) $s->nis) }}" class="btn btn-link">
                                                    <i class="fa fa-edit fa-lg"></i>
                                                </a>
                                                <a class="btn btn-link" onclick="confirmDel('{{ route('siswa.destroy', $s->nis) }}')">
                                                    <i  class="fa fa-trash text-danger fa-lg"></i>
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
                    <form action="{{ route('siswa.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>NIS</label>
                                    <input class="form-control" type="text" name="nis" placeholder="Masukkan NIS">
                                    @error('nis')
                                        <p class="text-danger timeout">* {{ $message }}</p>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="no_telp">No Telp</label>
                                    <input class="form-control" type="text" name="no_telp" id="no_telp" placeholder="Masukkan No Telp">
                                    @error('no_telp')
                                        <p class="text-danger timeout">* {{ $message }}</p>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Nama</label>
                                    <input class="form-control" type="text" name="nama" placeholder="Masukkan Nama Siswa">
                                    @error('nama')
                                        <p class="text-danger timeout">* {{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="kelas">Kelas</label>
                                    <select name="id_kelas" class="select-search">
                                        @foreach ($kelas as $k)
                                            <option value="{{ $k->id }}">{{ $k->nama_kelas }} | {{ $k->jurusan }}</option>
                                        @endforeach
                                    </select>
                                    @error('id_kelas')
                                        <p class="text-danger timeout">* {{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="alamat">Alamat</label>
                                    <textarea class="form-control" name="alamat" id="alamat" placeholder="Masukkan Alamat" rows="4"></textarea>
                                    @if ($errors->first('alamat'))
                                        @error('alamat')
                                            <p class="text-danger timeout">* {{ $message }}</p>
                                        @enderror
                                    @else
                                        <p class="text-mute">* Optional</p>
                                    @endif
                                </div>
                            </div>
                        </div>
                </div>
                <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Kembali</button>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
                    </form>
            </div>
        </div>
    </div>
@endsection
