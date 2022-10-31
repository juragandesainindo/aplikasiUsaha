@extends('layouts.app')

@section('title','Laporan Grand Total')

@section('contentApp')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Laporan Grand Total</h1>
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
                    <div class="card">
                        <div class="card-header">
                            <div class="col-12 text-right">
                                <div class="btn-group btn-group-sm">
                                    <button type="button" class="btn btn-sm btn-primary" data-toggle="modal"
                                        data-target="#filter">
                                        <i class="fas fa-search"></i>&nbsp;&nbsp; Filter
                                    </button>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="example1" class="table table-bordered text-center">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Nama Usaha</th>
                                            <th>Pendapatan</th>
                                            <th>Biaya Produksi</th>
                                            <th>Total Laba</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
</div>


<!-- Modal Filter Start-->
<div class="modal fade" id="filter">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Filter Laporan Grand Total</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('laporan-grand-total.show') }}" method="GET">
                @csrf
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12">
                            <label for="year">Tahun</label>
                            <select name="year" id="year" class="select2 form-control" required>
                                <option value="">Pilih tahun</option>
                                @foreach ($periode->sortByDesc('year')->values() as $item)

                                <option value="{{ $item->year }}">{{ $item->year }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Filter</button>
                </div>

            </form>
        </div>
    </div>
</div>
<!-- Modal Filter End-->
@endsection