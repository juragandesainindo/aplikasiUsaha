@extends('layouts.app')

@section('title','Laporan Bulanan')

@section('contentApp')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Laporan Bulanan</h1>
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
                    <div class="row clearfix">
                        @foreach ($usaha as $item)
                        <div class="col-lg-3 col-md-6 col-sm-12 mb-30">
                            <div class="card card-box">
                                <a href="{{ route('laporan-bulanan.show',$item->id) }}">
                                    <img class="card-img-top p-4" src="{{ asset('dist/dist/img/logo3.png') }}"
                                        alt="Card image cap">
                                </a>
                                <div class="card-body">
                                    <h5 class="card-title font-weight-bold">{{ $item->nama_usaha }}</h5>
                                    <br>
                                    <a href="{{ route('laporan-bulanan.show',$item->id) }}"
                                        class="btn btn-primary btn-sm mt-4">Go</a>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
</div>
@endsection