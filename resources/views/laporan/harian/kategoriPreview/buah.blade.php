<div class="card">
    <!-- /.card-header -->
    <div class="card-body mb-30">
        <div class="row">
            <div class="col-6">
                <h5 class="h4 text-blue mb-20">A. Pembelian</h5>
            </div>
        </div>
        <div class="table-responsive">
            <table class="table table-striped table-bordered text-center">
                <thead>
                    <tr>
                        <th rowspan="2">No</th>
                        <th rowspan="2">Nama Supplier</th>
                        <th colspan="2">Super</th>
                        <th colspan="2">Bulat</th>
                        <th colspan="2">Sortiran</th>
                        <th colspan="3">Total Laba</th>
                        <th rowspan="2">Total Biaya</th>
                        <th rowspan="2">Total Tonase</th>
                    </tr>
                    <tr>
                        <th>Harga</th>
                        <th>Tonase</th>
                        <th>Harga</th>
                        <th>Tonase</th>
                        <th>Harga</th>
                        <th>Tonase</th>
                        <th>Super</th>
                        <th>Bulat</th>
                        <th>Sortiran</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($periode->pembelian as $key => $item)
                    <tr>
                        <td class="text-center">{{ ++$key }}</td>
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
                        <td class="text-right">{{
                            formatRupiahPdf($item->total_biaya_beli)
                            }}</td>
                        <td class="text-right">{{ formatRupiahPdf($item->total_tonase_beli) }}</td>
                    </tr>
                    @endforeach
                </tbody>
                <tfoot>
                    <tr>
                        <th colspan="2">Total</th>
                        <th></th>
                        <th>{{ formatRupiahPdf($tonasesuper) }}</th>
                        <th></th>
                        <th>{{ formatRupiahPdf($tonasebulat) }}</th>
                        <th></th>
                        <th>{{ formatRupiahPdf($tonasesortiran) }}</th>
                        <th>{{ formatRupiahPdf($totalsuper) }}</th>
                        <th>{{ formatRupiahPdf($totalbulat) }}</th>
                        <th>{{ formatRupiahPdf($totalsortiran) }}</th>
                        <th>{{ formatRupiahPdf($totalbiaya) }}</th>
                        <th>{{ formatRupiahPdf($totaltonase) }}</th>
                    </tr>
                    <tr>
                        <th colspan="2">Grand Total</th>
                        <th colspan="10" class="text-right">{{ formatRupiahPdf($grandtotalbeli) }}
                        </th>
                        <th></th>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>

    <div class="card-body mb-30">
        <h5 class="h4 text-blue mb-20">B. Penjualan</h5>
        <table class="table table-striped table-bordered text-center">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Penjual</th>
                    <th>Harga Jual Produksi</th>
                    <th>Tonase</th>
                    <th>Total Harga Jual</th>
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
                    <td class="text-center">{{ formatRupiahPdf($item->tonase_jual) }}</td>
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
                    <th>{{ formatRupiahPdf($tonasejual) }}</th>
                    <th class="text-right">{{ formatRupiahPdf($totaljual) }}</th>
                </tr>
            </tfoot>
        </table>
    </div>

    <div class="card-body mb-30">
        <h5 class="h4 text-blue mb-20">C. Pendapatan Produksi</h5>
        <table class="table table-striped table-bordered text-center">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Title</th>
                    <th>Jumlah</th>
                    <th>Keterangan</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>1</td>
                    <td>Harga Rata-Rata Perkilogram</td>
                    <td>{{ formatRupiahPdf($hargaratarata) }}</td>
                    <td></td>
                </tr>
                <tr>
                    <td>2</td>
                    <td>Selisih Tonase</td>
                    <td>{{ formatRupiahPdf($selisihtonase) }}</td>
                    <td>
                        @if ($selisihtonase < 0) <span>Tidak Terjual</span>
                            @else
                            @endif
                    </td>
                </tr>
                <tr>
                    <td>3</td>
                    <td>Selisih Harga</td>
                    <td>{{ formatRupiahPdf($selisihharga) }}</td>
                    <td></td>
                </tr>
                <tr>
                    <td>4</td>
                    <td>Pendapatan Kotor Produksi</td>
                    <td>{{ formatRupiahPdf($pendapatankotor) }}</td>
                    <td>
                        @if ($pendapatankotor < 0) Minus @else @endif </td>
                </tr>
            </tbody>
        </table>
    </div>

    <div class="card-body mb-30">
        <h5 class="h4 text-blue mb-20">D. Biaya Produksi</h5>
        <table class="table table-striped table-bordered text-center">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Title Biaya</th>
                    <th>Jumlah Biaya</th>
                    <th>Keterangan</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($periode->biaya as $key => $bi)
                <tr>
                    <td>{{ ++$key }}</td>
                    <td>{{ $bi->title_biaya }}</td>
                    <td>{{ formatRupiahPdf($bi->jumlah_biaya) }}</td>
                    <td></td>
                </tr>
                @endforeach
            </tbody>
            <tfoot>
                <tr>
                    <th></th>
                    <th>Total Biaya</th>
                    <th>{{ formatRupiahPdf($jumlahbiaya) }}</th>
                </tr>
            </tfoot>
        </table>
    </div>

    <div class="card-body mb-30">
        <div class="pb-20 pd-20 d-flex justify-content-around">
            <h5 class="h4 text-blue mb-20">E. Laba Rugi</h5>
            <h5 class="h4 text-blue mb-20">{{ formatRupiahPdf($labarugi) }}</h5>
            <h5 class="h4 text-blue mb-20">
                @if ($labarugi < 0) Minus @else @endif </h5>
        </div>
    </div>
</div>