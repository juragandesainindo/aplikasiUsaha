@extends('layouts.master')

@section('title','Laporan Bulanan')

@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Laporan Bulanan - {{ $usaha->nama_usaha }}</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ url('laporan-bulanan') }}"><i
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
                                            Periode Bulan {{ $month }}/{{ $year }}
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
                                @if ($usaha->kategori == 'buah')
                                @include('laporan.bulanan.showKategori.buah')
                                @else
                                @include('laporan.bulanan.showKategori.dagang')
                                @endif
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
                <h4 class="modal-title">Filter Laporan Bulanan</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('laporan-bulanan.show',$usaha->id) }}" method="GET">
                <div class="modal-body">
                    @csrf
                    <div class="row">
                        <div class="col-md-6">
                            <label for="month">Bulan</label>
                            <select name="month" id="month" class="select2 form-control" required>
                                <option value="">Pilih bulan</option>
                                <option value="01">Januari</option>
                                <option value="02">Februari</option>
                                <option value="03">Maret</option>
                                <option value="04">April</option>
                                <option value="05">Mei</option>
                                <option value="06">Juni</option>
                                <option value="07">Juli</option>
                                <option value="08">Agustus</option>
                                <option value="09">September</option>
                                <option value="10">Oktober</option>
                                <option value="11">November</option>
                                <option value="12">Desember</option>
                            </select>
                        </div>

                        <div class="col-md-6">
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
                <h4 class="modal-title">Print Laporan Bulanan</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('laporan-bulanan.cetak',$usaha->id) }}" method="GET" target="_blank">
                <div class="modal-body">
                    @csrf
                    <div class="row">
                        <div class="col-md-6">
                            <label for="month">Bulan</label>
                            <select name="month" id="month" class="select2 form-control" required>
                                <option value="">Pilih bulan</option>
                                <option value="01">Januari</option>
                                <option value="02">Februari</option>
                                <option value="03">Maret</option>
                                <option value="04">April</option>
                                <option value="05">Mei</option>
                                <option value="06">Juni</option>
                                <option value="07">Juli</option>
                                <option value="08">Agustus</option>
                                <option value="09">September</option>
                                <option value="10">Oktober</option>
                                <option value="11">November</option>
                                <option value="12">Desember</option>
                            </select>
                        </div>

                        <div class="col-md-6">
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
                    <button type="submit" class="btn btn-success">Print</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- Modal Print End-->
@endsection