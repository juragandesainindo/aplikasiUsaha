<?php

namespace App\Http\Controllers\laporan;

use App\Http\Controllers\Controller;
use App\Models\Datausaha;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TahunanController extends Controller
{
    public function index()
    {
        $usaha = Datausaha::all();
        return view('laporan.tahunan.index', compact('usaha'));
    }

    public function show(Request $request, $id)
    {
        $usaha = Datausaha::findOrFail($id);
        $year   = $request->input('year');
        $usahaId = $request->input('usahaId');

        include_once 'PreviewCetakTahunan.php';

        return view('laporan.tahunan.show', compact(
            'usaha',
            'year',
            'jan',
            'feb',
            'mar',
            'apr',
            'mei',
            'jun',
            'jul',
            'aug',
            'sep',
            'okt',
            'nov',
            'des',

            'tonaseBeliTotal',
            'tonaseJualTotal',
            'biayaBeliTotal',
            'biayaJualTotal',
            'pendapatanTotal',
            'operasionalTotal',
            'GajiTotal',
            'totalTotal',
            'selisihTotal',
            'terjualLagiTotal',
            'sortirTotal',
        ));
    }

    public function cetak(Request $request, $id)
    {
        $usaha = Datausaha::findOrFail($id);
        $year   = $request->input('year');
        $usahaId = $request->input('usahaId');

        include_once 'PreviewCetakTahunan.php';


        $cetak = Pdf::loadview('laporan.tahunan.cetak', compact(
            'usaha',
            'year',
            'jan',
            'feb',
            'mar',
            'apr',
            'mei',
            'jun',
            'jul',
            'aug',
            'sep',
            'okt',
            'nov',
            'des',

            'tonaseBeliTotal',
            'tonaseJualTotal',
            'biayaBeliTotal',
            'biayaJualTotal',
            'pendapatanTotal',
            'operasionalTotal',
            'GajiTotal',
            'totalTotal',
            'selisihTotal',
            'terjualLagiTotal',
            'sortirTotal',
        ))->setPaper('a4', 'landscape');
        return $cetak->stream('Laporan Tahunan Periode ' . $year . '.pdf');
    }
}