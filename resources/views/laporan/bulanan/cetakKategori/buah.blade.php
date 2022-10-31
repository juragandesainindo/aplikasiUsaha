<table border="1">
    <thead>
        <tr>
            <th rowspan="2" style="width: 3%;">No</th>
            <th rowspan="2" style="width: 10%;">Tanggal</th>
            <th colspan="2">Total Buah/KG</th>
            <th rowspan="2">Pembelian</th>
            <th rowspan="2">Penjualan</th>
            <th rowspan="2">Pendapatan</th>
            <th rowspan="2">Biaya Produksi</th>
            <th rowspan="2">Total Laba</th>
            <th rowspan="2" style="width: 7%;">Selisih</th>
            <th rowspan="2" style="width: 7%;">Terjual Lagi</th>
            <th rowspan="2" style="width: 7%;">Sortir</th>
        </tr>
        <tr>
            <th style="width: 8%;">Pembelian</th>
            <th style="width: 8%;">Penjualan</th>
        </tr>
    </thead>
    <tbody>
        @forelse ($periode->sortBy('tanggal_awal') as $item)
        <tr class="text-center">
            <td>{{ $loop->iteration }}</td>
            <td>{{ \Carbon\Carbon::parse($item->tanggal_awal)->isoFormat('DD') }} - {{
                \Carbon\Carbon::parse($item->tanggal_akhir)->isoFormat('DD/MM/Y') }}
            </td>
            <td>{{ $item->pembelian->sum('total_tonase_beli') }}</td>
            <td>{{ $item->penjualan->sum('tonase_jual') }}</td>
            <td>{{ formatRupiah($item->pembelian->sum('total_biaya_beli')) }}
            </td>
            <td>{{ formatRupiah($item->penjualan->sum('total_jual')) }}
            </td>
            <td>{{
                formatRupiah($item->penjualan->sum('total_jual')-$item->pembelian->sum('total_biaya_beli'))
                }}</td>
            <td>{{ formatRupiah($item->biaya->sum('jumlah_biaya') +
                $item->gaji->sum('gaji')) }}</td>

            <td>{{
                formatRupiah(($item->penjualan->sum('total_jual')-$item->pembelian->sum('total_biaya_beli'))-($item->biaya->sum('jumlah_biaya')
                +
                $item->gaji->sum('gaji'))) }}</td>
            <td>{{
                $item->penjualan->sum('tonase_jual')-$item->pembelian->sum('total_tonase_beli')
                }}
            </td>
            <td>{{ $item->sisa->sum('tonase_sisa_terjual') }}</td>
            <td>{{
                ($item->penjualan->sum('tonase_jual')-$item->pembelian->sum('total_tonase_beli'))+$item->sisa->sum('tonase_sisa_terjual')
                }}</td>
        </tr>
        @empty
        <tr>
            <th colspan="12" class="text-center text-danger">Data tidak di temukan</th>
        </tr>
        @endforelse
    </tbody>
    <tfoot>
        <tr>
            <th colspan="2" class="text-center">Total</th>
            <th>{{ $totalTonaseBeli }}</th>
            <th>{{ $totalTonaseJual }}</th>
            <th>Rp.&nbsp;{{ number_format($totalPembelian) }}</th>
            <th>Rp.&nbsp;{{ number_format($totalPenjualan) }}</th>
            <th>Rp.&nbsp;{{ number_format($pendapatan) }}</th>
            <th>Rp.&nbsp;{{ number_format($operasional) }}</th>
            <th>Rp.&nbsp;{{ number_format($total) }}</th>
            <th>{{ $selisih }} </th>
            <th>{{ $terjualLagi }}</th>
            <th>{{ $sortir }}</th>
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
    <br><br><br>
    <tr>
        <td><strong>SYARIF FATAHILLAH</strong></td>
    </tr>
</table>