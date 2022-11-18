<!-- Modal Create Start -->
<div class="modal fade" id="createPenjualanKebun">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Tambah Penjualan</h5>
                <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                </button>
            </div>
            <form action="{{ route('penjualan-produksi-kebun.store') }}" method="post">
                @csrf
                <div class="modal-body">
                    <div class="form-group">
                        <label>Nama Penjual</label>
                        <input type="text" name="nama_penjual" value="{{ old('nama_penjual') }}" class="form-control"
                            required placeholder="Nama penjual">
                    </div>
                    <div class="form-group">
                        <label>Tonase Jual (Kg)</label>
                        <input type="text" name="tonase_jual" value="{{ old('tonase_jual') }}"
                            class="form-control rupiah" required>
                    </div>
                    <div class="form-group">
                        <label>Harga Jual (Rp)</label>
                        <input type="text" name="harga_jual" value="{{ old('harga_jual') }}" class="form-control rupiah"
                            required>
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
<div class="modal fade" id="editKebun-{{ $item->id }}">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Edit Penjualan</h5>
                <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                </button>
            </div>
            <form action="{{ route('penjualan-produksi-kebun.update',$item->id) }}" method="post">
                @csrf
                @method('PUT')
                <div class="modal-body">
                    <div class="form-group">
                        <label>Nama Penjual</label>
                        <input type="text" name="nama_penjual" value="{{ $item->nama_penjual }}" class="form-control"
                            required placeholder="Nama penjual">
                    </div>
                    <div class="form-group">
                        <label>Tonase Jual (Kg)</label>
                        <input type="rupiah" name="tonase_jual" value="{{ $item->tonase_jual }}"
                            class="form-control rupiah" placeholder="contoh : 181" required>
                    </div>
                    <div class="form-group">
                        <label>Harga Jual (Rp)</label>
                        <input type="rupiah" name="harga_jual" value="{{ $item->harga_jual }}"
                            class="form-control rupiah" placeholder="contoh : 3000" required>
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

                <form action="{{ route('penjualan-produksi-kebun.destroy',$item->id) }}" method="post">
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