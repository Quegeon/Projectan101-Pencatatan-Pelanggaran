<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('../assets/css/bootstrap.min.css') }}">
    <style>
        body {
            margin: 50px;
            padding: 50px;
        }
        table {
            width: 100%;
        }
        th, td {
            padding: 10px;
            text-align: justify;
        }
        th {
            font-weight: bold;
        }
        .spacer {
            height: 15px; 
        }
        .siswa-title, .pelanggaran-title {
            font-weight: bold;
            font-size: 1.2em;
        }
        .signature-table {
            width: 100%;
            margin: 20px auto;
        }
        .signature-table th, .signature-table td {
            text-align: right;
            padding: 10px;
        }
    </style>
    <title>Receipt</title>
</head>
<body onload="print()">
    <center>
        <tr>
            <th colspan="3" align="center">
                <h3>Pelanggaran Siswa</h3>
            </th>
        </tr>
    </center>
    <tr>
        <th><hr></th>
    </tr>
    <table>
     
        <tr class="spacer"></tr> 

        <tr>
            <td class="siswa-title">Siswa :</td>
            <td></td>
            <td></td>
        </tr>

        <tr>
            <td>NIS:</td>
            <td>{{$pelanggaran->Siswa->nis}}</td>
            <td></td>
        </tr>

        <tr>
            <td>Nama:</td>
            <td>{{$pelanggaran->Siswa->nama}}</td>
            <td></td>
        </tr>

        <tr>
            <td>Kelas:</td>
            <td>{{$pelanggaran->Siswa->Kelas->nama_kelas}}</td>
            <td></td>
        </tr>

        <tr class="spacer"></tr>

        
        <table border="1">
            <thead>
            <tr>
                <th class="pelanggaran-title" colspan="3">Pelanggaran :</th>
            </tr>
                <tr>
                    <td style="text-align: center"><strong> NO </strong></td>
                    <td><strong> Aturan </strong></td>
                    <td style="text-align: center"><strong> Poin </strong></td>
                </tr>
            </thead>
            <tbody>
                @foreach ($detail as $i)
                <tr>
                    <td style="text-align: center">{{$loop->iteration}}</td>
                    <td >{{$i->aturan->nama_aturan}}</td>
                    <td style="text-align: center">{{$i->aturan->poin}}</td>
                </tr>
                @endforeach
                <tr>
                    <td colspan="2" class="pelanggaran-title">Total Poin : </td>
                    <td style="text-align: center">
                        @php
                            $totalPoin = 0;
                            foreach ($detail as $i) {
                                $totalPoin += $i->aturan->poin;
                            }
                            echo $totalPoin;
                        @endphp
                    </td>
                </tr>
            </tbody>
        </table>
    </table>
    <hr>

    <table class="signature-table">
        <tr>
            <th colspan="3">Tanda tangan:</th>
        </tr>
        <tr>
            <td></td>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <td></td>
            <td></td>
            <td>{{ Auth()->User()->nama }}</td>
        </tr>
    </table>
</body>
</html>
