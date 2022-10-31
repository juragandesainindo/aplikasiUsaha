@extends('layouts.app')

@section('title','Laporan Harian')

@section('contentApp')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Laporan Harian - {{ $usaha->nama_usaha }}</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ url('laporan-harian') }}"><i
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
                                        <th colspan="4">Total Data</th>
                                        <th rowspan="2">Aksi</th>
                                    </tr>
                                    <tr>
                                        <th>Beli</th>
                                        <th>Jual</th>
                                        <th>Biaya</th>
                                        <th>Gaji</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($usaha->periode->sortByDesc('tanggal_awal')->values() as $key => $item)
                                    <tr>
                                        <td class="text-center">{{ ++$key }}</td>
                                        <td>{{ $item->keterangan }}</td>
                                        <td class="text-center">
                                            @if ($item->pembelian->count('pembelian_count') == 0)
                                            <code>{{ $item->pembelian->count('pembelian_count') }}</code>
                                            @else
                                            <span>{{ $item->pembelian->count('pembelian_count') }}</span>
                                            @endif
                                        </td>
                                        <td class="text-center">
                                            @if ($item->penjualan->count('penjualan_count') == 0)
                                            <code>{{ $item->penjualan->count('penjualan_count') }}</code>
                                            @else
                                            <span>{{ $item->penjualan->count('penjualan_count') }}</span>
                                            @endif

                                        </td>
                                        <td class="text-center">
                                            @if ($item->biaya->count('biaya_count') == 0)
                                            <code>{{ $item->biaya->count('biaya_count') }}</code>
                                            @else
                                            <span>{{ $item->biaya->count('biaya_count') }}</span>
                                            @endif
                                        </td>
                                        <td class="text-center">
                                            @if ($item->gaji->count('gaji_count') == 0)
                                            <code>{{ $item->gaji->count('gaji_count') }}</code>
                                            @else
                                            <span>{{ $item->gaji->count('gaji_count') }}</span>
                                            @endif
                                        </td>
                                        <td class="text-center">
                                            @if ($item->pembelian->count('pembelian_count') == 0 ||
                                            $item->penjualan->count('penjualan_count') == 0 ||
                                            $item->biaya->count('biaya_count') == 0 ||
                                            $item->gaji->count('gaji_count') == 0)
                                            <span class="text-danger">Lengkapi data</span>
                                            @else
                                            <div class="btn-group btn-group-sm">
                                                <a href="{{ route('laporan-harian.preview',['id'=>$item->id,'slug'=>$item->slug]) }}"
                                                    class="btn btn-primary btn-sm" target="_blank">Preview</a>
                                                <a href="{{ route('laporan-harian.cetak',['id'=>$item->id,'slug'=>$item->slug]) }}"
                                                    class="btn btn-success btn-sm" target="_blank">cetak</a>
                                            </div>
                                            @endif
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
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
              "responsive": true, "lengthChange": false, "autoWidth": true,
            }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
            $('#example2').DataTable({
              "paging": true,
              "lengthChange": false,
              "searching": false,
              "ordering": true,
              "info": true,
              "autoWidth": true,
              "responsive": true,
            });
          });
</script>
@endsection