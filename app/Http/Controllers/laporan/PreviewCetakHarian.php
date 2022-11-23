<?php

use App\Models\Periode;

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

$jumlahbiaya = $periode->biaya->sum('jumlah_biaya');
$jumlahgaji = $periode->gaji->sum('gaji');

$labarugi = $pendapatankotor - $jumlahbiaya - $jumlahgaji;