@extends('layouts.app')

@section('title','Penjualan')

@section('contentApp')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Data Penjualan</h1>
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
                                <a href="{{ route('penjualan-periode',['id'=>$item->id, 'slug'=>$item->slug]) }}">
                                    <img class="card-img-top p-4" src="{{ asset('dist/dist/img/logo3.png') }}"
                                        alt="Card image cap">
                                </a>
                                <div class="card-body">
                                    <h5 class="card-title font-weight-bold">{{ $item->nama_usaha }}</h5>
                                    <p class="card-text"></p>
                                    <div class="row mb-3">
                                        <div class="col-8">
                                            <p class="card-text">Total Periode</p>
                                        </div>
                                        <div class="col-4">
                                            <p class="card-text">= {{ $item->periode->count('periode_count') }}
                                            </p>
                                        </div>
                                    </div>
                                    <a href="{{ route('penjualan-periode',['id'=>$item->id, 'slug'=>$item->slug]) }}"
                                        class="btn btn-primary btn-sm">Go</a>
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