@extends('layouts.master')
@section('title', 'Pelanggaran')
@section('content')
@php 
    $total_poin = 0;

    foreach ($tempaturan as $k) {
        $total_poin += $k->Aturan->poin;
    }
@endphp

    <div class="page-inner">
        <div class="page-header">
            <h4 class="page-title">Detail Data Pelanggaran</h4>
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
                        <button type="button" class="btn btn-info" data-toggle="modal" data-target="#modalAturan">Tambah Aturan</button>
                        <table class="mt-4 table table-bordered">
                            <thead>
                                <tr>
                                    <th class="text-center">#</th>
                                    <th>Aturan</th>
                                    <th>Hukuman</th>
                                    <th>Poin</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($tempaturan as $t)
                                <tr>
                                    <td class="text-center">{{ $loop->iteration }}</td>
                                    <td>{{ $t->Aturan->nama_aturan }}</td>
                                    <td>{{ $t->Aturan->Hukuman->hukuman }}</td>
                                    <td class="text-center">{{ $t->Aturan->poin }}</td>
                                    <td>
                                        <form action="{{ route('temp.destroy', $t->id)}}" method="POST" class="d-inline">
                                            @csrf
                                            <input type="hidden" name="_method" value="DELETE">
                                            <button type="submit" class="btn btn-danger text-center">Hapus</button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th colspan="3" class="text-center bg-warning text-white">Total poin</th>
                                    <td colspan="2" class="text-center bg-warning text-white">{{ $total_poin }}</td>
                                    {{-- <td class="bg-info"></td> --}}
                                </tr>
                            </tfoot>
                        </table>
                        <form action="{{ route('review.store') }}" class="d-flex flex-column" method="POST">
                            @csrf
                            <label class="mb-3">Siswa</label>
                            <select name="nis" class="select-search-no-modal">
                                @foreach($siswa as $s)
                                <option value="{{ $s->nis }}">{{ $s->nama }}</option>
                                @endforeach
                            </select>

                            <label class="mt-3">Keterangan</label>
                            <input type="text" placeholder="Masukan keterangan" class="my-3 form-control">

                            <input type="hidden" name="no_pelanggaran" value="{{ $no_pelanggaran }}">

                            <button type="submit" class="align-self-end w-25 btn btn-info">Proses</button>
                        </form>
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
                        <input type="hidden" name="no_pelanggaran" value="{{ $no_pelanggaran }}"> 
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fa fa-ban"></i> Close</button>
                    <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Save changes</button>
                </form>
                </div>
            </div>
        </div>
    </div>
@endsection
