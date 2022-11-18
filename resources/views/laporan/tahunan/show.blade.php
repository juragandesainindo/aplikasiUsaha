@extends('layouts.master')

@section('title','Laporan Tahunan')

@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Laporan Tahunan - {{ $usaha->nama_usaha }}</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ url('laporan-tahunan') }}"><i
                                    class="fas fa-backspace"></i>
                                Kembali</a></li>
                    </ol>
                </div>
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">

                    <div class="card">
                        <div class="card-header">
                            <div class="row">
                                <div class="col-6">
                                    <h4>
                                        <strong>
                                            Periode Tahun {{ $year }}
                                        </strong>
                                    </h4>
                                </div>
                                <div class="col-6 text-right">
                                    <div class="btn-group btn-group-sm">
                                        <button type="button" class="btn btn-primary" data-toggle="modal"
                                            data-target="#filter">
                                            <i class="fas fa-search"></i>&nbsp;&nbsp; Filter
                                        </button>
                                        <button type="button" class="btn btn-success" data-toggle="modal"
                                            data-target="#print">
                                            <i class="fas fa-print"></i>&nbsp;&nbsp; Cetak
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <div class="table-responsive">



                                <div class="pb-20 pd-20">
                                    <div class="table-responsive">
                                        @if ($usaha->kategori == 'buah')
                                        <table class="table table-bordered text-center">
                                            <thead style="background: #DAEEF3;">
                                                <tr>
                                                    <th rowspan="2">Bulan</th>
                                                    <th colspan="2">Total Buah (Kg)</th>
                                                    <th colspan="2">Total (Rp)</th>
                                                    <th rowspan="2">Pendapatan</th>
                                                    <th rowspan="2">Biaya Produksi</th>
                                                    <th rowspan="2">Total Laba</th>
                                                    <th rowspan="2">Selisih</th>
                                                    <th rowspan="2">Terjual Lagi</th>
                                                    <th rowspan="2">Sortir</th>
                                                </tr>
                                                <tr>
                                                    <th>Pembelian</th>
                                                    <th>Penjualan</th>
                                                    <th>Pembelian</th>
                                                    <th>Penjualan</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @include('laporan.tahunan.showKategori.buah')
                                            </tbody>
                                        </table>
                                        @else
                                        @include('laporan.tahunan.showKategori.dagang')
                                        @endif
                                    </div>
                                </div>
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
                <h4 class="modal-title">Filter Laporan Tahunan</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('laporan-tahunan.show',$usaha->id) }}" method="GET">
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12">
                            <label for="year">Tahun</label>
                            <select name="year" id="year" class="select2 form-control" required>
                                {{ $last= date('Y')-100 }}
                                {{ $now = date('Y') }}
                                <option value="">Pilih Tahun</option>
                                @for ($i = $now; $i >= $last; $i--)

                                <option value="{{ $i }}">{{ $i }}</option>
                                @endfor
                            </select>
                        </div>

                        <input type="hidden" name="usahaId" value="{{ $usaha->id }}">

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
                <h4 class="modal-title">Print Laporan Tahunan</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('laporan-tahunan.cetak',$usaha->id) }}" method="GET" target="_blank">
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12">
                            <label for="year">Tahun</label>
                            <select name="year" id="year" class="select2 form-control" required>
                                {{ $last= date('Y')-100 }}
                                {{ $now = date('Y') }}
                                <option value="">Pilih Tahun</option>
                                @for ($i = $now; $i >= $last; $i--)

                                <option value="{{ $i }}">{{ $i }}</option>
                                @endfor
                            </select>
                        </div>

                        <input type="hidden" name="usahaId" value="{{ $usaha->id }}">

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