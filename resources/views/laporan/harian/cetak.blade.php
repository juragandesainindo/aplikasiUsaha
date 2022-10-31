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

        span {
            font-weight: normal;
            text-transform: capitalize;
        }

        .pembelian {
            font-size: 10pt;
        }

        .judul {
            font-size: 11pt;
            font-weight: bold;
            margin-bottom: 5px;
        }

        table {
            table-layout: fixed;
            width: 100%;
            border-collapse: collapse;
        }

        thead {
            background-color: #FDE9D9;
        }

        thead tr th,
        tbody tr td,
        tfoot tr th {
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
        }

        .text-justify {
            text-align: justify;
        }
    </style>
</head>

<body>
    @if ($periode->datausaha->kategori == 'buah')
    @include('laporan.harian.kategoriCetak.buah')
    @elseif ($periode->datausaha->kategori == 'dagang')
    @include('laporan.harian.kategoriCetak.dagang')
    @elseif ($periode->datausaha->kategori == 'peternakan')
    @include('laporan.harian.kategoriCetak.ternak')
    @elseif ($periode->datausaha->kategori == 'kebun')
    @include('laporan.harian.kategoriCetak.kebun')
    @endif


</body>

</html>