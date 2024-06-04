@extends('layouts.master')
@section('title', 'Edit Data Pelanggaran')
@section('content')
@php
    $total_poin = 0;

    foreach ($tempaturan as $k) {
        $total_poin += $k->Aturan->poin;
    }
@endphp

    <div class="page-inner">
        <div class="page-header">
            <h4 class="page-title">Edit Data Pelanggaran</h4>
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
                            <div class="form-group">
                                <button type="button" class="btn btn-info mb-4 ml-2" data-toggle="modal" data-target="#modalAturan">Tambah Aturan</button>
                                <table id="basic-datatables" class="table table-bordered">
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
                                                    <button type="submit" class="btn btn-danger text-center" data-toggle="tooltip" title="Hapus"><i class="fa fa-trash text-white"></i></button>
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

                                <form id="specific-form" action="{{ route('review.update', $pelanggaran->id) }}" class="d-flex flex-column" method="POST">
                                    @csrf
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Siswa</label>
                                                <input type="text" class="form-control" value="{{ $pelanggaran->Siswa->nama }}" readonly>
                                                <input type="hidden" name="nis" value="{{ $pelanggaran->nis }}">
                                                @error('nis')
                                                    <p class="text-danger timeout">{{ $message }}</p>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="">Pelapor</label>
                                                <input type="text" value="{{ $pelanggaran->User->username ?? '-'}}" class="form-control" readonly>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Hukuman</label>
                                                <select name="hukuman_pilihan" class="select-search-no-modal">
                                                    @foreach ($tempaturan as $t)
                                                        <option value="{{ $t->Aturan->id }}">{{ $t->Aturan->Hukuman->hukuman }}</option>
                                                    @endforeach
                                                </select>
                                                {{-- <input type="text" value="{{ $pelanggaran->Hukuman_Pilihan->Hukuman->hukuman ?? '' }}" class="form-control" id="" readonly> --}}
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Keterangan</label>
                                                <input type="text" name="keterangan" value="{{ $pelanggaran->keterangan }}" placeholder="Masukan keterangan" class="form-control">
                                                @error('keterangan')
                                                    <p class="text-danger timeout">{{ $message }}</p>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>

                                    <input type="hidden" name="no_pelanggaran" value="{{ $no_pelanggaran }}">
                                    <input type="hidden" name="total_poin" value="{{ $total_poin }}">

                                    {{-- 2 --}}
                                    <div class="d-flex w-100 justify-content-end">
                                        <button type="button" onclick="alertConfirm('{{ route('review.cancel', ['opt' => 'batal', 'atr' => $no_pelanggaran]) }}', 'Apakah anda ingin membatalkan?')" class="mr-2 btn btn-secondary">Kembali</button>
                                        <button type="button" onclick="alertSubmit('Apakah anda yakin untuk memproses pelanggaran?', 'specific-form')" class="w-25 btn btn-info"><i class="fa fa-file-signature mr-2"></i> Proses</button>
                                    </div>
                                </form>
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
                            <select name="id_aturan" id="aturan-search-server"></select>
                            {{-- <input list="siswa" type="text" name="nis" class="form-control" placeholder="Masukkan Nama Siswa"> --}}
                            @error('id_aturan')
                                <p class="text-danger">* {{ $errors->first('id_aturan') }}</p>
                            @enderror
                        </div>
                        <input type="hidden" name="no_pelanggaran" value="{{ $no_pelanggaran }}">
                        {{-- 8 --}}
                        <input type="hidden" name="id" value="{{ \Str::orderedUuid() }}">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fa fa-ban"></i> Close</button>
                    <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Save changes</button>
                </form>
                </div>
            </div>
        </div>
    </div>

@section('script')
    <script>
        $(document).ready(function() {
            $('#aturan-search-server').select2({
                ajax: {
                    url: "{{ route('bk.search.aturan') }}",
                    delay: 250,
                    dataType: 'json',
                    data: function(params) {
                        return {
                            q: params.term,
                            page: params.paginate || 1
                        };
                    },
                    processResults: function(data) {
                        return {
                            results: data.results,
                            pagination: {
                                more: data.pagination.more
                            }
                        };
                    },
                    cache: true
                },
                minimumInputLength: 1,
                dropdownParent: $('.modal'),
                width: 'auto',
                allowClear: true,
                placeholder: 'Cari Aturan'
            });
        });
    </script>
@endsection

@endsection

<script>
    function alertSubmit(msg, formId) {
    console.log(formId);
    Swal.fire({
        title: 'Konfirmasi',
        text: msg,
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#716aca',
        cancelButtonColor: '#f3545d',
        confirmButtonText: 'Ya, Proses!',
        cancelButtonText: 'Batal'
    }).then((result) => {
        if (result.isConfirmed) {
            const form = document.getElementById(formId);
            if (form) {
                try {
                    form.submit();
                } catch (e) {
                    Swal.fire({
                        title: 'Gagal',
                        text: 'Terjadi kesalahan saat mencoba mengirim form.',
                        icon: 'error',
                        confirmButtonColor: '#716aca',
                        confirmButtonText: 'OK'
                    });
                }
            } else {
                Swal.fire({
                    title: 'Error',
                    text: 'Terjadi Kesalahan mohon hubungi admin.',
                    icon: 'error',
                    confirmButtonColor: '#716aca',
                    confirmButtonText: 'OK'
                });
            }
        }
    });
}
</script>
