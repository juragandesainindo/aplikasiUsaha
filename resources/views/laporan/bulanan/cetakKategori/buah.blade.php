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
            <td class="text-right">{{ formatRupiahPdf($item->pembelian->sum('total_tonase_beli')) }}</td>
            <td class="text-right">{{ formatRupiahPdf($item->penjualan->sum('tonase_jual')) }}</td>
            <td class="text-right">{{ formatRupiahPdf($item->pembelian->sum('total_biaya_beli')) }}
            </td>
            <td class="text-right">{{ formatRupiahPdf($item->penjualan->sum('total_jual')) }}
            </td>
            <td class="text-right">{{
                formatRupiahPdf($item->penjualan->sum('total_jual')-$item->pembelian->sum('total_biaya_beli'))
                }}</td>
            <td class="text-right">{{ formatRupiahPdf($item->biaya->sum('jumlah_biaya') +
                $item->gaji->sum('gaji')) }}</td>

            <td class="text-right">{{
                formatRupiahPdf(($item->penjualan->sum('total_jual')-$item->pembelian->sum('total_biaya_beli'))-($item->biaya->sum('jumlah_biaya')
                +
                $item->gaji->sum('gaji'))) }}</td>
            <td class="text-right">{{
                formatRupiahPdf($item->penjualan->sum('tonase_jual')-$item->pembelian->sum('total_tonase_beli'))
                }}
            </td>
            <td class="text-right">{{ formatRupiahPdf($item->sisa->sum('tonase_sisa_terjual')) }}</td>
            <td class="text-right">{{
                formatRupiahPdf($item->penjualan->sum('tonase_jual')-$item->pembelian->sum('total_tonase_beli'))+$item->sisa->sum('tonase_sisa_terjual')
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
            <th class="text-right">{{ formatRupiahPdf($totalTonaseBeli) }}</th>
            <th class="text-right">{{ formatRupiahPdf($totalTonaseJual) }}</th>
            <th class="text-right">{{ formatRupiahPdf($totalPembelian) }}</th>
            <th class="text-right">{{ formatRupiahPdf($totalPenjualan) }}</th>
            <th class="text-right">{{ formatRupiahPdf($pendapatan) }}</th>
            <th class="text-right">{{ formatRupiahPdf($operasional) }}</th>
            <th class="text-right">{{ formatRupiahPdf($total) }}</th>
            <th class="text-right">{{ formatRupiahPdf($selisih )}} </th>
            <th class="text-right">{{ formatRupiahPdf($terjualLagi) }}</th>
            <th class="text-right">{{ formatRupiahPdf($sortir) }}</th>
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