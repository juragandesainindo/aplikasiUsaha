<!-- Modal Create Start -->
<div class="modal fade" id="create">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Tambah Pembelian</h5>
                <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                </button>
            </div>
            <form action="{{ route('pembelian-produksi-ternak.store') }}" method="post">
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
                                <label>Qty Beli</label>
                                <input type="text" name="tonase_super" value="{{ old('tonase_super') }}"
                                    class="form-control rupiah" placeholder="contoh : 181" required>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label>Harga Beli (Rp)</label>
                                <input type="text" name="harga_super" value="{{ old('harga_super') }}"
                                    class="form-control rupiah" placeholder="contoh : 3000" required>
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
            <form action="{{ route('pembelian-produksi-ternak.update',$item->id) }}" method="post">
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
                                <label>Tonase Super (Kg)</label>
                                <input type="text" name="tonase_super" value="{{ $item->tonase_super }}"
                                    class="form-control rupiah" placeholder="contoh : 181" required>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label>Harga Super (Rp)</label>
                                <input type="text" name="harga_super" value="{{ $item->harga_super }}"
                                    class="form-control rupiah" placeholder="contoh : 3000" required>
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

                <form action="{{ route('pembelian-produksi-ternak.destroy',$item->id) }}" method="post">
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
            <th>No</th>
            <th>Nama Supplier</th>
            <th>Qty (Ekor)</th>
            <th>Harga Beli (Rp)</th>
            <th>Total Harga (Rp)</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($periode->pembelian as $key => $item)
        <tr>
            <td>{{ ++$key }}</td>
            <td>{{ $item->nama_supplier }}</td>
            <td>{{ number_format($item->tonase_super) }}</td>
            <td>{{ formatRupiah($item->harga_super) }}</td>
            <td>{{ formatRupiah($item->total_biaya_beli) }}</td>
            <td>
                <div class="btn-group btn-group-sm">
                    <a class="btn btn-warning btn-sm" href="#" data-toggle="modal" data-target="#edit-{{ $item->id }}"
                        type="button">Edit
                    </a>
                    <a class="btn btn-danger btn-sm" href="#" data-toggle="modal" data-target="#delete-{{ $item->id }}"
                        type="button">Hapus
                    </a>
                </div>
            </td>
        </tr>
        @endforeach
    </tbody>
    <tfoot>
        <tr>
            <th colspan="2" class="text-center">Total</th>
            <th>{{ $periode->pembelian->sum('tonase_super') }}</th>
            <th>{{ formatRupiah($periode->pembelian->sum('harga_super')) }}</th>
            <th>{{ formatRupiah($periode->pembelian->sum('total_biaya_beli')) }}</th>
            <th></th>
        </tr>
    </tfoot>
</table>