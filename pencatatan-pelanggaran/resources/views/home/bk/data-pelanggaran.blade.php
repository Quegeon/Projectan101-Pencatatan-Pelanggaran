
@extends('layouts.master')
@section('title', 'Data Pelanggaran')
@section('content')
<div class="page-inner">
    <div class="page-header">
        <h4 class="page-title">Data Pelanggaran</h4>
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
                    <div class="table-responsive">
                        <table id="basic-datatables" class="display table table-striped table-hover" >
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Siswa</th>
                                    <th>Petugas</th>
                                    <th>Keterangan</th>
                                    <th>Status</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($pelanggaran as $k)
                                <tr>
                                    <td align="center">{{$loop->iteration}}</td>
                                    <td>{{$k->Siswa->nama}}</td>
                                    <td>{{$k->User->nama ?? '-'}}</td>
                                    <td>{{$k->keterangan}}</td>
                                    <td>{{$k->status}}</td>
                                    <td align="center" colspan="3">
                                        {{-- 13 --}}
                                        <a class="btn btn-primary text-white" href="{{ route('review.detail', $k->id) }}" data-toggle="tooltip" title="Detail"><i class="fas fa-info-circle "></i></a>
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


@endsection
