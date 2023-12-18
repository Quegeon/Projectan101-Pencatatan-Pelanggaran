@extends('layouts.master')
@section('title', 'Kelola Data BK')
@section('content')
    <div class="page-inner">
        <div class="page-header">
            <h4 class="page-title">Kelola Data BK</h4>
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
                                        <th>Nama</th>
                                        <th>Username</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($bk as $b)
                                        <tr>
                                            <td>{{$loop->iteration}}</td>
                                            <td>
                                                <img src="{{asset('fotobk/'.$b->foto)}}" alt="{{ $b->foto }}" style="width:60px; height:80px;">
                                            </td>
                                            <td>{{$b->nama}}</td>
                                            <td>{{$b->username}}</td>
                                            <td>
                                                <a href="{{ route('bk.edit', $b->id) }}" class="btn btn-link">
                                                    <i class="fa fa-edit fa-lg"></i>
                                                </a>
                                                <a class="btn btn-link" onclick="confirmDel('{{ route('bk.destroy', $b->id) }}')">
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
                    <form action="{{ route('bk.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label>Nama</label>
                            <input class="form-control" type="text" name="nama" placeholder="Masukkan Nama">
                            @error('nama')
                                <p class="text-danger timeout">* {{ $message }}</p>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Username</label>
                            <input class="form-control" type="text" name="username" placeholder="Masukkan Username">
                            @error('username')
                                <p class="text-danger timeout">* {{ $message }}</p>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Password</label>
                            <input class="form-control" type="password" name="password" placeholder="Masukkan Password">
                            @error('password')
                                <p class="text-danger timeout">* {{ $message }}</p>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Foto</label>
                            <input type="file" id="image" class="form-control" name="foto" onchange="imagePreview()">
                            @error('foto')
                                <p class="text-danger timeout">* {{ $message }}</p>
                            @enderror
                        </div>
                        <center>
                            <img class="img-preview img-fluid " style="display: none; justify:center" height="200" width="200px">
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