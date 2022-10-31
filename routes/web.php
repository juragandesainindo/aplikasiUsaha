<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DatausahaController;
use App\Http\Controllers\GajiController;
use App\Http\Controllers\laporan\BulanController;
use App\Http\Controllers\laporan\GrandTotalController;
use App\Http\Controllers\laporan\HarianController;
use App\Http\Controllers\laporan\TahunanController;
use App\Http\Controllers\Pembelian\PembelianController;
use App\Http\Controllers\Pembelian\PembelianProduksiBuahController;
use App\Http\Controllers\Pembelian\PembelianProduksiDagangController;
use App\Http\Controllers\Pembelian\PembelianProduksiKebunController;
use App\Http\Controllers\Pembelian\PembelianProduksiTernakController;
use App\Http\Controllers\Penjualan\PenjualanController;
use App\Http\Controllers\Penjualan\PenjualanProduksiBuahController;
use App\Http\Controllers\Penjualan\PenjualanProduksiDagangController;
use App\Http\Controllers\Penjualan\PenjualanProduksiKebunController;
use App\Http\Controllers\Penjualan\PenjualanProduksiTernakController;
use App\Http\Controllers\PeriodeController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

// #################### Menu Utama ####################
Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

// Route::get('usaha', Usaha::class);
// Route::get('periodes', Periode::class);
// Route::get('periodes/{id}', PeriodeShow::class);

Route::resource('data-usaha', DatausahaController::class);

Route::get('periode', [PeriodeController::class, 'index']);
Route::get('periode/{id}/{slug}', [PeriodeController::class, 'show'])->name('periode.show');
Route::resource('periode-produksi', PeriodeController::class);

// #################### Produksi Pembelian ####################
Route::get('pembelian', [PembelianController::class, 'index'])->name('pembelian');
Route::get('pembelian-periode/{id}/{slug}', [PembelianController::class, 'periode'])->name('pembelian-periode');
Route::get('pembelian-periode-produksi/{id}/{slug}', [PembelianController::class, 'produksi'])->name('pembelian-periode-produksi');

Route::resource('pembelian-produksi-buah', PembelianProduksiBuahController::class);
Route::resource('pembelian-produksi-dagang', PembelianProduksiDagangController::class);
Route::resource('pembelian-produksi-ternak', PembelianProduksiTernakController::class);
Route::resource('pembelian-produksi-kebun', PembelianProduksiKebunController::class);

// #################### Produksi Penjualan ####################
Route::controller(PenjualanController::class)->group(function () {
    Route::get('penjualan', 'index')->name('penjualan');
    Route::get('penjualan-periode/{id}/{slug}', 'periode')->name('penjualan-periode');
    Route::get('penjualan-periode-produksi/{id}/{slug}', 'produksi')->name('penjualan-periode-produksi');

    Route::post('penjualan-periode-produksi-biaya', 'storeBiaya')->name('penjualan-periode-produksi-biaya.store');
    Route::put('penjualan-periode-produksi-biaya/{id}', 'updateBiaya')->name('penjualan-periode-produksi-biaya.update');
    Route::delete('penjualan-periode-produksi-biaya/{id}', 'destroyBiaya')->name('penjualan-periode-produksi-biaya.destroy');

    Route::post('penjualan-periode-produksi-gaji', 'storeGaji')->name('penjualan-periode-produksi-gaji.store');
    Route::delete('penjualan-periode-produksi-gaji/{id}', 'destroyGaji')->name('penjualan-periode-produksi-gaji.destroy');

    Route::post('penjualan-periode-produksi-sisa', 'storeSisa')->name('penjualan-periode-produksi-sisa.store');
    Route::delete('penjualan-periode-produksi-sisa/{id}', 'destroySisa')->name('penjualan-periode-produksi-sisa.destroy');
});

Route::resource('penjualan-produksi-buah', PenjualanProduksiBuahController::class);
Route::resource('penjualan-produksi-dagang', PenjualanProduksiDagangController::class);
Route::resource('penjualan-produksi-ternak', PenjualanProduksiTernakController::class);
Route::resource('penjualan-produksi-kebun', PenjualanProduksiKebunController::class);

// #################### Laporan Harian ####################
Route::get('laporan-harian', [HarianController::class, 'index']);
Route::get('laporan-harian/{id}/{slug}', [HarianController::class, 'show'])->name('laporan-harian.show');
Route::get('laporan-harian-preview/{id}/{slug}', [HarianController::class, 'preview'])->name('laporan-harian.preview');
Route::get('laporan-harian-cetak/{id}/{slug}', [HarianController::class, 'cetak'])->name('laporan-harian.cetak');

// #################### Laporan Bulanan ####################
Route::get('laporan-bulanan', [BulanController::class, 'index']);
Route::get('laporan-bulanan/{id}', [BulanController::class, 'show'])->name('laporan-bulanan.show');
Route::get('laporan-bulanan-cetak/{id}', [BulanController::class, 'cetak'])->name('laporan-bulanan.cetak');

// #################### Laporan Tahunan ####################
Route::get('laporan-tahunan', [TahunanController::class, 'index']);
Route::get('laporan-tahunan/{id}', [TahunanController::class, 'show'])->name('laporan-tahunan.show');
Route::get('laporan-tahunan-cetak/{id}', [TahunanController::class, 'cetak'])->name('laporan-tahunan.cetak');

// #################### Laporan Grand Total ####################
Route::get('laporan-grand-total', [GrandTotalController::class, 'index'])->name('laporan-grand-total.index');
Route::get('laporan-grand-total-show', [GrandTotalController::class, 'show'])->name('laporan-grand-total.show');
Route::get('laporan-grand-total-cetak', [GrandTotalController::class, 'cetak'])->name('laporan-grand-total-cetak.cetak');


// Route::get('category', function () {
//     $category = App\Models\Category::all();
//     return view('welcome2', ['category' => $category]);
// });

// Route::get('getCourse/{id}', function ($id) {
//     $course = App\Models\Course::where('category_id', $id)->get();
//     return response()->json($course);
// });