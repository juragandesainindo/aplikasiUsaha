<?php

namespace App\Http\Controllers\Pembelian;

use App\Http\Controllers\Controller;
use App\Http\Requests\Pembelian\PembelianEditRequest;
use App\Http\Requests\Pembelian\PembelianRequest;
use App\Models\Pembelian;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class PembelianProduksiDagangController extends Controller
{
    public function store(PembelianRequest $request)
    {
        $input = $request->validated();
        include_once 'FormatRupiah.php';

        Pembelian::create($input);

        Alert::success('Selamat', 'Tambah pembelian produksi berhasil');
        return back();
    }

    public function update(PembelianEditRequest $request, $id)
    {
        $produksi = Pembelian::findOrFail($id);
        $input = $request->validated();
        include_once 'FormatRupiah.php';

        $produksi->update($input);

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