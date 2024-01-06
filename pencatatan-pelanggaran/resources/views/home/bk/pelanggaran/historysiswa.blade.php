@extends('layouts.master')
@section('title', 'History Pelanggaran Siswa')
@section('content')
<div class="page-inner">
    <div class="page-header">
        <h4 class="page-title">History Pelanggaran Siswa</h4>
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
                <div class="card-header">

                    <div class="row">
                        <div class="col-md-6">
                            <table style="margin-top:6%">
                                <tr >
                                    <th>
                                        Nis
                                    </th>
                                    <th style="padding: 0 15px">
                                        :
                                    </th>
                                    <th>
                                        {{$siswa->nis}}
                                    </th>
                                </tr>
                                <tr>
                                    <th>
                                        Nama
                                    </th>
                                    <th style="padding: 0 15px">
                                        :
                                    </th>
                                    <th>
                                        {{$siswa->nama}}
                                    </th>
                                </tr>
                                <tr>
                                    <th>
                                        Kelas
                                    </th>
                                    <th style="padding: 0 15px">
                                        :
                                    </th>
                                    <th>
                                        {{$siswa->Kelas->nama_kelas}}
                                    </th>
                                </tr>
                            </table>
                        </div>
                        <div class="col-md-6">
                            <table style="margin-left: 50%">
                                <tr>      
                                    <td style="font-size: 20px; padding-bottom: 20%;">Jumlah Poin</td>
                                    <td style="font-size: 80px; margin-top: 10%; color: 
                                        @if($siswa->poin >= 0 && $siswa->poin <= 25)
                                            blue;
                                        @elseif($siswa->poin <= 50)
                                            green;
                                        @elseif($siswa->poin <= 75)
                                            red;
                                        @elseif($siswa->poin <= 99)
                                            darkred;
                                        @else
                                            black;
                                        @endif
                                    ">
                                        {{ $siswa->poin }}
                                    </td>
                                </tr>
                                
                            </table>
                        </div>
                    </div>
                    

                    
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="basic-datatables" class="display table table-striped table-hover" >
                            <thead>
                                <tr>
                                 <th>No</th>
                                 <th>Pelanggaran</th>
                                 <th>Poin</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($pelanggaran as $p)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $p->Aturan->nama_aturan }}</td>
                                        <td>{{ $p->Aturan->poin }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th colspan="2" style="text-align: center">JUMLAH POIN</th>
                                    <th>{{$siswa->poin}}</th>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection