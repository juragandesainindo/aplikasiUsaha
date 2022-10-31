@extends('layouts.app')

@section('title','Data Usaha')

@section('contentApp')

@switch($delete)
@case(1)
@foreach ($datausaha as $item)
<div class="modal fade" id="delete-{{ $item->id }}" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-body text-center font-18">
                <h4 class="padding-top-30 mb-30 weight-500 pb-5">Apakah yakin ingin menghapus Data <br><strong>{{
                        $item->nama_usaha }}?</strong></h4>

                <form action="{{ route('data-usaha.destroy',$item->id) }}" method="post">
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
                        <h1 class="m-0">Data Usaha</h1>
                        <a href="{{ route('data-usaha.create') }}" class="btn btn-primary btn-sm"><i
                                class="fas fa-plus-circle"></i>&nbsp;&nbsp;
                            Tambah Data Usaha</a>
                    </div>
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
                        <div class="card-body">
                            <table id="example2" class="table table-bordered table-striped text-center">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama Usaha</th>
                                        <th>Slug</th>
                                        <th>Kategori</th>
                                        <th>Dibuat</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($datausaha as $key => $item)
                                    <tr>
                                        <td>{{ ++$key }}</td>
                                        <td>{{ $item->nama_usaha }}</td>
                                        <td>{{ $item->slug }}</td>
                                        <td>
                                            @if ($item->kategori == 'dagang')
                                            <span class="btn btn-xs btn-info">{{ $item->kategori }}</span>
                                            @elseif ($item->kategori == 'buah')
                                            <span class="btn btn-xs btn-success">{{ $item->kategori }}</span>
                                            @elseif ($item->kategori == 'kebun')
                                            <span class="btn btn-xs btn-warning">{{ $item->kategori }}</span>
                                            @elseif ($item->kategori == 'peternakan')
                                            <span class="btn btn-xs btn-danger">{{ $item->kategori }}</span>
                                            @endif
                                        </td>
                                        <td>{{ $item->created_at->diffForHumans() }}</td>
                                        <td>
                                            <div class="btn-group btn-group-sm">
                                                <a class="btn btn-warning btn-sm"
                                                    href="{{ route('data-usaha.edit',$item->id) }}">Edit
                                                </a>
                                                <a class="btn btn-danger btn-sm" href="#" data-toggle="modal"
                                                    data-target="#delete-{{ $item->id }}" type="button">Hapus
                                                </a>
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