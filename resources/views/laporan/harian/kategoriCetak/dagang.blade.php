<h1>Laporan Harian {{ $periode->keterangan }}<br><span>{{ $periode->datausaha->nama_usaha }}</span></h1>

<div class="judul">A. Pembelian</div>
<table border="1" class="text-center">
    <thead>
        <tr class="pembelian">
            <th width="10%">No</th>
            <th width="20%">Nama Supplier</th>
            <th width="20%">Nama Barang</th>
            <th width="10%">Qty (Pcs)</th>
            <th>Harga Barang (Rp)</th>
            <th>Total Harga (Rp)</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($periode->pembelian as $key => $item)
        <tr class="pembelian">
            <td>{{ ++$key }}</td>
            <td>{{ $item->nama_supplier }}</td>
            <td>{{ $item->nama_barang }}</td>
            <td class="text-right">{{ formatRupiahPdf($item->tonase_super) }}</td>
            <td class="text-right">{{ formatRupiahPdf($item->harga_super) }}</td>
            <td class="text-right">{{ formatRupiahPdf($item->total_biaya_beli) }}</td>
        </tr>
        @endforeach
    </tbody>
    <tfoot>
        <tr class="pembelian">
            <th colspan="3">Total</th>
            <th class="text-right">{{ formatRupiahPdf($tonasesuper) }}</th>
            <th></th>
            <th class="text-right">{{ formatRupiahPdf($totalbiaya) }}</th>
        </tr>
    </tfoot>
</table>

<br>

<div class="judul">B. Penjualan</div>
<table border="1" class="text-center">
    <thead>
        <tr>
            <th width="10%">No</th>
            <th width="20%">Nama Penjual</th>
            <th width="20%">Nama Barang</th>
            <th width="10%">Tonase</th>
            <th>Harga Jual Produksi</th>
            <th>Total Harga Jual</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($periode->penjualan as $key => $item)
        <tr>
            <td>{{ ++$key }}</td>
            <td>{{ $item->nama_penjual }}</td>
            <td>{{ $item->pembelian->nama_barang }}</td>
            <td class="text-right">{{ formatRupiahPdf($item->tonase_jual) }}</td>
            <td class="text-right">{{ formatRupiahPdf($item->harga_jual) }}
            </td>
            <td class="text-right">{{ formatRupiahPdf($item->total_jual) }}
            </td>
        </tr>
        @endforeach
    </tbody>
    <tfoot>
        <tr>
            <th colspan="3">Total</th>
            <th class="text-right">{{ formatRupiahPdf($tonasejual) }}</th>
            <th></th>
            <th class="text-right">{{ formatRupiahPdf($totaljual) }}</th>
        </tr>
    </tfoot>
</table>

<br>

<div class="judul">C. Pendapatan Produksi</div>
<table border="1" class="text-center">
    <thead>
        <tr>
            <th width="10%">No</th>
            <th width="40%">Title</th>
            <th width="30%">Jumlah</th>
            <th>Keterangan</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td class="text-center">1</td>
            <td>Pendapatan Kotor Produksi</td>
            <td class="text-right">{{ formatRupiahPdf($pendapatankotor) }}</td>
            <td>
                @if ($pendapatankotor < 0) Minus @else @endif </td>
        </tr>
    </tbody>
</table>

<br>

<div class="judul">D. Biaya Produksi</div>
<table border="1" class="text-center">
    <thead>
        <tr>
            <th width="10%">No</th>
            <th width="20%">Title Biaya</th>
            <th width="20%">Jumlah Biaya</th>
            <th>Keterangan</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($periode->biaya as $key => $bi)
        <tr>
            <td>{{ ++$key }}</td>
            <td>{{ $bi->title_biaya }}</td>
            <td class="text-right">{{ formatRupiahPdf($bi->jumlah_biaya) }}</td>
            <td></td>
        </tr>
        @endforeach
    </tbody>
    <tfoot>
        <tr>
            <th></th>
            <th>Total Biaya</th>
            <th class="text-right">{{ formatRupiahPdf($jumlahbiaya) }}</th>
            <th></th>
        </tr>
    </tfoot>
</table>

<br>

<div class="judul">E. Laba Rugi Harian</div>
<table class="text-center">
    <tr style="font-size:11pt">
        <th width="30%" class="text-left">Laba Rugi</th>
        <th width="70%">{{ formatRupiahPdf($labarugi) }}</th>
    </tr>
</table>

<br><br><br>

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