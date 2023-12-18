@extends('layouts.master')
@section('title', 'Kelola Data Petugas')
@section('content')
    <div class="page-inner">
        <div class="page-header">
            <h4 class="page-title">Kelola Data Petugas</h4>
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
                                        <th>Foto</th>
                                        <th>Nama Petugas</th>
                                        <th>Username</th>
                                        <th>Level</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($user as $u)
                                        <tr>
                                            <td>{{$loop->iteration}}</td>
                                            <td>
                                                <img src="{{asset('fotopetugas/'.$u->foto)}}" alt="{{ $u->foto }}" style="width:60px; height:80px;">
                                            </td>
                                            <td>{{$u->nama}}</td>
                                            <td>{{$u->username}}</td>
                                            <td>{{$u->level}}</td>
                                            <td>
                                                <a href="{{ route('petugas.edit', $u->id) }}" class="btn btn-link">
                                                    <i class="fa fa-edit fa-lg"></i>
                                                </a>
                                                <a class="btn btn-link" onclick="confirmDel('{{ route('petugas.destroy', $u->id) }}')">
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
                    <form action="{{ route('petugas.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="">Nama Petugas</label>
                            <input class="form-control" type="text" name="nama" placeholder="Masukkan Nama Petugas">
                            @error('nama')
                                <p class="text-danger timeout">* {{ $message }}</p>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="">Username</label>
                            <input class="form-control" type="text" name="username" placeholder="Masukkan Username">
                            @error('username')
                                <p class="text-danger timeout">* {{ $message }}</p>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="">Password</label>
                            <input class="form-control" type="password" name="password" placeholder="Masukkan Password">
                            @error('password')
                                <p class="text-danger timeout">* {{ $message }}</p>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="">Level</label>
                            <select name="level" class="form-control">
                                <option value="Admin">Admin</option>
                                <option value="Petugas">Petugas</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="">Masukan foto</label>
                            <input type="file" id="image" class="form-control" name="foto" onchange="imagePreview()">
                        </div>
                        <center>
                            <img class="img-preview img-fluid" style="display: none; justify:center" height="200" width="200px">
                        </center>
                </div>
                <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Kembali</button>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection