@if ($periode->datausaha->kategori == 'buah')
@include('penjualan.modals.penjualan.buah')
<a href="#" class="btn btn-primary mb-4" data-toggle="modal" data-target="#createPenjualanBuah" type="button">Tambah
    Penjualan {{ $periode->datausaha->nama_usaha }}</a>
<div class="table-responsive">
    <table id="example1" class="table table-bordered table-striped text-center">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Penjual</th>
                <th>Harga Jual (Rp)</th>
                <th>Tonase Jual (Kg)</th>
                <th>Total Harga Jual (Rp)</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($periode->penjualan as $key => $pen)
            <tr>
                <td>{{ ++$key }}</td>
                <td>{{ $pen->nama_penjual }}</td>
                <td>{{ formatRupiah($pen->harga_jual) }}</td>
                <td>{{ $pen->tonase_jual }}</td>
                <td>{{ formatRupiah($pen->total_jual) }}</td>
                <td>
                    <div class="btn-group btn-group-sm">
                        <a class="btn btn-warning btn-sm" href="#" data-toggle="modal"
                            data-target="#edit-{{ $pen->id }}" type="button">Edit
                        </a>
                        <a class="btn btn-danger btn-sm" href="#" data-toggle="modal"
                            data-target="#delete-{{ $pen->id }}" type="button">Hapus
                        </a>
                    </div>
                </td>
            </tr>
            @endforeach
        </tbody>
        <tfoot>
            <tr>
                <th></th>
                <th colspan="2">Total</th>
                <th>{{ number_format($tonaseJual) }}</th>
                <th>{{ formatRupiah($totalJual) }}</th>
                <th></th>
            </tr>
        </tfoot>
    </table>
</div>
@elseif ($periode->datausaha->kategori == 'dagang')
@include('penjualan.modals.penjualan.dagang')
<a href="#" class="btn btn-primary mb-4" data-toggle="modal" data-target="#createPenjualanDagang" type="button">Tambah
    Penjualan {{ $periode->datausaha->nama_usaha }}</a>
<div class="table-responsive">
    <table id="example1" class="table table-bordered table-striped text-center">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Penjual</th>
                <th>Nama Barang</th>
                <th>Qty Jual (Pcs)</th>
                <th>Harga Jual (Rp)</th>
                <th>Total Harga Jual (Rp)</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($periode->penjualan as $key => $pen)
            <tr>
                <td>{{ ++$key }}</td>
                <td>{{ $pen->nama_penjual }}</td>
                <td>{{ $pen->pembelian->nama_supplier }} {{ $pen->pembelian->nama_barang }}</td>
                <td>{{ $pen->tonase_jual }}</td>
                <td>{{ formatRupiah($pen->harga_jual) }}</td>
                <td>{{ formatRupiah($pen->total_jual) }}</td>
                <td>
                    <div class="btn-group btn-group-sm">
                        <a class="btn btn-warning btn-sm" href="#" data-toggle="modal"
                            data-target="#editDagang-{{ $pen->id }}" type="button">Edit
                        </a>
                        <a class="btn btn-danger btn-sm" href="#" data-toggle="modal"
                            data-target="#delete-{{ $pen->id }}" type="button">Hapus
                        </a>
                    </div>
                </td>
            </tr>
            @endforeach
        </tbody>
        <tfoot>
            <tr>
                <th colspan="3">Total</th>
                <th>{{ number_format($tonaseJual) }}</th>
                <th></th>
                <th>{{ formatRupiah($totalJual) }}</th>
                <th></th>
            </tr>
        </tfoot>
    </table>
</div>
@elseif ($periode->datausaha->kategori == 'peternakan')
@include('penjualan.modals.penjualan.ternak')
<a href="#" class="btn btn-primary mb-4" data-toggle="modal" data-target="#createPenjualanTernak" type="button">Tambah
    Penjualan {{ $periode->datausaha->nama_usaha }}</a>
<div class="table-responsive">
    <table id="example1" class="table table-bordered table-striped text-center">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Penjual</th>
                <th>Qty Jual (Ekor)</th>
                <th>Harga Jual (Rp)</th>
                <th>Total Harga Jual (Rp)</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($periode->penjualan as $key => $pen)
            <tr>
                <td>{{ ++$key }}</td>
                <td>{{ $pen->nama_penjual }}</td>
                <td>{{ $pen->tonase_jual }}</td>
                <td>{{ formatRupiah($pen->harga_jual) }}</td>
                <td>{{ formatRupiah($pen->total_jual) }}</td>
                <td>
                    <div class="btn-group btn-group-sm">
                        <a class="btn btn-warning btn-sm" href="#" data-toggle="modal"
                            data-target="#editTernak-{{ $pen->id }}" type="button">Edit
                        </a>
                        <a class="btn btn-danger btn-sm" href="#" data-toggle="modal"
                            data-target="#delete-{{ $pen->id }}" type="button">Hapus
                        </a>
                    </div>
                </td>
            </tr>
            @endforeach
        </tbody>
        <tfoot>
            <tr>
                <th colspan="2">Total</th>
                <th>{{ number_format($tonaseJual) }}</th>
                <th></th>
                <th>{{ formatRupiah($totalJual) }}</th>
                <th></th>
            </tr>
        </tfoot>
    </table>
</div>
@elseif ($periode->datausaha->kategori == 'kebun')
@include('penjualan.modals.penjualan.kebun')
<a href="#" class="btn btn-primary mb-4" data-toggle="modal" data-target="#createPenjualanKebun" type="button">Tambah
    Penjualan {{ $periode->datausaha->nama_usaha }}</a>
<div class="table-responsive">
    <table id="example1" class="table table-bordered table-striped text-center">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Penjual</th>
                <th>Tonase Jual (Kg)</th>
                <th>Harga Jual (Rp)</th>
                <th>Total Harga Jual (Rp)</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($periode->penjualan as $key => $pen)
            <tr>
                <td>{{ ++$key }}</td>
                <td>{{ $pen->nama_penjual }}</td>
                <td>{{ $pen->tonase_jual }}</td>
                <td>{{ formatRupiah($pen->harga_jual) }}</td>
                <td>{{ formatRupiah($pen->total_jual) }}</td>
                <td>
                    <div class="btn-group btn-group-sm">
                        <a class="btn btn-warning btn-sm" href="#" data-toggle="modal"
                            data-target="#editKebun-{{ $pen->id }}" type="button">Edit
                        </a>
                        <a class="btn btn-danger btn-sm" href="#" data-toggle="modal"
                            data-target="#delete-{{ $pen->id }}" type="button">Hapus
                        </a>
                    </div>
                </td>
            </tr>
            @endforeach
        </tbody>
        <tfoot>
            <tr>
                <th colspan="2">Total</th>
                <th>{{ number_format($tonaseJual) }}</th>
                <th></th>
                <th>{{ formatRupiah($totalJual) }}</th>
                <th></th>
            </tr>
        </tfoot>
    </table>
</div>
@endif