<div class="col">
    <div class="row d-flex align-items-center justify-content-center">
        <div class="col-5">
            <div class="credential-content">
                <table>
                    <tr>
                        <th class="pr-5">NIS</th>
                        <td>: {{ $siswa->nis }}</td>
                    </tr>
                    <tr>
                        <th class="pr-5">Nama</th>
                        <td>: {{ $siswa->nama }}</td>
                    </tr>
                    <tr>
                        <th class="pr-5">Kelas</th>
                        <td>: {{ $siswa->Kelas->nama_kelas }}</td>
                    </tr>
                </table>
            </div>
        </div>
        <div class="col-4">
            <div class="card d-flex p-3 m-0" style="border: #868686 dashed 2px;">
                <div class="d-flex justify-content-around align-items-center">
                    <h5 class="fs-5">Jumlah Poin :</h5>
                    <div class="card px-5 m-0"
                        style="border: @if ($siswa->poin >= 0 && $siswa->poin <= 25) #00a500 solid 2px; background: rgba(0, 165, 0, 0.5);
                    @elseif($siswa->poin >= 50)
                        #0000FF solid 2px; background: rgba(0, 0, 255, 0.5);
                    @elseif($siswa->poin <= 75)
                        #ffa500 solid 2px; background: rgba(255, 165, 0, 0.5);
                    @else
                        #ff1717 solid 2px; background: rgba(255, 23, 23, 0.5); @endif">
                        <h1 class="my-3 font-weight-bold text-white" style="font-size: 34px;">{{ $siswa->poin }}</h1>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="content-body d-flex justify-content-center" style="margin-top: 15%">
    <div class="col-12 p-0">
        <ul class="nav nav-tabs mb-4 mt-2">
            <li class="nav-item">
                <a class="nav-link active" id="btn-pelanggaran">Pelanggaran</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="btn-riwayat">Riwayat Poin</a>
            </li>
        </ul>
        <section id="pelanggaran-data">
            <table id="datatable-pelanggaran" class="table table-striped table-hover">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Pelanggaran</th>
                        <th>Poin</th>
                    </tr>
                </thead>
                <tbody></tbody>
                <tfoot>
                    <tr class="bg-info" style="color: white;">
                        <th colspan="2" style="text-align: center;">JUMLAH POIN</th>
                        <th style="text-align: center">{{ $siswa->poin }}</th>
                    </tr>
                </tfoot>
            </table>
        </section>
        <section id="riwayat-data" class="d-none w-100">
            <table id="datatable-riwayat" class="table table-striped table-hover">
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
        </section>
    </div>
</div>

<script>
    $(document).ready(function() {
        $('#datatable-pelanggaran').DataTable({
            processing: true,
            serverSide: true,
            pageLength: 5,
            ajax: {
                url: "{{ route('search.history.siswa', $url_crypt) }}",
                method: 'GET'
            },
            columns: [{
                    name: 'No',
                    data: 'DT_RowIndex'
                },
                {
                    name: 'Pelanggaran',
                    data: 'pelanggaran'
                },
                {
                    name: 'Poin',
                    data: 'poin'
                }
            ]
        });

        $('#datatable-riwayat').DataTable({
            processing: true,
            serverSide: true,
            pageLength: 5,
            ajax: {
                url: "{{ route('log-poin-siswa', $url_crypt) }}",
                method: 'GET'
            },
            columns: [{
                    name: 'No',
                    data: 'DT_RowIndex'
                },
                {
                    name: 'Tanggal Waktu',
                    data: 'masked_datetime'
                },
                {
                    name: 'Aktivitas',
                    data: 'aktivitas'
                },
                {
                    name: 'Poin Asal',
                    data: 'poin_asal'
                },
                {
                    name: 'Poin Perubahan',
                    data: 'poin_perubahan'
                }
            ]
        });

        $('#btn-pelanggaran').on('click', function() {
            $(this).addClass('active');
            $('#pelanggaran-data').removeClass('d-none');
            $('#riwayat-data').addClass('d-none');
            $('#btn-riwayat').removeClass('active');
        });

        $('#btn-riwayat').on('click', function() {
            $(this).addClass('active');
            $('#riwayat-data').removeClass('d-none');
            $('#pelanggaran-data').addClass('d-none');
            $('#btn-pelanggaran').removeClass('active');
        });
    });
</script>
