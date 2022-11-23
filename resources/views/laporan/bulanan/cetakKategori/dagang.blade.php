<table border="1">
    <thead>
        <th width="5%">No</th>
        <th>Tanggal</th>
        <th>Total Pembelian</th>
        <th>Total Penjualan</th>
        <th>Pendapatan</th>
        <th>Biaya Produksi</th>
        <th>Gaji</th>
        <th>Laba Bersih</th>
    </thead>
    <tbody>
        @forelse ($periode->sortBy('tanggal_awal') as $item)
        <tr class="text-center">
            <td>{{ $loop->iteration }}</td>
            <td>{{ \Carbon\Carbon::parse($item->tanggal_awal)->isoFormat('DD') }} - {{
                \Carbon\Carbon::parse($item->tanggal_akhir)->isoFormat('DD/MM/Y') }}
            </td>
            <td class="text-right">{{ formatRupiahPdf($item->pembelian->sum('total_biaya_beli')) }}</td>
            <td class="text-right">{{ formatRupiahPdf($item->penjualan->sum('total_jual')) }}</td>
            <td class="text-right">{{
                formatRupiahPdf($item->penjualan->sum('total_jual')-$item->pembelian->sum('total_biaya_beli')) }}
            </td>
            <td class="text-right">{{ formatRupiahPdf($item->biaya->sum('jumlah_biaya')) }}
            </td>
            <td class="text-right">{{ formatRupiahPdf($item->gaji->sum('gaji')) }}
            </td>
            <td class="text-right">{{
                formatRupiahPdf(($item->penjualan->sum('total_jual')-$item->pembelian->sum('total_biaya_beli'))-($item->biaya->sum('jumlah_biaya')+$item->gaji->sum('gaji')))
                }}</td>
        </tr>
        @empty
        <tr>
            <th colspan="7" class="text-center text-danger">Data tidak di temukan</th>
        </tr>
        @endforelse
    </tbody>
    <tfoot>
        <tr>
            <th colspan="2" class="text-center">Total</th>
            <th class="text-right">{{ formatRupiahPdf($totalPembelian) }}</th>
            <th class="text-right">{{ formatRupiahPdf($totalPenjualan) }}</th>
            <th class="text-right">{{ formatRupiahPdf($pendapatan) }}</th>
            <th class="text-right">{{ formatRupiahPdf($operasional) }}</th>
            <th class="text-right">{{ formatRupiahPdf($totalGaji) }}</th>
            <th class="text-right">{{ formatRupiahPdf($total) }}</th>
        </tr>
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