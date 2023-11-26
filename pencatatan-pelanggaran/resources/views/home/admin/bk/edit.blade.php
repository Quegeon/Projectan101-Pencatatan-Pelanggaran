@extends('layouts.master')
@section('title', 'Bk')
@section('content')
<div class="page-inner">
    <div class="page-header">
        <h4 class="page-title">Data BK</h4>
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
                        <form action="{{ route('bk.update', $id) }}" method="POST" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            <div class="form-group">
                                <label for="">Nama</label>
                                <input class="form-control" type="text" name="nama" value="{{$bk->nama}}" id="nama" placeholder="Isi Nama">
                            </div>
                            <div class="form-group">
                                <label for="">Username</label>
                                <input class="form-control" type="text" name="username" value="{{$bk->username}}" id="username" placeholder="Username">
                            </div>
                            <div class="form-group">
                                <label for="">Password</label>
                                <input class="form-control" type="text" name="password" value="{{$bk->password}}" id="username" placeholder="Password">
                            </div>
                            <div class="form-group">
                                <label for="">Masukan foto</label>
                                <input type="file" class="form-control" name="foto">
                            </div>
                            <button type="submit" class="btn btn-primary mr-2">Submit</button>
                            <a href="/admin/user" class="btn btn-light">Cancel</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection