<?php

namespace App\Http\Controllers\Penjualan;

use App\Http\Controllers\Controller;
use App\Models\Penjualan;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class PenjualanProduksiDagangController extends Controller
{
    public function store(Request $request)
    {
        Penjualan::create([
            'nama_penjual'      => $request->nama_penjual,
            'harga_jual'        => $request->harga_jual,
            'tonase_jual'       => $request->tonase_jual,
            'total_jual'        => $request->harga_jual * $request->tonase_jual,
            'pembelian_id'        => $request->pembelian_id,
            'periode_id'        => $request->periode_id,
            'datausaha_id'      => $request->datausaha_id
        ]);

        Alert::success('Selamat', 'Tambah penjualan produksi berhasil');
        return back();
    }

    public function update(Request $request, $id)
    {
        $penjualan = Penjualan::findOrFail($id);
        $penjualan->update([
            'nama_penjual'      => $request->nama_penjual,
            'harga_jual'        => $request->harga_jual,
            'tonase_jual'       => $request->tonase_jual,
            'total_jual'        => $request->harga_jual * $request->tonase_jual,
            'pembelian_id'        => $request->pembelian_id,
        ]);

        Alert::warning('Selamat', 'Edit penjualan produksi berhasil');
        return back();
    }
}