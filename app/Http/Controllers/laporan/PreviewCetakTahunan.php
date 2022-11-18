<?php

use App\Models\Periode;

$jan = Periode::where('datausaha_id', '=', $usahaId)
    ->whereMonth('tanggal_awal', '=', '01')
    ->whereYear('tanggal_awal', '=', $year)
    ->get();
$feb = Periode::where('datausaha_id', '=', $usahaId)
    ->whereMonth('tanggal_awal', '=', '02')
    ->whereYear('tanggal_awal', '=', $year)
    ->get();
$mar = Periode::where('datausaha_id', '=', $usahaId)
    ->whereMonth('tanggal_awal', '=', '03')
    ->whereYear('tanggal_awal', '=', $year)
    ->get();
$apr = Periode::where('datausaha_id', '=', $usahaId)
    ->whereMonth('tanggal_awal', '=', '04')
    ->whereYear('tanggal_awal', '=', $year)
    ->get();
$mei = Periode::where('datausaha_id', '=', $usahaId)
    ->whereMonth('tanggal_awal', '=', '05')
    ->whereYear('tanggal_awal', '=', $year)
    ->get();
$jun = Periode::where('datausaha_id', '=', $usahaId)
    ->whereMonth('tanggal_awal', '=', '06')
    ->whereYear('tanggal_awal', '=', $year)
    ->get();
$jul = Periode::where('datausaha_id', '=', $usahaId)
    ->whereMonth('tanggal_awal', '=', '07')
    ->whereYear('tanggal_awal', '=', $year)
    ->get();
$aug = Periode::where('datausaha_id', '=', $usahaId)
    ->whereMonth('tanggal_awal', '=', '08')
    ->whereYear('tanggal_awal', '=', $year)
    ->get();
$sep = Periode::where('datausaha_id', '=', $usahaId)
    ->whereMonth('tanggal_awal', '=', '09')
    ->whereYear('tanggal_awal', '=', $year)
    ->get();
$okt = Periode::where('datausaha_id', '=', $usahaId)
    ->whereMonth('tanggal_awal', '=', '10')
    ->whereYear('tanggal_awal', '=', $year)
    ->get();
$nov = Periode::where('datausaha_id', '=', $usahaId)
    ->whereMonth('tanggal_awal', '=', '11')
    ->whereYear('tanggal_awal', '=', $year)
    ->get();
$des = Periode::where('datausaha_id', '=', $usahaId)
    ->whereMonth('tanggal_awal', '=', '12')
    ->whereYear('tanggal_awal', '=', $year)
    ->get();


// ------------- GRAND TOTAL ----------------

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

$tonaseBeliTotal = $periodeTotal->sum('pembelian_sum_total_tonase_beli');
$tonaseJualTotal = $periodeTotal->sum('penjualan_sum_tonase_jual');
$biayaBeliTotal = $periodeTotal->sum('pembelian_sum_total_biaya_beli');
$biayaJualTotal = $periodeTotal->sum('penjualan_sum_total_jual');
$pendapatanTotal = $biayaJualTotal - $biayaBeliTotal;
$operasionalTotal = $periodeTotal->sum('biaya_sum_jumlah_biaya') +
    $periodeTotal->sum('gaji_sum_gaji');
$totalTotal = $pendapatanTotal - $operasionalTotal;
$selisihTotal = $tonaseJualTotal - $tonaseBeliTotal;
$terjualLagiTotal = $periodeTotal->sum('sisa_sum_tonase_sisa_terjual');
$sortirTotal = $selisihTotal - $terjualLagiTotal;
// dd($periodeTotal);
// dd(
//     $tonaseBeliTotal,
//     $tonaseJualTotal,
//     $biayaBeliTotal,
//     $biayaJualTotal,
//     $pendapatanTotal,
//     $operasionalTotal,
//     $totalTotal,
//     $selisihTotal,
//     $terjualLagiTotal,
//     $sortirTotal,
// );