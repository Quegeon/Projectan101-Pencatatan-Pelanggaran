@extends('layouts.master')
@section('title', 'History Pelanggaran Siswa')
@section('content')
<div class="page-inner">
    <div class="page-header">
        <h4 class="page-title">History Pelanggaran Siswa</h4>
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
                <div class="card-header">

                    <div class="row">
                        <div class="col-md-6">
                            <table style="margin-top:3.5%; font-size:15px">
                                <tr >
                                    <th>
                                        Nis
                                    </th>
                                    <th style="padding: 0 30px">
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
                                    <th style="padding: 0 30px">
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
                                    <th style="padding: 0 30px">
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
                                    <td style="font-size: 20px;">Jumlah Poin :</td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
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
                    <a href="#" class="btn btn-primary mb-2 ml-3" data-toggle="modal" data-target="#modalUpdate"><i class="fa fa-edit mr-2"></i>Kurangi Poin</a>
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
                                        <td style="text-align: center">{{ $loop->iteration }}</td>
                                        <td>{{ ($p->Aturan->nama_aturan) ?? 'Kosong'}}</td>
                                        <td style="text-align: center">{{ ($p->Aturan->poin) ?? 'Kosong' }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                            <tfoot>
                                <tr class="bg-info" style= "color: white;" >
                                    <th colspan="2" style="text-align: center;">JUMLAH POIN</th>
                                    <th style="text-align: center">{{$siswa->poin}}</th>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" tabindex="-1" id="modalUpdate" role="dialog" aria-hidden="true" aria-labelledby="exampleModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" aria-labelledby="exampleModalLabel">Kurangi Poin Siswa</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('change.point', $siswa->nis) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Poin Siswa</label>
                                <input type="text" class="form-control" id="poin_siswa" value="{{ $siswa->poin }}" readonly>    
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Poin Hasil</label>
                                <input type="text" class="form-control" id="result" readonly>
                            </div>
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Poin Pengurangan</label>
                                <input type="text" name="poin" class="form-control" placeholder="Masukan Poin Pengurangan" onkeyup="displaySubtract(this.value)" onkeydown="displaySubtract(this.value)">
                                @error('poin')
                                    <p class="text-danger timeout">* {{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                    </div>
            </div>
            <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fa fa-ban mr-2"></i>Kembali</button>
                    <button type="submit" class="btn btn-primary"><i class="fa fa-save mr-2"></i>Simpan</button>
            </div>
                </form>
        </div>
    </div>
</div>
@endsection