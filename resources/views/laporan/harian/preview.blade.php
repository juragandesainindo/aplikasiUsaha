@extends('layouts.master')

@section('title','Laporan Harian')

@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container">
            <div class="row mb-2">
                <div class="col-sm-12 d-flex justify-content-between align-items-center">
                    <div>
                        <h1 class="m-0">Laporan Harian {{ \Carbon\Carbon::parse($periode->tanggal_awal)->isoFormat('DD')
                            }}-{{
                            \Carbon\Carbon::parse($periode->tanggal_akhir)->isoFormat('DD/MM/Y') }}
                        </h1>
                        {{ $periode->datausaha->nama_usaha }}
                    </div>
                    <div class="btn-group">
                        <a href="{{ url('laporan-harian') }}" class="btn btn-outline-secondary btn-sm"><i
                                class="fas fa-backspace"></i>
                            Kembali</a>
                        <a href="{{ route('laporan-harian.cetak',['id'=>$periode->id,'slug'=>$periode->slug]) }}"
                            class="btn btn-success btn-sm" target="_blank"><i class="fas fa-print"></i> &nbsp;Print
                            PDF</a>
                    </div>
                </div>
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    @if ($periode->datausaha->kategori == 'buah')
                    @include('laporan.harian.kategoriPreview.buah')
                    @elseif ($periode->datausaha->kategori == 'dagang')
                    @include('laporan.harian.kategoriPreview.dagang')
                    @elseif ($periode->datausaha->kategori == 'peternakan')
                    @include('laporan.harian.kategoriPreview.ternak')
                    @elseif ($periode->datausaha->kategori == 'kebun')
                    @include('laporan.harian.kategoriPreview.kebun')
                    @endif
                </div>
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
</div>
@endsection