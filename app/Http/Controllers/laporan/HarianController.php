<?php

namespace App\Http\Controllers\laporan;

use App\Http\Controllers\Controller;
use App\Models\Datausaha;
use App\Models\Periode;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;

class HarianController extends Controller
{
    public function index()
    {
        $usaha = Datausaha::all();
        return view('laporan.harian.index', compact('usaha'));
    }

    public function show($id, $slug)
    {
        $usahas = Datausaha::where(['id' => $id, 'slug' => $slug])
            ->with(['periode.pembelian', 'periode.penjualan', 'periode.biaya'])
            ->withCount('pembelian')
            ->withCount('penjualan')
            ->withCount('biaya')
            ->get();

        foreach ($usahas as $usaha) {
            $usaha;
        }
        // dd($usaha);
        $preview = 1;
        return view('laporan.harian.show', compact('usaha', 'preview'));
    }

    public function preview($id, $slug)
    {
        $periode = Periode::where(['id' => $id, 'slug' => $slug])->first();

        $tonasesuper = $periode->pembelian->sum('tonase_super');
        $tonasebulat = $periode->pembelian->sum('tonase_bulat');
        $tonasesortiran = $periode->pembelian->sum('tonase_sortiran');
        $totalsuper = $periode->pembelian->sum('total_super');
        $totalbulat = $periode->pembelian->sum('total_bulat');
        $totalsortiran = $periode->pembelian->sum('total_sortiran');
        $totalbiaya = $periode->pembelian->sum('total_biaya_beli');
        $totaltonase = $periode->pembelian->sum('total_tonase_beli');
        try {
            $grandtotalbeli = $totalbiaya / $totaltonase;
        } catch (\Throwable $th) {
            $grandtotalbeli = 0;
        }

        $tonasejual = $periode->penjualan->sum('tonase_jual');
        $totaljual = $periode->penjualan->sum('total_jual');

        try {
            $hargaratarata = $totaljual / $tonasejual;
        } catch (\Throwable $th) {
            $hargaratarata = 0;
        }
        $selisihtonase = $tonasejual - $totaltonase;
        $selisihTonaseKebun = $tonasesuper - $tonasejual;
        $selisihharga = $hargaratarata - $grandtotalbeli;
        $pendapatankotor = $totaljual - $totalbiaya;
        $pendapatanKotorDagang = $totaljual - $totalsuper;

        $jumlahbiaya = $periode->biaya->sum('jumlah_biaya');

        $labarugi = $pendapatankotor - $jumlahbiaya;
        $labaRugiDagang = $pendapatanKotorDagang - $jumlahbiaya;

        return view('laporan.harian.preview', compact(
            'periode',
            'tonasesuper',
            'tonasebulat',
            'tonasesortiran',
            'totalsuper',
            'totalbulat',
            'totalsortiran',
            'totalbiaya',
            'totaltonase',
            'grandtotalbeli',

            'tonasejual',
            'totaljual',

            'hargaratarata',
            'selisihtonase',
            'selisihTonaseKebun',
            'selisihharga',
            'pendapatankotor',
            'pendapatanKotorDagang',

            'jumlahbiaya',
            'labarugi',
            'labaRugiDagang',
        ));
    }

    public function cetak($id, $slug)
    {
        $periode = Periode::where(['id' => $id, 'slug' => $slug])->first();

        $tonasesuper = $periode->pembelian->sum('tonase_super');
        $tonasebulat = $periode->pembelian->sum('tonase_bulat');
        $tonasesortiran = $periode->pembelian->sum('tonase_sortiran');
        $totalsuper = $periode->pembelian->sum('total_super');
        $totalbulat = $periode->pembelian->sum('total_bulat');
        $totalsortiran = $periode->pembelian->sum('total_sortiran');
        $totalbiaya = $periode->pembelian->sum('total_biaya_beli');
        $totaltonase = $periode->pembelian->sum('total_tonase_beli');

        try {
            $grandtotalbeli = $totalbiaya / $totaltonase;
        } catch (\Throwable $th) {
            $grandtotalbeli = 0;
        }

        $tonasejual = $periode->penjualan->sum('tonase_jual');
        $totaljual = $periode->penjualan->sum('total_jual');


        try {
            $hargaratarata = $totaljual / $tonasejual;
        } catch (\Throwable $th) {
            $hargaratarata = 0;
        }
        $selisihtonase = $tonasejual - $totaltonase;
        $selisihTonaseKebun = $tonasesuper - $tonasejual;
        $selisihharga = $hargaratarata - $grandtotalbeli;
        $pendapatankotor = $totaljual - $totalbiaya;
        $pendapatanKotorDagang = $totaljual - $totalsuper;

        $jumlahbiaya = $periode->biaya->sum('jumlah_biaya');

        $labarugi = $pendapatankotor - $jumlahbiaya;
        $labaRugiDagang = $pendapatanKotorDagang - $jumlahbiaya;


        $cetak = PDF::loadview('laporan.harian.cetak', compact(
            'periode',
            'tonasesuper',
            'tonasebulat',
            'tonasesortiran',
            'totalsuper',
            'totalbulat',
            'totalsortiran',
            'totalbiaya',
            'totaltonase',
            'grandtotalbeli',

            'tonasejual',
            'totaljual',

            'hargaratarata',
            'selisihtonase',
            'selisihTonaseKebun',
            'selisihharga',
            'pendapatankotor',
            'pendapatanKotorDagang',

            'jumlahbiaya',
            'labarugi',
            'labaRugiDagang'

        ))->setPaper('a4', 'landscape');
        // return $cetak->download('laporan-harian.pdf');
        return $cetak->stream('laporan harian.pdf');
    }
}