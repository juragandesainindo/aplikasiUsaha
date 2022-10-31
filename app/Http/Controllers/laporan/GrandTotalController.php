<?php

namespace App\Http\Controllers\laporan;

use App\Http\Controllers\Controller;
use App\Models\Datausaha;
use App\Models\Periode;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class GrandTotalController extends Controller
{
    public function index()
    {

        $periode = Periode::select(
            DB::raw('YEAR(tanggal_awal) year')
        )
            ->groupby('year')
            ->get();
        $usahas = Datausaha::all();
        return view('laporan.grand-total.index', compact(
            'periode',
            'usahas'
        ));
    }



    public function show(Request $request)
    {
        $year = $request->input('year');

        $pilihTahun = Periode::select(
            DB::raw('YEAR(tanggal_awal) year')
        )
            ->groupby('year')
            ->get();

        $periode = Periode::select()
            ->with('datausaha')
            ->withSum('penjualan', 'total_jual')
            ->withSum('pembelian', 'total_biaya_beli')
            ->withSum('pembelian', 'total_super')
            ->withSum('biaya', 'jumlah_biaya')
            ->withSum('gaji', 'gaji')
            ->whereYear('tanggal_awal', '=', $year)
            ->get()->groupBy('datausaha.kategori');


        try {
            $pendapatanBuah = $periode['buah']->sum('penjualan_sum_total_jual') - $periode['buah']->sum('pembelian_sum_total_biaya_beli');
        } catch (\Throwable $pendapatanBuah) {
            $pendapatanBuah = 0;
        }
        try {
            $pendapatanTernak = $periode['peternakan']->sum('penjualan_sum_total_jual') - $periode['peternakan']->sum('pembelian_sum_total_super');
        } catch (\Throwable $pendapatanTernak) {
            $pendapatanTernak = 0;
        }
        try {
            $pendapatanDagang = $periode['dagang']->sum('penjualan_sum_total_jual') - $periode['dagang']->sum('pembelian_sum_total_super');
        } catch (\Throwable $pendapatanDagang) {
            $pendapatanDagang = 0;
        }
        try {

            $pendapatanKebun = $periode['kebun']->sum('penjualan_sum_total_jual') - $periode['kebun']->sum('pembelian_sum_total_super');
        } catch (\Throwable $pendapatanKebun) {
            $pendapatanKebun = 0;
        }
        $pendapatanTotal = $pendapatanBuah + $pendapatanTernak + $pendapatanDagang + $pendapatanKebun;

        try {
            $biayaBuah = $periode['buah']->sum('biaya_sum_jumlah_biaya') + $periode['buah']->sum('gaji_sum_gaji');
        } catch (\Throwable $biayaBuah) {
            $biayaBuah = 0;
        }
        try {
            $biayaTernak = $periode['peternakan']->sum('biaya_sum_jumlah_biaya') + $periode['peternakan']->sum('gaji_sum_gaji');
        } catch (\Throwable $biayaTernak) {
            $biayaTernak = 0;
        }
        try {
            $biayaDagang = $periode['dagang']->sum('biaya_sum_jumlah_biaya') + $periode['dagang']->sum('gaji_sum_gaji');
        } catch (\Throwable $biayaDagang) {
            $biayaDagang = 0;
        }
        try {

            $biayaKebun = $periode['kebun']->sum('biaya_sum_jumlah_biaya') + $periode['kebun']->sum('gaji_sum_gaji');
        } catch (\Throwable $biayaKebun) {
            $biayaKebun = 0;
        }
        $biayaTotal = $biayaBuah + $biayaTernak + $biayaDagang + $biayaKebun;

        $labaBuah = $pendapatanBuah - $biayaBuah;
        $labaTernak = $pendapatanTernak - $biayaTernak;
        $labaDagang = $pendapatanDagang - $biayaDagang;
        $labaKebun = $pendapatanKebun - $biayaKebun;
        $labaTotal = $labaBuah + $labaTernak + $labaDagang + $labaKebun;

        return view('laporan.grand-total.show', compact(
            'periode',
            'pilihTahun',
            'year',
            'pendapatanBuah',
            'pendapatanTernak',
            'pendapatanDagang',
            'pendapatanKebun',
            'pendapatanTotal',
            'biayaBuah',
            'biayaTernak',
            'biayaDagang',
            'biayaKebun',
            'biayaTotal',
            'labaBuah',
            'labaTernak',
            'labaDagang',
            'labaKebun',
            'labaTotal',
        ));
    }

    public function cetak(Request $request)
    {
        $year = $request->input('year');

        $periode = Periode::select()
            ->with('datausaha')
            ->withSum('penjualan', 'total_jual')
            ->withSum('pembelian', 'total_biaya_beli')
            ->withSum('pembelian', 'total_super')
            ->withSum('biaya', 'jumlah_biaya')
            ->withSum('gaji', 'gaji')
            ->whereYear('tanggal_awal', '=', $year)
            ->get()->groupBy('datausaha.kategori');

        try {
            $pendapatanBuah = $periode['buah']->sum('penjualan_sum_total_jual') - $periode['buah']->sum('pembelian_sum_total_biaya_beli');
        } catch (\Throwable $pendapatanBuah) {
            $pendapatanBuah = 0;
        }
        try {
            $pendapatanTernak = $periode['peternakan']->sum('penjualan_sum_total_jual') - $periode['peternakan']->sum('pembelian_sum_total_super');
        } catch (\Throwable $pendapatanTernak) {
            $pendapatanTernak = 0;
        }
        try {
            $pendapatanDagang = $periode['dagang']->sum('penjualan_sum_total_jual') - $periode['dagang']->sum('pembelian_sum_total_super');
        } catch (\Throwable $pendapatanDagang) {
            $pendapatanDagang = 0;
        }
        try {

            $pendapatanKebun = $periode['kebun']->sum('penjualan_sum_total_jual') - $periode['kebun']->sum('pembelian_sum_total_super');
        } catch (\Throwable $pendapatanKebun) {
            $pendapatanKebun = 0;
        }
        $pendapatanTotal = $pendapatanBuah + $pendapatanTernak + $pendapatanDagang + $pendapatanKebun;

        try {
            $biayaBuah = $periode['buah']->sum('biaya_sum_jumlah_biaya') + $periode['buah']->sum('gaji_sum_gaji');
        } catch (\Throwable $biayaBuah) {
            $biayaBuah = 0;
        }
        try {
            $biayaTernak = $periode['peternakan']->sum('biaya_sum_jumlah_biaya') + $periode['peternakan']->sum('gaji_sum_gaji');
        } catch (\Throwable $biayaTernak) {
            $biayaTernak = 0;
        }
        try {
            $biayaDagang = $periode['dagang']->sum('biaya_sum_jumlah_biaya') + $periode['dagang']->sum('gaji_sum_gaji');
        } catch (\Throwable $biayaDagang) {
            $biayaDagang = 0;
        }
        try {

            $biayaKebun = $periode['kebun']->sum('biaya_sum_jumlah_biaya') + $periode['kebun']->sum('gaji_sum_gaji');
        } catch (\Throwable $biayaKebun) {
            $biayaKebun = 0;
        }
        $biayaTotal = $biayaBuah + $biayaTernak + $biayaDagang + $biayaKebun;

        $labaBuah = $pendapatanBuah - $biayaBuah;
        $labaTernak = $pendapatanTernak - $biayaTernak;
        $labaDagang = $pendapatanDagang - $biayaDagang;
        $labaKebun = $pendapatanKebun - $biayaKebun;
        $labaTotal = $labaBuah + $labaTernak + $labaDagang + $labaKebun;

        $cetak = Pdf::loadview('laporan.grand-total.cetak', compact(
            'periode',
            'year',
            'pendapatanBuah',
            'pendapatanTernak',
            'pendapatanDagang',
            'pendapatanKebun',
            'pendapatanTotal',
            'biayaBuah',
            'biayaTernak',
            'biayaDagang',
            'biayaKebun',
            'biayaTotal',
            'labaBuah',
            'labaTernak',
            'labaDagang',
            'labaKebun',
            'labaTotal',
        ))->setPaper('a4', 'landscape');
        return $cetak->stream('laporan grand total.pdf');
    }
}
