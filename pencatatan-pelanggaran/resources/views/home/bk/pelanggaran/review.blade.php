@extends('layouts.master')
@section('title', 'Review Pelanggaran')
@section('content')
    <div class="page-inner">
        <div class="page-header">
            <h4 class="page-title">Review Pelanggaran</h4>
            {{-- <div class="btn-group btn-group-page-header ml-auto">
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
            </div> --}}
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="card card-stats card-round">
                    <div class="card-body">
                        <form id="submit-cenah" action="{{ route('review.update', $pelanggaran->id) }}" method="POST"
                            enctype="multipart/form-data">
                            {{ csrf_field() }}
                            <div class="form-group">
                                <label for="">Siswa</label>
                                <input type="text" name="" class="form-control"
                                    value="{{ $pelanggaran->Siswa->nama }}" readonly>
                                <input type="hidden" name="nis" class="form-control" value="{{ $pelanggaran->nis }}"
                                    readonly>
                            </div>
                            <div class="form-group">
                                <label for="">Aturan</label>
                                <select name="id_aturan" onchange="anjay({{ $aturan }}, this)"
                                    class="form-control select-search-no-modal" id="">
                                    <option value="" hidden>-- Pilih Aturan --</option>
                                    @foreach ($aturan as $s)
                                        <option value="{{ $s->id }}">{{ $s->nama_aturan }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="">Keterangan</label>
                                <input type="text" name="keterangan" value="{{ $pelanggaran->keterangan }}"
                                    class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="">Poin</label>
                                <input type="text" name="total_poin" value="{{ $pelanggaran->total_poin }}"
                                    id="poin" class="form-control" value="" readonly>
                            </div>
                            <div class="form-group">
                                <input type="hidden" name="tgl_pelanggaran" value="{{ $pelanggaran->tgl_pelanggaran }}">
                            </div>
                            <a href="{{ route('review.inbox') }}" class="btn btn-secondary">Kembali</a>
                            <button type="submit"
                                class="btn btn-primary {{ $pelanggaran->Siswa->poin === 0 ? 'simphan' : '' }}">Simpan</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        function anjay(...arr) {
            for (let a of arr[0]) {
                if (a.id == arr[1].value) {
                    $('#poin').val(a.poin);
                }
            }
        }
    </script>
@endsection
