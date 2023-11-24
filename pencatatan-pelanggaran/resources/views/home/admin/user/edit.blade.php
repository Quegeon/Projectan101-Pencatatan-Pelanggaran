@extends('layouts.master')
@section('title', 'User')
@section('content')
<div class="page-inner">
    <div class="page-header">
        <h4 class="page-title">Data Users</h4>
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
                    <div class="table-responsive">
                        <form action="#" method="POST" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            <div class="form-group">
                                <label for="">Nama Petugas</label>
                                <input class="form-control" type="text" name="nama" value="{{$user->nama}}" id="nama" placeholder="Isi Nama Petugas">
                            </div>
                            <div class="form-group">
                                <label for="">Username</label>
                                <input class="form-control" type="text" name="username" value="{{$user->username}}" id="username" placeholder="Username">
                            </div>
                            <div class="form-group">
                                <label for="">Password</label>
                                <input class="form-control" type="text" name="password" value="{{$user->password}}" id="password" placeholder="Password">
                            </div>
                            <div class="form-group">
                                <label for="">Level</label>
                                <input class="form-control" type="text" name="level" value="{{$user->level}}" id="level" placeholder="Level">
                            </div>
                            {{--foto belum ditambahkan 
                                <div class="form-group">
                                <label for="">Level</label>
                                <input class="form-control" type="text" name="level" id="username" placeholder="Nama Petugas">
                            </div> --}}
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection