@extends('layouts.master')
@section('title', 'Riwayat Poin')
@section('content')
    <div class="page-inner">
        <div class="page-header">
            <h4 class="page-title">Histori Pengurangan Poin Siswa</h4>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="card card-stats card-round">
                    <div class="card-body">
                        <button class="mb-2 mx-3 btn btn-sm btn-warning" data-toggle="modal" data-target="#modal-reset">Reset
                            Poin Siswa</button>
                        <div class="table-responsive">
                            <table id="table-poin" class="display table table-striped table-hover table-bordered">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Tanggal Waktu</th>
                                        <th>Siswa</th>
                                        <th>Aktivitas</th>
                                        <th>Poin Asal</th>
                                        <th>Poin Perubahan</th>
                                    </tr>
                                </thead>
                                <tbody>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>

    <div class="modal fade" tabindex="-1" id="modal-reset" role="dialog" aria-hidden="true"
        aria-labelledby="exampleModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" aria-labelledby="exampleModalLabel">Reset Poin Siswa</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="alert alert-danger" role="alert">
                        Perhatian!! Anda akan melakukan reset poin pada siswa.
                    </div>
                    <form action="{{ route('reset-poin') }}" method="POST" id="form-reset" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label for="">Tipe Reset</label>
                                    <select name="tipe_reset" class="form-control" id="select-type">
                                        <option value="semua">Semua Siswa</option>
                                        <option value="per_kelas">Siswa Per Kelas</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row d-none" id="form-kelas">
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label for="">Kelas</label>
                                    <select name="reset_kelas" class="form-control" id="select-kelas">
                                        @foreach ($kelas as $item)
                                            <option value="{{ $item->id }}">{{ $item->nama_kelas }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal"><i
                            class="fa fa-ban mr-2"></i>Kembali</button>
                    <button type="submit" class="btn btn-primary" id="btn-submit"><i class="fa fa-save mr-2"></i>Reset
                        Poin</button>
                </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script>
        $(document).ready(function() {
            $('#table-poin').DataTable({
                processing: true,
                serverSide: true,
                pageLength: 100,
                ajax: {
                    url: "{{ route('log-poin-all') }}",
                    type: 'GET'
                },
                columns: [{
                        data: 'DT_RowIndex',
                        name: 'No'
                    },
                    {
                        data: 'masked_datetime',
                        name: 'Tanggal Waktu'
                    },
                    {
                        data: 'nama_siswa',
                        name: 'Nama Siswa'
                    },
                    {
                        data: 'aktivitas',
                        name: 'Aktivitas'
                    },
                    {
                        data: 'poin_asal',
                        name: 'Poin Asal'
                    },
                    {
                        data: 'poin_perubahan',
                        name: 'Poin Perubahan'
                    },
                ]
            })

            $('#select-type').change(function() {
                let val = $(this).val();
                if (val == 'per_kelas') {
                    return $('#form-kelas').removeClass('d-none');
                }
                return $('#form-kelas').addClass('d-none');
            })

            $('#btn-submit').click(function(e) {
                e.preventDefault();
                Swal.fire({
                    title: 'Konfirmasi',
                    text: 'Apakah anda yakin akan mereset poin pada siswa?',
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#716aca',
                    cancelButtonColor: '#f3545d',
                    confirmButtonText: 'Ya, Reset!',
                    cancelButtonText: 'Batal'
                }).then((result) => {
                    console.log(result);
                    if (result.isConfirmed) {
                        $('#form-reset').submit();
                    }
                });
            })

            $('#select-kelas').select2({
                dropdownParent: $('.modal'),
                width: 'auto',
                allowClear: true,
                placeholder: 'Pilih Kelas',
                theme: 'bootstrap4'
            });
        })
    </script>
@endsection
