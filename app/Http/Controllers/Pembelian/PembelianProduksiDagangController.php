<?php

namespace App\Http\Controllers\Pembelian;

use App\Http\Controllers\Controller;
use App\Models\Pembelian;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class PembelianProduksiDagangController extends Controller
{
    public function store(Request $request)
    {
        Pembelian::create([
            'nama_supplier'     => $request->nama_supplier,
            'nama_barang'       => $request->nama_barang,
            'harga_super'       => $request->harga_super,
            'tonase_super'      => $request->tonase_super,
            'total_super'       => $request->harga_super * $request->tonase_super,
            'periode_id'        => $request->periode_id,
            'datausaha_id'      => $request->datausaha_id,

        ]);

        Alert::success('Selamat', 'Tambah pembelian produksi berhasil');
        return back();
    }

    public function update(Request $request, $id)
    {
        $produksi = Pembelian::findOrFail($id);
        $produksi->update([
            'nama_supplier'     => $request->nama_supplier,
            'nama_barang'       => $request->nama_barang,
            'harga_super'       => $request->harga_super,
            'tonase_super'      => $request->tonase_super,
            'total_super'       => $request->harga_super * $request->tonase_super,
        ]);

        Alert::warning('Selamat', 'Edit pembelian produksi berhasil');
        return back();
    }

    public function destroy($id)
    {
        Pembelian::findOrFail($id)->delete();

        Alert::error('Selamat', 'Hapus pembelian produksi berhasil');
        return back();
    }
}