<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Periode;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $usaha = Periode::with('datausaha')->whereMonth('tanggal_awal', '=', now())
            ->whereYear('tanggal_awal', '=', now())
            ->withSum('pembelian', 'total_biaya_beli')
            ->withSum('pembelian', 'total_super')
            ->withSum('penjualan', 'total_jual')
            ->withSum('biaya', 'jumlah_biaya')
            ->withSum('gaji', 'gaji')
            ->withSum('sisa', 'total_sisa_terjual')
            ->get()->groupBy('datausaha.kategori');
        // dd($usaha->toArray());

        try {
            $pendapatanBuah = $usaha['buah']->sum('penjualan_sum_total_jual') - $usaha['buah']->sum('pembelian_sum_total_biaya_beli');
        } catch (\Throwable $pendapatanBuah) {
            $pendapatanBuah = 0;
        }
        try {
            $pendapatanTernak = $usaha['peternakan']->sum('penjualan_sum_total_jual') - $usaha['peternakan']->sum('pembelian_sum_total_super');
        } catch (\Throwable $pendapatanTernak) {
            $pendapatanTernak = 0;
        }
        try {
            $pendapatanDagang = $usaha['dagang']->sum('penjualan_sum_total_jual') - $usaha['dagang']->sum('pembelian_sum_total_super');
        } catch (\Throwable $pendapatanDagang) {
            $pendapatanDagang = 0;
        }
        try {

            $pendapatanKebun = $usaha['kebun']->sum('penjualan_sum_total_jual') - $usaha['kebun']->sum('pembelian_sum_total_super');
        } catch (\Throwable $pendapatanKebun) {
            $pendapatanKebun = 0;
        }
        $pendapatanTotal = $pendapatanBuah + $pendapatanTernak + $pendapatanDagang + $pendapatanKebun;
        // dd($pendapatanBuah, $pendapatanTernak, $pendapatanDagang, $pendapatanKebun);

        try {
            $biayaBuah = $usaha['buah']->sum('biaya_sum_jumlah_biaya') + $usaha['buah']->sum('gaji_sum_gaji');
        } catch (\Throwable $biayaBuah) {
            $biayaBuah = 0;
        }
        try {
            $biayaTernak = $usaha['peternakan']->sum('biaya_sum_jumlah_biaya') + $usaha['peternakan']->sum('gaji_sum_gaji');
        } catch (\Throwable $biayaTernak) {
            $biayaTernak = 0;
        }
        try {
            $biayaDagang = $usaha['dagang']->sum('biaya_sum_jumlah_biaya') + $usaha['dagang']->sum('gaji_sum_gaji');
        } catch (\Throwable $biayaDagang) {
            $biayaDagang = 0;
        }
        try {

            $biayaKebun = $usaha['kebun']->sum('biaya_sum_jumlah_biaya') + $usaha['kebun']->sum('gaji_sum_gaji');
        } catch (\Throwable $biayaKebun) {
            $biayaKebun = 0;
        }
        $biayaTotal = $biayaBuah + $biayaTernak + $biayaDagang + $biayaKebun;
        // dd($biayaBuah, $biayaTernak, $biayaDagang, $biayaKebun);

        $labaBersih = $pendapatanTotal - $biayaTotal;

        try {
            $sortirBuah = $usaha['buah']->sum('sisa_sum_total_sisa_terjual');
        } catch (\Throwable $sortirBuah) {
            $sortirBuah = 0;
        }
        try {
            $sortirTernak = $usaha['peternakan']->sum('sisa_sum_total_sisa_terjual');
        } catch (\Throwable $sortirTernak) {
            $sortirTernak = 0;
        }
        try {
            $sortirDagang = $usaha['dagang']->sum('sisa_sum_total_sisa_terjual');
        } catch (\Throwable $sortirDagang) {
            $sortirDagang = 0;
        }
        try {

            $sortirKebun = $usaha['kebun']->sum('sisa_sum_total_sisa_terjual');
        } catch (\Throwable $sortirKebun) {
            $sortirKebun = 0;
        }
        $sortirTotal = $sortirBuah + $sortirTernak + $sortirDagang + $sortirKebun;

        // ######### CHART #########

        $bulan = \Carbon\Carbon::parse(date(now()))->isoFormat('MMMM');
        $tahun = \Carbon\Carbon::parse(date(now()))->isoFormat('Y');

        $chart = Periode::with('datausaha')->whereMonth('tanggal_awal', '=', now())
            ->whereYear('tanggal_awal', '=', now())
            ->withSum('pembelian', 'total_biaya_beli')
            ->withSum('pembelian', 'total_super')
            ->withSum('penjualan', 'total_jual')
            ->get()->groupBy('datausaha.kategori');
        // dd($chart->toArray());

        try {
            $beliBuah = $chart['buah']->sum('pembelian_sum_total_biaya_beli');
        } catch (\Throwable $beliBuah) {
            $beliBuah = 0;
        }
        try {
            $beliKebun = $chart['kebun']->sum('pembelian_sum_total_super');
        } catch (\Throwable $beliKebun) {
            $beliKebun = 0;
        }
        try {
            $beliDagang = $chart['dagang']->sum('pembelian_sum_total_super');
        } catch (\Throwable $beliDagang) {
            $beliDagang = 0;
        }
        try {
            $beliTernak = $chart['peternakan']->sum('pembelian_sum_total_super');
        } catch (\Throwable $beliTernak) {
            $beliTernak = 0;
        }

        try {
            $jualBuah = $chart['buah']->sum('penjualan_sum_total_jual');
        } catch (\Throwable $jualBuah) {
            $jualBuah = 0;
        }
        try {
            $jualKebun = $chart['kebun']->sum('penjualan_sum_total_jual');
        } catch (\Throwable $jualKebun) {
            $jualKebun = 0;
        }
        try {
            $jualDagang = $chart['dagang']->sum('penjualan_sum_total_jual');
        } catch (\Throwable $jualDagang) {
            $jualDagang = 0;
        }
        try {
            $jualTernak = $chart['peternakan']->sum('penjualan_sum_total_jual');
        } catch (\Throwable $jualTernak) {
            $jualTernak = 0;
        }

        $chartBeli[] = $beliBuah + $beliKebun + $beliDagang + $beliTernak;

        $chartJual[] = $jualBuah + $jualKebun + $jualDagang + $jualTernak;

        return view("dashboard.index", compact(
            'pendapatanTotal',
            'biayaTotal',
            'labaBersih',
            'sortirTotal',

            'bulan',
            'tahun',

            'chartBeli',
            'chartJual',
        ));
    }
}