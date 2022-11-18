<?php

namespace App\Http\Controllers\Penjualan;

use App\Http\Controllers\Controller;
use App\Http\Requests\Penjualan\PenjualanEditRequest;
use App\Http\Requests\Penjualan\PenjualanRequest;
use App\Models\Penjualan;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class PenjualanProduksiBuahController extends Controller
{
    public function store(PenjualanRequest $request)
    {
        $input = $request->validated();
        require_once 'FormatRupiah.php';

        Penjualan::create($input);

        Alert::success('Selamat', 'Tambah penjualan produksi berhasil');
        return back();
    }

    public function update(PenjualanEditRequest $request, $id)
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