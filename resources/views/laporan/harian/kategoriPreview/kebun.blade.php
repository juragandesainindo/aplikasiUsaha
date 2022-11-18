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
                        <th>No</th>
                        <th>Nama Supplier</th>
                        <th>Tonase (Kg)</th>
                        <th>Harga Beli (Rp)</th>
                        <th>Total Harga (Rp)</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($periode->pembelian as $key => $item)
                    <tr>
                        <td>{{ ++$key }}</td>
                        <td>{{ $item->nama_supplier }}</td>
                        <td>{{ formatRupiahPdf($item->tonase_super) }}</td>
                        <td>{{ formatRupiahPdf($item->harga_super) }}</td>
                        <td>{{ formatRupiahPdf($item->total_biaya_beli)
                            }}</td>
                    </tr>
                    @endforeach
                </tbody>
                <tfoot>
                    <tr>
                        <th colspan="2">Total</th>
                        <th>{{ formatRupiahPdf($tonasesuper) }}</th>
                        <th></th>
                        <th>{{ formatRupiahPdf($totalbiaya) }}</th>
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
                    <th>Tonase Jual (Kg)</th>
                    <th>Harga Jual (Rp)</th>
                    <th>Total Harga Jual (Rp)</th>
                    <th>Keterangan</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($periode->penjualan as $key => $item)
                <tr>
                    <td>{{ ++$key }}</td>
                    <td>{{ $item->nama_penjual }}</td>
                    <td>{{ formatRupiahPdf($item->tonase_jual) }}</td>
                    <td>{{ formatRupiahPdf($item->harga_jual) }}
                    </td>
                    <td>{{ formatRupiahPdf($item->total_jual) }}
                    </td>
                    <td></td>
                </tr>
                @endforeach
            </tbody>
            <tfoot>
                <tr>
                    <th colspan="2">Total</th>
                    <th>{{ formatRupiahPdf($tonasejual) }}</th>
                    <th></th>
                    <th>{{ formatRupiahPdf($totaljual) }}</th>
                </tr>
            </tfoot>
        </table>
    </div>

    <div class="card-body mb-30">
        <h5 class="h4 text-blue mb-20">C. Pendapatan Produksi</h5>
        <table class="table table-striped table-bordered text-center">
            <thead>
                <tr>
                    <th width="5%">No</th>
                    <th width="30%">Title</th>
                    <th width="30%">Jumlah</th>
                    <th>Keterangan</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>1</td>
                    <td>Selisih Tonase</td>
                    <td>{{ formatRupiahPdf($selisihTonaseKebun) }}</td>
                    <td></td>
                </tr>
                <tr>
                    <td>2</td>
                    <td>Pendapatan Kotor Produksi</td>
                    <td>{{ formatRupiahPdf($pendapatankotor) }}</td>
                    <td>@if ($pendapatankotor < 0) Minus @else @endif</td>
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