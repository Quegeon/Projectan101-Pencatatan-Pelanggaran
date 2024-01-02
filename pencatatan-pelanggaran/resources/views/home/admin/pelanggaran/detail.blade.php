@extends('layouts.master')
@section('title', 'Detail Pelanggaran')
@section('content')
    <div class="page-inner">
        <div class="page-header">
            <h4 class="page-title">Detail Pelanggaran | {{ $pelanggaran->no_pelanggaran }}</h4>
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
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <table class="mt-4 table table-bordered">
                                            <thead>
                                                <tr>
                                                    <th class="text-center">No</th>
                                                    <th>Aturan</th>
                                                    <th>Hukuman</th>
                                                    <th>Poin</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach($pelanggaran as $p)
                                                <tr>
                                                    <td class="text-center">{{ $loop->iteration }}</td>
                                                    <td>{{ $p->Detail->Aturan->nama_aturan }}</td>
                                                    <td>{{ $p->Detail->Aturan->Hukuman->hukuman }}</td>
                                                    <td class="text-center">{{ $p->Detail->Aturan->poin }}</td>
                                                </tr>
                                                @endforeach
                                            </tbody>
                                            <tfoot>
                                                <tr>
                                                    <th colspan="3" class="text-center bg-warning text-white">Total poin</th>
                                                    <td colspan="2" class="text-center bg-warning text-white">{{ $p->total_poin }}</td>
                                                    {{-- <td class="bg-info"></td> --}}
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
                                        <input type="text" class="form-control" value="{{ $p->Siswa->nis }} | {{ $p->Siswa->nama }} | {{ $p->Siswa->Kelas->nama_kelas }}" placeholder="{{ $p->Siswa->nis }} | {{ $p->Siswa->nama }} | {{ $p->Siswa->Kelas->nama_kelas }}" readonly>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Petugas</label>
                                        <input type="text" class="form-control" placeholder="{{ $pelanggaran->keterangan }}" value="{{ $pelanggaran->User->username }}" readonly>
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
                                        <input type="text" class="form-control" value="{{ $pelanggaran->status }}">
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <a href="{{ route('pelanggaran.index') }}" class="btn btn-secondary"><i class="fa fa-ban mr-2"></i>Kembali</a>
                                <button type="submit" class="btn btn-primary"><i class="fa fa-save mr-2"></i>Simpan</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="modalAturan" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Tambah Data</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('temp.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="aturan">Aturan</label>
                            <select class="select-search" name="id_aturan" id="aturan">
                                @foreach ($aturan as $s)
                                    <option value="{{ $s->id }}">{{ $s->poin }} | {{ $s->nama_aturan }}</option>
                                @endforeach
                            </select>
                            {{-- <input list="siswa" type="text" name="nis" class="form-control" placeholder="Masukkan Nama Siswa"> --}}
                            @error('id_aturan')
                                <p class="text-danger">* {{ $errors->first('id_aturan') }}</p>
                            @enderror
                        </div>
                        <input type="hidden" name="no_pelanggaran" value="{{ $pelanggaran->no_pelanggaran }}"> 
                        {{-- 8 --}}
                        <input type="hidden" name="id" value="{{ \Str::orderedUuid() }}"> 
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fa fa-ban mr-2"></i>Kembali</button>
                    <button type="submit" class="btn btn-primary"><i class="fa fa-save mr-2"></i>Simpan</button>
                </form>
                </div>
            </div>
        </div>
    </div>
@endsection