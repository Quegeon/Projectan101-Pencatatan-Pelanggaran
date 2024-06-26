@extends('layouts.master')
@section('title', 'History Pelanggaran Siswa')
@section('style')
    <style>
        .card .card-header {
            border-bottom: 0px !important;
        }
    </style>
@endsection
@section('content')
    <div class="page-inner">
        <div class="page-header">
            <h4 class="page-title">History Pelanggaran Siswa</h4>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="card card-stats card-round">
                    <div class="card-header border-0">

                        <div class="row">
                            <div class="col-md-6">
                                <table style="margin-top:3.5%; font-size:15px">
                                    <tr>
                                        <th>
                                            Nis
                                        </th>
                                        <th style="padding: 0 30px">
                                            :
                                        </th>
                                        <th>
                                            {{ $siswa->nis }}
                                        </th>
                                    </tr>
                                    <tr>
                                        <th>
                                            Nama
                                        </th>
                                        <th style="padding: 0 30px">
                                            :
                                        </th>
                                        <th>
                                            {{ $siswa->nama }}
                                        </th>
                                    </tr>
                                    <tr>
                                        <th>
                                            Kelas
                                        </th>
                                        <th style="padding: 0 30px">
                                            :
                                        </th>
                                        <th>
                                            {{ $siswa->Kelas->nama_kelas }}
                                        </th>
                                    </tr>
                                </table>
                            </div>
                            <div class="col-md-6">
                                <table style="margin-left: 50%">
                                    <tr>
                                        <td style="font-size: 20px;">Jumlah Poin :</td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td
                                            style="font-size: 80px; margin-top: 10%; color:
                                        @if ($siswa->poin >= 0 && $siswa->poin <= 25) green;
                                        @elseif($siswa->poin <= 50)
                                            blue;
                                        @elseif($siswa->poin <= 75)
                                            orange;
                                        @elseif($siswa->poin <= 100)
                                            red;
                                        @else
                                            black; @endif
                                    ">
                                            {{ $siswa->poin }}
                                        </td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        {{-- <div class="d-flex align-items-center mx-3 mb-4">
                            <button class="btn btn-sm btn-outline-primary mr-3" id="btn-pelanggaran" data-toggle="tooltip"
                                title="Data Pelanggaran Siswa">
                                Pelanggaran
                            </button>
                            <button class="btn btn-sm btn-primary" id="btn-riwayat" data-toggle="tooltip"
                                title="Riwayat Pengurangan Poin Siswa">
                                Riwayat Poin
                            </button>
                        </div> --}}

                        <ul class="nav nav-tabs mb-4 mt-2">
                            <li class="nav-item">
                                <a class="nav-link active" id="btn-pelanggaran" href="#">Pelanggaran</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="btn-riwayat" href="#">Riwayat Poin</a>
                            </li>
                        </ul>
                        <a href="#" class="btn btn-sm btn-primary float-right mb-4" data-toggle="modal"
                            data-target="#modalUpdate"><i class="fa fa-edit mr-2"></i>Kurangi Poin</a>
                        <section id="pelanggaran">
                            <h3 class="mx-3 mb-2">Pelanggaran Siswa</h3>
                            <div class="table-responsive">
                                <table id="basic-datatables" class="display table table-striped table-hover">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Pelanggaran</th>
                                            <th>Poin</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($no_pelanggaran as $p)
                                            <tr>
                                                <td style="text-align: center">{{ $loop->iteration }}</td>
                                                <td>{{ $p->Aturan->nama_aturan ?? 'Kosong' }}</td>
                                                <td style="text-align: center">{{ $p->Aturan->poin ?? 'Kosong' }}</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                    <tfoot>
                                        <tr class="bg-info" style= "color: white;">
                                            <th colspan="2" style="text-align: center;">JUMLAH POIN</th>
                                            <th style="text-align: center">{{ $siswa->poin }}</th>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                        </section>

                        <section id="histori-poin" class="d-none w-100">
                            <div class="d-flex align-items-center mx-3 mb-3 justify-content-between">
                                <h3 class="m-0">Riwayat Pengurangan Poin {{ $siswa->nama }}</h3>
                                {{-- <div class="d-flex align-items-center"> --}}
                                {{-- <button class="btn btn-sm btn-warning mr-2" id="btn-reset-poin">Reset Poin
                                        Siswa</button> --}}
                                {{-- </div> --}}
                            </div>
                            <div class="table-responsive">
                                <table id="table-histori" class="table table-striped table-bordered w-100">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Tanggal Waktu</th>
                                            <th>Aktivitas</th>
                                            <th>Poin Asal</th>
                                            <th>Poin Perubahan</th>
                                        </tr>
                                    </thead>
                                    <tbody></tbody>
                                </table>
                            </div>
                        </section>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" tabindex="-1" id="modalUpdate" role="dialog" aria-hidden="true"
        aria-labelledby="exampleModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" aria-labelledby="exampleModalLabel">Kurangi Poin Siswa</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('change.point', $siswa->nis) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Poin Siswa</label>
                                    <input type="text" class="form-control" id="poin_siswa" value="{{ $siswa->poin }}"
                                        readonly>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Poin Hasil</label>
                                    <input type="text" class="form-control" id="result" readonly>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Poin Pengurangan</label>
                                    <input type="text" name="poin" class="form-control"
                                        placeholder="Masukan Poin Pengurangan" onkeyup="displaySubtract(this.value)"
                                        onkeydown="displaySubtract(this.value)">
                                    @error('poin')
                                        <p class="text-danger timeout">* {{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                        </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal"><i
                            class="fa fa-ban mr-2"></i>Kembali</button>
                    <button type="submit" class="btn btn-primary"><i class="fa fa-save mr-2"></i>Simpan</button>
                </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script>
        $(document).ready(function() {
            $('#table-histori').DataTable({
                processing: true,
                serverSide: true,
                pageLength: 100,
                ajax: {
                    url: "{{ route('log-poin-siswa', $siswa->nis) }}",
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

            $('#btn-riwayat').click(function(e) {
                e.preventDefault();
                $(this).addClass('active');
                $('#btn-pelanggaran').removeClass('active');

                $('#pelanggaran').addClass('d-none');
                $('#histori-poin').removeClass('d-none');
            })

            $('#btn-pelanggaran').click(function(e) {
                e.preventDefault();
                $(this).addClass('active');
                $('#btn-riwayat').removeClass('active');

                $('#histori-poin').addClass('d-none');
                $('#pelanggaran').removeClass('d-none');
            })

            $('#btn-reset-poin').click(function(e) {
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
                    if (result.isConfirmed) {
                        window.location.href = "{{ route('reset-poin-siswa', $siswa->nis) }}";
                    }
                });
            })
        })
    </script>
@endsection
