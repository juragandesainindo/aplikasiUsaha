<h1>Laporan Harian {{ $periode->keterangan }}</h1>
<div class="judul">A. Pembelian</div>
<table border="1">
    <thead>
        <tr class="pembelian">
            <th rowspan="2" width="3%">No</th>
            <th rowspan="2">Nama Supplier</th>
            <th colspan="2">Super</th>
            <th colspan="2">Bulat</th>
            <th colspan="2">Sortiran</th>
            <th colspan="3">Total Laba</th>
            <th rowspan="2">Total Biaya</th>
            <th rowspan="2">Total Tonase</th>
        </tr>
        <tr class="pembelian">
            <th style="width: 7%;">Harga</th>
            <th style="width: 7%;">Tonase</th>
            <th style="width: 7%;">Harga</th>
            <th style="width: 7%;">Tonase</th>
            <th style="width: 7%;">Harga</th>
            <th style="width: 7%;">Tonase</th>
            <th>Super</th>
            <th>Bulat</th>
            <th>Sortiran</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($periode->pembelian as $key => $item)
        <tr class="pembelian">
            <td style="text-align: center;">{{ ++$key }}</td>
            <td>{{ $item->nama_supplier }}</td>
            <td class="text-right">{{ formatRupiahPdf($item->harga_super) }}</td>
            <td class="text-right">{{ formatRupiahPdf($item->tonase_super) }}</td>
            <td class="text-right">{{ formatRupiahPdf($item->harga_bulat) }}</td>
            <td class="text-right">{{ formatRupiahPdf($item->tonase_bulat) }}</td>
            <td class="text-right">{{ formatRupiahPdf($item->harga_sortiran) }}</td>
            <td class="text-right">{{ formatRupiahPdf($item->tonase_sortiran) }}</td>
            <td class="text-right">{{ formatRupiahPdf($item->total_super)
                }}</td>
            <td class="text-right">{{ formatRupiahPdf($item->total_bulat)
                }}</td>
            <td class="text-right">{{
                formatRupiahPdf($item->total_sortiran) }}
            </td>
            <td class="text-right">{{ formatRupiahPdf($item->total_biaya_beli)
                }}</td>
            <td class="text-right">{{ formatRupiahPdf($item->total_tonase_beli) }}</td>
        </tr>
        @endforeach
    </tbody>
    <tfoot>
        <tr class="pembelian">
            <th></th>
            <th>Total</th>
            <th></th>
            <th class="text-right">{{ formatRupiahPdf($tonasesuper) }}</th>
            <th></th>
            <th class="text-right">{{ formatRupiahPdf($tonasebulat) }}</th>
            <th></th>
            <th class="text-right">{{ formatRupiahPdf($tonasesortiran) }}</th>
            <th class="text-right">{{ formatRupiahPdf($totalsuper) }}</th>
            <th class="text-right">{{ formatRupiahPdf($totalbulat) }}</th>
            <th class="text-right">{{ formatRupiahPdf($totalsortiran) }}</th>
            <th class="text-right">{{ formatRupiahPdf($totalbiaya) }}</th>
            <th class="text-right">{{ formatRupiahPdf($totaltonase) }}</th>
        </tr>
        <tr class="pembelian">
            <th></th>
            <th>Grand Total</th>
            <th colspan="10" class="text-right">{{ formatRupiahPdf($grandtotalbeli) }}
            </th>
            <th></th>
        </tr>
    </tfoot>
</table>

<br>

