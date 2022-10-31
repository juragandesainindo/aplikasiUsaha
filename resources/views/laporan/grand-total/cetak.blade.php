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

    <h1>LAPORAN GRAND TOTAL</h1>
    <div class="judul">Periode {{ $year }}</div>
    <table border="1">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Usaha</th>
                <th>Pendapatan</th>
                <th>Biaya Produksi</th>
                <th>Total Laba</th>
            </tr>
        </thead>
        <tbody class="text-center">
            @php
            $no=1;
            @endphp
            @foreach ($periode as $item)
            @foreach ($item->take(1) as $usaha)
            @if ($usaha->datausaha->kategori == 'buah')
            <tr>
                <td>{{ $no++ }}</td>
                <td>{{ $usaha->datausaha->nama_usaha }}</td>
                <td>{{ formatRupiah($pendapatanBuah) }}</td>
                <td>{{ formatRupiah($biayaBuah) }}</td>
                <td>{{ formatRupiah($labaBuah) }}</td>
            </tr>
            @elseif ($usaha->datausaha->kategori == 'peternakan')
            <tr>
                <td>{{ $no++ }}</td>
                <td>{{ $usaha->datausaha->nama_usaha }}</td>
                <td>{{ formatRupiah($pendapatanTernak) }}</td>
                <td>{{ formatRupiah($biayaTernak) }}</td>
                <td>{{ formatRupiah($labaTernak) }}</td>
            </tr>
            @elseif ($usaha->datausaha->kategori == 'dagang')
            <tr>
                <td>{{ $no++ }}</td>
                <td>{{ $usaha->datausaha->nama_usaha }}</td>
                <td>{{ formatRupiah($pendapatanDagang) }}</td>
                <td>{{ formatRupiah($biayaDagang) }}</td>
                <td>{{ formatRupiah($labaDagang) }}</td>
            </tr>
            @elseif ($usaha->datausaha->kategori == 'kebun')
            <tr>
                <td>{{ $no++ }}</td>
                <td>{{ $usaha->datausaha->nama_usaha }}</td>
                <td>{{ formatRupiah($pendapatanKebun) }}</td>
                <td>{{ formatRupiah($biayaKebun) }}</td>
                <td>{{ formatRupiah($labaKebun) }}</td>
            </tr>
            @endif
            @endforeach
            @endforeach
        </tbody>
        <tfoot>
            <th></th>
            <th>Total</th>
            <th>{{ formatRupiah($pendapatanTotal) }}</th>
            <th>{{ formatRupiah($biayaTotal) }}</th>
            <th>{{ formatRupiah($labaTotal) }}</th>
        </tfoot>
    </table>

    <br><br>
    <table>
        <tr>
            <td><strong>Pekanbaru, {{ \Carbon\Carbon::parse(date(now()))->isoFormat('DD MMMM Y') }}</strong>,</td>
        </tr>
        <tr>
            <td>dibuat oleh:</td>
        </tr>
        <br><br><br>
        <tr>
            <td><strong>SYARIF FATAHILLAH</strong></td>
        </tr>
    </table>
</body>

</html>