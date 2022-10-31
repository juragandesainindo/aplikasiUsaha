<table border="1">
    <thead>
        <tr>
            <th>Bulan</th>
            <th>Total Pembelian</th>
            <th>Total Penjualan</th>
            <th>Pendapatan</th>
            <th>Biaya Produksi</th>
            <th>Laba Bersih</th>
        </tr>
    </thead>
    <tbody class="text-center">
        <tr>
            <td>Januari</td>
            <td>{{ formatRupiah($pembelianDagangJan) }}</td>
            <td>{{ formatRupiah($totalPenjualanJan) }}</td>
            <td>{{ formatRupiah($pendapatanDagangJan) }}</td>
            <td>{{ formatRupiah($biayaProduksiJan) }}</td>
            <td>{{ formatRupiah($labaKotorJan) }}</td>
        </tr>
        <tr>
            <td>Februari</td>
            <td>{{ formatRupiah($pembelianDagangFeb) }}</td>
            <td>{{ formatRupiah($totalPenjualanFeb) }}</td>
            <td>{{ formatRupiah($pendapatanDagangFeb) }}</td>
            <td>{{ formatRupiah($biayaProduksiFeb) }}</td>
            <td>{{ formatRupiah($labaKotorFeb) }}</td>
        </tr>
        <tr>
            <td>Maret</td>
            <td>{{ formatRupiah($pembelianDagangMar) }}</td>
            <td>{{ formatRupiah($totalPenjualanMar) }}</td>
            <td>{{ formatRupiah($pendapatanDagangMar) }}</td>
            <td>{{ formatRupiah($biayaProduksiMar) }}</td>
            <td>{{ formatRupiah($labaKotorMar) }}</td>
        </tr>
        <tr>
            <td>April</td>
            <td>{{ formatRupiah($pembelianDagangApr) }}</td>
            <td>{{ formatRupiah($totalPenjualanApr) }}</td>
            <td>{{ formatRupiah($pendapatanDagangApr) }}</td>
            <td>{{ formatRupiah($biayaProduksiApr) }}</td>
            <td>{{ formatRupiah($labaKotorApr) }}</td>
        </tr>
        <tr>
            <td>Mei</td>
            <td>{{ formatRupiah($pembelianDagangMei) }}</td>
            <td>{{ formatRupiah($totalPenjualanMei) }}</td>
            <td>{{ formatRupiah($pendapatanDagangMei) }}</td>
            <td>{{ formatRupiah($biayaProduksiMei) }}</td>
            <td>{{ formatRupiah($labaKotorMei) }}</td>
        </tr>
        <tr>
            <td>Juni</td>
            <td>{{ formatRupiah($pembelianDagangJun) }}</td>
            <td>{{ formatRupiah($totalPenjualanJun) }}</td>
            <td>{{ formatRupiah($pendapatanDagangJun) }}</td>
            <td>{{ formatRupiah($biayaProduksiJun) }}</td>
            <td>{{ formatRupiah($labaKotorJun) }}</td>
        </tr>
        <tr>
            <td>Juli</td>
            <td>{{ formatRupiah($pembelianDagangJul) }}</td>
            <td>{{ formatRupiah($totalPenjualanJul) }}</td>
            <td>{{ formatRupiah($pendapatanDagangJul) }}</td>
            <td>{{ formatRupiah($biayaProduksiJul) }}</td>
            <td>{{ formatRupiah($labaKotorJul) }}</td>
        </tr>
        <tr>
            <td>Agustus</td>
            <td>{{ formatRupiah($pembelianDagangAug) }}</td>
            <td>{{ formatRupiah($totalPenjualanAug) }}</td>
            <td>{{ formatRupiah($pendapatanDagangAug) }}</td>
            <td>{{ formatRupiah($biayaProduksiAug) }}</td>
            <td>{{ formatRupiah($labaKotorAug) }}</td>
        </tr>
        <tr>
            <td>September</td>
            <td>{{ formatRupiah($pembelianDagangSep) }}</td>
            <td>{{ formatRupiah($totalPenjualanSep) }}</td>
            <td>{{ formatRupiah($pendapatanDagangSep) }}</td>
            <td>{{ formatRupiah($biayaProduksiSep) }}</td>
            <td>{{ formatRupiah($labaKotorSep) }}</td>
        </tr>
        <tr>
            <td>Oktober</td>
            <td>{{ formatRupiah($pembelianDagangOkt) }}</td>
            <td>{{ formatRupiah($totalPenjualanOkt) }}</td>
            <td>{{ formatRupiah($pendapatanDagangOkt) }}</td>
            <td>{{ formatRupiah($biayaProduksiOkt) }}</td>
            <td>{{ formatRupiah($labaKotorOkt) }}</td>
        </tr>
        <tr>
            <td>November</td>
            <td>{{ formatRupiah($pembelianDagangNov) }}</td>
            <td>{{ formatRupiah($totalPenjualanNov) }}</td>
            <td>{{ formatRupiah($pendapatanDagangNov) }}</td>
            <td>{{ formatRupiah($biayaProduksiNov) }}</td>
            <td>{{ formatRupiah($labaKotorNov) }}</td>
        </tr>
        <tr>
            <td>Desember</td>
            <td>{{ formatRupiah($pembelianDagangDes) }}</td>
            <td>{{ formatRupiah($totalPenjualanDes) }}</td>
            <td>{{ formatRupiah($pendapatanDagangDes) }}</td>
            <td>{{ formatRupiah($biayaProduksiDes) }}</td>
            <td>{{ formatRupiah($labaKotorDes) }}</td>
        </tr>
    </tbody>
    <tfoot>
        <tr>
            <th colspan="6" style="height: 10px;"></th>
        </tr>
        <tr>
            <th>Grand Total</th>
            <th>{{ formatRupiah($pembelianDagangTotal) }}</th>
            <th>{{ formatRupiah($totalPenjualanTotal) }}</th>
            <th>{{ formatRupiah($pendapatanDagangTotal) }}</th>
            <th>{{ formatRupiah($biayaProduksiTotal) }}</th>
            <th>{{ formatRupiah($labaKotorTotal) }}</th>
        </tr>
    </tfoot>
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
    <br><br><br>
    <tr>
        <td><strong>SYARIF FATAHILLAH</strong></td>
    </tr>
</table>