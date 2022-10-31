<?php

namespace App\Http\Controllers\Pembelian;

use App\Http\Controllers\Controller;
use App\Models\Pembelian;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class PembelianProduksiBuahController extends Controller
{
    public function store(Request $request)
    {
        Pembelian::create([
            'nama_supplier'       => $request->nama_supplier,
            'harga_super'         => $request->harga_super,
            'tonase_super'        => $request->tonase_super,
            'harga_bulat'         => $request->harga_bulat,
            'tonase_bulat'        => $request->tonase_bulat,
            'harga_sortiran'      => $request->harga_sortiran,
            'tonase_sortiran'     => $request->tonase_sortiran,
            'total_super'         => $request->harga_super * $request->tonase_super,
            'total_bulat'         => $request->harga_bulat * $request->tonase_bulat,
            'total_sortiran'      => $request->harga_sortiran * $request->tonase_sortiran,
            'total_biaya_beli'    => $request->harga_super * $request->tonase_super + $request->harga_bulat * $request->tonase_bulat + $request->harga_sortiran * $request->tonase_sortiran,
            'total_tonase_beli'   => $request->tonase_super + $request->tonase_bulat + $request->tonase_sortiran,
            'periode_id'          => $request->periode_id,
            'datausaha_id'        => $request->datausaha_id,

        ]);

        Alert::success('Selamat', 'Tambah pembelian produksi berhasil');
        return back();
    }

    public function update(Request $request, $id)
    {
        $produksi = Pembelian::findOrFail($id);
        $produksi->update([
            'nama_supplier'       => $request->nama_supplier,
            'harga_super'         => $request->harga_super,
            'tonase_super'        => $request->tonase_super,
            'harga_bulat'         => $request->harga_bulat,
            'tonase_bulat'        => $request->tonase_bulat,
            'harga_sortiran'      => $request->harga_sortiran,
            'tonase_sortiran'     => $request->tonase_sortiran,
            'total_super'         => $request->harga_super * $request->tonase_super,
            'total_bulat'         => $request->harga_bulat * $request->tonase_bulat,
            'total_sortiran'      => $request->harga_sortiran * $request->tonase_sortiran,
            'total_biaya_beli'    => $request->harga_super * $request->tonase_super + $request->harga_bulat * $request->tonase_bulat + $request->harga_sortiran * $request->tonase_sortiran,
            'total_tonase_beli'   => $request->tonase_super + $request->tonase_bulat + $request->tonase_sortiran,

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