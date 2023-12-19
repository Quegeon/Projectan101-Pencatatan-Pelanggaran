<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('../assets/css/bootstrap.min.css') }}">
    <title>Receipt</title>
</head>
<body onload="print()">
    <center>
    <tr>
        <th colspan="3"><h3>Pelanggaran Siswa</h3></th>
    </tr>
    </center>
    <tr>
        <th colspan="3" align="justify">Siswa : {{$pelanggaran->Siswa->nis}} | {{$pelanggaran->Siswa->nama}} | {{$pelanggaran->Siswa->Kelas->nama_kelas}}</th>
    </tr>
</body>
</html>