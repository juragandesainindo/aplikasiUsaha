<table id="example1" class="table table-bordered text-center">
    <thead>
        <tr>
            <th>No</th>
            <th>Tanggal</th>
            <th>Total Pembelian</th>
            <th>Total Penjualan</th>
            <th>Pendapatan</th>
            <th>Biaya Produksi</th>
            <th>Laba Bersih</th>
        </tr>
    </thead>
    <tbody>
        @forelse ($periode->sortBy('tanggal_awal') as $item)
        <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ \Carbon\Carbon::parse($item->tanggal_awal)->isoFormat('DD') }} - {{
                \Carbon\Carbon::parse($item->tanggal_akhir)->isoFormat('DD/MM/Y') }}
            </td>
            <td>{{ formatRupiah($item->pembelian->sum('total_super')) }}</td>
            <td>{{ formatRupiah($item->penjualan->sum('total_jual')) }}</td>
            <td>{{ formatRupiah($item->penjualan->sum('total_jual')-$item->pembelian->sum('total_super')) }}</td>
            <td>{{ formatRupiah($item->biaya->sum('jumlah_biaya')+$item->gaji->sum('gaji')) }}</td>
            <td>{{
                formatRupiah(($item->penjualan->sum('total_jual')-$item->pembelian->sum('total_super'))-($item->biaya->sum('jumlah_biaya')+$item->gaji->sum('gaji')))
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
            <th>{{ formatRupiah($pembelianDagang) }}</th>
            <th>{{ formatRupiah($totalPenjualan) }}</th>
            <th>{{ formatRupiah($pendapatanDagang) }}</th>
            <th>{{ formatRupiah($biayaProduksi) }}</th>
            <th>{{ formatRupiah($labaKotor) }}</th>
        </tr>
    </tfoot>
</table>