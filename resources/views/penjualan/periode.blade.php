@extends('layouts.app')

@section('title','Penjualan Periode')

@section('contentApp')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Penjualan Periode </h1>
                    {{ $usaha->nama_usaha }}
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
                <div class="col-12">

                    <div class="card">
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead class="text-center">
                                    <tr>
                                        <th rowspan="2">No</th>
                                        <th rowspan="2">Keterangan</th>
                                        <th rowspan="2">Tanggal</th>
                                        @if ($usaha->kategori == 'buah')
                                        <th colspan="3">Total</th>
                                        @else
                                        <th colspan="2">Total</th>
                                        @endif
                                        <th rowspan="2">Aksi</th>
                                    </tr>
                                    <tr>
                                        <th>Penjualan</th>
                                        <th>Biaya</th>
                                        @if ($usaha->kategori == 'buah')
                                        <th>Sortir</th>
                                        @endif
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($usaha->periode->sortByDesc('tanggal_awal')->values() as $key => $item)
                                    <tr>
                                        <td class="text-center">{{ ++$key }}</td>
                                        <td>{{ $item->keterangan }}</td>
                                        <td>{{ formatD($item->tanggal_awal) }} s/d {{ formatTgl($item->tanggal_akhir) }}
                                        </td>
                                        <td class="text-center"><span class="btn btn-info btn-sm">{{
                                                $item->penjualan->count('penjualan') }}</span></td>
                                        <td class="text-center"><span class="btn btn-primary btn-sm">{{
                                                $item->biaya->count('biaya_count') }}</span></td>
                                        @if ($item->datausaha->kategori == 'buah')
                                        <td class="text-center"><span class="btn btn-danger btn-sm">{{
                                                $item->sisa->count('sisa_count') }}</span></td>
                                        @endif
                                        <td>
                                            <a href="{{ route('penjualan-periode-produksi',['id'=>$item->id, 'slug'=>$item->slug]) }}"
                                                class="btn btn-success btn-sm">
                                                Buat Penjualan</a>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
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