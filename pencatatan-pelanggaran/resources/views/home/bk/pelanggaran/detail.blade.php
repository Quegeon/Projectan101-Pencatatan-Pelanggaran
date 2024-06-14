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
                                        @if ($pelanggaran->is_active == 1)
                                        <a href="{{ route('review.edit', $pelanggaran->id) }}" class="btn btn-info"><i class="fa fa-edit mr-2"></i>Edit Pelanggaran</a>
                                        @endif
                                        @if ($pelanggaran->is_active == 0)
                                        <a href="" class="btn d-flex align-items-center btn-warning btn-go-public">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24"><path fill="white" d="M12 7c2.76 0 5 2.24 5 5c0 .65-.13 1.26-.36 1.83l2.92 2.92c1.51-1.26 2.7-2.89 3.43-4.75c-1.73-4.39-6-7.5-11-7.5c-1.4 0-2.74.25-3.98.7l2.16 2.16C10.74 7.13 11.35 7 12 7M2 4.27l2.28 2.28l.46.46A11.804 11.804 0 0 0 1 12c1.73 4.39 6 7.5 11 7.5c1.55 0 3.03-.3 4.38-.84l.42.42L19.73 22L21 20.73L3.27 3zM7.53 9.8l1.55 1.55c-.05.21-.08.43-.08.65c0 1.66 1.34 3 3 3c.22 0 .44-.03.65-.08l1.55 1.55c-.67.33-1.41.53-2.2.53c-2.76 0-5-2.24-5-5c0-.79.2-1.53.53-2.2m4.31-.78l3.15 3.15l.02-.16c0-1.66-1.34-3-3-3z"/></svg>
                                        </a>
                                        @else
                                        <a href="" class="btn d-flex align-items-center btn-success btn-go-private">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24"><path fill="white" d="M12 4.5C7 4.5 2.73 7.61 1 12c1.73 4.39 6 7.5 11 7.5s9.27-3.11 11-7.5c-1.73-4.39-6-7.5-11-7.5M12 17c-2.76 0-5-2.24-5-5s2.24-5 5-5s5 2.24 5 5s-2.24 5-5 5m0-8c-1.66 0-3 1.34-3 3s1.34 3 3 3s3-1.34 3-3s-1.34-3-3-3"/></svg>
                                        </a>
                                        @endif
                                    @endif
                                    @if ($pelanggaran->status == 'Belum')
                                    <a onclick="confirmDel('{{ route('review.destroy', $pelanggaran->id) }}')" class="btn btn-danger" data-toggle="tooltip" title="Hapus"><i class="fa fa-trash text-white"></i></a>
                                    @endif

                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
<script>
    function swalConfirm(title, text, icon, url) {
        Swal.fire({
            title: title,
            text: text,
            icon: icon,
            showCancelButton: true,
            confirmButtonColor: "#716aca",
            cancelButtonColor: "#f3545d",
            confirmButtonText: "Ya",
            cancelButtonText: "Batal"
        }).then((result) => {
            if (result.isConfirmed) {
                window.location = url;
            }
        });
    }
    $(document).ready(function() {
        $('.btn-go-public').click(function(e) {
            e.preventDefault();
            swalConfirm('Konfirmasi Tampilkan Pelanggaran!', 'Data Akan Ditampilkan', 'warning', "{{ route('review.public', $pelanggaran->id) }}")
        })

        $('.btn-go-private').click(function(e) {
            e.preventDefault();
            swalConfirm('Konfirmasi Sembunyikan Pelanggaran!', 'Data Akan Disembunyikan', 'warning', "{{ route('review.private', $pelanggaran->id) }}")
        })
    })
</script>
@endsection
