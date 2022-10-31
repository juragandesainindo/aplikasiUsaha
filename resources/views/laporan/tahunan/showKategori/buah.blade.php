<table class="table table-bordered text-center">
    <thead style="background: #DAEEF3;">
        <tr>
            <th rowspan="2">Bulan</th>
            <th colspan="2">Total Buah (Kg)</th>
            <th colspan="2">Total (Rp)</th>
            <th rowspan="2">Pendapatan</th>
            <th rowspan="2">Biaya Produksi</th>
            <th rowspan="2">Total Laba</th>
            <th rowspan="2">Selisih</th>
            <th rowspan="2">Terjual Lagi</th>
            <th rowspan="2">Sortir</th>
        </tr>
        <tr>
            <th>Pembelian</th>
            <th>Penjualan</th>
            <th>Pembelian</th>
            <th>Penjualan</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td>Januari</td>
            <td>{{ $totalTonaseBeliJan }}</td>
            <td>{{ $totalTonaseJualJan }}</td>
            <td>{{ formatRupiah($totalPembelianJan) }}</td>
            <td>{{ formatRupiah($totalPenjualanJan) }}</td>
            <td>{{ formatRupiah($pendapatanJan) }}</td>
            <td>{{ formatRupiah($operasionalJan) }}</td>
            <td>{{ formatRupiah($totalJan) }}</td>
            <td>{{ $selisihJan }} </td>
            <td>{{ $terjualLagiJan }}</td>
            <td>{{ $sortirJan }}</td>
        </tr>
        <tr>
            <td>Februari</td>
            <td>{{ $totalTonaseBeliFeb }}</td>
            <td>{{ $totalTonaseJualFeb }}</td>
            <td>{{ formatRupiah($totalPembelianFeb) }}</td>
            <td>{{ formatRupiah($totalPenjualanFeb) }}</td>
            <td>{{ formatRupiah($pendapatanFeb) }}</td>
            <td>{{ formatRupiah($operasionalFeb) }}</td>
            <td>{{ formatRupiah($totalFeb) }}</td>
            <td>{{ $selisihFeb }} </td>
            <td>{{ $terjualLagiFeb }}</td>
            <td>{{ $sortirFeb }}</td>
        </tr>
        <tr>
            <td>Maret</td>
            <td>{{ $totalTonaseBeliMar }}</td>
            <td>{{ $totalTonaseJualMar }}</td>
            <td>{{ formatRupiah($totalPembelianMar) }}</td>
            <td>{{ formatRupiah($totalPenjualanMar) }}</td>
            <td>{{ formatRupiah($pendapatanMar) }}</td>
            <td>{{ formatRupiah($operasionalMar) }}</td>
            <td>{{ formatRupiah($totalMar) }}</td>
            <td>{{ $selisihMar }} </td>
            <td>{{ $terjualLagiMar }}</td>
            <td>{{ $sortirMar }}</td>
        </tr>
        <tr>
            <td>April</td>
            <td>{{ $totalTonaseBeliApr }}</td>
            <td>{{ $totalTonaseJualApr }}</td>
            <td>{{ formatRupiah($totalPembelianApr) }}</td>
            <td>{{ formatRupiah($totalPenjualanApr) }}</td>
            <td>{{ formatRupiah($pendapatanApr) }}</td>
            <td>{{ formatRupiah($operasionalApr) }}</td>
            <td>{{ formatRupiah($totalApr) }}</td>
            <td>{{ $selisihApr }} </td>
            <td>{{ $terjualLagiApr }}</td>
            <td>{{ $sortirApr }}</td>
        </tr>
        <tr>
            <td>Mei</td>
            <td>{{ $totalTonaseBeliMei }}</td>
            <td>{{ $totalTonaseJualMei }}</td>
            <td>{{ formatRupiah($totalPembelianMei) }}</td>
            <td>{{ formatRupiah($totalPenjualanMei) }}</td>
            <td>{{ formatRupiah($pendapatanMei) }}</td>
            <td>{{ formatRupiah($operasionalMei) }}</td>
            <td>{{ formatRupiah($totalMei) }}</td>
            <td>{{ $selisihMei }} </td>
            <td>{{ $terjualLagiMei }}</td>
            <td>{{ $sortirMei }}</td>
        </tr>
        <tr>
            <td>Juni</td>
            <td>{{ $totalTonaseBeliJun }}</td>
            <td>{{ $totalTonaseJualJun }}</td>
            <td>{{ formatRupiah($totalPembelianJun) }}</td>
            <td>{{ formatRupiah($totalPenjualanJun) }}</td>
            <td>{{ formatRupiah($pendapatanJun) }}</td>
            <td>{{ formatRupiah($operasionalJun) }}</td>
            <td>{{ formatRupiah($totalJun) }}</td>
            <td>{{ $selisihJun }} </td>
            <td>{{ $terjualLagiJun }}</td>
            <td>{{ $sortirJun }}</td>
        </tr>
        <tr>
            <td>Juli</td>
            <td>{{ $totalTonaseBeliJul }}</td>
            <td>{{ $totalTonaseJualJul }}</td>
            <td>{{ formatRupiah($totalPembelianJul) }}</td>
            <td>{{ formatRupiah($totalPenjualanJul) }}</td>
            <td>{{ formatRupiah($pendapatanJul) }}</td>
            <td>{{ formatRupiah($operasionalJul) }}</td>
            <td>{{ formatRupiah($totalJul) }}</td>
            <td>{{ $selisihJul }} </td>
            <td>{{ $terjualLagiJul }}</td>
            <td>{{ $sortirJul }}</td>
        </tr>
        <tr>
            <td>Agustus</td>
            <td>{{ $totalTonaseBeliAug }}</td>
            <td>{{ $totalTonaseJualAug }}</td>
            <td>{{ formatRupiah($totalPembelianAug) }}</td>
            <td>{{ formatRupiah($totalPenjualanAug) }}</td>
            <td>{{ formatRupiah($pendapatanAug) }}</td>
            <td>{{ formatRupiah($operasionalAug) }}</td>
            <td>{{ formatRupiah($totalAug) }}</td>
            <td>{{ $selisihAug }} </td>
            <td>{{ $terjualLagiAug }}</td>
            <td>{{ $sortirAug }}</td>
        </tr>
        <tr>
            <td>September</td>
            <td>{{ $totalTonaseBeliSep }}</td>
            <td>{{ $totalTonaseJualSep }}</td>
            <td>{{ formatRupiah($totalPembelianSep) }}</td>
            <td>{{ formatRupiah($totalPenjualanSep) }}</td>
            <td>{{ formatRupiah($pendapatanSep) }}</td>
            <td>{{ formatRupiah($operasionalSep) }}</td>
            <td>{{ formatRupiah($totalSep) }}</td>
            <td>{{ $selisihSep }} </td>
            <td>{{ $terjualLagiSep }}</td>
            <td>{{ $sortirSep }}</td>
        </tr>
        <tr>
            <td>Oktober</td>
            <td>{{ $totalTonaseBeliOkt }}</td>
            <td>{{ $totalTonaseJualOkt }}</td>
            <td>{{ formatRupiah($totalPembelianOkt) }}</td>
            <td>{{ formatRupiah($totalPenjualanOkt) }}</td>
            <td>{{ formatRupiah($pendapatanOkt) }}</td>
            <td>{{ formatRupiah($operasionalOkt) }}</td>
            <td>{{ formatRupiah($totalOkt) }}</td>
            <td>{{ $selisihOkt }} </td>
            <td>{{ $terjualLagiOkt }}</td>
            <td>{{ $sortirOkt }}</td>
        </tr>
        <tr>
            <td>November</td>
            <td>{{ $totalTonaseBeliNov }}</td>
            <td>{{ $totalTonaseJualNov }}</td>
            <td>{{ formatRupiah($totalPembelianNov) }}</td>
            <td>{{ formatRupiah($totalPenjualanNov) }}</td>
            <td>{{ formatRupiah($pendapatanNov) }}</td>
            <td>{{ formatRupiah($operasionalNov) }}</td>
            <td>{{ formatRupiah($totalNov) }}</td>
            <td>{{ $selisihNov }} </td>
            <td>{{ $terjualLagiNov }}</td>
            <td>{{ $sortirNov }}</td>
        </tr>
        <tr>
            <td>Desember</td>
            <td>{{ $totalTonaseBeliDes }}</td>
            <td>{{ $totalTonaseJualDes }}</td>
            <td>{{ formatRupiah($totalPembelianDes) }}</td>
            <td>{{ formatRupiah($totalPenjualanDes) }}</td>
            <td>{{ formatRupiah($pendapatanDes) }}</td>
            <td>{{ formatRupiah($operasionalDes) }}</td>
            <td>{{ formatRupiah($totalDes) }}</td>
            <td>{{ $selisihDes }} </td>
            <td>{{ $terjualLagiDes }}</td>
            <td>{{ $sortirDes }}</td>
        </tr>
    </tbody>
    <tfoot>
        <tr>
            <th>Grand Total</th>
            <th>{{ $totalTonaseBeliTotal }}</th>
            <th>{{ $totalTonaseJualTotal }}</th>
            <th>{{ formatRupiah($totalPembelianTotal) }}</th>
            <th>{{ formatRupiah($totalPenjualanTotal) }}</th>
            <th>{{ formatRupiah($pendapatanTotal) }}</th>
            <th>{{ formatRupiah($operasionalTotal) }}</th>
            <th>{{ formatRupiah($totalTotal) }}</th>
            <th>{{ $selisihTotal }} </th>
            <th>{{ $terjualLagiTotal }}</th>
            <th>{{ $sortirTotal }}</th>
        </tr>
    </tfoot>
</table>