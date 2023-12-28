@extends('layouts.master')
@section('title', 'Dashboard')
@section('content')
<div class="page-inner">
    <div class="page-header">
        <h4 class="page-title">Dashboard</h4>
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
    <style>
        .card-link:hover {
        text-decoration: none;
        }
        .card-round:hover {
            transform: scale(1.05);
            transition: transform 0.3s ease-in-out;
        }
    
        /* Pilihan tambahan: Efek bayangan saat hover */
        .card-round:hover {
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
    </style>

    <div class="row">
        <div class="col-sm-6 col-md-3">
            <div class="card card-stats card-round">
            <a href="{{ route('view_siswa') }}" class="card-link"> 
                <div class="card-body ">
                    <div class="row align-items-center">
                        <div class="col-icon">
                            <div class="icon-big text-center icon-primary bubble-shadow-small">
                                <i class="fas fa-users"></i>
                            </div>
                        </div>
                        <div class="col col-stats ml-3 ml-sm-0">
                            <div class="numbers">
                                <p class="card-category">Jumlah Siswa</p>
                                <h4 class="card-title">{{$count_siswa}}</h4>
                            </div>
                        </div>
                    </div>
                </div>
            </a>
            </div>
        </div>
        <div class="col-sm-6 col-md-3">
            <div class="card card-stats card-round">
            <a href="{{ route('view_aturan') }}" class="card-link"> 
                <div class="card-body">
                    <div class="row align-items-center">
                        <div class="col-icon">
                            <div class="icon-big text-center icon-info bubble-shadow-small">
                                <i class="far fa-newspaper"></i>
                            </div>
                        </div>
                        <div class="col col-stats ml-3 ml-sm-0">
                            <div class="numbers">
                                <p class="card-category">Jumlah Aturan</p>
                                <h4 class="card-title">{{$count_aturan}}</h4>
                            </div>
                        </div>
                    </div>
                </div>
            </a>
            </div>
        </div>
        <div class="col-sm-6 col-md-3">
            <div class="card card-stats card-round">
            <a href="#" class="card-link"> 
                <div class="card-body">
                    <div class="row align-items-center">
                        <div class="col-icon">
                            <div class="icon-big text-center icon-success bubble-shadow-small">
                                <i class="far fa-chart-bar"></i>
                            </div>
                        </div>
                        <div class="col col-stats ml-3 ml-sm-0">
                            <div class="numbers">
                                <p class="card-category">
                                    Inbox
                                    @if ($count_inbox !== null)
                                        <span class="badge badge-count badge-danger ml-1">{{ $count_inbox }}</span>
                                    @endif
                                </p>
                                <h4 class="card-title"></h4>
                            </div>
                        </div>
                    </div>
                </div>
            </a>
            </div>
        </div>
        {{-- <div class="col-sm-6 col-md-3">
            <div class="card card-stats card-round">
                <div class="card-body">
                    <div class="row">
                </div> align-items-center">
                        <div class="col-icon">
                            <div class="icon-big text-center icon-success bubble-shadow-small">
                                <i class="far fa-chart-bar"></i>
                            </div>
                        </div>
                        <div class="col col-stats ml-3 ml-sm-0">
                            <div class="numbers">
                                <p class="card-category">
                                    Inbox
                                    @if ($count_inbox !== null)
                                        <span class="badge badge-count badge-danger ml-1">{{ $count_inbox }}</span>
                                    @endif
                                </p>
                                <h4 class="card-title"></h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div> --}}
        <div class="col-sm-6 col-md-3">
            <div class="card card-stats card-round">

                <div class="card-body">
                    <div class="row align-items-center">
                        <div class="col-icon">
                            <div class="icon-big text-center icon-secondary bubble-shadow-small">
                                <i class="far fa-check-circle"></i>
                            </div>
                        </div>
                        <div class="col col-stats ml-3 ml-sm-0">
                            <div class="numbers">
                                <p class="card-category">Pelanggaran Bulan Ini</p>
                                <h4 class="card-title">{{ $total_bulan }}</h4>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="card-head-row">
                        <div class="card-title">Histori Pelanggaran</div>
                        <div class="card-tools">
                            <a href="#" class="btn btn-info btn-border btn-round btn-sm mr-2">
                                <span class="btn-label">
                                    <i class="fa fa-pencil"></i>
                                </span>
                                Export
                            </a>
                            <a href="{{ route('printbk') }}" target="_blank" class="btn btn-info btn-border btn-round btn-sm">
                                <span class="btn-label">
                                    <i class="fa fa-print"></i>
                                </span>
                                Print
                            </a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    {{-- <a href=" " class="btn btn-primary mb-2 ml-3" data-toggle="modal" data-target="#modalCreate"><i class="fa fa-plus"></i> Tambah Data</a> --}}
                    <div class="table-responsive">
                        <table id="basic-datatables" class="display table table-striped table-hover" >
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Siswa</th>
                                    <th>Petugas</th>
                                    <th>Aturan</th>
                                    <th>Keterangan</th>
                                    <th>Status</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($history as $k)
                                <tr>
                                    <td align="center">{{$loop->iteration}}</td>
                                    <td>{{$k->Siswa->nama}}</td>
                                    <td>{{$k->User->nama}}</td>
                                    <td>{{$k->Aturan->nama_aturan}}</td>
                                    <td>{{$k->keterangan}}</td>
                                    <td>{{$k->status}}</td>
                                    <td align="center" colspan="3">
                                        <a class="btn btn-primary text-white" data-target="#{{ $k->id }}" data-toggle="modal"><i class="fas fa-info-circle mr-2"></i> Detail</a>
                                        <a target="_blank" class="btn btn-success" href="{{ route('receipt', ['id' => $k->id]) }}"><i class="fa fa-print"></i></a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div> 
                </div>
            </div>
        </div
    </div>      
</div>

<!-- Modal history -->
@foreach ($history as $p)
<div class="modal fade" id="{{ $p->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Preview Data</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="">Siswa</label>
                            <input type="text" class="form-control" value="{{ $p->Siswa->nama }}" readonly>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="">Aturan</label>
                            <input type="text" class="form-control" value="{{ $p->Aturan->nama_aturan }}" readonly>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label for="">Keterangan</label>
                    <input type="text" name="keterangan" class="form-control" value="{{ $p->keterangan }}" readonly>
                </div>
                <div class="form-group">
                    <label for="">Poin</label>
                    <input type="text" name="total_poin" id="poin" class="form-control" value="{{ $p->total_poin }}" readonly>
                </div>
                <div class="form-group">
                    <input type="hidden" name="tgl_pelanggaran" value="{{ date('Y-m-d') }}">
                </div>
            </div>
            {{-- <div class="modal-footer">
                <a href="{{ route('review.edit', $p->id) }}" class="btn btn-secondary"><i class="fa fa-edit"></i></a>
                <a onclick="confirmDel(`{{ route('review.destroy', $p->id) }}`)" class="btn btn-secondary text-white"><i class="fa fa-trash"></i></a>
            </div> --}}
            <div class="modal-footer">
                <button type="button" data-dismiss="modal" class="btn btn-secondary"><i class="fas fa-undo-alt mr-2"></i> Tutup</button>
            </div>
        </div>
    </div>
</div>
@endforeach
@endsection