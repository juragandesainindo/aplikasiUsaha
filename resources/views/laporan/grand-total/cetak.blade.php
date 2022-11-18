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

        td {
            padding: 0px 5px;
        }

        th,
        td,
        p {
            font-size: 10pt;
            padding: 5px;
        }

        .text-left {
            text-align: left;
            padding-left: 8px;
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

    <h1>LAPORAN GRAND TOTAL</h1>
    <div class="judul">
        <strong>Periode {{ request()->print }}</strong>
    </div>
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
        <tbody>
            @php
            $no=1;
            @endphp
            @foreach ($usahas as $item)
            <tr>
                <td class="text-center" width="10%">{{ $no++ }}</td>
                <td class="text-left">{{ $item->nama_usaha }}</td>
                <td class="text-right">

                    {{
                    formatRupiahPdf($item->penjualan->sum('total_jual')-$item->pembelian->sum('total_biaya_beli'))
                    }}
                </td>
                <td class="text-right">
                    {{ formatRupiahPdf($item->biaya->sum('jumlah_biaya') +
                    $item->gaji->sum('gaji')) }}
                </td>
                <td class="text-right">
                    {{
                    formatRupiahPdf(($item->penjualan->sum('total_jual')-$item->pembelian->sum('total_biaya_beli')-($item->biaya->sum('jumlah_biaya')
                    + $item->gaji->sum('gaji'))))
                    }}
                </td>

            </tr>
            @endforeach
        </tbody>
        <tfoot>
            <th colspan="2" class="text-center">Total</th>
            <th class="text-right">
                {{ formatRupiahPdf($pendapatanTotal) }}
            </th>
            <th class="text-right">
                {{ formatRupiahPdf($biayaTotal) }}
            </th>
            <th class="text-right">
                {{ formatRupiahPdf($totalLaba) }}
            </th>
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
        <tr>
            <td><strong>SYARIF FATAHILLAH</strong></td>
        </tr>
    </table>
</body>

</html>