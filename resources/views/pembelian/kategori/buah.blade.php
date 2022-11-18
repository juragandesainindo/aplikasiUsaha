<!-- Modal Create Start -->
<div class="modal fade" id="create">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Tambah Pembelian</h5>
                <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                </button>
            </div>
            <form action="{{ route('pembelian-produksi-buah.store') }}" method="post">
                @csrf
                <div class="modal-body">
                    <div class="form-group">
                        <label>Nama Supplier</label>
                        <input type="text" name="nama_supplier" value="{{ old('nama_supplier') }}" class="form-control"
                            required placeholder="Nama supplier">
                    </div>
                    <div class="row">
                        <div class="col-6">
                            <div class="form-group">
                                <label>Harga Super (Rp)</label>
                                <input type="text" name="harga_super" value="{{ old('harga_super') }}"
                                    class="form-control rupiah" placeholder="contoh : 3000" required>

                            </div>
                        </div>
                        <div class="col-6">

                            <div class="form-group">
                                <label>Tonase Super (Kg)</label>
                                <input type="text" name="tonase_super" value="{{ old('tonase_super') }}"
                                    class="form-control rupiah" placeholder="contoh : 181" required>

                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-6">
                            <div class="form-group">
                                <label>Harga Bulat (Rp)</label>
                                <input type="text" name="harga_bulat" value="{{ old('harga_bulat') }}"
                                    class="form-control rupiah" placeholder="contoh : 3000" required>

                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label>Tonase Bulat (Kg)</label>
                                <input type="text" name="tonase_bulat" value="{{ old('tonase_bulat') }}"
                                    class="form-control rupiah" placeholder="contoh : 181" required>

                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-6">
                            <div class="form-group">
                                <label>Harga Sortiran (Rp)</label>
                                <input type="text" name="harga_sortiran" value="{{ old('harga_sortiran') }}"
                                    class="form-control rupiah" placeholder="contoh : 3000" required>

                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label>Tonase Sortiran (Kg)</label>
                                <input type="text" name="tonase_sortiran" value="{{ old('tonase_sortiran') }}"
                                    class="form-control rupiah" placeholder="contoh : 181" required>

                            </div>
                        </div>
                    </div>

                    <input type="hidden" name="periode_id" value="{{ $periode->id }}">

                    <input type="hidden" name="datausaha_id" value="{{ $periode->datausaha_id }}">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-light" data-dismiss="modal">Tutup</button>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- Modal Create End -->

<!-- Modal Edit Start -->
@foreach ($periode->pembelian as $item)
<div class="modal fade" id="edit-{{ $item->id }}">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Edit Pembelian</h5>
                <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                </button>
            </div>
            <form action="{{ route('pembelian-produksi-buah.update',$item->id) }}" method="post">
                @csrf
                @method('PUT')
                <div class="modal-body">
                    <div class="form-group">
                        <label>Nama Supplier</label>
                        <input type="text" name="nama_supplier" value="{{ $item->nama_supplier }}" class="form-control"
                            required placeholder="Nama supplier">
                    </div>
                    <div class="row">
                        <div class="col-6">
                            <div class="form-group">
                                <label>Harga Super (Rp)</label>
                                <input type="text" name="harga_super" value="{{ $item->harga_super }}"
                                    class="form-control rupiah" placeholder="contoh : 3000" required>
                            </div>
                        </div>
                        <div class="col-6">

                            <div class="form-group">
                                <label>Tonase Super (Kg)</label>
                                <input type="text" name="tonase_super" value="{{ $item->tonase_super }}"
                                    class="form-control rupiah" placeholder="contoh : 181" required>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-6">
                            <div class="form-group">
                                <label>Harga Bulat (Rp)</label>
                                <input type="text" name="harga_bulat" value="{{ $item->harga_bulat }}"
                                    class="form-control rupiah" placeholder="contoh : 3000" required>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label>Tonase Bulat (Kg)</label>
                                <input type="text" name="tonase_bulat" value="{{ $item->tonase_bulat }}"
                                    class="form-control rupiah" placeholder="contoh : 181" required>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-6">
                            <div class="form-group">
                                <label>Harga Sortiran (Rp)</label>
                                <input type="text" name="harga_sortiran" value="{{ $item->harga_sortiran }}"
                                    class="form-control rupiah" placeholder="contoh : 3000" required>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label>Tonase Sortiran (Kg)</label>
                                <input type="text" name="tonase_sortiran" value="{{ $item->tonase_sortiran }}"
                                    class="form-control rupiah" placeholder="contoh : 181" required>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-light" data-dismiss="modal">Tutup</button>
                    <button type="submit" class="btn btn-warning">Ya, edit</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endforeach
