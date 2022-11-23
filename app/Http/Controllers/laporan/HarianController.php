<?php

namespace App\Http\Controllers\laporan;

use App\Http\Controllers\Controller;
use App\Models\Datausaha;
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
        include_once 'PreviewCetakHarian.php';

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
            'jumlahbiaya',
            'jumlahgaji',
            'labarugi',
        ));
    }

    public function cetak($id, $slug)
    {
        include_once 'PreviewCetakHarian.php';

        if ($periode->datausaha->kategori == 'buah') {

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
                'jumlahbiaya',
                'jumlahgaji',
                'labarugi',

            ))->setPaper('a4', 'landscape');
        } else {
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
                'jumlahbiaya',
                'jumlahgaji',
                'labarugi',

            ))->setPaper('a4', 'potrait');
        }


        $fileName = $periode->datausaha->nama_usaha;
        $slug = $periode->slug;
        return $cetak->stream('Laporan Harian ' . $fileName . '  ' . $slug . '.pdf');
    }
}
