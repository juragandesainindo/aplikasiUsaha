@extends('layouts.master')

@section('title','Pembelian Produksi')

@section('content')


<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container">
            <div class="row mb-2">
                <div class="col-12">
                    <div class="d-flex align-items-center justify-content-between">
                        <h1 class="m-0">Pembelian {{ $periode->tanggal }} ({{
                            $periode->datausaha->nama_usaha }})</h1>
                        <div class="btn-group">
                            <a href="{{ url('pembelian') }}" class="btn btn-secondary btn-sm"><i
                                    class="fas fa-backspace"></i>
                                Kembali</a>
                            <a href="#" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#create"
                                type="button">
                                Tambah Pembelian {{
                                $periode->datausaha->nama_usaha }}</a>
                        </div>
                    </div>
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
                        <div class="card-body">
                            <div class="table-responsive">
                                @if ($periode->datausaha->kategori == 'buah')
                                @include('pembelian.kategori.buah')
                                @elseif ($periode->datausaha->kategori == 'dagang')
                                @include('pembelian.kategori.dagang')
                                @elseif ($periode->datausaha->kategori == 'peternakan')
                                @include('pembelian.kategori.ternak')
                                @elseif ($periode->datausaha->kategori == 'kebun')
                                @include('pembelian.kategori.kebun')
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

@section('js')
<script>
    $(function () {
            $("#example1").DataTable({
              "responsive": true, "lengthChange": false, "autoWidth": false,
            }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
          });
</script>
@endsection