<!-- Modal Edit End -->

<!-- Modal Delete Start -->
@foreach ($periode->pembelian as $item)
<div class="modal fade" id="delete-{{ $item->id }}" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-body text-center font-18">
                <h4 class="padding-top-30 mb-30 weight-500 pb-5">Apakah yakin ingin menghapus Data <strong>{{
                        $item->nama_supplier }}?</strong></h4>

                <form action="{{ route('pembelian-produksi-buah.destroy',$item->id) }}" method="post">
                    @csrf
                    @method('DELETE')
                    <div class="padding-bottom-30 row" style="max-width: 170px; margin: 0 auto;">
                        <div class="col-6">
                            <button type="button" class="btn btn-secondary border-radius-100 btn-block confirmation-btn"
                                data-dismiss="modal"><i class="fa fa-times"></i></button>
                            TIDAK
                        </div>
                        <div class="col-6">
                            <button type="submit" class="btn btn-danger border-radius-100 btn-block confirmation-btn"><i
                                    class="fa fa-check"></i></button>
                            YA
                        </div>
                    </div>
                </form>

            </div>
        </div>
    </div>
</div>
@endforeach
<!-- Modal Delete End -->

<table class="table table-bordered table-striped text-center">
    <thead>
        <tr>
            <th rowspan="2" style="width: 5%">No</th>
            <th rowspan="2">Aksi</th>
            <th rowspan="2">Nama Supplier</th>
            <th colspan="2" class="text-center">Super</th>
            <th colspan="2" class="text-center">Bulat</th>
            <th colspan="2" class="text-center">Sortiran</th>
            <th colspan="3" class="text-center">Total</th>
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
            <td>{{ ++$key }}</td>
            <td>
                <div class="dropdown">
                    <a class="btn btn-primary btn-sm" href="#" role="button" data-toggle="dropdown">
                        <i class="fas fa-angle-down"></i>
                    </a>
                    <div class="dropdown-menu dropdown-menu-left dropdown-menu-icon-list">
                        <a class="dropdown-item text-info" href="#" data-toggle="modal"
                            data-target="#edit-{{ $item->id }}" type="button"><i class="fas fa-edit"></i> Edit</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item text-danger" href="#" data-toggle="modal"
                            data-target="#delete-{{ $item->id }}" type="button"><i class="fas fa-trash"></i>
                            Delete</a>
                    </div>
                </div>
            </td>
            <td>{{ $item->nama_supplier }}</td>
            <td>{{ number_format($item->harga_super) }}</td>
            <td>{{ $item->tonase_super }}</td>
            <td>{{ number_format($item->harga_bulat) }}</td>
            <td>{{ $item->tonase_bulat }}</td>
            <td>{{ number_format($item->harga_sortiran) }}</td>
            <td>{{ $item->tonase_sortiran }}</td>
            <td>{{ formatRupiah($item->total_super) }}</td>
            <td>{{ formatRupiah($item->total_bulat) }}</td>
            <td>{{ formatRupiah($item->total_sortiran) }}</td>
            <td>{{
                formatRupiah($item->total_biaya_beli)
                }}</td>
            <td>{{
                number_format($item->total_tonase_beli)
                }}</td>

        </tr>
        @endforeach
    </tbody>
    <tfoot>
        <tr>
            <th colspan="3" class="text-center">Total</th>
            <th></th>
            <th>
                {{ number_format($periode->pembelian->sum('tonase_super')) }}
            </th>
            <th></th>
            <th>
                {{ number_format($periode->pembelian->sum('tonase_bulat')) }}
            </th>
            <th></th>
            <th>
                {{ number_format($periode->pembelian->sum('tonase_sortiran')) }}
            </th>

            <th>{{
                formatRupiah($periode->pembelian->sum('total_super')) }}</th>
            <th>{{
                formatRupiah($periode->pembelian->sum('total_bulat')) }}</th>
            <th>{{
                formatRupiah($periode->pembelian->sum('total_sortiran')) }}</th>
            <th>{{
                formatRupiah($periode->pembelian->sum('total_biaya_beli')) }}</th>
            <th>{{
                number_format($periode->pembelian->sum('total_tonase_beli')) }}</th>
        </tr>
    </tfoot>
</table>