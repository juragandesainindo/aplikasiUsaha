<table class="table table-bordered text-center">
    <thead style="background: #DAEEF3;">
        <tr>
            <th>Bulan</th>
            <th>Total Pembelian</th>
            <th>Total Penjualan</th>
            <th>Pendapatan</th>
            <th>Biaya Produksi</th>
            <th>Gaji</th>
            <th>Laba Bersih</th>
        </tr>
    </thead>
    <tbody>
        @forelse($jan as $item)
        @php
        $tonaseBeli = $item->pembelian->sum('total_tonase_beli');
        $tonaseJual = $item->penjualan->sum('tonase_jual');
        $biayaBeli = $item->pembelian->sum('total_biaya_beli');
        $biayaJual = $item->penjualan->sum('total_jual');
        $pendapatan = $biayaJual - $biayaBeli;
        $operasional = $item->biaya->sum('jumlah_biaya');
        $gaji = $item->gaji->sum('gaji');
        $total = $pendapatan - $operasional - $gaji;
        $selisih = $tonaseJual - $tonaseBeli;
        $terjualLagi = $item->sisa->sum('tonase_sisa_terjual');
        $sortir = $selisih - $terjualLagi;
        @endphp
        <tr>
            <td>Januari</td>
            <td class="text-right">{{ formatRupiahPdf($biayaBeli) }}</td>
            <td class="text-right">{{ formatRupiahPdf($biayaJual) }}</td>
            <td class="text-right">{{ formatRupiahPdf($pendapatan) }}</td>
            <td class="text-right">{{ formatRupiahPdf($operasional) }}</td>
            <td class="text-right">{{ formatRupiahPdf($gaji) }}</td>
            <td class="text-right">{{ formatRupiahPdf($total) }}</td>
        </tr>
        @empty
        <tr>
            <td>Januari</td>
            <td class="text-right">0</td>
            <td class="text-right">0</td>
            <td class="text-right">0</td>
            <td class="text-right">0</td>
            <td class="text-right">0</td>
            <td class="text-right">0</td>
        </tr>
        @endforelse
        @forelse($feb as $item)
        @php
        $tonaseBeli = $item->pembelian->sum('total_tonase_beli');
        $tonaseJual = $item->penjualan->sum('tonase_jual');
        $biayaBeli = $item->pembelian->sum('total_biaya_beli');
        $biayaJual = $item->penjualan->sum('total_jual');
        $pendapatan = $biayaJual - $biayaBeli;
        $operasional = $item->biaya->sum('jumlah_biaya');
        $gaji = $item->gaji->sum('gaji');
        $total = $pendapatan - $operasional - $gaji;
        $selisih = $tonaseJual - $tonaseBeli;
        $terjualLagi = $item->sisa->sum('tonase_sisa_terjual');
        $sortir = $selisih - $terjualLagi;
        @endphp
        <tr>
            <td>Februari</td>
            <td class="text-right">{{ formatRupiahPdf($biayaBeli) }}</td>
            <td class="text-right">{{ formatRupiahPdf($biayaJual) }}</td>
            <td class="text-right">{{ formatRupiahPdf($pendapatan) }}</td>
            <td class="text-right">{{ formatRupiahPdf($operasional) }}</td>
            <td class="text-right">{{ formatRupiahPdf($gaji) }}</td>
            <td class="text-right">{{ formatRupiahPdf($total) }}</td>
        </tr>
        @empty
        <tr>
            <td>Februari</td>
            <td class="text-right">0</td>
            <td class="text-right">0</td>
            <td class="text-right">0</td>
            <td class="text-right">0</td>
            <td class="text-right">0</td>
            <td class="text-right">0</td>
        </tr>
        @endforelse
        @forelse($mar as $item)
        @php
        $tonaseBeli = $item->pembelian->sum('total_tonase_beli');
        $tonaseJual = $item->penjualan->sum('tonase_jual');
        $biayaBeli = $item->pembelian->sum('total_biaya_beli');
        $biayaJual = $item->penjualan->sum('total_jual');
        $pendapatan = $biayaJual - $biayaBeli;
        $operasional = $item->biaya->sum('jumlah_biaya');
        $gaji = $item->gaji->sum('gaji');
        $total = $pendapatan - $operasional - $gaji;
        $selisih = $tonaseJual - $tonaseBeli;
        $terjualLagi = $item->sisa->sum('tonase_sisa_terjual');
        $sortir = $selisih - $terjualLagi;
        @endphp
        <tr>
            <td>Maret</td>
            <td class="text-right">{{ formatRupiahPdf($biayaBeli) }}</td>
            <td class="text-right">{{ formatRupiahPdf($biayaJual) }}</td>
            <td class="text-right">{{ formatRupiahPdf($pendapatan) }}</td>
            <td class="text-right">{{ formatRupiahPdf($operasional) }}</td>
            <td class="text-right">{{ formatRupiahPdf($gaji) }}</td>
            <td class="text-right">{{ formatRupiahPdf($total) }}</td>
        </tr>
        @empty
        <tr>
            <td>Maret</td>
            <td class="text-right">0</td>
            <td class="text-right">0</td>
            <td class="text-right">0</td>
            <td class="text-right">0</td>
            <td class="text-right">0</td>
            <td class="text-right">0</td>
        </tr>
        @endforelse
        @forelse($apr as $item)
        @php
        $tonaseBeli = $item->pembelian->sum('total_tonase_beli');
        $tonaseJual = $item->penjualan->sum('tonase_jual');
        $biayaBeli = $item->pembelian->sum('total_biaya_beli');
        $biayaJual = $item->penjualan->sum('total_jual');
        $pendapatan = $biayaJual - $biayaBeli;
        $operasional = $item->biaya->sum('jumlah_biaya');
        $gaji = $item->gaji->sum('gaji');
        $total = $pendapatan - $operasional - $gaji;
        $selisih = $tonaseJual - $tonaseBeli;
        $terjualLagi = $item->sisa->sum('tonase_sisa_terjual');
        $sortir = $selisih - $terjualLagi;
        @endphp
        <tr>
            <td>April</td>
            <td class="text-right">{{ formatRupiahPdf($biayaBeli) }}</td>
            <td class="text-right">{{ formatRupiahPdf($biayaJual) }}</td>
            <td class="text-right">{{ formatRupiahPdf($pendapatan) }}</td>
            <td class="text-right">{{ formatRupiahPdf($operasional) }}</td>
            <td class="text-right">{{ formatRupiahPdf($gaji) }}</td>
            <td class="text-right">{{ formatRupiahPdf($total) }}</td>
        </tr>
        @empty
        <tr>
            <td>April</td>
            <td class="text-right">0</td>
            <td class="text-right">0</td>
            <td class="text-right">0</td>
            <td class="text-right">0</td>
            <td class="text-right">0</td>
            <td class="text-right">0</td>
        </tr>
        @endforelse
        @forelse($mei as $item)
        @php
        $tonaseBeli = $item->pembelian->sum('total_tonase_beli');
        $tonaseJual = $item->penjualan->sum('tonase_jual');
        $biayaBeli = $item->pembelian->sum('total_biaya_beli');
        $biayaJual = $item->penjualan->sum('total_jual');
        $pendapatan = $biayaJual - $biayaBeli;
        $operasional = $item->biaya->sum('jumlah_biaya');
        $gaji = $item->gaji->sum('gaji');
        $total = $pendapatan - $operasional - $gaji;
        $selisih = $tonaseJual - $tonaseBeli;
        $terjualLagi = $item->sisa->sum('tonase_sisa_terjual');
        $sortir = $selisih - $terjualLagi;
        @endphp
        <tr>
            <td>Mei</td>
            <td class="text-right">{{ formatRupiahPdf($biayaBeli) }}</td>
            <td class="text-right">{{ formatRupiahPdf($biayaJual) }}</td>
            <td class="text-right">{{ formatRupiahPdf($pendapatan) }}</td>
            <td class="text-right">{{ formatRupiahPdf($operasional) }}</td>
            <td class="text-right">{{ formatRupiahPdf($gaji) }}</td>
            <td class="text-right">{{ formatRupiahPdf($total) }}</td>
        </tr>
        @empty
        <tr>
            <td>Mei</td>
            <td class="text-right">0</td>
            <td class="text-right">0</td>
            <td class="text-right">0</td>
            <td class="text-right">0</td>
            <td class="text-right">0</td>
            <td class="text-right">0</td>
        </tr>
        @endforelse
        @forelse($jun as $item)
        @php
        $tonaseBeli = $item->pembelian->sum('total_tonase_beli');
        $tonaseJual = $item->penjualan->sum('tonase_jual');
        $biayaBeli = $item->pembelian->sum('total_biaya_beli');
        $biayaJual = $item->penjualan->sum('total_jual');
        $pendapatan = $biayaJual - $biayaBeli;
        $operasional = $item->biaya->sum('jumlah_biaya');
        $gaji = $item->gaji->sum('gaji');
        $total = $pendapatan - $operasional - $gaji;
        $selisih = $tonaseJual - $tonaseBeli;
        $terjualLagi = $item->sisa->sum('tonase_sisa_terjual');
        $sortir = $selisih - $terjualLagi;
        @endphp
        <tr>
            <td>Juni</td>
            <td class="text-right">{{ formatRupiahPdf($biayaBeli) }}</td>
            <td class="text-right">{{ formatRupiahPdf($biayaJual) }}</td>
            <td class="text-right">{{ formatRupiahPdf($pendapatan) }}</td>
            <td class="text-right">{{ formatRupiahPdf($operasional) }}</td>
            <td class="text-right">{{ formatRupiahPdf($gaji) }}</td>
            <td class="text-right">{{ formatRupiahPdf($total) }}</td>
        </tr>
        @empty
        <tr>
            <td>Juni</td>
            <td class="text-right">0</td>
            <td class="text-right">0</td>
            <td class="text-right">0</td>
            <td class="text-right">0</td>
            <td class="text-right">0</td>
            <td class="text-right">0</td>
        </tr>
        @endforelse
        @forelse($jul as $item)
        @php
        $tonaseBeli = $item->pembelian->sum('total_tonase_beli');
        $tonaseJual = $item->penjualan->sum('tonase_jual');
        $biayaBeli = $item->pembelian->sum('total_biaya_beli');
        $biayaJual = $item->penjualan->sum('total_jual');
        $pendapatan = $biayaJual - $biayaBeli;
        $operasional = $item->biaya->sum('jumlah_biaya');
        $gaji = $item->gaji->sum('gaji');
        $total = $pendapatan - $operasional - $gaji;
        $selisih = $tonaseJual - $tonaseBeli;
        $terjualLagi = $item->sisa->sum('tonase_sisa_terjual');
        $sortir = $selisih - $terjualLagi;
        @endphp
        <tr>
            <td>Juli</td>
            <td class="text-right">{{ formatRupiahPdf($biayaBeli) }}</td>
            <td class="text-right">{{ formatRupiahPdf($biayaJual) }}</td>
            <td class="text-right">{{ formatRupiahPdf($pendapatan) }}</td>
            <td class="text-right">{{ formatRupiahPdf($operasional) }}</td>
            <td class="text-right">{{ formatRupiahPdf($gaji) }}</td>
            <td class="text-right">{{ formatRupiahPdf($total) }}</td>
        </tr>
        @empty
        <tr>
            <td>Juli</td>
            <td class="text-right">0</td>
            <td class="text-right">0</td>
            <td class="text-right">0</td>
            <td class="text-right">0</td>
            <td class="text-right">0</td>
            <td class="text-right">0</td>
        </tr>
        @endforelse
        @forelse($aug as $item)
        @php
        $tonaseBeli = $item->pembelian->sum('total_tonase_beli');
        $tonaseJual = $item->penjualan->sum('tonase_jual');
        $biayaBeli = $item->pembelian->sum('total_biaya_beli');
        $biayaJual = $item->penjualan->sum('total_jual');
        $pendapatan = $biayaJual - $biayaBeli;
        $operasional = $item->biaya->sum('jumlah_biaya');
        $gaji = $item->gaji->sum('gaji');
        $total = $pendapatan - $operasional - $gaji;
        $selisih = $tonaseJual - $tonaseBeli;
        $terjualLagi = $item->sisa->sum('tonase_sisa_terjual');
        $sortir = $selisih - $terjualLagi;
        @endphp
        <tr>
            <td>Agustus</td>
            <td class="text-right">{{ formatRupiahPdf($biayaBeli) }}</td>
            <td class="text-right">{{ formatRupiahPdf($biayaJual) }}</td>
            <td class="text-right">{{ formatRupiahPdf($pendapatan) }}</td>
            <td class="text-right">{{ formatRupiahPdf($operasional) }}</td>
            <td class="text-right">{{ formatRupiahPdf($gaji) }}</td>
            <td class="text-right">{{ formatRupiahPdf($total) }}</td>
        </tr>
        @empty
        <tr>
            <td>Agustus</td>
            <td class="text-right">0</td>
            <td class="text-right">0</td>
            <td class="text-right">0</td>
            <td class="text-right">0</td>
            <td class="text-right">0</td>
            <td class="text-right">0</td>
        </tr>
        @endforelse
        @forelse($sep as $item)
        @php
        $tonaseBeli = $item->pembelian->sum('total_tonase_beli');
        $tonaseJual = $item->penjualan->sum('tonase_jual');
        $biayaBeli = $item->pembelian->sum('total_biaya_beli');
        $biayaJual = $item->penjualan->sum('total_jual');
        $pendapatan = $biayaJual - $biayaBeli;
        $operasional = $item->biaya->sum('jumlah_biaya');
        $gaji = $item->gaji->sum('gaji');
        $total = $pendapatan - $operasional - $gaji;
        $selisih = $tonaseJual - $tonaseBeli;
        $terjualLagi = $item->sisa->sum('tonase_sisa_terjual');
        $sortir = $selisih - $terjualLagi;
        @endphp
        <tr>
            <td>September</td>
            <td class="text-right">{{ formatRupiahPdf($biayaBeli) }}</td>
            <td class="text-right">{{ formatRupiahPdf($biayaJual) }}</td>
            <td class="text-right">{{ formatRupiahPdf($pendapatan) }}</td>
            <td class="text-right">{{ formatRupiahPdf($operasional) }}</td>
            <td class="text-right">{{ formatRupiahPdf($gaji) }}</td>
            <td class="text-right">{{ formatRupiahPdf($total) }}</td>
        </tr>
        @empty
        <tr>
            <td>September</td>
            <td class="text-right">0</td>
            <td class="text-right">0</td>
            <td class="text-right">0</td>
            <td class="text-right">0</td>
            <td class="text-right">0</td>
            <td class="text-right">0</td>
        </tr>
        @endforelse
        @forelse($okt as $item)
        @php
        $tonaseBeli = $item->pembelian->sum('total_tonase_beli');
        $tonaseJual = $item->penjualan->sum('tonase_jual');
        $biayaBeli = $item->pembelian->sum('total_biaya_beli');
        $biayaJual = $item->penjualan->sum('total_jual');
        $pendapatan = $biayaJual - $biayaBeli;
        $operasional = $item->biaya->sum('jumlah_biaya');
        $gaji = $item->gaji->sum('gaji');
        $total = $pendapatan - $operasional - $gaji;
        $selisih = $tonaseJual - $tonaseBeli;
        $terjualLagi = $item->sisa->sum('tonase_sisa_terjual');
        $sortir = $selisih - $terjualLagi;
        @endphp
        <tr>
            <td>Oktober</td>
            <td class="text-right">{{ formatRupiahPdf($biayaBeli) }}</td>
            <td class="text-right">{{ formatRupiahPdf($biayaJual) }}</td>
            <td class="text-right">{{ formatRupiahPdf($pendapatan) }}</td>
            <td class="text-right">{{ formatRupiahPdf($operasional) }}</td>
            <td class="text-right">{{ formatRupiahPdf($gaji) }}</td>
            <td class="text-right">{{ formatRupiahPdf($total) }}</td>
        </tr>
        @empty
        <tr>
            <td>Oktober</td>
            <td class="text-right">0</td>
            <td class="text-right">0</td>
            <td class="text-right">0</td>
            <td class="text-right">0</td>
            <td class="text-right">0</td>
            <td class="text-right">0</td>
        </tr>
        @endforelse
        @forelse($nov as $item)
        @php
        $tonaseBeli = $item->pembelian->sum('total_tonase_beli');
        $tonaseJual = $item->penjualan->sum('tonase_jual');
        $biayaBeli = $item->pembelian->sum('total_biaya_beli');
        $biayaJual = $item->penjualan->sum('total_jual');
        $pendapatan = $biayaJual - $biayaBeli;
        $operasional = $item->biaya->sum('jumlah_biaya');
        $gaji = $item->gaji->sum('gaji');
        $total = $pendapatan - $operasional - $gaji;
        $selisih = $tonaseJual - $tonaseBeli;
        $terjualLagi = $item->sisa->sum('tonase_sisa_terjual');
        $sortir = $selisih - $terjualLagi;
        @endphp
        <tr>
            <td>November</td>
            <td class="text-right">{{ formatRupiahPdf($biayaBeli) }}</td>
            <td class="text-right">{{ formatRupiahPdf($biayaJual) }}</td>
            <td class="text-right">{{ formatRupiahPdf($pendapatan) }}</td>
            <td class="text-right">{{ formatRupiahPdf($operasional) }}</td>
            <td class="text-right">{{ formatRupiahPdf($gaji) }}</td>
            <td class="text-right">{{ formatRupiahPdf($total) }}</td>
        </tr>
        @empty
        <tr>
            <td>November</td>
            <td class="text-right">0</td>
            <td class="text-right">0</td>
            <td class="text-right">0</td>
            <td class="text-right">0</td>
            <td class="text-right">0</td>
            <td class="text-right">0</td>
        </tr>
        @endforelse
        @forelse($des as $item)
        @php
        $tonaseBeli = $item->pembelian->sum('total_tonase_beli');
        $tonaseJual = $item->penjualan->sum('tonase_jual');
        $biayaBeli = $item->pembelian->sum('total_biaya_beli');
        $biayaJual = $item->penjualan->sum('total_jual');
        $pendapatan = $biayaJual - $biayaBeli;
        $operasional = $item->biaya->sum('jumlah_biaya');
        $gaji = $item->gaji->sum('gaji');
        $total = $pendapatan - $operasional - $gaji;
        $selisih = $tonaseJual - $tonaseBeli;
        $terjualLagi = $item->sisa->sum('tonase_sisa_terjual');
        $sortir = $selisih - $terjualLagi;
        @endphp
        <tr>
            <td>Desember</td>
            <td class="text-right">{{ formatRupiahPdf($biayaBeli) }}</td>
            <td class="text-right">{{ formatRupiahPdf($biayaJual) }}</td>
            <td class="text-right">{{ formatRupiahPdf($pendapatan) }}</td>
            <td class="text-right">{{ formatRupiahPdf($operasional) }}</td>
            <td class="text-right">{{ formatRupiahPdf($gaji) }}</td>
            <td class="text-right">{{ formatRupiahPdf($total) }}</td>
        </tr>
        @empty
        <tr>
            <td>Desember</td>
            <td class="text-right">0</td>
            <td class="text-right">0</td>
            <td class="text-right">0</td>
            <td class="text-right">0</td>
            <td class="text-right">0</td>
            <td class="text-right">0</td>
        </tr>
        @endforelse
    </tbody>
    <tfoot>
        <tr>
            <th>Grand Total</th>
            <th class="text-right">{{ formatRupiahPdf($biayaBeliTotal) }}</th>
            <th class="text-right">{{ formatRupiahPdf($biayaJualTotal) }}</th>
            <th class="text-right">{{ formatRupiahPdf($pendapatanTotal) }}</th>
            <th class="text-right">{{ formatRupiahPdf($operasionalTotal) }}</th>
            <th class="text-right">{{ formatRupiahPdf($GajiTotal) }}</th>
            <th class="text-right">{{ formatRupiahPdf($totalTotal) }}</th>
        </tr>
    </tfoot>
</table>