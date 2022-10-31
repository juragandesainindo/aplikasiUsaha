<!-- Modal Create Start -->
<div class="modal fade" id="createPenjualanDagang">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Tambah Penjualan</h5>
                <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                </button>
            </div>
            <form action="{{ route('penjualan-produksi-dagang.store') }}" method="post">
                @csrf
                <div class="modal-body">
                    <div class="form-group">
                        <label>Nama Penjual</label>
                        <input type="text" name="nama_penjual" value="{{ old('nama_penjual') }}" class="form-control"
                            required placeholder="Nama penjual">

                    </div>
                    <div class="form-group">
                        <label>Nama Barang</label>
                        <select name="pembelian_id" id="" class="form-control" required>
                            <option value="">pilih salah satu</option>
                            @foreach ($periode->pembelian as $item)
                            <option value="{{ $item->id }}">({{ $item->nama_supplier }}) {{
                                $item->nama_barang
                                }}</option>
                            @endforeach
                        </select>

                    </div>
                    <div class="form-group">
                        <label>Qty Jual (Pcs)</label>
                        <input type="number" min="1" name="tonase_jual" value="{{ old('tonase_jual') }}"
                            class="form-control" placeholder="contoh : 181" required>
                        <span class="text-danger text-sm">Tanpa titik (.) dan koma (,)</span>
                    </div>
                    <div class="form-group">
                        <label>Harga Jual (Rp)</label>
                        <input type="number" min="1" name="harga_jual" value="{{ old('harga_jual') }}"
                            class="form-control" placeholder="contoh : 3000" required>
                        <span class="text-danger text-sm">Tanpa titik (.) dan koma (,)</span>
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
@switch($edit)
@case(1)
@foreach ($periode->penjualan as $item)
<div class="modal fade" id="editDagang-{{ $item->id }}">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Edit Penjualan</h5>
                <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                </button>
            </div>
            <form action="{{ route('penjualan-produksi-dagang.update',$item->id) }}" method="post">
                @csrf
                @method('PUT')
                <div class="modal-body">
                    <div class="form-group">
                        <label>Nama Penjual</label>
                        <input type="text" name="nama_penjual" value="{{ $item->nama_penjual }}" class="form-control"
                            required placeholder="Nama penjual">

                    </div>
                    <div class="form-group">
                        <label>Nama Barang</label>
                        <select name="pembelian_id" id="" class="form-control" required>
                            <option value="{{ $item->pembelian->id }}">({{ $item->pembelian->nama_supplier }}) {{
                                $item->pembelian->nama_barang }}</option>
                            @foreach ($periode->pembelian as $pem)
                            <option value="{{ $pem->id }}">({{ $pem->nama_supplier }}) {{
                                $pem->nama_barang
                                }}</option>
                            @endforeach
                        </select>

                    </div>
                    <div class="form-group">
                        <label>Qty Jual (Pcs)</label>
                        <input type="number" min="1" name="tonase_jual" value="{{ $item->tonase_jual }}"
                            class="form-control" placeholder="contoh : 181" required>
                        <span class="text-danger text-sm">Tanpa titik (.) dan koma (,)</span>
                    </div>
                    <div class="form-group">
                        <label>Harga Jual (Rp)</label>
                        <input type="number" min="1" name="harga_jual" value="{{ $item->harga_jual }}"
                            class="form-control" placeholder="contoh : 3000" required>
                        <span class="text-danger text-sm">Tanpa titik (.) dan koma (,)</span>
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
@break
@endswitch
<!-- Modal Edit End -->

<!-- Modal Delete Start -->
@switch($delete)
@case(1)
@foreach ($periode->penjualan as $item)
<div class="modal fade" id="delete-{{ $item->id }}" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-body text-center font-18">
                <h4 class="padding-top-30 mb-30 weight-500 pb-5">Apakah yakin ingin menghapus Data <br><strong>{{
                        $item->nama_penjual }}?</strong></h4>

                <form action="{{ route('penjualan-produksi-buah.destroy',$item->id) }}" method="post">
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
@break
@endswitch
<!-- Modal Delete End -->