<?php

namespace App\Http\Controllers\laporan;

use App\Http\Controllers\Controller;
use App\Models\Datausaha;
use App\Models\Periode;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;

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

        $periodeJan = Periode::select()
            ->with(['pembelian', 'penjualan', 'biaya', 'gaji', 'sisa'])
            ->withSum('pembelian', 'total_tonase_beli')
            ->withSum('pembelian', 'total_super')
            ->withSum('penjualan', 'tonase_jual')
            ->withSum('pembelian', 'total_biaya_beli')
            ->withSum('penjualan', 'total_jual')
            ->withSum('biaya', 'jumlah_biaya')
            ->withSum('gaji', 'gaji')
            ->withSum('sisa', 'tonase_sisa_terjual')
            ->where('datausaha_id', '=', $usahaId)
            ->whereMonth('tanggal_awal', '=', '01')
            ->whereYear('tanggal_awal', '=', $year)
            ->get();

        $totalTonaseBeliJan = $periodeJan->sum('pembelian_sum_total_tonase_beli');
        $totalTonaseJualJan = $periodeJan->sum('penjualan_sum_tonase_jual');
        $totalPembelianJan = $periodeJan->sum('pembelian_sum_total_biaya_beli');
        $totalPenjualanJan = $periodeJan->sum('penjualan_sum_total_jual');
        $pendapatanJan = $totalPenjualanJan - $totalPembelianJan;
        $operasionalJan = $periodeJan->sum('biaya_sum_jumlah_biaya') + $periodeJan->sum('gaji_sum_gaji');
        $totalJan = $pendapatanJan - $operasionalJan;
        $selisihJan = $totalTonaseJualJan - $totalTonaseBeliJan;
        $terjualLagiJan = $periodeJan->sum('sisa_sum_tonase_sisa_terjual');
        $sortirJan = $selisihJan + $terjualLagiJan;

        $pembelianDagangJan = $periodeJan->sum('pembelian_sum_total_super');
        $pendapatanDagangJan = $totalPenjualanJan - $pembelianDagangJan;
        $biayaProduksiJan = $operasionalJan;
        $labaKotorJan = $pendapatanDagangJan - $biayaProduksiJan;

        // FEBRUARI
        $periodeFeb = Periode::select()
            ->with(['pembelian', 'penjualan', 'biaya', 'gaji', 'sisa'])
            ->withSum('pembelian', 'total_tonase_beli')
            ->withSum('pembelian', 'total_super')
            ->withSum('penjualan', 'tonase_jual')
            ->withSum('pembelian', 'total_biaya_beli')
            ->withSum('penjualan', 'total_jual')
            ->withSum('biaya', 'jumlah_biaya')
            ->withSum('gaji', 'gaji')
            ->withSum('sisa', 'tonase_sisa_terjual')
            ->where('datausaha_id', '=', $usahaId)
            ->whereMonth('tanggal_awal', '=', '02')
            ->whereYear('tanggal_awal', '=', $year)
            ->get();

        $totalTonaseBeliFeb = $periodeFeb->sum('pembelian_sum_total_tonase_beli');
        $totalTonaseJualFeb = $periodeFeb->sum('penjualan_sum_tonase_jual');
        $totalPembelianFeb = $periodeFeb->sum('pembelian_sum_total_biaya_beli');
        $totalPenjualanFeb = $periodeFeb->sum('penjualan_sum_total_jual');
        $pendapatanFeb = $totalPenjualanFeb - $totalPembelianFeb;
        $operasionalFeb = $periodeFeb->sum('biaya_sum_jumlah_biaya') + $periodeFeb->sum('gaji_sum_gaji');
        $totalFeb = $pendapatanFeb - $operasionalFeb;
        $selisihFeb = $totalTonaseJualFeb - $totalTonaseBeliFeb;
        $terjualLagiFeb = $periodeFeb->sum('sisa_sum_tonase_sisa_terjual');
        $sortirFeb = $selisihFeb + $terjualLagiFeb;

        $pembelianDagangFeb = $periodeFeb->sum('pembelian_sum_total_super');
        $pendapatanDagangFeb = $totalPenjualanFeb - $pembelianDagangFeb;
        $biayaProduksiFeb = $operasionalFeb;
        $labaKotorFeb = $pendapatanDagangFeb - $biayaProduksiFeb;

        // MARET
        $periodeMar = Periode::select()
            ->with(['pembelian', 'penjualan', 'biaya', 'gaji', 'sisa'])
            ->withSum('pembelian', 'total_tonase_beli')
            ->withSum('pembelian', 'total_super')
            ->withSum('penjualan', 'tonase_jual')
            ->withSum('pembelian', 'total_biaya_beli')
            ->withSum('penjualan', 'total_jual')
            ->withSum('biaya', 'jumlah_biaya')
            ->withSum('gaji', 'gaji')
            ->withSum('sisa', 'tonase_sisa_terjual')
            ->where('datausaha_id', '=', $usahaId)
            ->whereMonth('tanggal_awal', '=', '03')
            ->whereYear('tanggal_awal', '=', $year)
            ->get();

        $totalTonaseBeliMar = $periodeMar->sum('pembelian_sum_total_tonase_beli');
        $totalTonaseJualMar = $periodeMar->sum('penjualan_sum_tonase_jual');
        $totalPembelianMar = $periodeMar->sum('pembelian_sum_total_biaya_beli');
        $totalPenjualanMar = $periodeMar->sum('penjualan_sum_total_jual');
        $pendapatanMar = $totalPenjualanMar - $totalPembelianMar;
        $operasionalMar = $periodeMar->sum('biaya_sum_jumlah_biaya') + $periodeMar->sum('gaji_sum_gaji');
        $totalMar = $pendapatanMar - $operasionalMar;
        $selisihMar = $totalTonaseJualMar - $totalTonaseBeliMar;
        $terjualLagiMar = $periodeMar->sum('sisa_sum_tonase_sisa_terjual');
        $sortirMar = $selisihMar + $terjualLagiMar;

        $pembelianDagangMar = $periodeMar->sum('pembelian_sum_total_super');
        $pendapatanDagangMar = $totalPenjualanMar - $pembelianDagangMar;
        $biayaProduksiMar = $operasionalMar;
        $labaKotorMar = $pendapatanDagangMar - $biayaProduksiMar;

        // APRIL
        $periodeApr = Periode::select()
            ->with(['pembelian', 'penjualan', 'biaya', 'gaji', 'sisa'])
            ->withSum('pembelian', 'total_tonase_beli')
            ->withSum('pembelian', 'total_super')
            ->withSum('penjualan', 'tonase_jual')
            ->withSum('pembelian', 'total_biaya_beli')
            ->withSum('penjualan', 'total_jual')
            ->withSum('biaya', 'jumlah_biaya')
            ->withSum('gaji', 'gaji')
            ->withSum('sisa', 'tonase_sisa_terjual')
            ->where('datausaha_id', '=', $usahaId)
            ->whereMonth('tanggal_awal', '=', '04')
            ->whereYear('tanggal_awal', '=', $year)
            ->get();

        $totalTonaseBeliApr = $periodeApr->sum('pembelian_sum_total_tonase_beli');
        $totalTonaseJualApr = $periodeApr->sum('penjualan_sum_tonase_jual');
        $totalPembelianApr = $periodeApr->sum('pembelian_sum_total_biaya_beli');
        $totalPenjualanApr = $periodeApr->sum('penjualan_sum_total_jual');
        $pendapatanApr = $totalPenjualanApr - $totalPembelianApr;
        $operasionalApr = $periodeApr->sum('biaya_sum_jumlah_biaya') + $periodeApr->sum('gaji_sum_gaji');
        $totalApr = $pendapatanApr - $operasionalApr;
        $selisihApr = $totalTonaseJualApr - $totalTonaseBeliApr;
        $terjualLagiApr = $periodeApr->sum('sisa_sum_tonase_sisa_terjual');
        $sortirApr = $selisihApr + $terjualLagiApr;

        $pembelianDagangApr = $periodeApr->sum('pembelian_sum_total_super');
        $pendapatanDagangApr = $totalPenjualanApr - $pembelianDagangApr;
        $biayaProduksiApr = $operasionalApr;
        $labaKotorApr = $pendapatanDagangApr - $biayaProduksiApr;

        // MEI
        $periodeMei = Periode::select()
            ->with(['pembelian', 'penjualan', 'biaya', 'gaji', 'sisa'])
            ->withSum('pembelian', 'total_tonase_beli')
            ->withSum('pembelian', 'total_super')
            ->withSum('penjualan', 'tonase_jual')
            ->withSum('pembelian', 'total_biaya_beli')
            ->withSum('penjualan', 'total_jual')
            ->withSum('biaya', 'jumlah_biaya')
            ->withSum('gaji', 'gaji')
            ->withSum('sisa', 'tonase_sisa_terjual')
            ->where('datausaha_id', '=', $usahaId)
            ->whereMonth('tanggal_awal', '=', '05')
            ->whereYear('tanggal_awal', '=', $year)
            ->get();

        $totalTonaseBeliMei = $periodeMei->sum('pembelian_sum_total_tonase_beli');
        $totalTonaseJualMei = $periodeMei->sum('penjualan_sum_tonase_jual');
        $totalPembelianMei = $periodeMei->sum('pembelian_sum_total_biaya_beli');
        $totalPenjualanMei = $periodeMei->sum('penjualan_sum_total_jual');
        $pendapatanMei = $totalPenjualanMei - $totalPembelianMei;
        $operasionalMei = $periodeMei->sum('biaya_sum_jumlah_biaya') + $periodeMei->sum('gaji_sum_gaji');
        $totalMei = $pendapatanMei - $operasionalMei;
        $selisihMei = $totalTonaseJualMei - $totalTonaseBeliMei;
        $terjualLagiMei = $periodeMei->sum('sisa_sum_tonase_sisa_terjual');
        $sortirMei = $selisihMei + $terjualLagiMei;

        $pembelianDagangMei = $periodeMei->sum('pembelian_sum_total_super');
        $pendapatanDagangMei = $totalPenjualanMei - $pembelianDagangMei;
        $biayaProduksiMei = $operasionalMei;
        $labaKotorMei = $pendapatanDagangMei - $biayaProduksiMei;

        // JUNI
        $periodeJun = Periode::select()
            ->with(['pembelian', 'penjualan', 'biaya', 'gaji', 'sisa'])
            ->withSum('pembelian', 'total_tonase_beli')
            ->withSum('pembelian', 'total_super')
            ->withSum('penjualan', 'tonase_jual')
            ->withSum('pembelian', 'total_biaya_beli')
            ->withSum('penjualan', 'total_jual')
            ->withSum('biaya', 'jumlah_biaya')
            ->withSum('gaji', 'gaji')
            ->withSum('sisa', 'tonase_sisa_terjual')
            ->where('datausaha_id', '=', $usahaId)
            ->whereMonth('tanggal_awal', '=', '06')
            ->whereYear('tanggal_awal', '=', $year)
            ->get();

        $totalTonaseBeliJun = $periodeJun->sum('pembelian_sum_total_tonase_beli');
        $totalTonaseJualJun = $periodeJun->sum('penjualan_sum_tonase_jual');
        $totalPembelianJun = $periodeJun->sum('pembelian_sum_total_biaya_beli');
        $totalPenjualanJun = $periodeJun->sum('penjualan_sum_total_jual');
        $pendapatanJun = $totalPenjualanJun - $totalPembelianJun;
        $operasionalJun = $periodeJun->sum('biaya_sum_jumlah_biaya') + $periodeJun->sum('gaji_sum_gaji');
        $totalJun = $pendapatanJun - $operasionalJun;
        $selisihJun = $totalTonaseJualJun - $totalTonaseBeliJun;
        $terjualLagiJun = $periodeJun->sum('sisa_sum_tonase_sisa_terjual');
        $sortirJun = $selisihJun + $terjualLagiJun;

        $pembelianDagangJun = $periodeJun->sum('pembelian_sum_total_super');
        $pendapatanDagangJun = $totalPenjualanJun - $pembelianDagangJun;
        $biayaProduksiJun = $operasionalJun;
        $labaKotorJun = $pendapatanDagangJun - $biayaProduksiJun;

        // JULI
        $periodeJul = Periode::select()
            ->with(['pembelian', 'penjualan', 'biaya', 'gaji', 'sisa'])
            ->withSum('pembelian', 'total_tonase_beli')
            ->withSum('pembelian', 'total_super')
            ->withSum('penjualan', 'tonase_jual')
            ->withSum('pembelian', 'total_biaya_beli')
            ->withSum('penjualan', 'total_jual')
            ->withSum('biaya', 'jumlah_biaya')
            ->withSum('gaji', 'gaji')
            ->withSum('sisa', 'tonase_sisa_terjual')
            ->where('datausaha_id', '=', $usahaId)
            ->whereMonth('tanggal_awal', '=', '07')
            ->whereYear('tanggal_awal', '=', $year)
            ->get();

        $totalTonaseBeliJul = $periodeJul->sum('pembelian_sum_total_tonase_beli');
        $totalTonaseJualJul = $periodeJul->sum('penjualan_sum_tonase_jual');
        $totalPembelianJul = $periodeJul->sum('pembelian_sum_total_biaya_beli');
        $totalPenjualanJul = $periodeJul->sum('penjualan_sum_total_jual');
        $pendapatanJul = $totalPenjualanJul - $totalPembelianJul;
        $operasionalJul = $periodeJul->sum('biaya_sum_jumlah_biaya') + $periodeJul->sum('gaji_sum_gaji');
        $totalJul = $pendapatanJul - $operasionalJul;
        $selisihJul = $totalTonaseJualJul - $totalTonaseBeliJul;
        $terjualLagiJul = $periodeJul->sum('sisa_sum_tonase_sisa_terjual');
        $sortirJul = $selisihJul + $terjualLagiJul;

        $pembelianDagangJul = $periodeJul->sum('pembelian_sum_total_super');
        $pendapatanDagangJul = $totalPenjualanJul - $pembelianDagangJul;
        $biayaProduksiJul = $operasionalJul;
        $labaKotorJul = $pendapatanDagangJul - $biayaProduksiJul;

        // AGUSTUS
        $periodeAug = Periode::select()
            ->with(['pembelian', 'penjualan', 'biaya', 'gaji', 'sisa'])
            ->withSum('pembelian', 'total_tonase_beli')
            ->withSum('pembelian', 'total_super')
            ->withSum('penjualan', 'tonase_jual')
            ->withSum('pembelian', 'total_biaya_beli')
            ->withSum('penjualan', 'total_jual')
            ->withSum('biaya', 'jumlah_biaya')
            ->withSum('gaji', 'gaji')
            ->withSum('sisa', 'tonase_sisa_terjual')
            ->where('datausaha_id', '=', $usahaId)
            ->whereMonth('tanggal_awal', '=', '08')
            ->whereYear('tanggal_awal', '=', $year)
            ->get();

        $totalTonaseBeliAug = $periodeAug->sum('pembelian_sum_total_tonase_beli');
        $totalTonaseJualAug = $periodeAug->sum('penjualan_sum_tonase_jual');
        $totalPembelianAug = $periodeAug->sum('pembelian_sum_total_biaya_beli');
        $totalPenjualanAug = $periodeAug->sum('penjualan_sum_total_jual');
        $pendapatanAug = $totalPenjualanAug - $totalPembelianAug;
        $operasionalAug = $periodeAug->sum('biaya_sum_jumlah_biaya') + $periodeAug->sum('gaji_sum_gaji');
        $totalAug = $pendapatanAug - $operasionalAug;
        $selisihAug = $totalTonaseJualAug - $totalTonaseBeliAug;
        $terjualLagiAug = $periodeAug->sum('sisa_sum_tonase_sisa_terjual');
        $sortirAug = $selisihAug + $terjualLagiAug;

        $pembelianDagangAug = $periodeAug->sum('pembelian_sum_total_super');
        $pendapatanDagangAug = $totalPenjualanAug - $pembelianDagangAug;
        $biayaProduksiAug = $operasionalAug;
        $labaKotorAug = $pendapatanDagangAug - $biayaProduksiAug;

        // SEPTEMBER
        $periodeSep = Periode::select()
            ->with(['pembelian', 'penjualan', 'biaya', 'gaji', 'sisa'])
            ->withSum('pembelian', 'total_tonase_beli')
            ->withSum('pembelian', 'total_super')
            ->withSum('penjualan', 'tonase_jual')
            ->withSum('pembelian', 'total_biaya_beli')
            ->withSum('penjualan', 'total_jual')
            ->withSum('biaya', 'jumlah_biaya')
            ->withSum('gaji', 'gaji')
            ->withSum('sisa', 'tonase_sisa_terjual')
            ->where('datausaha_id', '=', $usahaId)
            ->whereMonth('tanggal_awal', '=', '09')
            ->whereYear('tanggal_awal', '=', $year)
            ->get();

        $totalTonaseBeliSep = $periodeSep->sum('pembelian_sum_total_tonase_beli');
        $totalTonaseJualSep = $periodeSep->sum('penjualan_sum_tonase_jual');
        $totalPembelianSep = $periodeSep->sum('pembelian_sum_total_biaya_beli');
        $totalPenjualanSep = $periodeSep->sum('penjualan_sum_total_jual');
        $pendapatanSep = $totalPenjualanSep - $totalPembelianSep;
        $operasionalSep = $periodeSep->sum('biaya_sum_jumlah_biaya') + $periodeSep->sum('gaji_sum_gaji');
        $totalSep = $pendapatanSep - $operasionalSep;
        $selisihSep = $totalTonaseJualSep - $totalTonaseBeliSep;
        $terjualLagiSep = $periodeSep->sum('sisa_sum_tonase_sisa_terjual');
        $sortirSep = $selisihSep + $terjualLagiSep;

        $pembelianDagangSep = $periodeSep->sum('pembelian_sum_total_super');
        $pendapatanDagangSep = $totalPenjualanSep - $pembelianDagangSep;
        $biayaProduksiSep = $operasionalSep;
        $labaKotorSep = $pendapatanDagangSep - $biayaProduksiSep;

        // OKTOBER
        $periodeOkt = Periode::select()
            ->with(['pembelian', 'penjualan', 'biaya', 'gaji', 'sisa'])
            ->withSum('pembelian', 'total_tonase_beli')
            ->withSum('pembelian', 'total_super')
            ->withSum('penjualan', 'tonase_jual')
            ->withSum('pembelian', 'total_biaya_beli')
            ->withSum('penjualan', 'total_jual')
            ->withSum('biaya', 'jumlah_biaya')
            ->withSum('gaji', 'gaji')
            ->withSum('sisa', 'tonase_sisa_terjual')
            ->where('datausaha_id', '=', $usahaId)
            ->whereMonth('tanggal_awal', '=', '10')
            ->whereYear('tanggal_awal', '=', $year)
            ->get();

        $totalTonaseBeliOkt = $periodeOkt->sum('pembelian_sum_total_tonase_beli');
        $totalTonaseJualOkt = $periodeOkt->sum('penjualan_sum_tonase_jual');
        $totalPembelianOkt = $periodeOkt->sum('pembelian_sum_total_biaya_beli');
        $totalPenjualanOkt = $periodeOkt->sum('penjualan_sum_total_jual');
        $pendapatanOkt = $totalPenjualanOkt - $totalPembelianOkt;
        $operasionalOkt = $periodeOkt->sum('biaya_sum_jumlah_biaya') + $periodeOkt->sum('gaji_sum_gaji');
        $totalOkt = $pendapatanOkt - $operasionalOkt;
        $selisihOkt = $totalTonaseJualOkt - $totalTonaseBeliOkt;
        $terjualLagiOkt = $periodeOkt->sum('sisa_sum_tonase_sisa_terjual');
        $sortirOkt = $selisihOkt + $terjualLagiOkt;

        $pembelianDagangOkt = $periodeOkt->sum('pembelian_sum_total_super');
        $pendapatanDagangOkt = $totalPenjualanOkt - $pembelianDagangOkt;
        $biayaProduksiOkt = $operasionalOkt;
        $labaKotorOkt = $pendapatanDagangOkt - $biayaProduksiOkt;

        // NOVEMBER
        $periodeNov = Periode::select()
            ->with(['pembelian', 'penjualan', 'biaya', 'gaji', 'sisa'])
            ->withSum('pembelian', 'total_tonase_beli')
            ->withSum('pembelian', 'total_super')
            ->withSum('penjualan', 'tonase_jual')
            ->withSum('pembelian', 'total_biaya_beli')
            ->withSum('penjualan', 'total_jual')
            ->withSum('biaya', 'jumlah_biaya')
            ->withSum('gaji', 'gaji')
            ->withSum('sisa', 'tonase_sisa_terjual')
            ->where('datausaha_id', '=', $usahaId)
            ->whereMonth('tanggal_awal', '=', '11')
            ->whereYear('tanggal_awal', '=', $year)
            ->get();

        $totalTonaseBeliNov = $periodeNov->sum('pembelian_sum_total_tonase_beli');
        $totalTonaseJualNov = $periodeNov->sum('penjualan_sum_tonase_jual');
        $totalPembelianNov = $periodeNov->sum('pembelian_sum_total_biaya_beli');
        $totalPenjualanNov = $periodeNov->sum('penjualan_sum_total_jual');
        $pendapatanNov = $totalPenjualanNov - $totalPembelianNov;
        $operasionalNov = $periodeNov->sum('biaya_sum_jumlah_biaya') + $periodeNov->sum('gaji_sum_gaji');
        $totalNov = $pendapatanNov - $operasionalNov;
        $selisihNov = $totalTonaseJualNov - $totalTonaseBeliNov;
        $terjualLagiNov = $periodeNov->sum('sisa_sum_tonase_sisa_terjual');
        $sortirNov = $selisihNov + $terjualLagiNov;

        $pembelianDagangNov = $periodeNov->sum('pembelian_sum_total_super');
        $pendapatanDagangNov = $totalPenjualanNov - $pembelianDagangNov;
        $biayaProduksiNov = $operasionalNov;
        $labaKotorNov = $pendapatanDagangNov - $biayaProduksiNov;

        // DESEMBER
        $periodeDes = Periode::select()
            ->with(['pembelian', 'penjualan', 'biaya', 'gaji', 'sisa'])
            ->withSum('pembelian', 'total_tonase_beli')
            ->withSum('pembelian', 'total_super')
            ->withSum('penjualan', 'tonase_jual')
            ->withSum('pembelian', 'total_biaya_beli')
            ->withSum('penjualan', 'total_jual')
            ->withSum('biaya', 'jumlah_biaya')
            ->withSum('gaji', 'gaji')
            ->withSum('sisa', 'tonase_sisa_terjual')
            ->where('datausaha_id', '=', $usahaId)
            ->whereMonth('tanggal_awal', '=', '12')
            ->whereYear('tanggal_awal', '=', $year)
            ->get();

        $totalTonaseBeliDes = $periodeDes->sum('pembelian_sum_total_tonase_beli');
        $totalTonaseJualDes = $periodeDes->sum('penjualan_sum_tonase_jual');
        $totalPembelianDes = $periodeDes->sum('pembelian_sum_total_biaya_beli');
        $totalPenjualanDes = $periodeDes->sum('penjualan_sum_total_jual');
        $pendapatanDes = $totalPenjualanDes - $totalPembelianDes;
        $operasionalDes = $periodeDes->sum('biaya_sum_jumlah_biaya') + $periodeDes->sum('gaji_sum_gaji');
        $totalDes = $pendapatanDes - $operasionalDes;
        $selisihDes = $totalTonaseJualDes - $totalTonaseBeliDes;
        $terjualLagiDes = $periodeDes->sum('sisa_sum_tonase_sisa_terjual');
        $sortirDes = $selisihDes + $terjualLagiDes;

        $pembelianDagangDes = $periodeDes->sum('pembelian_sum_total_super');
        $pendapatanDagangDes = $totalPenjualanDes - $pembelianDagangDes;
        $biayaProduksiDes = $operasionalDes;
        $labaKotorDes = $pendapatanDagangDes - $biayaProduksiDes;

        // GRANDTOTAL
        $periodeTotal = Periode::select()
            ->with(['pembelian', 'penjualan', 'biaya', 'gaji', 'sisa'])
            ->withSum('pembelian', 'total_tonase_beli')
            ->withSum('pembelian', 'total_super')
            ->withSum('penjualan', 'tonase_jual')
            ->withSum('pembelian', 'total_biaya_beli')
            ->withSum('penjualan', 'total_jual')
            ->withSum('biaya', 'jumlah_biaya')
            ->withSum('gaji', 'gaji')
            ->withSum('sisa', 'tonase_sisa_terjual')
            ->where('datausaha_id', '=', $usahaId)
            ->whereYear('tanggal_awal', '=', $year)
            ->get();

        $totalTonaseBeliTotal = $periodeTotal->sum('pembelian_sum_total_tonase_beli');
        $totalTonaseJualTotal = $periodeTotal->sum('penjualan_sum_tonase_jual');
        $totalPembelianTotal = $periodeTotal->sum('pembelian_sum_total_biaya_beli');
        $totalPenjualanTotal = $periodeTotal->sum('penjualan_sum_total_jual');
        $pendapatanTotal = $totalPenjualanTotal - $totalPembelianTotal;
        $operasionalTotal = $periodeTotal->sum('biaya_sum_jumlah_biaya') + $periodeTotal->sum('gaji_sum_gaji');
        $totalTotal = $pendapatanTotal - $operasionalTotal;
        $selisihTotal = $totalTonaseJualTotal - $totalTonaseBeliTotal;
        $terjualLagiTotal = $periodeTotal->sum('sisa_sum_tonase_sisa_terjual');
        $sortirTotal = $selisihTotal + $terjualLagiTotal;

        $pembelianDagangTotal = $periodeTotal->sum('pembelian_sum_total_super');
        $pendapatanDagangTotal = $totalPenjualanTotal - $pembelianDagangTotal;
        $biayaProduksiTotal = $operasionalTotal;
        $labaKotorTotal = $pendapatanDagangTotal - $biayaProduksiTotal;
















        return view('laporan.tahunan.show', compact(
            'usaha',
            'year',

            'periodeJan',
            'totalTonaseBeliJan',
            'totalTonaseJualJan',
            'totalPembelianJan',
            'totalPenjualanJan',
            'pendapatanJan',
            'operasionalJan',
            'totalJan',
            'selisihJan',
            'terjualLagiJan',
            'sortirJan',
            'pembelianDagangJan',
            'pendapatanDagangJan',
            'biayaProduksiJan',
            'labaKotorJan',

            'periodeFeb',
            'totalTonaseBeliFeb',
            'totalTonaseJualFeb',
            'totalPembelianFeb',
            'totalPenjualanFeb',
            'pendapatanFeb',
            'operasionalFeb',
            'totalFeb',
            'selisihFeb',
            'terjualLagiFeb',
            'sortirFeb',
            'pembelianDagangFeb',
            'pendapatanDagangFeb',
            'biayaProduksiFeb',
            'labaKotorFeb',

            'periodeMar',
            'totalTonaseBeliMar',
            'totalTonaseJualMar',
            'totalPembelianMar',
            'totalPenjualanMar',
            'pendapatanMar',
            'operasionalMar',
            'totalMar',
            'selisihMar',
            'terjualLagiMar',
            'sortirMar',
            'pembelianDagangMar',
            'pendapatanDagangMar',
            'biayaProduksiMar',
            'labaKotorMar',

            'periodeApr',
            'totalTonaseBeliApr',
            'totalTonaseJualApr',
            'totalPembelianApr',
            'totalPenjualanApr',
            'pendapatanApr',
            'operasionalApr',
            'totalApr',
            'selisihApr',
            'terjualLagiApr',
            'sortirApr',
            'pembelianDagangApr',
            'pendapatanDagangApr',
            'biayaProduksiApr',
            'labaKotorApr',

            'periodeMei',
            'totalTonaseBeliMei',
            'totalTonaseJualMei',
            'totalPembelianMei',
            'totalPenjualanMei',
            'pendapatanMei',
            'operasionalMei',
            'totalMei',
            'selisihMei',
            'terjualLagiMei',
            'sortirMei',
            'pembelianDagangMei',
            'pendapatanDagangMei',
            'biayaProduksiMei',
            'labaKotorMei',

            'periodeJun',
            'totalTonaseBeliJun',
            'totalTonaseJualJun',
            'totalPembelianJun',
            'totalPenjualanJun',
            'pendapatanJun',
            'operasionalJun',
            'totalJun',
            'selisihJun',
            'terjualLagiJun',
            'sortirJun',
            'pembelianDagangJun',
            'pendapatanDagangJun',
            'biayaProduksiJun',
            'labaKotorJun',

            'periodeJul',
            'totalTonaseBeliJul',
            'totalTonaseJualJul',
            'totalPembelianJul',
            'totalPenjualanJul',
            'pendapatanJul',
            'operasionalJul',
            'totalJul',
            'selisihJul',
            'terjualLagiJul',
            'sortirJul',
            'pembelianDagangJul',
            'pendapatanDagangJul',
            'biayaProduksiJul',
            'labaKotorJul',

            'periodeAug',
            'totalTonaseBeliAug',
            'totalTonaseJualAug',
            'totalPembelianAug',
            'totalPenjualanAug',
            'pendapatanAug',
            'operasionalAug',
            'totalAug',
            'selisihAug',
            'terjualLagiAug',
            'sortirAug',
            'pembelianDagangAug',
            'pendapatanDagangAug',
            'biayaProduksiAug',
            'labaKotorAug',

            'periodeSep',
            'totalTonaseBeliSep',
            'totalTonaseJualSep',
            'totalPembelianSep',
            'totalPenjualanSep',
            'pendapatanSep',
            'operasionalSep',
            'totalSep',
            'selisihSep',
            'terjualLagiSep',
            'sortirSep',
            'pembelianDagangSep',
            'pendapatanDagangSep',
            'biayaProduksiSep',
            'labaKotorSep',

            'periodeOkt',
            'totalTonaseBeliOkt',
            'totalTonaseJualOkt',
            'totalPembelianOkt',
            'totalPenjualanOkt',
            'pendapatanOkt',
            'operasionalOkt',
            'totalOkt',
            'selisihOkt',
            'terjualLagiOkt',
            'sortirOkt',
            'pembelianDagangOkt',
            'pendapatanDagangOkt',
            'biayaProduksiOkt',
            'labaKotorOkt',

            'periodeNov',
            'totalTonaseBeliNov',
            'totalTonaseJualNov',
            'totalPembelianNov',
            'totalPenjualanNov',
            'pendapatanNov',
            'operasionalNov',
            'totalNov',
            'selisihNov',
            'terjualLagiNov',
            'sortirNov',
            'pembelianDagangNov',
            'pendapatanDagangNov',
            'biayaProduksiNov',
            'labaKotorNov',

            'periodeDes',
            'totalTonaseBeliDes',
            'totalTonaseJualDes',
            'totalPembelianDes',
            'totalPenjualanDes',
            'pendapatanDes',
            'operasionalDes',
            'totalDes',
            'selisihDes',
            'terjualLagiDes',
            'sortirDes',
            'pembelianDagangDes',
            'pendapatanDagangDes',
            'biayaProduksiDes',
            'labaKotorDes',

            'periodeTotal',
            'totalTonaseBeliTotal',
            'totalTonaseJualTotal',
            'totalPembelianTotal',
            'totalPenjualanTotal',
            'pendapatanTotal',
            'operasionalTotal',
            'totalTotal',
            'selisihTotal',
            'terjualLagiTotal',
            'sortirTotal',
            'pembelianDagangTotal',
            'pendapatanDagangTotal',
            'biayaProduksiTotal',
            'labaKotorTotal',
        ));
    }













































    public function cetak(Request $request, $id)
    {
        $usaha = Datausaha::findOrFail($id);

        $year   = $request->input('year');
        $usahaId = $request->input('usahaId');

        $periodeJan = Periode::select()
            ->with(['pembelian', 'penjualan', 'biaya', 'gaji', 'sisa'])
            ->withSum('pembelian', 'total_tonase_beli')
            ->withSum('pembelian', 'total_super')
            ->withSum('penjualan', 'tonase_jual')
            ->withSum('pembelian', 'total_biaya_beli')
            ->withSum('penjualan', 'total_jual')
            ->withSum('biaya', 'jumlah_biaya')
            ->withSum('gaji', 'gaji')
            ->withSum('sisa', 'tonase_sisa_terjual')
            ->where('datausaha_id', '=', $usahaId)
            ->whereMonth('tanggal_awal', '=', '01')
            ->whereYear('tanggal_awal', '=', $year)
            ->get();

        $totalTonaseBeliJan = $periodeJan->sum('pembelian_sum_total_tonase_beli');
        $totalTonaseJualJan = $periodeJan->sum('penjualan_sum_tonase_jual');
        $totalPembelianJan = $periodeJan->sum('pembelian_sum_total_biaya_beli');
        $totalPenjualanJan = $periodeJan->sum('penjualan_sum_total_jual');
        $pendapatanJan = $totalPenjualanJan - $totalPembelianJan;
        $operasionalJan = $periodeJan->sum('biaya_sum_jumlah_biaya') + $periodeJan->sum('gaji_sum_gaji');
        $totalJan = $pendapatanJan - $operasionalJan;
        $selisihJan = $totalTonaseJualJan - $totalTonaseBeliJan;
        $terjualLagiJan = $periodeJan->sum('sisa_sum_tonase_sisa_terjual');
        $sortirJan = $selisihJan + $terjualLagiJan;

        $pembelianDagangJan = $periodeJan->sum('pembelian_sum_total_super');
        $pendapatanDagangJan = $totalPenjualanJan - $pembelianDagangJan;
        $biayaProduksiJan = $operasionalJan;
        $labaKotorJan = $pendapatanDagangJan - $biayaProduksiJan;

        // FEBRUARI
        $periodeFeb = Periode::select()
            ->with(['pembelian', 'penjualan', 'biaya', 'gaji', 'sisa'])
            ->withSum('pembelian', 'total_tonase_beli')
            ->withSum('pembelian', 'total_super')
            ->withSum('penjualan', 'tonase_jual')
            ->withSum('pembelian', 'total_biaya_beli')
            ->withSum('penjualan', 'total_jual')
            ->withSum('biaya', 'jumlah_biaya')
            ->withSum('gaji', 'gaji')
            ->withSum('sisa', 'tonase_sisa_terjual')
            ->where('datausaha_id', '=', $usahaId)
            ->whereMonth('tanggal_awal', '=', '02')
            ->whereYear('tanggal_awal', '=', $year)
            ->get();

        $totalTonaseBeliFeb = $periodeFeb->sum('pembelian_sum_total_tonase_beli');
        $totalTonaseJualFeb = $periodeFeb->sum('penjualan_sum_tonase_jual');
        $totalPembelianFeb = $periodeFeb->sum('pembelian_sum_total_biaya_beli');
        $totalPenjualanFeb = $periodeFeb->sum('penjualan_sum_total_jual');
        $pendapatanFeb = $totalPenjualanFeb - $totalPembelianFeb;
        $operasionalFeb = $periodeFeb->sum('biaya_sum_jumlah_biaya') + $periodeFeb->sum('gaji_sum_gaji');
        $totalFeb = $pendapatanFeb - $operasionalFeb;
        $selisihFeb = $totalTonaseJualFeb - $totalTonaseBeliFeb;
        $terjualLagiFeb = $periodeFeb->sum('sisa_sum_tonase_sisa_terjual');
        $sortirFeb = $selisihFeb + $terjualLagiFeb;

        $pembelianDagangFeb = $periodeFeb->sum('pembelian_sum_total_super');
        $pendapatanDagangFeb = $totalPenjualanFeb - $pembelianDagangFeb;
        $biayaProduksiFeb = $operasionalFeb;
        $labaKotorFeb = $pendapatanDagangFeb - $biayaProduksiFeb;

        // MARET
        $periodeMar = Periode::select()
            ->with(['pembelian', 'penjualan', 'biaya', 'gaji', 'sisa'])
            ->withSum('pembelian', 'total_tonase_beli')
            ->withSum('pembelian', 'total_super')
            ->withSum('penjualan', 'tonase_jual')
            ->withSum('pembelian', 'total_biaya_beli')
            ->withSum('penjualan', 'total_jual')
            ->withSum('biaya', 'jumlah_biaya')
            ->withSum('gaji', 'gaji')
            ->withSum('sisa', 'tonase_sisa_terjual')
            ->where('datausaha_id', '=', $usahaId)
            ->whereMonth('tanggal_awal', '=', '03')
            ->whereYear('tanggal_awal', '=', $year)
            ->get();

        $totalTonaseBeliMar = $periodeMar->sum('pembelian_sum_total_tonase_beli');
        $totalTonaseJualMar = $periodeMar->sum('penjualan_sum_tonase_jual');
        $totalPembelianMar = $periodeMar->sum('pembelian_sum_total_biaya_beli');
        $totalPenjualanMar = $periodeMar->sum('penjualan_sum_total_jual');
        $pendapatanMar = $totalPenjualanMar - $totalPembelianMar;
        $operasionalMar = $periodeMar->sum('biaya_sum_jumlah_biaya') + $periodeMar->sum('gaji_sum_gaji');
        $totalMar = $pendapatanMar - $operasionalMar;
        $selisihMar = $totalTonaseJualMar - $totalTonaseBeliMar;
        $terjualLagiMar = $periodeMar->sum('sisa_sum_tonase_sisa_terjual');
        $sortirMar = $selisihMar + $terjualLagiMar;

        $pembelianDagangMar = $periodeMar->sum('pembelian_sum_total_super');
        $pendapatanDagangMar = $totalPenjualanMar - $pembelianDagangMar;
        $biayaProduksiMar = $operasionalMar;
        $labaKotorMar = $pendapatanDagangMar - $biayaProduksiMar;

        // APRIL
        $periodeApr = Periode::select()
            ->with(['pembelian', 'penjualan', 'biaya', 'gaji', 'sisa'])
            ->withSum('pembelian', 'total_tonase_beli')
            ->withSum('pembelian', 'total_super')
            ->withSum('penjualan', 'tonase_jual')
            ->withSum('pembelian', 'total_biaya_beli')
            ->withSum('penjualan', 'total_jual')
            ->withSum('biaya', 'jumlah_biaya')
            ->withSum('gaji', 'gaji')
            ->withSum('sisa', 'tonase_sisa_terjual')
            ->where('datausaha_id', '=', $usahaId)
            ->whereMonth('tanggal_awal', '=', '04')
            ->whereYear('tanggal_awal', '=', $year)
            ->get();

        $totalTonaseBeliApr = $periodeApr->sum('pembelian_sum_total_tonase_beli');
        $totalTonaseJualApr = $periodeApr->sum('penjualan_sum_tonase_jual');
        $totalPembelianApr = $periodeApr->sum('pembelian_sum_total_biaya_beli');
        $totalPenjualanApr = $periodeApr->sum('penjualan_sum_total_jual');
        $pendapatanApr = $totalPenjualanApr - $totalPembelianApr;
        $operasionalApr = $periodeApr->sum('biaya_sum_jumlah_biaya') + $periodeApr->sum('gaji_sum_gaji');
        $totalApr = $pendapatanApr - $operasionalApr;
        $selisihApr = $totalTonaseJualApr - $totalTonaseBeliApr;
        $terjualLagiApr = $periodeApr->sum('sisa_sum_tonase_sisa_terjual');
        $sortirApr = $selisihApr + $terjualLagiApr;

        $pembelianDagangApr = $periodeApr->sum('pembelian_sum_total_super');
        $pendapatanDagangApr = $totalPenjualanApr - $pembelianDagangApr;
        $biayaProduksiApr = $operasionalApr;
        $labaKotorApr = $pendapatanDagangApr - $biayaProduksiApr;

        // MEI
        $periodeMei = Periode::select()
            ->with(['pembelian', 'penjualan', 'biaya', 'gaji', 'sisa'])
            ->withSum('pembelian', 'total_tonase_beli')
            ->withSum('pembelian', 'total_super')
            ->withSum('penjualan', 'tonase_jual')
            ->withSum('pembelian', 'total_biaya_beli')
            ->withSum('penjualan', 'total_jual')
            ->withSum('biaya', 'jumlah_biaya')
            ->withSum('gaji', 'gaji')
            ->withSum('sisa', 'tonase_sisa_terjual')
            ->where('datausaha_id', '=', $usahaId)
            ->whereMonth('tanggal_awal', '=', '05')
            ->whereYear('tanggal_awal', '=', $year)
            ->get();

        $totalTonaseBeliMei = $periodeMei->sum('pembelian_sum_total_tonase_beli');
        $totalTonaseJualMei = $periodeMei->sum('penjualan_sum_tonase_jual');
        $totalPembelianMei = $periodeMei->sum('pembelian_sum_total_biaya_beli');
        $totalPenjualanMei = $periodeMei->sum('penjualan_sum_total_jual');
        $pendapatanMei = $totalPenjualanMei - $totalPembelianMei;
        $operasionalMei = $periodeMei->sum('biaya_sum_jumlah_biaya') + $periodeMei->sum('gaji_sum_gaji');
        $totalMei = $pendapatanMei - $operasionalMei;
        $selisihMei = $totalTonaseJualMei - $totalTonaseBeliMei;
        $terjualLagiMei = $periodeMei->sum('sisa_sum_tonase_sisa_terjual');
        $sortirMei = $selisihMei + $terjualLagiMei;

        $pembelianDagangMei = $periodeMei->sum('pembelian_sum_total_super');
        $pendapatanDagangMei = $totalPenjualanMei - $pembelianDagangMei;
        $biayaProduksiMei = $operasionalMei;
        $labaKotorMei = $pendapatanDagangMei - $biayaProduksiMei;

        // JUNI
        $periodeJun = Periode::select()
            ->with(['pembelian', 'penjualan', 'biaya', 'gaji', 'sisa'])
            ->withSum('pembelian', 'total_tonase_beli')
            ->withSum('pembelian', 'total_super')
            ->withSum('penjualan', 'tonase_jual')
            ->withSum('pembelian', 'total_biaya_beli')
            ->withSum('penjualan', 'total_jual')
            ->withSum('biaya', 'jumlah_biaya')
            ->withSum('gaji', 'gaji')
            ->withSum('sisa', 'tonase_sisa_terjual')
            ->where('datausaha_id', '=', $usahaId)
            ->whereMonth('tanggal_awal', '=', '06')
            ->whereYear('tanggal_awal', '=', $year)
            ->get();

        $totalTonaseBeliJun = $periodeJun->sum('pembelian_sum_total_tonase_beli');
        $totalTonaseJualJun = $periodeJun->sum('penjualan_sum_tonase_jual');
        $totalPembelianJun = $periodeJun->sum('pembelian_sum_total_biaya_beli');
        $totalPenjualanJun = $periodeJun->sum('penjualan_sum_total_jual');
        $pendapatanJun = $totalPenjualanJun - $totalPembelianJun;
        $operasionalJun = $periodeJun->sum('biaya_sum_jumlah_biaya') + $periodeJun->sum('gaji_sum_gaji');
        $totalJun = $pendapatanJun - $operasionalJun;
        $selisihJun = $totalTonaseJualJun - $totalTonaseBeliJun;
        $terjualLagiJun = $periodeJun->sum('sisa_sum_tonase_sisa_terjual');
        $sortirJun = $selisihJun + $terjualLagiJun;

        $pembelianDagangJun = $periodeJun->sum('pembelian_sum_total_super');
        $pendapatanDagangJun = $totalPenjualanJun - $pembelianDagangJun;
        $biayaProduksiJun = $operasionalJun;
        $labaKotorJun = $pendapatanDagangJun - $biayaProduksiJun;

        // JULI
        $periodeJul = Periode::select()
            ->with(['pembelian', 'penjualan', 'biaya', 'gaji', 'sisa'])
            ->withSum('pembelian', 'total_tonase_beli')
            ->withSum('pembelian', 'total_super')
            ->withSum('penjualan', 'tonase_jual')
            ->withSum('pembelian', 'total_biaya_beli')
            ->withSum('penjualan', 'total_jual')
            ->withSum('biaya', 'jumlah_biaya')
            ->withSum('gaji', 'gaji')
            ->withSum('sisa', 'tonase_sisa_terjual')
            ->where('datausaha_id', '=', $usahaId)
            ->whereMonth('tanggal_awal', '=', '07')
            ->whereYear('tanggal_awal', '=', $year)
            ->get();

        $totalTonaseBeliJul = $periodeJul->sum('pembelian_sum_total_tonase_beli');
        $totalTonaseJualJul = $periodeJul->sum('penjualan_sum_tonase_jual');
        $totalPembelianJul = $periodeJul->sum('pembelian_sum_total_biaya_beli');
        $totalPenjualanJul = $periodeJul->sum('penjualan_sum_total_jual');
        $pendapatanJul = $totalPenjualanJul - $totalPembelianJul;
        $operasionalJul = $periodeJul->sum('biaya_sum_jumlah_biaya') + $periodeJul->sum('gaji_sum_gaji');
        $totalJul = $pendapatanJul - $operasionalJul;
        $selisihJul = $totalTonaseJualJul - $totalTonaseBeliJul;
        $terjualLagiJul = $periodeJul->sum('sisa_sum_tonase_sisa_terjual');
        $sortirJul = $selisihJul + $terjualLagiJul;

        $pembelianDagangJul = $periodeJul->sum('pembelian_sum_total_super');
        $pendapatanDagangJul = $totalPenjualanJul - $pembelianDagangJul;
        $biayaProduksiJul = $operasionalJul;
        $labaKotorJul = $pendapatanDagangJul - $biayaProduksiJul;

        // AGUSTUS
        $periodeAug = Periode::select()
            ->with(['pembelian', 'penjualan', 'biaya', 'gaji', 'sisa'])
            ->withSum('pembelian', 'total_tonase_beli')
            ->withSum('pembelian', 'total_super')
            ->withSum('penjualan', 'tonase_jual')
            ->withSum('pembelian', 'total_biaya_beli')
            ->withSum('penjualan', 'total_jual')
            ->withSum('biaya', 'jumlah_biaya')
            ->withSum('gaji', 'gaji')
            ->withSum('sisa', 'tonase_sisa_terjual')
            ->where('datausaha_id', '=', $usahaId)
            ->whereMonth('tanggal_awal', '=', '08')
            ->whereYear('tanggal_awal', '=', $year)
            ->get();

        $totalTonaseBeliAug = $periodeAug->sum('pembelian_sum_total_tonase_beli');
        $totalTonaseJualAug = $periodeAug->sum('penjualan_sum_tonase_jual');
        $totalPembelianAug = $periodeAug->sum('pembelian_sum_total_biaya_beli');
        $totalPenjualanAug = $periodeAug->sum('penjualan_sum_total_jual');
        $pendapatanAug = $totalPenjualanAug - $totalPembelianAug;
        $operasionalAug = $periodeAug->sum('biaya_sum_jumlah_biaya') + $periodeAug->sum('gaji_sum_gaji');
        $totalAug = $pendapatanAug - $operasionalAug;
        $selisihAug = $totalTonaseJualAug - $totalTonaseBeliAug;
        $terjualLagiAug = $periodeAug->sum('sisa_sum_tonase_sisa_terjual');
        $sortirAug = $selisihAug + $terjualLagiAug;

        $pembelianDagangAug = $periodeAug->sum('pembelian_sum_total_super');
        $pendapatanDagangAug = $totalPenjualanAug - $pembelianDagangAug;
        $biayaProduksiAug = $operasionalAug;
        $labaKotorAug = $pendapatanDagangAug - $biayaProduksiAug;

        // SEPTEMBER
        $periodeSep = Periode::select()
            ->with(['pembelian', 'penjualan', 'biaya', 'gaji', 'sisa'])
            ->withSum('pembelian', 'total_tonase_beli')
            ->withSum('pembelian', 'total_super')
            ->withSum('penjualan', 'tonase_jual')
            ->withSum('pembelian', 'total_biaya_beli')
            ->withSum('penjualan', 'total_jual')
            ->withSum('biaya', 'jumlah_biaya')
            ->withSum('gaji', 'gaji')
            ->withSum('sisa', 'tonase_sisa_terjual')
            ->where('datausaha_id', '=', $usahaId)
            ->whereMonth('tanggal_awal', '=', '09')
            ->whereYear('tanggal_awal', '=', $year)
            ->get();

        $totalTonaseBeliSep = $periodeSep->sum('pembelian_sum_total_tonase_beli');
        $totalTonaseJualSep = $periodeSep->sum('penjualan_sum_tonase_jual');
        $totalPembelianSep = $periodeSep->sum('pembelian_sum_total_biaya_beli');
        $totalPenjualanSep = $periodeSep->sum('penjualan_sum_total_jual');
        $pendapatanSep = $totalPenjualanSep - $totalPembelianSep;
        $operasionalSep = $periodeSep->sum('biaya_sum_jumlah_biaya') + $periodeSep->sum('gaji_sum_gaji');
        $totalSep = $pendapatanSep - $operasionalSep;
        $selisihSep = $totalTonaseJualSep - $totalTonaseBeliSep;
        $terjualLagiSep = $periodeSep->sum('sisa_sum_tonase_sisa_terjual');
        $sortirSep = $selisihSep + $terjualLagiSep;

        $pembelianDagangSep = $periodeSep->sum('pembelian_sum_total_super');
        $pendapatanDagangSep = $totalPenjualanSep - $pembelianDagangSep;
        $biayaProduksiSep = $operasionalSep;
        $labaKotorSep = $pendapatanDagangSep - $biayaProduksiSep;

        // OKTOBER
        $periodeOkt = Periode::select()
            ->with(['pembelian', 'penjualan', 'biaya', 'gaji', 'sisa'])
            ->withSum('pembelian', 'total_tonase_beli')
            ->withSum('pembelian', 'total_super')
            ->withSum('penjualan', 'tonase_jual')
            ->withSum('pembelian', 'total_biaya_beli')
            ->withSum('penjualan', 'total_jual')
            ->withSum('biaya', 'jumlah_biaya')
            ->withSum('gaji', 'gaji')
            ->withSum('sisa', 'tonase_sisa_terjual')
            ->where('datausaha_id', '=', $usahaId)
            ->whereMonth('tanggal_awal', '=', '10')
            ->whereYear('tanggal_awal', '=', $year)
            ->get();

        $totalTonaseBeliOkt = $periodeOkt->sum('pembelian_sum_total_tonase_beli');
        $totalTonaseJualOkt = $periodeOkt->sum('penjualan_sum_tonase_jual');
        $totalPembelianOkt = $periodeOkt->sum('pembelian_sum_total_biaya_beli');
        $totalPenjualanOkt = $periodeOkt->sum('penjualan_sum_total_jual');
        $pendapatanOkt = $totalPenjualanOkt - $totalPembelianOkt;
        $operasionalOkt = $periodeOkt->sum('biaya_sum_jumlah_biaya') + $periodeOkt->sum('gaji_sum_gaji');
        $totalOkt = $pendapatanOkt - $operasionalOkt;
        $selisihOkt = $totalTonaseJualOkt - $totalTonaseBeliOkt;
        $terjualLagiOkt = $periodeOkt->sum('sisa_sum_tonase_sisa_terjual');
        $sortirOkt = $selisihOkt + $terjualLagiOkt;

        $pembelianDagangOkt = $periodeOkt->sum('pembelian_sum_total_super');
        $pendapatanDagangOkt = $totalPenjualanOkt - $pembelianDagangOkt;
        $biayaProduksiOkt = $operasionalOkt;
        $labaKotorOkt = $pendapatanDagangOkt - $biayaProduksiOkt;

        // NOVEMBER
        $periodeNov = Periode::select()
            ->with(['pembelian', 'penjualan', 'biaya', 'gaji', 'sisa'])
            ->withSum('pembelian', 'total_tonase_beli')
            ->withSum('pembelian', 'total_super')
            ->withSum('penjualan', 'tonase_jual')
            ->withSum('pembelian', 'total_biaya_beli')
            ->withSum('penjualan', 'total_jual')
            ->withSum('biaya', 'jumlah_biaya')
            ->withSum('gaji', 'gaji')
            ->withSum('sisa', 'tonase_sisa_terjual')
            ->where('datausaha_id', '=', $usahaId)
            ->whereMonth('tanggal_awal', '=', '11')
            ->whereYear('tanggal_awal', '=', $year)
            ->get();

        $totalTonaseBeliNov = $periodeNov->sum('pembelian_sum_total_tonase_beli');
        $totalTonaseJualNov = $periodeNov->sum('penjualan_sum_tonase_jual');
        $totalPembelianNov = $periodeNov->sum('pembelian_sum_total_biaya_beli');
        $totalPenjualanNov = $periodeNov->sum('penjualan_sum_total_jual');
        $pendapatanNov = $totalPenjualanNov - $totalPembelianNov;
        $operasionalNov = $periodeNov->sum('biaya_sum_jumlah_biaya') + $periodeNov->sum('gaji_sum_gaji');
        $totalNov = $pendapatanNov - $operasionalNov;
        $selisihNov = $totalTonaseJualNov - $totalTonaseBeliNov;
        $terjualLagiNov = $periodeNov->sum('sisa_sum_tonase_sisa_terjual');
        $sortirNov = $selisihNov + $terjualLagiNov;

        $pembelianDagangNov = $periodeNov->sum('pembelian_sum_total_super');
        $pendapatanDagangNov = $totalPenjualanNov - $pembelianDagangNov;
        $biayaProduksiNov = $operasionalNov;
        $labaKotorNov = $pendapatanDagangNov - $biayaProduksiNov;

        // DESEMBER
        $periodeDes = Periode::select()
            ->with(['pembelian', 'penjualan', 'biaya', 'gaji', 'sisa'])
            ->withSum('pembelian', 'total_tonase_beli')
            ->withSum('pembelian', 'total_super')
            ->withSum('penjualan', 'tonase_jual')
            ->withSum('pembelian', 'total_biaya_beli')
            ->withSum('penjualan', 'total_jual')
            ->withSum('biaya', 'jumlah_biaya')
            ->withSum('gaji', 'gaji')
            ->withSum('sisa', 'tonase_sisa_terjual')
            ->where('datausaha_id', '=', $usahaId)
            ->whereMonth('tanggal_awal', '=', '12')
            ->whereYear('tanggal_awal', '=', $year)
            ->get();

        $totalTonaseBeliDes = $periodeDes->sum('pembelian_sum_total_tonase_beli');
        $totalTonaseJualDes = $periodeDes->sum('penjualan_sum_tonase_jual');
        $totalPembelianDes = $periodeDes->sum('pembelian_sum_total_biaya_beli');
        $totalPenjualanDes = $periodeDes->sum('penjualan_sum_total_jual');
        $pendapatanDes = $totalPenjualanDes - $totalPembelianDes;
        $operasionalDes = $periodeDes->sum('biaya_sum_jumlah_biaya') + $periodeDes->sum('gaji_sum_gaji');
        $totalDes = $pendapatanDes - $operasionalDes;
        $selisihDes = $totalTonaseJualDes - $totalTonaseBeliDes;
        $terjualLagiDes = $periodeDes->sum('sisa_sum_tonase_sisa_terjual');
        $sortirDes = $selisihDes + $terjualLagiDes;

        $pembelianDagangDes = $periodeDes->sum('pembelian_sum_total_super');
        $pendapatanDagangDes = $totalPenjualanDes - $pembelianDagangDes;
        $biayaProduksiDes = $operasionalDes;
        $labaKotorDes = $pendapatanDagangDes - $biayaProduksiDes;

        // GRANDTOTAL
        $periodeTotal = Periode::select()
            ->with(['pembelian', 'penjualan', 'biaya', 'gaji', 'sisa'])
            ->withSum('pembelian', 'total_tonase_beli')
            ->withSum('pembelian', 'total_super')
            ->withSum('penjualan', 'tonase_jual')
            ->withSum('pembelian', 'total_biaya_beli')
            ->withSum('penjualan', 'total_jual')
            ->withSum('biaya', 'jumlah_biaya')
            ->withSum('gaji', 'gaji')
            ->withSum('sisa', 'tonase_sisa_terjual')
            ->where('datausaha_id', '=', $usahaId)
            ->whereYear('tanggal_awal', '=', $year)
            ->get();

        $totalTonaseBeliTotal = $periodeTotal->sum('pembelian_sum_total_tonase_beli');
        $totalTonaseJualTotal = $periodeTotal->sum('penjualan_sum_tonase_jual');
        $totalPembelianTotal = $periodeTotal->sum('pembelian_sum_total_biaya_beli');
        $totalPenjualanTotal = $periodeTotal->sum('penjualan_sum_total_jual');
        $pendapatanTotal = $totalPenjualanTotal - $totalPembelianTotal;
        $operasionalTotal = $periodeTotal->sum('biaya_sum_jumlah_biaya') + $periodeTotal->sum('gaji_sum_gaji');
        $totalTotal = $pendapatanTotal - $operasionalTotal;
        $selisihTotal = $totalTonaseJualTotal - $totalTonaseBeliTotal;
        $terjualLagiTotal = $periodeTotal->sum('sisa_sum_tonase_sisa_terjual');
        $sortirTotal = $selisihTotal + $terjualLagiTotal;

        $pembelianDagangTotal = $periodeTotal->sum('pembelian_sum_total_super');
        $pendapatanDagangTotal = $totalPenjualanTotal - $pembelianDagangTotal;
        $biayaProduksiTotal = $operasionalTotal;
        $labaKotorTotal = $pendapatanDagangTotal - $biayaProduksiTotal;


        $cetak = Pdf::loadview('laporan.tahunan.cetak', compact(
            'usaha',
            'year',

            'periodeJan',
            'totalTonaseBeliJan',
            'totalTonaseJualJan',
            'totalPembelianJan',
            'totalPenjualanJan',
            'pendapatanJan',
            'operasionalJan',
            'totalJan',
            'selisihJan',
            'terjualLagiJan',
            'sortirJan',
            'pembelianDagangJan',
            'pendapatanDagangJan',
            'biayaProduksiJan',
            'labaKotorJan',

            'periodeFeb',
            'totalTonaseBeliFeb',
            'totalTonaseJualFeb',
            'totalPembelianFeb',
            'totalPenjualanFeb',
            'pendapatanFeb',
            'operasionalFeb',
            'totalFeb',
            'selisihFeb',
            'terjualLagiFeb',
            'sortirFeb',
            'pembelianDagangFeb',
            'pendapatanDagangFeb',
            'biayaProduksiFeb',
            'labaKotorFeb',

            'periodeMar',
            'totalTonaseBeliMar',
            'totalTonaseJualMar',
            'totalPembelianMar',
            'totalPenjualanMar',
            'pendapatanMar',
            'operasionalMar',
            'totalMar',
            'selisihMar',
            'terjualLagiMar',
            'sortirMar',
            'pembelianDagangMar',
            'pendapatanDagangMar',
            'biayaProduksiMar',
            'labaKotorMar',

            'periodeApr',
            'totalTonaseBeliApr',
            'totalTonaseJualApr',
            'totalPembelianApr',
            'totalPenjualanApr',
            'pendapatanApr',
            'operasionalApr',
            'totalApr',
            'selisihApr',
            'terjualLagiApr',
            'sortirApr',
            'pembelianDagangApr',
            'pendapatanDagangApr',
            'biayaProduksiApr',
            'labaKotorApr',

            'periodeMei',
            'totalTonaseBeliMei',
            'totalTonaseJualMei',
            'totalPembelianMei',
            'totalPenjualanMei',
            'pendapatanMei',
            'operasionalMei',
            'totalMei',
            'selisihMei',
            'terjualLagiMei',
            'sortirMei',
            'pembelianDagangMei',
            'pendapatanDagangMei',
            'biayaProduksiMei',
            'labaKotorMei',

            'periodeJun',
            'totalTonaseBeliJun',
            'totalTonaseJualJun',
            'totalPembelianJun',
            'totalPenjualanJun',
            'pendapatanJun',
            'operasionalJun',
            'totalJun',
            'selisihJun',
            'terjualLagiJun',
            'sortirJun',
            'pembelianDagangJun',
            'pendapatanDagangJun',
            'biayaProduksiJun',
            'labaKotorJun',

            'periodeJul',
            'totalTonaseBeliJul',
            'totalTonaseJualJul',
            'totalPembelianJul',
            'totalPenjualanJul',
            'pendapatanJul',
            'operasionalJul',
            'totalJul',
            'selisihJul',
            'terjualLagiJul',
            'sortirJul',
            'pembelianDagangJul',
            'pendapatanDagangJul',
            'biayaProduksiJul',
            'labaKotorJul',

            'periodeAug',
            'totalTonaseBeliAug',
            'totalTonaseJualAug',
            'totalPembelianAug',
            'totalPenjualanAug',
            'pendapatanAug',
            'operasionalAug',
            'totalAug',
            'selisihAug',
            'terjualLagiAug',
            'sortirAug',
            'pembelianDagangAug',
            'pendapatanDagangAug',
            'biayaProduksiAug',
            'labaKotorAug',

            'periodeSep',
            'totalTonaseBeliSep',
            'totalTonaseJualSep',
            'totalPembelianSep',
            'totalPenjualanSep',
            'pendapatanSep',
            'operasionalSep',
            'totalSep',
            'selisihSep',
            'terjualLagiSep',
            'sortirSep',
            'pembelianDagangSep',
            'pendapatanDagangSep',
            'biayaProduksiSep',
            'labaKotorSep',

            'periodeOkt',
            'totalTonaseBeliOkt',
            'totalTonaseJualOkt',
            'totalPembelianOkt',
            'totalPenjualanOkt',
            'pendapatanOkt',
            'operasionalOkt',
            'totalOkt',
            'selisihOkt',
            'terjualLagiOkt',
            'sortirOkt',
            'pembelianDagangOkt',
            'pendapatanDagangOkt',
            'biayaProduksiOkt',
            'labaKotorOkt',

            'periodeNov',
            'totalTonaseBeliNov',
            'totalTonaseJualNov',
            'totalPembelianNov',
            'totalPenjualanNov',
            'pendapatanNov',
            'operasionalNov',
            'totalNov',
            'selisihNov',
            'terjualLagiNov',
            'sortirNov',
            'pembelianDagangNov',
            'pendapatanDagangNov',
            'biayaProduksiNov',
            'labaKotorNov',

            'periodeDes',
            'totalTonaseBeliDes',
            'totalTonaseJualDes',
            'totalPembelianDes',
            'totalPenjualanDes',
            'pendapatanDes',
            'operasionalDes',
            'totalDes',
            'selisihDes',
            'terjualLagiDes',
            'sortirDes',
            'pembelianDagangDes',
            'pendapatanDagangDes',
            'biayaProduksiDes',
            'labaKotorDes',

            'periodeTotal',
            'totalTonaseBeliTotal',
            'totalTonaseJualTotal',
            'totalPembelianTotal',
            'totalPenjualanTotal',
            'pendapatanTotal',
            'operasionalTotal',
            'totalTotal',
            'selisihTotal',
            'terjualLagiTotal',
            'sortirTotal',
            'pembelianDagangTotal',
            'pendapatanDagangTotal',
            'biayaProduksiTotal',
            'labaKotorTotal',

        ))->setPaper('a4', 'landscape');
        return $cetak->stream('laporan tahunan.pdf');
    }
}
