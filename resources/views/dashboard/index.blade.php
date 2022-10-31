@extends('layouts.app')
@section('title','Dashboard')
@section('contentApp')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Dashboard</h1>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
        <div class="container">
            <div class="row">
                {{-- <div class="col-md-3 col-sm-6 col-12">
                    <div class="info-box shadow">
                        <span class="info-box-icon bg-warning"><i class="fas fa-building"></i></span>

                        <div class="info-box-content">
                            <span class="info-box-text">Data Usaha</span>
                            <span class="info-box-number">{{ $totalUsaha }}</span>
                        </div>
                    </div>
                </div> --}}
                <div class="col-md-3 col-sm-6 col-12">
                    <div class="info-box shadow">
                        <span class="info-box-icon bg-info"><i class="fas fa-plus-circle"></i></span>

                        <div class="info-box-content">
                            <span class="info-box-text">Pendapatan Bulan Ini </span>
                            <span class="info-box-number">{{ formatRupiah($pendapatanTotal) }}</span>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6 col-12">
                    <div class="info-box shadow">
                        <span class="info-box-icon bg-danger"><i class="fas fa-minus-circle"></i></span>

                        <div class="info-box-content">
                            <span class="info-box-text">Pengeluaran Bulan Ini</span>
                            <span class="info-box-number">{{ formatRupiah($biayaTotal) }}</span>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6 col-12">
                    <div class="info-box shadow">
                        <span class="info-box-icon bg-success"><i class="fas fa-money-bill-alt"></i></span>

                        <div class="info-box-content">
                            <span class="info-box-text">Laba Bersih Bulan Ini</span>
                            <span class="info-box-number">{{ formatRupiah($labaBersih) }}</span>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6 col-12">
                    <div class="info-box shadow">
                        <span class="info-box-icon bg-warning"><i class="fas fa-money-bill-alt"></i></span>

                        <div class="info-box-content">
                            <span class="info-box-text">Sortir Bulan Ini</span>
                            <span class="info-box-number">{{ formatRupiah($sortirTotal) }}</span>
                        </div>
                    </div>
                </div>

            </div>

            <div class="row">
                <div class="col-12">
                    <div id="chartTotal"></div>
                </div>

            </div>
            <br>
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
</div>
@endsection

@section('js')
<script src="{{ asset('dist/plugins/chart.js/highcharts.js') }}"></script>
<script>
    Highcharts.chart('chartTotal', {
    chart: {
    type: 'bar'
    },
    title: {
    text: 'Biaya Produksi Bulan Ini (Rp)'
    },
    subtitle: {
    text: [{!! json_encode($tahun) !!}]
    },
    xAxis: {
    // categories: ['Africa', 'America', 'Asia', 'Europe', 'Oceania'],
    categories: [{!! json_encode($bulan) !!}],
    title: {
    text: null
    }
    },
    yAxis: {
    min: 0,
    title: {
    text: '(Rp)',
    align: 'high'
    },
    labels: {
    overflow: 'justify'
    }
    },
    tooltip: {
    valueSuffix: ' Rupiah'
    },
    plotOptions: {
    bar: {
    dataLabels: {
    enabled: true
    }
    }
    },
    legend: {
    layout: 'vertical',
    align: 'right',
    verticalAlign: 'top',
    x: -40,
    y: 40,
    floating: true,
    borderWidth: 1,
    backgroundColor:
    Highcharts.defaultOptions.legend.backgroundColor || '#FFFFFF',
    shadow: true
    },
    credits: {
    enabled: false
    },
    series: [{
    name: 'Pembelian Produksi',
    data: {!! json_encode($chartBeli) !!}
    },{
    name: 'Penjualan Produksi',
    data: {!! json_encode($chartJual) !!}
    }]
    });
</script>
@endsection