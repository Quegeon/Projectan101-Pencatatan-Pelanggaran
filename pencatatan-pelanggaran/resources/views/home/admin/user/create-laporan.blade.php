@extends('layouts.master')
@section('title', 'Laporan Petugas')
@section('content')
<div class="page-inner">
    <div class="page-header">
        <h4 class="page-title">Laporan Petugas</h4>
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
                        <form id="specific-form" action="{{ route('laporan.store') }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label>Siswa</label>
                                <select name="nis" id="siswa-search-server"></select>
                                @error('nis')
                                    <p class="text-danger timeout">* {{ $message }}</p>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Aturan</label>
                                <select name="id_aturan" id="aturan-search-server">
                                    <option></option>
                                    @foreach ($aturan as $s)
                                        <option value="{{ $s->id }}">{{ $s->nama_aturan }}</option>
                                    @endforeach
                                </select>
                                @error('id_aturan')
                                    <p class="text-danger timeout">* {{ $message }}</p>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Keterangan</label>
                                <input type="text" name="keterangan" placeholder="Masukkan Keterangan" class="form-control">
                                @error('keterangan')
                                    <p class="text-danger timeout">* {{ $message }}</p>
                                @enderror
                            </div>

                            <div class="form-group">
                                <input type="hidden" name="no_pelanggaran" value="{{ $no_pelanggaran }}">
                            </div>
                            <div class="modal-footer">
                                <a href="{{ route('dashboard') }}" class="btn btn-secondary"><i class="fa fa-ban mr-2"></i>Kembali</a>
                                <button type="button" onclick="alertSubmit('Apakah anda yakin untuk menyerahkan laporan kepada BK ?', 'specific-form')" class="btn btn-primary"><i class="fa fa-save mr-2"></i>Simpan</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>

@section('script')
<script>
    $(document).ready(function() {
        $('#siswa-search-server').select2({
            ajax: {
                url: "{{ route('petugas.search.siswa') }}",
                delay: 250,
                dataType: 'json',
                data: function(params) {
                    return {
                        q: params.term,
                        page: params.page || 1
                    };
                },
                processResults: function(data) {
                    return {
                        results: data.results,
                        pagination: {
                            more: data.pagination.more
                        }
                    }
                },
                cache: true
            },
            minimumInputLength: 1,
            width: 'auto',
            allowClear: true,
            placeholder: 'Cari Siswa'
        });

        $('#aturan-search-server').select2({
            ajax: {
                url: "{{ route('petugas.search.aturan') }}",
                delay: 250,
                dataType: 'json',
                data: function(params) {
                    return {
                        q: params.term,
                        page: params.page || 1
                    };
                },
                processResults: function(data) {
                    return {
                        results: data.results,
                        pagination: {
                            more: data.pagination.more
                        }
                    }
                },
                cache: true
            },
            minimumInputLength: 1,
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
        confirmButtonText: 'Ya, Serahkan!',
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

