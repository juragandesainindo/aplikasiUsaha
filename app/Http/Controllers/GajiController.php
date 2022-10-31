<?php

namespace App\Http\Controllers;

use App\Models\Datausaha;
use App\Models\Gaji;
use App\Models\Periode;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;

class GajiController extends Controller
{
    public function index()
    {
        $usaha = Datausaha::all();
        return view('gaji.index', compact('usaha'));
    }

    public function show($id)
    {
        $usaha = Datausaha::findOrFail($id);
        // $visitors = Datausaha::find($id)->join('periodes', 'datausahas.id', '=', 'periodes.datausaha_id')
        //     ->select(
        //         DB::raw('EXTRACT(MONTH from tanggal_awal) as bulan')
        //     )

        //     ->groupBy('bulan')
        //     ->where('datausaha_id', $usaha)
        //     ->get();



        // dd($visitors)->toArray();
        $edit = 1;
        $delete = 1;
        return view('gaji.show', compact('usaha', 'edit', 'delete'));
    }

    public function store(Request $request)
    {
        Gaji::create([
            'gaji' => $request->gaji,
            'created_at' => $request->created_at,
            'datausaha_id' => $request->datausaha_id,
            'periode_id' => $request->periode_id,
        ]);
        Alert::success('Selamat', 'Tambah gaji berhasil');
        return back();
    }

    public function update(Request $request, $id)
    {
        $gaji = Gaji::findOrFail($id);
        $gaji->update([
            'gaji' => $request->gaji,
            'created_at' => $request->created_at,
        ]);
        Alert::success('Selamat', 'Edit gaji berhasil');
        return back();
    }
}