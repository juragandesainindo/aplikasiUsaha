<?php

namespace App\Http\Controllers\Penjualan;

use App\Http\Controllers\Controller;
use App\Http\Requests\Penjualan\DagangEditRequest;
use App\Http\Requests\Penjualan\DagangRequest;
use App\Models\Penjualan;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class PenjualanProduksiDagangController extends Controller
{
    public function store(DagangRequest $request)
    {
        $input = $request->validated();
        require_once 'FormatRupiah.php';

        Penjualan::create($input);

        Alert::success('Selamat', 'Tambah penjualan produksi berhasil');
        return back();
    }

    public function update(DagangEditRequest $request, $id)
    {
        $penjualan = Penjualan::findOrFail($id);
        $input = $request->validated();
        require_once 'FormatRupiah.php';

        $penjualan->update($input);

        Alert::warning('Selamat', 'Edit penjualan produksi berhasil');
        return back();
    }

    public function destroy($id)
    {
        Penjualan::findOrFail($id)->delete();

        Alert::error('Selamat', 'Hapus penjualan produksi berhasil');
        return back();
    }
}