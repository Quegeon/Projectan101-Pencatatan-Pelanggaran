@extends('layouts.master')
@section('title', 'Dashboard')
@section('content')
@if (Auth()->User()->level == "Petugas")
<div class="page-inner">
    <div class="page-header">
        <h4 class="page-title">Dashboard</h4>
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
        <div class="col-sm-6 col-md-3">
            <div class="card card-stats card-round">
                <div class="card-body ">
                    <div class="row align-items-center">
                        <div class="col-icon">
                            <div class="icon-big text-center icon-primary bubble-shadow-small">
                                <i class="fas fa-users"></i>
                            </div>
                        </div>
                        <div class="col col-stats ml-3 ml-sm-0">
                            <div class="numbers">
                                <p class="card-category">Jumlah Pelanggaran</p>
                                <h4 class="card-title">{{ $total_bulan_petugas }}</h4>
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
                        <div class="card-title">Histori Pelaporan Pelanggaran</div>
                        <div class="card-tools">
                        
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
                                <th>Status</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($pelanggaran_petugas as $k)
                            <tr>
                                <td align="center">{{$loop->iteration}}</td>
                                <td>{{$k->Siswa->nama}}</td>
                                <td>{{$k->User->nama}}</td>
                                <td>{{$k->status}}</td>
                                <td align="center" colspan="3">
                                    <a class="btn btn-primary text-white" data-target="#{{ $k->id }}" data-toggle="modal"><i class="fa fa-info-circle mr-2"></i> Detail</a>
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

@foreach ($pelanggaran_petugas as $p)
<div class="modal fade" id="{{ $p->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Detail Data</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label>Siswa</label>
                            <input type="text" class="form-control" value="{{ $p->nis }} | {{ $p->Siswa->nama }} | {{ $p->Siswa->Kelas->nama_kelas }}" readonly>    
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Petugas</label>
                            <input type="text" class="form-control" value="{{ $p->User->nama }}" readonly>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Tanggal Pelanggaran</label>
                            <input type="text" class="form-control" value="{{ $p->tgl_pelanggaran }}" readonly>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label>Keterangan</label>
                            <input type="text" class="form-control" value="{{ $p->keterangan }}" readonly>    
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <a href="{{ route('laporan.edit', (string) $p->id) }}" class="btn btn-primary"><i class="fa fa-edit"></i></a>
                <a  onclick="confirmDel('{{ route('laporan.destroy',  (string) $p->id) }}')" class="btn btn-danger text-white"><i class="fa fa-trash"></i></a>
            </div>
        </div>
    </div>
</div>

@endforeach

@else
<div class="page-inner">
    <div class="page-header">
        <h4 class="page-title">Dashboard</h4>
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
            <a href="{{ route('kelas.index') }}" class="card-link"> 
                <div class="card-body ">
                    <div class="row align-items-center">
                        <div class="col-icon">
                            <div class="icon-big text-center icon-primary bubble-shadow-small">
                                <i class="fas fa-users"></i>
                            </div>
                        </div>
                        <div class="col col-stats ml-3 ml-sm-0">
                            <div class="numbers">
                                <p class="card-category">Jumlah Kelas</p>
                                <h4 class="card-title">{{$jumlah_kelas}}</h4>
                            </div>
                        </div>
                    </div>
                </div>
            </a>
            </div>
        </div>
        <div class="col-sm-6 col-md-3">
            <div class="card card-stats card-round">
                <a href=" {{ route('siswa.index') }} " class="card-link"> 
                <div class="card-body">
                    <div class="row align-items-center">
                        <div class="col-icon">
                            <div class="icon-big text-center icon-info bubble-shadow-small">
                                <i class="far fa-newspaper"></i>
                            </div>
                        </div>
                        <div class="col col-stats ml-3 ml-sm-0">
                            <div class="numbers">
                                <p class="card-category">Jumlah Siswa</p>
                                <h4 class="card-title">{{$jumlah_siswa}}</h4>
                            </div>
                        </div>
                    </div>
                </div>
                </a>
            </div>
        </div>
        <div class="col-sm-6 col-md-3">
            <div class="card card-stats card-round">
                <a href=" {{ route('aturan.index') }} " class="card-link"> 
                <div class="card-body">
                    <div class="row align-items-center">
                        <div class="col-icon">
                            <div class="icon-big text-center icon-success bubble-shadow-small">
                                <i class="far fa-chart-bar"></i>
                            </div>
                        </div>
                        <div class="col col-stats ml-3 ml-sm-0">
                            <div class="numbers">
                                <p class="card-category">Jumlah Aturan</p>
                                <h4 class="card-title">{{$jumlah_aturan}}</h4>
                            </div>
                        </div>
                    </div>
                </div>
                </a>
            </div>
        </div>
        <div class="col-sm-6 col-md-3">
            <div class="card card-stats card-round">
                <a href=" {{ route('pelanggaran.index') }} " class="card-link"> 
                <div class="card-body">
                    <div class="row align-items-center">
                        <div class="col-icon">
                            <div class="icon-big text-center icon-secondary bubble-shadow-small">
                                <i class="far fa-check-circle"></i>
                            </div>
                        </div>
                        <div class="col col-stats ml-3 ml-sm-0">
                            <div class="numbers">
                                <p class="card-category">Jumlah Pelanggaran</p>
                                <h4 class="card-title">{{ $total_bulan_admin }}<h4>
                            </div>
                        </div>
                    </div>
                </div>
                </a>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="card-head-row">
                        <div class="card-title">Histori Pelaporan Pelanggaran</div>
                        <div class="card-tools">
                            <a href="{{ route('laporan.print') }}" target="_blank" class="btn btn-info btn-border btn-round btn-sm">
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
                                <th>Aturan</th>
                                <th>Bk</th>
                                <th>Petugas</th>
                                <th>Tanggal</th>
                                <th>Keterangan</th>
                                <th>Status</th>
                                <th>Poin</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($pelanggaran_admin as $k)
                            <tr>
                                <td align="center">{{ $loop->iteration }}</td>
                                <td>{{ ($k->Siswa)->nama ?? "Kosong" }}</td>
                                <td>{{ ($k->Aturan)->nama_aturan ?? "Kosong" }}</td>
                                <td>{{ ($k->Bk->nama) ?? "Kosong" }}</td>
                                <td>{{ ($k->User->nama) ?? "Kosong" }}</td>
                                <td>{{ $k->tgl_pelanggaran }}</td>
                                <td>{{ $k->keterangan }}</td>
                                <td>{{ $k->status }}</td>
                                <td>{{ ($k->total_poin) ?? "Kosong" }}</td>
                            </tr>
                            @endforeach                        
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endif
@endsection



