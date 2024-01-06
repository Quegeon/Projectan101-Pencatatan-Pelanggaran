
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
                    <div class="table-responsive">
                        <table id="basic-datatables" class="display table table-striped table-hover">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nis</th>
                                    <th>Kelas</th>
                                    <th>Nama</th>
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
                                        <td>{{$s->poin}}</td>
                                        <td>{{$s->status}}</td>
                                        <td>
                                        <a href="{{ route('history', $s->nis)}}" class="btn btn-primary text-white" ></i> Detail</a>
                                    </td>
                                </tr>                            
                                <!-- Akhir modal -->
                                @endforeach
                            </tbody>
                          
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection
