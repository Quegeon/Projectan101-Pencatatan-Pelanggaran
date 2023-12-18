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
            <a href="#" class="card-link"> 
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
            <a href="#" class="card-link"> 
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
                            <a href="#" class="btn btn-info btn-border btn-round btn-sm">
                                <span class="btn-label">
                                    <i class="fa fa-print"></i>
                                </span>
                                Print
                            </a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <table id="basic-datatables" class="display table table-striped table-hover" >
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Siswa</th>
                                <th>Petugas</th>
                                <th>Aturan</th>
                                <th>Keterangan</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($history as $h)
                            <tr>
                                <td>{{$loop->iteration}}</td>
                                <td>{{$h->Siswa->nama}}</td>
                                <td>{{$h->User->nama}}</td>
                                <td>{{$h->Aturan->nama_aturan}}</td>
                                <td>{{$h->keterangan}}</td>
                                <td>{{$h->status}}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div class="chart-container" style="min-height: 375px">
                        <canvas id="statisticsChart">
                        </canvas>
                    </div>
                    <div id="myChartLegend"></div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection