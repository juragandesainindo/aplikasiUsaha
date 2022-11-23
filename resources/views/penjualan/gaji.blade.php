<!-- Modal Create Start -->
<div class="modal fade" id="createGaji">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Tambah Gaji</h5>
                <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                </button>
            </div>
            <form action="{{ route('penjualan-periode-produksi-gaji.store') }}" method="post">
                @csrf
                <div class="modal-body">
                    <div class="form-group">
                        <label>Nama</label>
                        <input type="text" name="nama" value="{{ old('nama') }}" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>nominal</label>
                        <input type="text" name="gaji" value="{{ old('gaji') }}" class="form-control rupiah" required>
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
@foreach ($periode->gaji as $item)
<div class="modal fade" id="deleteGaji-{{ $item->id }}" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-body text-center font-18">
                <h4 class="padding-top-30 mb-30 weight-500 pb-5">Apakah yakin ingin menghapus Gaji</h4>

                <form action="{{ route('penjualan-periode-produksi-gaji.destroy',$item->id) }}" method="post">
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

<a href="#" class="btn btn-primary mb-4" data-toggle="modal" data-target="#createGaji" type="button">Tambah
    Gaji</a>

<div class="table-responsive">
    <table class="table table-striped">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>Gaji</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($periode->gaji as $key => $item)
            <tr>
                <td>{{ ++$key }}</td>
                <td>{{ $item->nama }}</td>
                <td>{{ formatRupiah($item->gaji) }}</td>
                <td>
                    <div class="btn-group btn-group-sm">
                        <a class="btn btn-danger btn-sm" href="#" data-toggle="modal"
                            data-target="#deleteGaji-{{ $item->id }}" type="button">Hapus
                        </a>
                    </div>
                </td>
            </tr>
            @endforeach
        </tbody>
        <tfoot>
            <tr>
                <th></th>
                <th>Total</th>
                <th colspan="2">{{ formatRupiah($gaji) }}</th>
            </tr>
        </tfoot>
    </table>
</div>