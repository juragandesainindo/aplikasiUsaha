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
                            <div class="row">
                                <div class="col-6">
                                    @if (request()->search > 0)
                                    <strong>Periode {{ request()->search }}</strong>
                                    @else
                                    @endif
                                </div>
                                <div class="col-6 text-right">
                                    <a href="{{ route('laporan-grand-total.index') }}"
                                        class="btn btn-sm btn-secondary px-3">
                                        <i class="fas fa-redo-alt"></i>&nbsp;&nbsp;
                                        Reset
                                    </a>
                                    <button type="button" class="btn btn-sm btn-primary px-3" data-toggle="modal"
                                        data-target="#filter">
                                        <i class="fas fa-search"></i>&nbsp;&nbsp; Filter
                                    </button>
                                    <button type="button" class="btn btn-sm btn-primary px-3" data-toggle="modal"
                                        data-target="#print">
                                        <i class="fas fa-print"></i>&nbsp;&nbsp; Print
                                    </button>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="example1" class="table table-bordered">
                                    <thead class="text-center">
                                        <tr>
                                            <th>No</th>
                                            <th>Nama Usaha</th>
                                            <th>Pendapatan</th>
                                            <th>Biaya Produksi</th>
                                            <th>Total Laba</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        @php
                                        $no=1;
                                        @endphp
                                        @foreach ($usahas as $item)
                                        <tr>
                                            <td class="text-center">{{ $no++ }}</td>
                                            <td>{{ $item->nama_usaha }}</td>
                                            <td class="text-right">
                                                {{
                                                formatRupiahPdf($item->penjualan->sum('total_jual')-$item->pembelian->sum('total_biaya_beli'))
                                                }}
                                            </td>
                                            <td class="text-right">
                                                {{ formatRupiahPdf($item->biaya->sum('jumlah_biaya') +
                                                $item->gaji->sum('gaji')) }}
                                            </td>
                                            <td class="text-right">
                                                {{
                                                formatRupiahPdf(($item->penjualan->sum('total_jual')-$item->pembelian->sum('total_biaya_beli')-($item->biaya->sum('jumlah_biaya')
                                                + $item->gaji->sum('gaji'))))
                                                }}
                                            </td>

                                        </tr>
                                        @endforeach
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th colspan="2" class="text-center">Total</th>
                                            <th class="text-right">
                                                {{ formatRupiahPdf($pendapatanTotal) }}
                                            </th>
                                            <th class="text-right">
                                                {{ formatRupiahPdf($biayaTotal) }}
                                            </th>
                                            <th class="text-right">
                                                {{ formatRupiahPdf($totalLaba) }}
                                            </th>
                                        </tr>
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


@include('laporan.grand-total.modal')
@endsection