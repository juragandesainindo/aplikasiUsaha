<?php

use App\Models\Datausaha;
use App\Models\Periode;

$month = $request->input('month');
$year   = $request->input('year');
$usahaId = $request->input('usahaId');


$usaha = Datausaha::find($id);

$periode = Periode::select()
    ->where('datausaha_id', '=', $usahaId)
    ->with(['pembelian', 'penjualan', 'biaya', 'gaji', 'sisa'])
    ->withSum('pembelian', 'total_tonase_beli')
    ->withSum('pembelian', 'total_super')
    ->withSum('penjualan', 'tonase_jual')
    ->withSum('pembelian', 'total_biaya_beli')
    ->withSum('penjualan', 'total_jual')
    ->withSum('biaya', 'jumlah_biaya')
    ->withSum('gaji', 'gaji')
    ->withSum('sisa', 'tonase_sisa_terjual')
    ->withSum('sisa', 'total_sisa_terjual')
    ->whereMonth('tanggal_awal', '=', $month)
    ->whereYear('tanggal_awal', '=', $year)
    ->get();

$totalTonaseBeli = $periode->sum('pembelian_sum_total_tonase_beli');
$totalTonaseJual = $periode->sum('penjualan_sum_tonase_jual');
$totalPembelian = $periode->sum('pembelian_sum_total_biaya_beli');
$totalPenjualan = $periode->sum('penjualan_sum_total_jual');
$pendapatan = $totalPenjualan - $totalPembelian;
$operasional = $periode->sum('biaya_sum_jumlah_biaya') + $periode->sum('gaji_sum_gaji');
$total = $pendapatan - $operasional;
$selisih = $totalTonaseJual - $totalTonaseBeli;
$terjualLagi = $periode->sum('sisa_sum_tonase_sisa_terjual');
$sortir = $selisih + $terjualLagi;
$totalSisa = $periode->sum('sisa_sum_total_sisa_terjual');