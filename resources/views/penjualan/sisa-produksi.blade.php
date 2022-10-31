<!-- Modal Create Start -->
<div class="modal fade" id="createSisa">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Tambah Sisa Produksi</h5>
                <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                </button>
            </div>
            <form action="{{ route('penjualan-periode-produksi-sisa.store') }}" method="post">
                @csrf
                <div class="modal-body">
                    <div class="form-group">
                        <label>Terjual</label>
                        <input type="number" name="tonase_sisa_terjual" value="{{ old('tonase_sisa_terjual') }}"
                            class="form-control" required placeholder="200">
                    </div>
                    <div class="form-group">
                        <label>Harga</label>
                        <input type="number" name="harga" value="{{ old('harga') }}" class="form-control" required
                            placeholder="2000">
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

<!-- Modal Delete Start -->
@switch($delete)
@case(1)
@foreach ($periode->sisa as $item)
<div class="modal fade" id="deleteSisa-{{ $item->id }}" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-body text-center font-18">
                <h4 class="padding-top-30 mb-30 weight-500">Apakah yakin ingin menghapus Sisa Produksi?</strong></h4>

                <form action="{{ route('penjualan-periode-produksi-sisa.destroy',$item->id) }}" method="post">
                    @csrf
                    @method('DELETE')
                    <div class="padding-bottom-30 row" style="max-width: 170px; margin: 0 auto;">
                        <div class="col-6">
                            <button type="button" class="btn btn-secondary border-radius-100 btn-block confirmation-btn"
                                data-dismiss="modal"><i class="fa fa-times"></i></button>
                            TIDAK
                        </div>
                        <div class="col-6">
                            <button type="submit"
                                class="btn btn-primary border-radius-100 btn-block confirmation-btn"><i
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

<a href="#" class="btn btn-primary mb-4" data-toggle="modal" data-target="#createSisa" type="button">Tambah
    Sortir</a>

<div class="table-responsive">
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Terjual</th>
                <th>Harga</th>
                <th>Total</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>

            @foreach ($periode->sisa as $item)
            <tr>
                <td>{{ $item->tonase_sisa_terjual }}</td>
                <td>{{ formatRupiah($item->harga) }}</td>
                <td>{{ formatRupiah($item->total_sisa_terjual) }}</td>
                <td>
                    <a href="" class="btn btn-danger btn-sm" data-toggle="modal"
                        data-target="#deleteSisa-{{ $item->id }}" type="button">Hapus</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

<div class="row">
    <div class="col-3"><span>Sisa produksi sebelumnya</span></div>
    <div class="col-9"><span>{{ $selisih }} Kg</span></div>
    <div class="col-3"><span>Terjual Lagi</span></div>
    <div class="col-9"><span>{{ $terjualLagi }} Kg</span></div>
    <div class="col-3"><strong>Sortir</strong></div>
    <div class="col-9"><strong>{{ $sortir }} Kg</strong></div>
    <div class="col-5 text-sm text-danger"><strong><i>Sortir = Tidak terjual/terbuang</i></strong></div>
</div>