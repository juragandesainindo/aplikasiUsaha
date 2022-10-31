@extends('layouts.app')

@section('title','Gaji')

@section('contentApp')

<!-- Modal Create Start -->
<div class="modal fade" id="create">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Tambah Gaji</h5>
                <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                </button>
            </div>
            <form action="{{ route('gaji.store') }}" method="post">
                @csrf
                <div class="modal-body">
                    <div class="form-group">
                        <label>Gaji</label>
                        <input type="number" min="1" name="gaji" value="{{ old('gaji') }}" class="form-control"
                            required>
                    </div>
                    <div class="form-group">
                        <label>Periode</label>
                        <select name="" id="">
                            @foreach ($usaha->periode->values() as $item)
                            <option value="">{{ $item->tanggal_awal }}</option>
                            @endforeach
                        </select>
                    </div>
                    <input type="hidden" name="datausaha_id" value="{{ $usaha->id }}" class="form-control">
                    <input type="hidden" name="periode_id" value="{{ $usaha->id }}" class="form-control">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-light" data-dismiss="modal">Tutup</button>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- Modal Create End -->

<!-- Modal Edit Start -->
@switch($edit)
@case(1)
@foreach ($usaha->gaji as $item)
<div class="modal fade" id="edit-{{ $item->id }}">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Edit Periode</h5>
                <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                </button>
            </div>
            <form action="{{ route('gaji.update',$item->id) }}" method="post">
                @csrf
                @method('PUT')
                <div class="modal-body">
                    <div class="form-group">
                        <label>Gaji</label>
                        <input type="number" min="1" name="gaji" value="{{ $item->gaji }}" class="form-control"
                            required>
                    </div>
                    <div class="form-group">
                        <label>Tanggal Awal</label>
                        <input type="date" name="created_at" value="{{ $item->created_at }}" class="form-control">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-light" data-dismiss="modal">Tutup</button>
                    <button type="submit" class="btn btn-warning">Ya, edit</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endforeach
@break
@endswitch
<!-- Modal Edit End -->

@switch($delete)
@case(1)
@foreach ($usaha->periode as $item)
<div class="modal fade" id="delete-{{ $item->id }}" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-body text-center font-18">
                <h4 class="padding-top-30 mb-30 weight-500 pb-5">Apakah yakin ingin menghapus Data <br><strong>{{
                        $item->keterangan }}?</strong></h4>

                <form action="{{ route('periode-produksi.destroy',$item->id) }}" method="post">
                    @csrf
                    @method('DELETE')
                    <div class="padding-bottom-30 row" style="max-width: 170px; margin: 0 auto;">
                        <div class="col-6">
                            <button type="button" class="btn btn-secondary border-radius-100 btn-block confirmation-btn"
                                data-dismiss="modal"><i class="fa fa-times"></i></button>
                            TIDAK
                        </div>
                        <div class="col-6">
                            <button type="submit" class="btn btn-danger border-radius-100 btn-block confirmation-btn"><i
                                    class="fa fa-check"></i></button>
                            YA
                        </div>
                    </div>
                </form>

            </div>
        </div>
    </div>
</div>
@endforeach
@break
@endswitch


<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container">
            <div class="row mb-2">
                <div class="col-12">
                    <div class="d-flex align-items-center justify-content-between">
                        <h1 class="m-0">Periode ({{ $usaha->nama_usaha }})</h1>
                        <div class="btn-group btn-group-sm">
                            <a href="{{ url('periode') }}" class="btn btn-secondary btn-sm"><i
                                    class="fas fa-backspace"></i>&nbsp;&nbsp;
                                Kembali</a>
                            <a href="#" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#create"
                                type="button"><i class="fas fa-plus-circle"></i>&nbsp;&nbsp;
                                Tambah Gaji</a>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"></li>
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
                        <div class="card-header">
                            <h3 class="card-title"></h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped text-center">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Gaji</th>
                                        <th>Tanggal</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($usaha->gaji as $key => $item)
                                    <tr>
                                        <td>{{ ++$key }}</td>
                                        <td>{{ formatRupiah($item->gaji) }}</td>
                                        <td>{{ $item->created_at }}</td>
                                        <td>
                                            <div class="btn-group btn-group-sm">
                                                <a href="#" class="btn btn-warning btn-sm" data-toggle="modal"
                                                    data-target="#edit-{{ $item->id }}" type="button">
                                                    Edit</a>
                                                <a href="#" class="btn btn-danger btn-sm" data-toggle="modal"
                                                    data-target="#delete-{{ $item->id }}" type="button">
                                                    Hapus</a>
                                            </div>
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

            $('#reservation').daterangepicker()
          });
          //Date range picker
</script>
@endsection