<?php

namespace App\Http\Controllers\Pembelian;

use App\Http\Controllers\Controller;
use App\Models\Datausaha;
use App\Models\Periode;

class PembelianController extends Controller
{
    public function index()
    {
        $usaha = Datausaha::withCount('periode')
            ->withCount('pembelian')
            ->get();
        $edit = 1;
        return view('pembelian.index', compact('usaha', 'edit'));
    }

    public function periode($id, $slug)
    {
        $usaha = Datausaha::where('id', $id)->where('slug', $slug)
            ->with('periode.pembelian')
            ->first();
        return view('pembelian.periode', compact('usaha'));
    }

    public function produksi($id, $slug)
    {
        $periode = Periode::where('id', $id)->where('slug', $slug)
            ->with(['pembelian', 'datausaha'])
            ->first();
        return view('pembelian.produksi', compact('periode'));
    }
}