@extends('layouts.app')

@section('title','Penjualan Produksi')

@section('contentApp')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Penjualan {{ \Carbon\Carbon::parse($periode->tanggal_awal)->isoFormat('DD')
                        }}-{{
                        \Carbon\Carbon::parse($periode->tanggal_akhir)->isoFormat('DD/MM/Y') }}</h1>
                    {{ $periode->datausaha->nama_usaha }}
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ url('penjualan') }}"><i class="fas fa-backspace"></i>
                                Kembali</a></li>
                    </ol>
                </div>
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
        <div class="container">
            <div class="row">
                <div class="col-12 col-sm-12">
                    <div class="card card-primary card-tabs">
                        <div class="card-header p-0 pt-1">
                            <ul class="nav nav-tabs" id="custom-tabs-one-tab" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" id="custom-tabs-one-home-tab" data-toggle="pill"
                                        href="#custom-tabs-one-home" role="tab" aria-controls="custom-tabs-one-home"
                                        aria-selected="true">Penjualan</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="custom-tabs-one-profile-tab" data-toggle="pill"
                                        href="#custom-tabs-one-profile" role="tab"
                                        aria-controls="custom-tabs-one-profile" aria-selected="false">Biaya Produksi</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="custom-tabs-one-gaji-tab" data-toggle="pill"
                                        href="#custom-tabs-one-gaji" role="tab" aria-controls="custom-tabs-one-gaji"
                                        aria-selected="false">Gaji</a>
                                </li>
                                @if ($periode->datausaha->kategori == 'buah')
                                <li class="nav-item">
                                    <a class="nav-link" id="custom-tabs-one-settings-tab" data-toggle="pill"
                                        href="#custom-tabs-one-settings" role="tab"
                                        aria-controls="custom-tabs-one-settings" aria-selected="false">Sisa Produksi</a>
                                </li>
                                @endif
                            </ul>
                        </div>
                        <div class="card-body">
                            <div class="tab-content" id="custom-tabs-one-tabContent">
                                <div class="tab-pane fade show active" id="custom-tabs-one-home" role="tabpanel"
                                    aria-labelledby="custom-tabs-one-home-tab">
                                    @include('penjualan.penjualan')
                                </div>
                                <div class="tab-pane fade" id="custom-tabs-one-profile" role="tabpanel"
                                    aria-labelledby="custom-tabs-one-profile-tab">
                                    @include('penjualan.biaya')
                                </div>
                                <div class="tab-pane fade" id="custom-tabs-one-gaji" role="tabpanel"
                                    aria-labelledby="custom-tabs-one-gaji-tab">
                                    @include('penjualan.gaji')
                                </div>
                                @if ($periode->datausaha->kategori == 'buah')
                                <div class="tab-pane fade" id="custom-tabs-one-settings" role="tabpanel"
                                    aria-labelledby="custom-tabs-one-settings-tab">
                                    @include('penjualan.sisa-produksi')
                                </div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection