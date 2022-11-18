<?php

namespace App\Http\Controllers\Pembelian;

use App\Http\Controllers\Controller;
use App\Http\Requests\Pembelian\BuahEditRequest;
use App\Http\Requests\Pembelian\BuahRequest;
use App\Models\Pembelian;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class PembelianProduksiBuahController extends Controller
{
    public function store(BuahRequest $request)
    {
        $input = $request->validated();

        include_once 'FormatRupiahBuah.php';

        Pembelian::create($input);

        Alert::success('Selamat', 'Tambah pembelian produksi berhasil');
        return back();
    }

    public function update(BuahEditRequest $request, $id)
    {
        $produksi = Pembelian::findOrFail($id);
        $input = $request->validated();
        include_once 'FormatRupiahBuah.php';

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