<div class="judul">B. Penjualan</div>
<table border="1">
    <thead>
        <tr>
            <th style="width: 5%;">No</th>
            <th style="width: 15%;">Nama Penjual</th>
            <th style="width: 10%;">Harga Jual Produksi</th>
            <th style="width: 10%;">Tonase</th>
            <th style="width: 15%;">Total Harga Jual</th>
            <th>Keterangan</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($periode->penjualan as $key => $item)
        <tr>
            <td class="text-center">{{ ++$key }}</td>
            <td>{{ $item->nama_penjual }}</td>
            <td class="text-right">{{ formatRupiahPdf($item->harga_jual) }}
            </td>
            <td class="text-right">{{ formatRupiahPdf($item->tonase_jual) }}</td>
            <td class="text-right">{{ formatRupiahPdf($item->total_jual) }}
            </td>
            <td></td>
        </tr>
        @endforeach
    </tbody>
    <tfoot>
        <tr>
            <th></th>
            <th>Total</th>
            <th></th>
            <th class="text-right">{{ formatRupiahPdf($tonasejual) }}</th>
            <th class="text-right">{{ formatRupiahPdf($totaljual) }}</th>
            <th></th>
        </tr>
    </tfoot>
</table>

<br>

<div class="judul">C. Pendapatan Produksi</div>
<table border="1">
    <thead>
        <tr>
            <th style="width: 5%;">No</th>
            <th style="width: 30%;">Title</th>
            <th style="width: 15%;">Jumlah</th>
            <th>Keterangan</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td class="text-center">1</td>
            <td>Harga Rata-Rata Perkilogram</td>
            <td class="text-right">{{ formatRupiahPdf($hargaratarata) }}</td>
            <td></td>
        </tr>
        <tr>
            <td class="text-center">2</td>
            <td>Selisih Tonase</td>
            <td class="text-right">{{ formatRupiahPdf($selisihtonase) }}</td>
            <td>
                @if ($selisihtonase < 0) <span>Tidak Terjual</span>
                    @else
                    @endif
            </td>
        </tr>
        <tr>
            <td class="text-center">3</td>
            <td>Selisih Harga</td>
            <td class="text-right">{{ formatRupiahPdf($selisihharga) }}</td>
            <td></td>
        </tr>
        <tr>
            <td class="text-center">4</td>
            <td>Pendapatan Kotor Produksi</td>
            <td class="text-right">{{ formatRupiahPdf($pendapatankotor) }}</td>
            <td>
                @if ($pendapatankotor < 0) Minus @else @endif </td>
        </tr>
    </tbody>
</table>

<br>

<div class="judul">D. Biaya Produksi</div>
<table border="1">
    <thead>
        <tr>
            <th style="width: 5%;">No</th>
            <th style="width: 20%;">Title Biaya</th>
            <th style="width: 15%;">Jumlah Biaya</th>
            <th>Keterangan</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($periode->biaya as $key => $bi)
        <tr>
            <td class="text-center">{{ ++$key }}</td>
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

<br><br>

<div class="judul">E. Gaji</div>
<table border="1">
    <thead>
        <tr>
            <th style="width: 5%;">No</th>
            <th style="width: 20%;">Nama</th>
            <th style="width: 15%;">Gaji</th>
            <th>Keterangan</th>
        </tr>
    </thead>
    <tbody>
        @php
        $no=1;
        @endphp
        @foreach ($periode->gaji as $item)
        <tr>
            <td class="text-center">{{ $no++ }}</td>
            <td>{{ $item->nama }}</td>
            <td class="text-right">{{ formatRupiahPdf($item->gaji) }}</td>
            <td></td>
        </tr>
        @endforeach
    </tbody>
    <tfoot>
        <tr>
            <th></th>
            <th></th>
            <th class="text-right">{{ formatRupiahPdf($jumlahgaji) }}</th>
            <th></th>
        </tr>
    </tfoot>
</table>

<br>

<div class="judul">f. Laba Rugi Harian</div>
<table border="1">
    <thead>
        <tr>
            <th style="width: 40%;">Laba Rugi</th>
            <th style="width:">{{ formatRupiahPdf($labarugi) }}</th>
        </tr>
    </thead>
</table>

<br><br>
<table>
    <tr>
        <td><strong></strong></td>
    </tr>
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