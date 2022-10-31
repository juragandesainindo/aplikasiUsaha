<?php

namespace App\Http\Controllers\Penjualan;

use App\Http\Controllers\Controller;
use App\Models\Datausaha;
use App\Models\Periode;
use App\Models\Biaya;
use App\Models\Gaji;
use App\Models\Sisaproduksi;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Http\Request;

class PenjualanController extends Controller
{
    public function index()
    {
        $usaha = Datausaha::with('periode')
            ->withCount('periode')
            ->get();
        return view('penjualan.index', compact('usaha'));
    }

    public function periode($id, $slug)
    {
        $usahas = Datausaha::where('id', $id)->where('slug', $slug)
            ->with(['periode.penjualan', 'periode.biaya', 'periode.sisa'])
            ->withCount('penjualan')
            ->withCount('biaya')
            ->withCount('sisa')
            ->get();

        foreach ($usahas as $usaha) {
            $usaha;
        }

        return view('penjualan.periode', compact('usaha'));
    }

    public function produksi($id, $slug)
    {
        $periodes = Periode::where('id', $id)->where('slug', $slug)
            ->with(['pembelian', 'penjualan', 'biaya', 'sisa', 'datausaha'])
            ->withSum('pembelian', 'total_tonase_beli')
            ->withSum('pembelian', 'tonase_super')
            ->withSum('penjualan', 'tonase_jual')
            ->withSum('penjualan', 'total_jual')
            ->withSum('biaya', 'jumlah_biaya')
            ->withSum('sisa', 'tonase_sisa_terjual')
            ->withSum('sisa', 'total_sisa_terjual')
            ->get();
        // dd($periodes);
        foreach ($periodes as $periode) {
            $periode;
        }

        $tonaseBeli = $periodes->sum('pembelian_sum_total_tonase_beli');
        $tonaseJual = $periodes->sum('penjualan_sum_tonase_jual');
        $totalJual = $periodes->sum('penjualan_sum_total_jual');
        $totalBiaya = $periodes->sum('biaya_sum_jumlah_biaya');
        $selisih = $tonaseBeli - $tonaseJual;
        $terjualLagi = $periodes->sum('sisa_sum_tonase_sisa_terjual');
        $sortir = $selisih - $terjualLagi;

        $qtyTernak = $periodes->sum('pembelian_sum_tonase_super') - $tonaseJual;
        // dd($qtyTernak);

        $edit = 1;
        $delete = 1;

        return view('penjualan.produksi', compact(
            'periodes',
            'periode',
            'tonaseBeli',
            'tonaseJual',
            'totalJual',
            'totalBiaya',
            'selisih',
            'terjualLagi',
            'sortir',
            'edit',
            'delete',
            'qtyTernak'
        ));
    }






    public function storeBiaya(Request $request)
    {
        Biaya::create([
            'title_biaya'       => $request->title_biaya,
            'jumlah_biaya'      => $request->jumlah_biaya,
            'periode_id'        => $request->periode_id,
            'datausaha_id'      => $request->datausaha_id
        ]);

        Alert::success('Selamat', 'Tambah biaya produksi berhasil');
        return back();
    }

    public function updateBiaya(Request $request, $id)
    {
        $biaya = Biaya::findOrFail($id);
        $biaya->update([
            'title_biaya'       => $request->title_biaya,
            'jumlah_biaya'      => $request->jumlah_biaya,
        ]);

        Alert::warning('Selamat', 'Edit biaya berhasil');
        return back();
    }

    public function destroyBiaya($id)
    {
        Biaya::find($id)->delete();

        Alert::error('Selamat', 'Hapus biaya berhasil');
        return back();
    }

    public function storeGaji(Request $request)
    {
        Gaji::create([
            'gaji'       => $request->gaji,
            'periode_id'        => $request->periode_id,
            'datausaha_id'      => $request->datausaha_id
        ]);

        Alert::success('Selamat', 'Tambah gaji berhasil');
        return back();
    }

    public function updateGaji(Request $request, $id)
    {
        $biaya = Gaji::findOrFail($id);
        $biaya->update([
            'gaji'       => $request->gaji,
        ]);

        Alert::warning('Selamat', 'Edit gaji berhasil');
        return back();
    }

    public function destroyGaji($id)
    {
        Gaji::find($id)->delete();

        Alert::error('Selamat', 'Hapus gaji berhasil');
        return back();
    }

    public function storeSisa(Request $request)
    {
        Sisaproduksi::create([
            'tonase_sisa_terjual'   => $request->tonase_sisa_terjual,
            'harga'                 => $request->harga,
            'total_sisa_terjual'    => $request->tonase_sisa_terjual * $request->harga,
            'periode_id'            => $request->periode_id,
            'datausaha_id'          => $request->datausaha_id
        ]);

        Alert::success('Selamat', 'Tambah sortir produksi berhasil');
        return back();
    }

    public function destroySisa($id)
    {
        Sisaproduksi::find($id)->delete();

        Alert::error('Selamat', 'Hapus sisa produksi berhasil');
        return back();
    }
}