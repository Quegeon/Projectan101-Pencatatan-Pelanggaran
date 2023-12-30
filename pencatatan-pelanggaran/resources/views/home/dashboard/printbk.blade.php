<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Print | Petugas</title>
    <link rel="stylesheet" href="{{ asset('../assets/css/bootstrap.min.css') }}">
</head>
<body onload="print()">
  
    <div class="page-inner">
        <div class="page-header">
            <h4 class="page-title">Print Data Pelanggaran</h4>
        </div>
    
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <h5>Data Pelanggaran</h5>
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Petugas</th>
                                    <th>Bk</th>
                                    <th>Siswa</th>
                                    <th>Aturan</th>
                                    <th>Tanggal</th>
                                    <th>Keterangan</th>
                                    <th>Status</th>
                                    <th>Poin</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($pelanggaran as $p)
                                    <tr>
                                        <td align="center">{{ $loop->iteration }}</td>
                                        <td>{{ optional($p->user)->nama ?? "Kosong" }}</td>
                                        <td>{{ optional($p->bk)->nama ?? "Kosong" }}</td>
                                        <td>{{ optional($p->siswa)->nama ?? "Kosong" }}</td>
                                        <td>{{ optional($p->aturan)->nama_aturan ?? "Kosong" }}</td>
                                        <td>{{ $p->tgl_pelanggaran }}</td>
                                        <td>{{ $p->keterangan }}</td>
                                        <td>{{ $p->status }}</td>
                                        <td>{{ optional($p)->total_poin ?? "Kosong" }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>
</html>




