@extends('layouts.master')
@section('title', 'Kelas')
@section('content')
<div class="page-inner">
    <div class="page-header">
        <h4 class="page-title">Data Kelas</h4>
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
<<<<<<< HEAD:pencatatan-pelanggaran/resources/views/home/admin/users/index.blade.php
                                    <th>ID</th>
                                    <th>Nama</th>
                                    <th>Username</th>
                                    <th>Level</th>
                                    <th>Foto</th>
                                    <th>Waktu Daftar</th>
                                </tr>
                            </thead>
                            <tbody>
                               @foreach ($user as $u)
                                <tr>
                                    <td>{{$u->id}}</td>
                                    <td>{{$u->nama}}</td>
                                    <td>{{$u->username}}</td>
                                    <td>{{$u->level}}</td>
                                    <td>{{$u->foto}}</td>
                                    <td>{{$u->created_at}}</td>
                                </tr>
                               @endforeach
=======
                                    <th>No</th>
                                    <th>Nama Kelas</th>
                                    <th>Jurusan</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($kelas as $k)
                                <tr>
                                    <td>{{$loop->iteration}}</td>
                                    <td>{{$k->nama_kelas}}</td>
                                    <td>{{$k->jurusan}}</td>
                                    <td>
                                        <a href="{{ route('kelas.edit', $k->id) }}" class="fa fa-edit"></a>
                                        <a href="/kelas/destroy/{{$k->id}}" class="btn btn-link" class="fa fa-delete"></a>
                                    </td>
                                </tr>
                                @endforeach
>>>>>>> main:pencatatan-pelanggaran/resources/views/home/admin/kelas/index.blade.php
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
<<<<<<< HEAD:pencatatan-pelanggaran/resources/views/home/admin/users/index.blade.php
                <form action="/user/tambah" method="POST" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label for="">Nama</label>
                        <input class="form-control" type="text" name="nama" id="nama" placeholder="Nama">
                    </div>
                    <div class="form-group">
                        <label for="">Username</label>
                        <input class="form-control" type="text" name="username" id="username" placeholder="Username">
                    </div>
                    <div class="form-group">
                        <label for="">Password</label>
                        <input class="form-control" type="password" name="password" id="username" placeholder="Passowrd">
                    </div>
                    <div class="form-group">
                        <label for="">Level</label>
                        <input class="form-control" type="text" name="level" id="level" placeholder="Level">
                    </div>
                    <div class="form-group">
                        <label for="">Foto</label>
                        <input class="form-control" type="text" name="foto" id="foto" placeholder="foto">
=======
                <form action="kelas/simpan" method="POST" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label for="">Nama Kelas</label>
                        <input class="form-control" type="text" name="nama_kelas" id="nama" placeholder="Nama Kelas">
                    </div>
                    <div class="form-group">
                        <label for="">Jurusan</label>
                        <input class="form-control" type="text" name="jurusan" id="nama" placeholder="Jurusan">
>>>>>>> main:pencatatan-pelanggaran/resources/views/home/admin/kelas/index.blade.php
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Save changes</button>
            </form>
            </div>
        </div>
    </div>
</div>
@endsection