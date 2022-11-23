<?php

namespace App\Http\Controllers\laporan;

use App\Http\Controllers\Controller;
use App\Models\Datausaha;
use App\Models\Periode;
use Barryvdh\DomPDF\Facade\PDF;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class GrandTotalController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('search');
        if ($request->has('search')) {
            $usahas = Datausaha::select()
                ->with(['pembelian', 'penjualan'])
                ->withSum('pembelian', 'total_biaya_beli')
                ->withSum('penjualan', 'total_jual')
                ->withSum('biaya', 'jumlah_biaya')
                ->withSum('gaji', 'gaji')
                ->whereHas('periode', function ($q) use ($search) {
                    $q->whereYear('tanggal_awal', '=', $search);
                })
                ->get();
        } else {

            $usahas = Datausaha::select()
                ->with(['pembelian', 'penjualan'])
                ->withSum('pembelian', 'total_biaya_beli')
                ->withSum('penjualan', 'total_jual')
                ->withSum('biaya', 'jumlah_biaya')
                ->withSum('gaji', 'gaji')
                ->get();
        }

        $pendapatanTotal = $usahas->sum('penjualan_sum_total_jual') - $usahas->sum('pembelian_sum_total_biaya_beli');
        $biayaTotal = $usahas->sum('biaya_sum_jumlah_biaya');
        $gajiTotal = $usahas->sum('gaji_sum_gaji');
        $totalLaba = $pendapatanTotal - $biayaTotal - $gajiTotal;


        return view('laporan.grand-total.index', compact(
            'usahas',
            'pendapatanTotal',
            'biayaTotal',
            'gajiTotal',
            'totalLaba'
        ));
    }

    public function cetak(Request $request)
    {
        $print = $request->input('print');
        $usahas = Datausaha::select()
            ->with(['pembelian', 'penjualan'])
            ->withSum('pembelian', 'total_biaya_beli')
            ->withSum('penjualan', 'total_jual')
            ->withSum('biaya', 'jumlah_biaya')
            ->withSum('gaji', 'gaji')
            ->whereHas('periode', function ($q) use ($print) {
                $q->whereYear('tanggal_awal', '=', $print);
            })
            ->get();

        $pendapatanTotal = $usahas->sum('penjualan_sum_total_jual') - $usahas->sum('pembelian_sum_total_biaya_beli');
        $biayaTotal = $usahas->sum('biaya_sum_jumlah_biaya');
        $gajiTotal = $usahas->sum('gaji_sum_gaji');
        $totalLaba = $pendapatanTotal - $biayaTotal - $gajiTotal;


        $cetak = PDF::loadview('laporan.grand-total.cetak', compact(
            'usahas',
            'pendapatanTotal',
            'biayaTotal',
            'gajiTotal',
            'totalLaba'
        ))->setPaper('a4', 'landscape');
        $fileName = $print;
        return $cetak->stream('Laporan Grand Total Periode ' . $fileName . '.pdf');
    }
}