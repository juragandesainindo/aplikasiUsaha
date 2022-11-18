<!-- Modal Filter Start-->
<div class="modal fade" id="filter">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Filter Laporan Grand Total</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('laporan-grand-total.index') }}" method="GET">
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12">
                            <label for="year">Tahun</label>
                            <select name="search" class="form-control select2bs4" required>
                                {{ $last= date('Y')-100 }}
                                {{ $now = date('Y') }}
                                <option value="">Pilih Tahun</option>
                                @for ($i = $now; $i >= $last; $i--)

                                <option value="{{ $i }}">{{ $i }}</option>
                                @endfor
                            </select>
                            {{-- <input type="text" class="form-control tahun" name="search" autofocus> --}}
                        </div>
                    </div>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Filter</button>
                </div>

            </form>
        </div>
    </div>
</div>
<!-- Modal Filter End-->

<div class="modal fade" id="print">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Cetak Laporan Grand Total</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('laporan-grand-total-cetak.cetak') }}" method="GET" target="_blank">
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12">
                            <label for="year">Tahun</label>
                            <select name="print" class="form-control select2bs4" required>
                                {{ $last= date('Y')-100 }}
                                {{ $now = date('Y') }}
                                <option value="">Pilih Tahun</option>
                                @for ($i = $now; $i >= $last; $i--)

                                <option value="{{ $i }}">{{ $i }}</option>
                                @endfor
                            </select>
                        </div>
                    </div>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Cetak</button>
                </div>
            </form>
        </div>
    </div>
</div>