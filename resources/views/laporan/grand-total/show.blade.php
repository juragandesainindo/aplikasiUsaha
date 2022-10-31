@extends('layouts.app')

@section('title','Laporan Grand Total')

@section('contentApp')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Laporan Grand Total</h1>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="col-12 d-flex justify-content-between align-items-center">
                                <h5><strong>Periode {{ $year }}</strong></h5>
                                <div class="btn-group btn-group-sm">
                                    <a href="{{ route('laporan-grand-total.index') }}"
                                        class="btn btn-secondary btn-sm">Kembali</a>
                                    <button type="button" class="btn btn-sm btn-primary" data-toggle="modal"
                                        data-target="#filter">
                                        <i class="fas fa-search"></i>&nbsp;&nbsp; Filter
                                    </button>
                                    <button type="button" class="btn btn-sm btn-success" data-toggle="modal"
                                        data-target="#print">
                                        <i class="fas fa-print"></i>&nbsp;&nbsp; Cetak
                                    </button>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="example1" class="table table-bordered text-center">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Nama Usaha</th>
                                            <th>Pendapatan</th>
                                            <th>Biaya Produksi</th>
                                            <th>Total Laba</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                    </tbody>
                                    <tbody>
                                        @php
                                        $no=1;
                                        @endphp
                                        @foreach ($periode as $item)
                                        @foreach ($item->take(1) as $usaha)
                                        @if ($usaha->datausaha->kategori == 'buah')
                                        <tr>
                                            <td>{{ $no++ }}</td>
                                            <td>{{ $usaha->datausaha->nama_usaha }}</td>
                                            <td>{{ formatRupiah($pendapatanBuah) }}</td>
                                            <td>{{ formatRupiah($biayaBuah) }}</td>
                                            <td>{{ formatRupiah($labaBuah) }}</td>
                                        </tr>
                                        @elseif ($usaha->datausaha->kategori == 'peternakan')
                                        <tr>
                                            <td>{{ $no++ }}</td>
                                            <td>{{ $usaha->datausaha->nama_usaha }}</td>
                                            <td>{{ formatRupiah($pendapatanTernak) }}</td>
                                            <td>{{ formatRupiah($biayaTernak) }}</td>
                                            <td>{{ formatRupiah($labaTernak) }}</td>
                                        </tr>
                                        @elseif ($usaha->datausaha->kategori == 'dagang')
                                        <tr>
                                            <td>{{ $no++ }}</td>
                                            <td>{{ $usaha->datausaha->nama_usaha }}</td>
                                            <td>{{ formatRupiah($pendapatanDagang) }}</td>
                                            <td>{{ formatRupiah($biayaDagang) }}</td>
                                            <td>{{ formatRupiah($labaDagang) }}</td>
                                        </tr>
                                        @elseif ($usaha->datausaha->kategori == 'kebun')
                                        <tr>
                                            <td>{{ $no++ }}</td>
                                            <td>{{ $usaha->datausaha->nama_usaha }}</td>
                                            <td>{{ formatRupiah($pendapatanKebun) }}</td>
                                            <td>{{ formatRupiah($biayaKebun) }}</td>
                                            <td>{{ formatRupiah($labaKebun) }}</td>
                                        </tr>
                                        @endif
                                        @endforeach
                                        @endforeach
                                    </tbody>
                                    <tfoot>
                                        <th></th>
                                        <th>Total</th>
                                        <th>{{ formatRupiah($pendapatanTotal) }}</th>
                                        <th>{{ formatRupiah($biayaTotal) }}</th>
                                        <th>{{ formatRupiah($labaTotal) }}</th>
                                    </tfoot>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
</div>


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
            <form action="{{ route('laporan-grand-total.show') }}" method="GET">
                @csrf
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12">
                            <label for="year">Tahun</label>
                            <select name="year" id="year" class="select2 form-control" required>
                                <option value="">Pilih tahun</option>
                                @foreach ($pilihTahun->sortByDesc('year')->values() as $item)
                                <option value="{{ $item->year }}">{{ $item->year }}</option>
                                @endforeach
                            </select>
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

<!-- Modal Print Start-->
<div class="modal fade" id="print">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Print Laporan Grand Total</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('laporan-grand-total-cetak.cetak') }}" method="GET" target="_blank">
                @csrf
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12">
                            <label for="year">Tahun</label>
                            <select name="year" id="year" class="select2 form-control" required>
                                @foreach ($pilihTahun->sortByDesc('year')->values() as $item)
                                <option value="{{ $item->year }}">{{ $item->year }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Print</button>
                </div>

            </form>
        </div>
    </div>
</div>
<!-- Modal Print End-->
@endsection