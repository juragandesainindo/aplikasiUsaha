<h1>Laporan Harian {{ $periode->keterangan }}<br><span>{{ $periode->datausaha->nama_usaha }}</span></h1>

<div class="judul">A. Pembelian</div>
<table border="1" class="text-center">
    <thead>
        <tr class="pembelian">
            <th width="10%">No</th>
            <th width="20%">Nama Supplier</th>
            <th width="10%">Tonase (Kg)</th>
            <th>Harga Beli (Rp)</th>
            <th>Total Harga Beli (Rp)</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($periode->pembelian as $key => $item)
        <tr class="pembelian">
            <td>{{ ++$key }}</td>
            <td>{{ $item->nama_supplier }}</td>
            <td>{{ $item->tonase_super }}</td>
            <td>{{ formatRupiah($item->harga_super) }}</td>
            <td>{{ formatRupiah($item->total_super) }}</td>
        </tr>
        @endforeach
    </tbody>
    <tfoot>
        <tr class="pembelian">
            <th colspan="2">Total</th>
            <th>{{ $tonasesuper }}</th>
            <th></th>
            <th>{{ formatRupiah($totalsuper) }}</th>
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
            <th width="10%">Tonase (Kg)</th>
            <th>Harga Jual (Rp)</th>
            <th>Total Harga Jual (Rp)</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($periode->penjualan as $key => $item)
        <tr>
            <td>{{ ++$key }}</td>
            <td>{{ $item->nama_penjual }}</td>
            <td>{{ number_format($item->tonase_jual) }}</td>
            <td>{{ formatRupiah($item->harga_jual) }}
            </td>
            <td>{{ formatRupiah($item->total_jual) }}
            </td>
        </tr>
        @endforeach
    </tbody>
    <tfoot>
        <tr>
            <th colspan="2">Total</th>
            <th>{{ $tonasejual }}</th>
            <th></th>
            <th>{{ formatRupiah($totaljual) }}</th>
        </tr>
    </tfoot>
</table>

<br>

<div class="judul">C. Pendapatan Produksi</div>
<table border="1" class="text-center">
    <thead>
        <tr>
            <th width="10%">No</th>
            <th width="20%">Title</th>
            <th width="20%">Jumlah</th>
            <th>Keterangan</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td>1</td>
            <td>Selisih Tonase</td>
            <td>{{ number_format($selisihTonaseKebun) }}</td>
            <td></td>
        </tr>
        <tr>
            <td>2</td>
            <td>Pendapatan Kotor Produksi</td>
            <td>{{ formatRupiah($pendapatanKotorDagang) }}</td>
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
            <td>{{ formatRupiah($bi->jumlah_biaya) }}</td>
            <td></td>
        </tr>
        @endforeach
    </tbody>
    <tfoot>
        <tr>
            <th colspan="2">Total Biaya</th>
            <th>{{ formatRupiah($jumlahbiaya) }}</th>
            <th></th>
        </tr>
    </tfoot>
</table>

<br>

<div class="judul">E. Laba Rugi Harian</div>
<table class="text-center">
    <tr style="font-size:11pt">
        <th width="30%" class="text-left">Laba Rugi</th>
        <th width="70%">{{ formatRupiah($labaRugiDagang) }}</th>
    </tr>
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