@extends('layouts.app')

@section('title','Pembelian Periode')

@section('contentApp')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Pembelian Periode </h1>
                    {{ $usaha->nama_usaha }}
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ url('pembelian') }}"><i class="fas fa-backspace"></i>
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
                            <table id="example1" class="table table-bordered table-striped text-center">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Keterangan</th>
                                        <th>Tanggal</th>
                                        <th>Total Pembelian</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    {{-- -> --}}
                                    @foreach ($usaha->periode->sortByDesc('tanggal_awal')->values() as $key => $item)
                                    <tr>
                                        <td>{{ ++$key }}</td>
                                        <td>{{ $item->keterangan }}</td>
                                        <td>{{ formatD($item->tanggal_awal) }} s/d {{ formatTgl($item->tanggal_akhir) }}
                                        </td>
                                        <td>{{ $item->pembelian->count() }}</td>
                                        <td>

                                            <a href="{{ route('pembelian-periode-produksi',['id'=>$item->id, 'slug'=>$item->slug]) }}"
                                                class="btn btn-success btn-sm">
                                                Buat Pembelian</a>
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
            $('#example2').DataTable({
              "paging": true,
              "lengthChange": false,
              "searching": false,
              "ordering": true,
              "info": true,
              "autoWidth": false,
              "responsive": true,
            });
          });
</script>
@endsection