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
            height: 15px; /* Adjust spacing height as needed */
        }
        .signature-table {
            width: 50%;
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
     
        <tr class="spacer"></tr> <!-- Spacer row -->

        <tr>
            <td>Siswa :</td>
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

        <tr class="spacer"></tr> <!-- Spacer row -->

        <tr>
            <td>Pelanggaran :</td>
            <td></td>
            <td></td>
        </tr>

        <tr>
            <td>Jenis:</td>
            <td>{{$pelanggaran->Aturan->Jenis->nama_jenis}}</td>
            <td></td>
        </tr>

        <tr>
            <td>Aturan:</td>
            <td>{{$pelanggaran->Aturan->nama_aturan}}</td>
            <td></td>
        </tr>

        <tr>
            <td>Hukuman:</td>
            <td>{{$pelanggaran->Aturan->Hukuman->hukuman}}</td>
            <td></td>
        </tr>

        <tr>
            <td>Poin:</td>
            <td>{{$pelanggaran->total_poin}}</td>
            <td></td>
        </tr>
    </table>
    <hr>
    
    <!-- Signature Column -->
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
