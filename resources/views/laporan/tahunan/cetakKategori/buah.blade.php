<table border="1">
    <thead>
        <tr>
            <th rowspan="2">Bulan</th>
            <th colspan="2">Total Buah (Kg)</th>
            <th colspan="2">Total (Rp)</th>
            <th rowspan="2">Pendapatan</th>
            <th rowspan="2">Biaya Produksi</th>
            <th rowspan="2">Gaji</th>
            <th rowspan="2">Total Laba</th>
            <th rowspan="2" style="width: 7%;">Selisih</th>
            <th rowspan="2" style="width: 7%;">Terjual Lagi</th>
            <th rowspan="2" style="width: 7%;">Sortir</th>
        </tr>
        <tr>
            <th style="width: 8%;">Pembelian</th>
            <th style="width: 8%;">Penjualan</th>
            <th>Pembelian</th>
            <th>Penjualan</th>
        </tr>
    </thead>
    <tbody class="text-center">
        @forelse ($jan as $item)
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
            <td class="text-right">{{ formatRupiahPdf($tonaseBeli) }}</td>
            <td class="text-right">{{ formatRupiahPdf($tonaseJual) }}</td>
            <td class="text-right">{{ formatRupiahPdf($biayaBeli) }}</td>
            <td class="text-right">{{ formatRupiahPdf($biayaJual) }}</td>
            <td class="text-right">{{ formatRupiahPdf($pendapatan) }}</td>
            <td class="text-right">{{ formatRupiahPdf($operasional) }}</td>
            <td class="text-right">{{ formatRupiahPdf($gaji) }}</td>
            <td class="text-right">{{ formatRupiahPdf($total) }}</td>
            <td class="text-right">{{ formatRupiahPdf($selisih) }}</td>
            <td class="text-right">{{ formatRupiahPdf($terjualLagi) }}</td>
            <td class="text-right">{{ formatRupiahPdf($sortir) }}</td>
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
            <td class="text-right">0</td>
            <td class="text-right">0</td>
            <td class="text-right">0</td>
            <td class="text-right">0</td>
            <td class="text-right">0</td>
        </tr>
        @endforelse
        @forelse ($feb as $item)
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
            <td class="text-right">{{ formatRupiahPdf($tonaseBeli) }}</td>
            <td class="text-right">{{ formatRupiahPdf($tonaseJual) }}</td>
            <td class="text-right">{{ formatRupiahPdf($biayaBeli) }}</td>
            <td class="text-right">{{ formatRupiahPdf($biayaJual) }}</td>
            <td class="text-right">{{ formatRupiahPdf($pendapatan) }}</td>
            <td class="text-right">{{ formatRupiahPdf($operasional) }}</td>
            <td class="text-right">{{ formatRupiahPdf($gaji) }}</td>
            <td class="text-right">{{ formatRupiahPdf($total) }}</td>
            <td class="text-right">{{ formatRupiahPdf($selisih) }}</td>
            <td class="text-right">{{ formatRupiahPdf($terjualLagi) }}</td>
            <td class="text-right">{{ formatRupiahPdf($sortir) }}</td>
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
            <td class="text-right">0</td>
            <td class="text-right">0</td>
            <td class="text-right">0</td>
            <td class="text-right">0</td>
            <td class="text-right">0</td>
        </tr>
        @endforelse
        @forelse ($mar as $item)
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
            <td class="text-right">{{ formatRupiahPdf($tonaseBeli) }}</td>
            <td class="text-right">{{ formatRupiahPdf($tonaseJual) }}</td>
            <td class="text-right">{{ formatRupiahPdf($biayaBeli) }}</td>
            <td class="text-right">{{ formatRupiahPdf($biayaJual) }}</td>
            <td class="text-right">{{ formatRupiahPdf($pendapatan) }}</td>
            <td class="text-right">{{ formatRupiahPdf($operasional) }}</td>
            <td class="text-right">{{ formatRupiahPdf($gaji) }}</td>
            <td class="text-right">{{ formatRupiahPdf($total) }}</td>
            <td class="text-right">{{ formatRupiahPdf($selisih) }}</td>
            <td class="text-right">{{ formatRupiahPdf($terjualLagi) }}</td>
            <td class="text-right">{{ formatRupiahPdf($sortir) }}</td>
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
            <td class="text-right">0</td>
            <td class="text-right">0</td>
            <td class="text-right">0</td>
            <td class="text-right">0</td>
            <td class="text-right">0</td>
        </tr>
        @endforelse
        @forelse ($apr as $item)
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
            <td class="text-right">{{ formatRupiahPdf($tonaseBeli) }}</td>
            <td class="text-right">{{ formatRupiahPdf($tonaseJual) }}</td>
            <td class="text-right">{{ formatRupiahPdf($biayaBeli) }}</td>
            <td class="text-right">{{ formatRupiahPdf($biayaJual) }}</td>
            <td class="text-right">{{ formatRupiahPdf($pendapatan) }}</td>
            <td class="text-right">{{ formatRupiahPdf($operasional) }}</td>
            <td class="text-right">{{ formatRupiahPdf($gaji) }}</td>
            <td class="text-right">{{ formatRupiahPdf($total) }}</td>
            <td class="text-right">{{ formatRupiahPdf($selisih) }}</td>
            <td class="text-right">{{ formatRupiahPdf($terjualLagi) }}</td>
            <td class="text-right">{{ formatRupiahPdf($sortir) }}</td>
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
            <td class="text-right">0</td>
            <td class="text-right">0</td>
            <td class="text-right">0</td>
            <td class="text-right">0</td>
            <td class="text-right">0</td>
        </tr>
        @endforelse
        @forelse ($mei as $item)
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
            <td class="text-right">{{ formatRupiahPdf($tonaseBeli) }}</td>
            <td class="text-right">{{ formatRupiahPdf($tonaseJual) }}</td>
            <td class="text-right">{{ formatRupiahPdf($biayaBeli) }}</td>
            <td class="text-right">{{ formatRupiahPdf($biayaJual) }}</td>
            <td class="text-right">{{ formatRupiahPdf($pendapatan) }}</td>
            <td class="text-right">{{ formatRupiahPdf($operasional) }}</td>
            <td class="text-right">{{ formatRupiahPdf($gaji) }}</td>
            <td class="text-right">{{ formatRupiahPdf($total) }}</td>
            <td class="text-right">{{ formatRupiahPdf($selisih) }}</td>
            <td class="text-right">{{ formatRupiahPdf($terjualLagi) }}</td>
            <td class="text-right">{{ formatRupiahPdf($sortir) }}</td>
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
            <td class="text-right">0</td>
            <td class="text-right">0</td>
            <td class="text-right">0</td>
            <td class="text-right">0</td>
            <td class="text-right">0</td>
        </tr>
        @endforelse
        @forelse ($jun as $item)
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
            <td class="text-right">{{ formatRupiahPdf($tonaseBeli) }}</td>
            <td class="text-right">{{ formatRupiahPdf($tonaseJual) }}</td>
            <td class="text-right">{{ formatRupiahPdf($biayaBeli) }}</td>
            <td class="text-right">{{ formatRupiahPdf($biayaJual) }}</td>
            <td class="text-right">{{ formatRupiahPdf($pendapatan) }}</td>
            <td class="text-right">{{ formatRupiahPdf($operasional) }}</td>
            <td class="text-right">{{ formatRupiahPdf($gaji) }}</td>
            <td class="text-right">{{ formatRupiahPdf($total) }}</td>
            <td class="text-right">{{ formatRupiahPdf($selisih) }}</td>
            <td class="text-right">{{ formatRupiahPdf($terjualLagi) }}</td>
            <td class="text-right">{{ formatRupiahPdf($sortir) }}</td>
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
            <td class="text-right">0</td>
            <td class="text-right">0</td>
            <td class="text-right">0</td>
            <td class="text-right">0</td>
            <td class="text-right">0</td>
        </tr>
        @endforelse
        @forelse ($jul as $item)
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
            <td class="text-right">{{ formatRupiahPdf($tonaseBeli) }}</td>
            <td class="text-right">{{ formatRupiahPdf($tonaseJual) }}</td>
            <td class="text-right">{{ formatRupiahPdf($biayaBeli) }}</td>
            <td class="text-right">{{ formatRupiahPdf($biayaJual) }}</td>
            <td class="text-right">{{ formatRupiahPdf($pendapatan) }}</td>
            <td class="text-right">{{ formatRupiahPdf($operasional) }}</td>
            <td class="text-right">{{ formatRupiahPdf($gaji) }}</td>
            <td class="text-right">{{ formatRupiahPdf($total) }}</td>
            <td class="text-right">{{ formatRupiahPdf($selisih) }}</td>
            <td class="text-right">{{ formatRupiahPdf($terjualLagi) }}</td>
            <td class="text-right">{{ formatRupiahPdf($sortir) }}</td>
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
            <td class="text-right">0</td>
            <td class="text-right">0</td>
            <td class="text-right">0</td>
            <td class="text-right">0</td>
            <td class="text-right">0</td>
        </tr>
        @endforelse
        @forelse ($aug as $item)
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
            <td class="text-right">{{ formatRupiahPdf($tonaseBeli) }}</td>
            <td class="text-right">{{ formatRupiahPdf($tonaseJual) }}</td>
            <td class="text-right">{{ formatRupiahPdf($biayaBeli) }}</td>
            <td class="text-right">{{ formatRupiahPdf($biayaJual) }}</td>
            <td class="text-right">{{ formatRupiahPdf($pendapatan) }}</td>
            <td class="text-right">{{ formatRupiahPdf($operasional) }}</td>
            <td class="text-right">{{ formatRupiahPdf($gaji) }}</td>
            <td class="text-right">{{ formatRupiahPdf($total) }}</td>
            <td class="text-right">{{ formatRupiahPdf($selisih) }}</td>
            <td class="text-right">{{ formatRupiahPdf($terjualLagi) }}</td>
            <td class="text-right">{{ formatRupiahPdf($sortir) }}</td>
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
            <td class="text-right">0</td>
            <td class="text-right">0</td>
            <td class="text-right">0</td>
            <td class="text-right">0</td>
            <td class="text-right">0</td>
        </tr>
        @endforelse
        @forelse ($sep as $item)
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
            <td class="text-right">{{ formatRupiahPdf($tonaseBeli) }}</td>
            <td class="text-right">{{ formatRupiahPdf($tonaseJual) }}</td>
            <td class="text-right">{{ formatRupiahPdf($biayaBeli) }}</td>
            <td class="text-right">{{ formatRupiahPdf($biayaJual) }}</td>
            <td class="text-right">{{ formatRupiahPdf($pendapatan) }}</td>
            <td class="text-right">{{ formatRupiahPdf($operasional) }}</td>
            <td class="text-right">{{ formatRupiahPdf($gaji) }}</td>
            <td class="text-right">{{ formatRupiahPdf($total) }}</td>
            <td class="text-right">{{ formatRupiahPdf($selisih) }}</td>
            <td class="text-right">{{ formatRupiahPdf($terjualLagi) }}</td>
            <td class="text-right">{{ formatRupiahPdf($sortir) }}</td>
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
            <td class="text-right">0</td>
            <td class="text-right">0</td>
            <td class="text-right">0</td>
            <td class="text-right">0</td>
            <td class="text-right">0</td>
        </tr>
        @endforelse
        @forelse ($okt as $item)
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
            <td class="text-right">{{ formatRupiahPdf($tonaseBeli) }}</td>
            <td class="text-right">{{ formatRupiahPdf($tonaseJual) }}</td>
            <td class="text-right">{{ formatRupiahPdf($biayaBeli) }}</td>
            <td class="text-right">{{ formatRupiahPdf($biayaJual) }}</td>
            <td class="text-right">{{ formatRupiahPdf($pendapatan) }}</td>
            <td class="text-right">{{ formatRupiahPdf($operasional) }}</td>
            <td class="text-right">{{ formatRupiahPdf($gaji) }}</td>
            <td class="text-right">{{ formatRupiahPdf($total) }}</td>
            <td class="text-right">{{ formatRupiahPdf($selisih) }}</td>
            <td class="text-right">{{ formatRupiahPdf($terjualLagi) }}</td>
            <td class="text-right">{{ formatRupiahPdf($sortir) }}</td>
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
            <td class="text-right">0</td>
            <td class="text-right">0</td>
            <td class="text-right">0</td>
            <td class="text-right">0</td>
            <td class="text-right">0</td>
        </tr>
        @endforelse
        @forelse ($nov as $item)
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
            <td class="text-right">{{ formatRupiahPdf($tonaseBeli) }}</td>
            <td class="text-right">{{ formatRupiahPdf($tonaseJual) }}</td>
            <td class="text-right">{{ formatRupiahPdf($biayaBeli) }}</td>
            <td class="text-right">{{ formatRupiahPdf($biayaJual) }}</td>
            <td class="text-right">{{ formatRupiahPdf($pendapatan) }}</td>
            <td class="text-right">{{ formatRupiahPdf($operasional) }}</td>
            <td class="text-right">{{ formatRupiahPdf($gaji) }}</td>
            <td class="text-right">{{ formatRupiahPdf($total) }}</td>
            <td class="text-right">{{ formatRupiahPdf($selisih) }}</td>
            <td class="text-right">{{ formatRupiahPdf($terjualLagi) }}</td>
            <td class="text-right">{{ formatRupiahPdf($sortir) }}</td>
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
            <td class="text-right">0</td>
            <td class="text-right">0</td>
            <td class="text-right">0</td>
            <td class="text-right">0</td>
            <td class="text-right">0</td>
        </tr>
        @endforelse
        @forelse ($des as $item)
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
            <td class="text-right">{{ formatRupiahPdf($tonaseBeli) }}</td>
            <td class="text-right">{{ formatRupiahPdf($tonaseJual) }}</td>
            <td class="text-right">{{ formatRupiahPdf($biayaBeli) }}</td>
            <td class="text-right">{{ formatRupiahPdf($biayaJual) }}</td>
            <td class="text-right">{{ formatRupiahPdf($pendapatan) }}</td>
            <td class="text-right">{{ formatRupiahPdf($operasional) }}</td>
            <td class="text-right">{{ formatRupiahPdf($gaji) }}</td>
            <td class="text-right">{{ formatRupiahPdf($total) }}</td>
            <td class="text-right">{{ formatRupiahPdf($selisih) }}</td>
            <td class="text-right">{{ formatRupiahPdf($terjualLagi) }}</td>
            <td class="text-right">{{ formatRupiahPdf($sortir) }}</td>
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
            <td class="text-right">0</td>
            <td class="text-right">0</td>
            <td class="text-right">0</td>
            <td class="text-right">0</td>
            <td class="text-right">0</td>
        </tr>
        @endforelse
        <tr>
            <th>Total</th>
            <th class="text-right">{{ formatRupiahPdf($tonaseBeliTotal) }}</th>
            <th class="text-right">{{ formatRupiahPdf($tonaseJualTotal) }}</th>
            <th class="text-right">{{ formatRupiahPdf($biayaBeliTotal) }}</th>
            <th class="text-right">{{ formatRupiahPdf($biayaJualTotal) }}</th>
            <th class="text-right">{{ formatRupiahPdf($pendapatanTotal) }}</th>
            <th class="text-right">{{ formatRupiahPdf($operasionalTotal) }}</th>
            <th class="text-right">{{ formatRupiahPdf($GajiTotal) }}</th>
            <th class="text-right">{{ formatRupiahPdf($totalTotal) }}</th>
            <th class="text-right">{{ formatRupiahPdf($selisihTotal) }}</th>
            <th class="text-right">{{ formatRupiahPdf($terjualLagiTotal) }}</th>
            <th class="text-right">{{ formatRupiahPdf($sortirTotal) }}</th>
        </tr>
    </tbody>
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