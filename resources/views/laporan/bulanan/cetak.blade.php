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
        }

        .text-left {
            text-align: left;
        }

        .text-center {
            text-align: center;
        }

        .text-right {
            text-align: right;
            padding-right: 2px;
        }
    </style>
</head>

<body onload="window.print()">

    <h1>LAPORAN UNIT {{ $usaha->nama_usaha }} PERBULAN</h1>
    <div class="judul">Periode Bulan {{ $month }}/{{
        $year
        }}</div>

    @if ($usaha->kategori == 'buah')
    @include('laporan.bulanan.cetakKategori.buah')
    @else
    @include('laporan.bulanan.cetakKategori.dagang')
    @endif

</body>

</html>