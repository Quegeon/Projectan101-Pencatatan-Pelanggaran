@extends('layouts.master')
@section('title', 'Pelanggaran')
@section('content')
@php
    $total_poin = 0;

    foreach ($detailaturan as $k) {
        $total_poin += $k->Aturan->poin;
    }
@endphp
    <div class="page-inner">
        <div class="page-header">
            {{-- 17 --}}
            <h4 class="page-title">Detail Data Pelanggaran - {{ $pelanggaran->Siswa->nama }}</h4>
            <div class="btn-group btn-group-page-header ml-auto">
                <button type="button" class="btn btn-light btn-round btn-page-header-dropdown dropdown-toggle"
                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
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
                                        {{-- <button type="button" class="btn btn-info" data-toggle="modal" data-target="#modalAturan"><i class="fa fa-plus mr-2"></i>Tambah Aturan</button> --}}
                                        <table id="basic-datatables" class="mt-4 table table-bordered">
                                            <thead>
                                                <tr>
                                                    <th class="text-center">No</th>
                                                    <th>Aturan</th>
                                                    <th>Hukuman</th>
                                                    <th>Poin</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach($detailaturan as $t)
                                                <tr>
                                                    <td class="text-center">{{ $loop->iteration }}</td>
                                                    <td>{{ $t->Aturan->nama_aturan }}</td>
                                                    <td>{{ $t->Aturan->Hukuman->hukuman }}</td>
                                                    <td class="text-center">{{ $t->Aturan->poin }}</td>
                                                </tr>
                                                @endforeach
                                            </tbody>
                                            <tfoot>
                                                <tr>
                                                    <th colspan="3" class="text-center bg-warning text-white">Total poin</th>
                                                    <td colspan="2" class="text-center bg-warning text-white">
                                                        @if ($total_poin > 100)
                                                            100 (Max)
                                                        @else
                                                            {{ $total_poin }}
                                                        @endif
                                                    </td>
                                                    {{-- <td class="bg-info"></td> --}}
                                                </tr>
                                            </tfoot>
                                        </table>
                                    </div>
                                </div>
                            </div>

                            <form action="{{ route('pelanggaran.store') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Siswa</label>
                                            <input type="text" class="form-control" value="{{ $pelanggaran->Siswa->nama }}" readonly>
                                            {{-- <select name="nis" class="select-search-no-modal">
                                                @foreach ($siswa as $s)
                                                    <option value="{{ $s->nis }}">{{ $s->nama }}</option>
                                                @endforeach
                                            </select> --}}
                                            @error('nis')
                                                <p class="text-danger timeout">* {{ $message }}</p>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Pelapor</label>
                                            <input type="text" class="form-control" value="{{ optional($pelanggaran->User)->nama }}" readonly>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>Hukuman</label>
                                            <input type="text" value="{{ $pelanggaran->Hukuman_Pilihan->Hukuman->hukuman ?? 'Belum Di Proses' }}" class="form-control" id="" readonly>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>Keterangan</label>
                                            <input type="text" name="keterangan" value="{{ $pelanggaran->keterangan }}" class="form-control" readonly>
                                            @error('keterangan')
                                                <p class="text-danger timeout">* {{ $message }}</p>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                {{-- <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>BK</label>
                                            <select class="select-search-no-modal" name="id_bk">
                                                <option value="{{ $pelanggaran->id_bk }}" selected>Default: {{ $pelanggaran->Bk->nama }}</option>
                                                @foreach ($bk as $b)
                                                    <option value="{{ $b->id }}">{{ $b->nama }}</option>
                                                @endforeach
                                            </select>
                                            @error('id_bk')
                                                <p class="text-danger timeout">* {{ $message }}</p>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Tanggal Pelanggaran</label>
                                            <input type="date" class="form-control" name="tgl_pelanggaran" value="{{ $tgl_pelanggaran }}" placeholder="">
                                            @error('tgl_pelanggaran')
                                                <p class="text-danger timeout">* {{ $message }}</p>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Status</label>
                                            <select class="form-control" name="status">
                                                <option value="Belum">Belum di proses</option>
                                                <option value="Beres">Sudah di proses</option>
                                            </select>
                                        </div>
                                    </div>
                                </div> --}}
                                <input type="hidden" name="total_poin" value="{{ $total_poin }}">
                                <div class="modal-footer">
                                    {{-- <a href="{{ route('review.cancel', [ 'atr' => 'kembali', 'opt' => $pelanggaran->no_pelanggaran]) }}" class="btn btn-secondary"><i class="fa fa-ban mr-2"></i>Kembali</a>
                                    <button type="submit" class="btn btn-primary"><i class="fa fa-save mr-2"></i>Simpan</button> --}}
                                    @if ($pelanggaran->status == 'Belum')
                                    <a href="{{ route('review.review', $pelanggaran->id) }}" class="btn btn-info"><i class="fa fa-edit mr-2"></i>Proses Pelanggaran</a>
                                    @else
                                    <a href="{{ route('review.edit', $pelanggaran->id) }}" class="btn btn-info"><i class="fa fa-edit mr-2"></i>Edit Pelanggaran</a>
                                    @endif
                                    <a onclick="confirmDel('{{ route('review.destroy', $pelanggaran->id) }}')" class="btn btn-danger" data-toggle="tooltip" title="Hapus"><i class="fa fa-trash text-white"></i></a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
