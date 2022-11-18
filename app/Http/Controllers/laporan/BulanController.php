<?php

namespace App\Http\Controllers\laporan;

use App\Http\Controllers\Controller;
use App\Models\Datausaha;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;

class BulanController extends Controller
{

    public function index()
    {
        $usaha = Datausaha::all();

        return view('laporan.bulanan.index', compact('usaha'));
    }

    public function show(Request $request, $id)
    {
        include_once 'PreviewCetakBulanan.php';

        return view('laporan.bulanan.show', compact(
            'usaha',
            'month',
            'year',
            'periode',
            'totalTonaseBeli',
            'totalTonaseJual',
            'totalPembelian',
            'totalPenjualan',
            'pendapatan',
            'operasional',
            'total',
            'selisih',
            'terjualLagi',
            'sortir',
        ));
    }

    public function cetak(Request $request, $id)
    {
        include_once 'PreviewCetakBulanan.php';

        $cetak = PDF::loadview('laporan.bulanan.cetak', compact(
            'usaha',
            'month',
            'year',
            'periode',
            'totalTonaseBeli',
            'totalTonaseJual',
            'totalPembelian',
            'totalPenjualan',
            'pendapatan',
            'operasional',
            'total',
            'selisih',
            'terjualLagi',
            'sortir',
        ))->setPaper('a4', 'landscape');
        return $cetak->stream('Laporan Bulanan Periode ' . $month . '-' . $year . '.pdf');
    }
}