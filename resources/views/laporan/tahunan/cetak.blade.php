<!DOCTYPE html>
<html lang="en">

<head>

    <style>
        * {
            font-family: 'Cambria', sans-serif;
        }

        h1 {
            font-size: 12pt;
            font-weight: bold;
            text-align: center;
            text-transform: uppercase;
        }

        .judul {
            font-weight: bold;
            margin-bottom: 5px;
            font-size: 11pt;
        }

        .sub-judul {
            font-weight: bold;
            margin-bottom: 5px;
            font-size: 10pt;
        }

        table {
            table-layout: fixed;
            width: 100%;
            border-collapse: collapse;
        }

        thead {
            background-color: #DAEEF3;
        }

        th,
        td,
        p {
            font-size: 10pt;
            padding: 5px;
        }

        .text-left {
            text-align: left;
        }

        .text-center {
            text-align: center;
        }

        .text-right {
            text-align: right;
            padding-right: 8px;
        }
    </style>
</head>

<body>

    <h1>Laporan Tahunan {{ $usaha->nama_usaha }}</h1>

    <div class="judul">Periode {{ $year }}</div>
    @if ($usaha->kategori == 'buah')
    @include('laporan.tahunan.cetakKategori.buah')
    @else
    @include('laporan.tahunan.cetakKategori.dagang')
    @endif



</body>

</html>