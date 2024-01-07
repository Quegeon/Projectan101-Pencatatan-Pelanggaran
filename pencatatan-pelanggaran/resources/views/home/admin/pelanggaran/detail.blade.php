@extends('layouts.master')
@section('title', 'Detail Pelanggaran')
@section('content')
    <div class="page-inner">
        <div class="page-header">
            <h4 class="page-title">Detail Pelanggaran | {{ $pelanggaran->no_pelanggaran }}</h4>
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
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <table id="basic-datatables" class="mt-4 table table-bordered table-responsive-lg">
                                            <thead>
                                                <tr>
                                                    <th>No</th>
                                                    <th>Aturan</th>
                                                    <th>Hukuman</th>
                                                    <th>Poin</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach($detail as $d)
                                                <tr>
                                                    <td class="text-center">{{ $loop->iteration }}</td>
                                                    <td>{{ $d->Aturan->nama_aturan }}</td>
                                                    <td>{{ $d->Aturan->Hukuman->hukuman }}</td>
                                                    <td class="text-center">{{ $d->Aturan->poin }}</td>
                                                </tr>
                                                @endforeach
                                            </tbody>
                                            <tfoot>
                                                <tr>
                                                    <th colspan="3" class="text-center bg-info text-white">Total poin</th>
                                                    <td colspan="2" class="text-center bg-info text-white">{{ $pelanggaran->total_poin }}</td>
                                                </tr>
                                            </tfoot>
                                        </table>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Siswa</label>
                                        <input type="text" class="form-control" value="{{ $pelanggaran->Siswa->nis }} | {{ $pelanggaran->Siswa->nama }} | {{ $pelanggaran->Siswa->Kelas->nama_kelas }}" placeholder="{{ $pelanggaran->Siswa->nis }} | {{ $pelanggaran->Siswa->nama }} | {{ $pelanggaran->Siswa->Kelas->nama_kelas }}" readonly>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Petugas</label>
                                        <input type="text" class="form-control" placeholder="{{ $pelanggaran->keterangan }}" value="{{ $pelanggaran->User->username ?? '-' }}" readonly>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Hukuman Pilihan</label>
                                        <input type="text" class="form-control" value="{{ ($pelanggaran->Hukuman_Pilihan->Hukuman->hukuman) ?? 'Kosong' }}" readonly>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Keterangan</label>
                                        <input type="text" value="{{ $pelanggaran->keterangan }}" placeholder="{{ $pelanggaran->keterangan }}" class="form-control" readonly>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>BK</label>
                                        <input type="text" value="{{ $pelanggaran->Bk->nama }}" placeholder="{{ $pelanggaran->Bk->nama }}" class="form-control" readonly>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Tanggal Pelanggaran</label>
                                        <input type="date" class="form-control" value="{{ $pelanggaran->tgl_pelanggaran }}" placeholder="{{ $pelanggaran->tgl_pelanggaran }}" readonly>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Status</label>
                                        <input type="text" class="form-control" value="{{ $pelanggaran->status }}" readonly>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <a href="{{ route('pelanggaran.edit', $pelanggaran->id) }}" class="btn btn-info text-white"><i class="fa fa-edit"></i></a>
                                <a onclick="confirmDel('{{ route('pelanggaran.destroy', $pelanggaran->id) }}')" class="btn btn-danger text-white"><i class="fa fa-trash"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection