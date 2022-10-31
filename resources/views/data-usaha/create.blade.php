@extends('layouts.app')

@section('title','Tambah Data Usaha')

@section('contentApp')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">@yield('title')</h1>
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
                            <form action="{{ route('data-usaha.store') }}" method="POST">
                                @csrf
                                <div class="form-group">
                                    <label>Nama Usaha</label>
                                    <input type="text" name="nama_usaha" value="{{ old('nama_usaha') }}" class="form-control @error('nama_usaha') is-invalid
                                            
                                        @enderror" placeholder="contoh : Usaha Pepaya">
                                    @error('nama_usaha')
                                    <span class="invalid-feedback">
                                        {{ $message }}
                                    </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label>Kategori Usaha</label>
                                    <select name="kategori" class="form-control @error('kategori') is-invalid
                                        
                                    @enderror">
                                        <option value="">Pilih salah satu</option>
                                        <option value="buah">buah</option>
                                        <option value="dagang">dagang</option>
                                        <option value="peternakan">peternakan</option>
                                        <option value="kebun">kebun</option>
                                    </select>
                                    @error('kategori')
                                    <span class="invalid-feedback">
                                        {{ $message }}
                                    </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <a href="{{ url('data-usaha') }}" class="btn btn-outline-secondary mt-3"><i
                                            class="fas fa-backspace"></i> Kembali</a>
                                    <button type="submit" class="btn btn-primary mt-3"><i class="fas fa-save"></i>
                                        Simpan</button>
                                </div>
                            </form>
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