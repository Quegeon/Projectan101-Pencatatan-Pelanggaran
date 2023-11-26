@extends('layouts.master')
@section('title', 'Kelas')
@section('content')
<div class="page-inner">
    <div class="page-header">
        <h4 class="page-title">Edit Data Kelas</h4>
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
                        <form action="{{ route('kelas.update', $kelas->id) }}" method="POST" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            <div class="form-group">
                                <label for="">Nama Kelas</label>
                                <input class="form-control" type="text" name="nama_kelas" value="{{$kelas->nama_kelas}}" id="nama"  placeholder="Nama Petugas">
                            </div>
                            <div class="form-group">
                                <label for="">Jurusan</label>
                                <input class="form-control" type="text" name="jurusan" value="{{$kelas->jurusan}}" id="nama" placeholder="Nama Petugas">
                            </div>
                            <button type="submit" class="btn btn-primary mr-2">Submit</button>
                        <a href="/admin/kelas" class="btn btn-light">Cancel</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection