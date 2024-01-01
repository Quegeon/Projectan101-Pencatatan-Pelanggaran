@extends('layouts.master')
@section('title', 'Pelanggaran')
@section('content')

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
                        {{-- 14 --}}
                        {{-- <button type="button" class="btn btn-info" data-toggle="modal" data-target="#modalAturan">Tambah Aturan</button> --}}
                        <table class="mt-4 table table-bordered">
                            <thead>
                                <tr>
                                    <th class="text-center">#</th>
                                    <th>Aturan</th>
                                    <th>Hukuman</th>
                                    <th>Poin</th>
                                </tr>
                            </thead>
                            <tbody>
                                {{-- 18 --}}
                                @foreach ($detailaturan as $a)
                                <tr>
                                    <td class="text-center">{{ $loop->iteration }}</td>
                                    <td>{{ $a->Aturan->nama_aturan }}</td>
                                    <td>{{ $a->Aturan->Hukuman->hukuman }}</td>
                                    <td class="text-center">{{ $a->Aturan->poin }}</td>
                                </tr>
                                @endforeach
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th colspan="3" class="text-center bg-warning text-white">Total poin</th>
                                    <td colspan="2" class="text-center bg-warning text-white">{{ $pelanggaran->total_poin }}</td>
                                    {{-- <td class="bg-info"></td> --}}
                                </tr>
                            </tfoot>
                        </table>
                        <label>Keterangan</label>
                        <input type="text" value="{{ $pelanggaran->keterangan }}" placeholder="Masukan keterangan" class="my-3 form-control" readonly>
                        <a class="btn btn-danger float-right ml-2 text-white" onclick="confirmDel('{{ route('review.destroy', $pelanggaran->id) }}')"><i class="fas fa-trash"></i></a>
                        <a class="btn btn-info float-right" href="{{ route('review.edit', $pelanggaran->id) }}">Edit Pelanggaran</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- 15 --}}
    {{-- <div class="modal fade" id="modalAturan" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                            @error('id_aturan')
                                <p class="text-danger">* {{ $errors->first('id_aturan') }}</p>
                            @enderror
                        </div>
                        <input type="hidden" name="no_pelanggaran" value=""> 
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fa fa-ban"></i> Close</button>
                    <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Save changes</button>
                </form>
                </div>
            </div>
        </div>
    </div> --}}
@endsection
