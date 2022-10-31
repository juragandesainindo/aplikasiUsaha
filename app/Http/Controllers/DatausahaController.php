<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Datausaha;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert as FacadesAlert;

class DatausahaController extends Controller
{
    public function index()
    {
        $datausaha = Datausaha::all();
        $delete = 1;
        return view('data-usaha.index', compact('datausaha', 'delete'));
    }

    public function create()
    {
        return view('data-usaha.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_usaha' => 'required|min:3|unique:datausahas',
            'kategori' => 'required'
        ]);

        Datausaha::create([
            'nama_usaha'    => $request->nama_usaha,
            'slug'          => Str::slug($request->nama_usaha, '-'),
            'kategori'      => $request->kategori
        ]);

        FacadesAlert::success('Selamat', 'Tambah data usaha berhasil');
        return redirect()->route('data-usaha.index');
    }

    public function edit($id)
    {
        $datausaha = Datausaha::findOrfail($id);

        return view('data-usaha.edit', compact('datausaha'));
    }

    public function update(Request $request, $id)
    {
        $datausaha = Datausaha::findOrfail($id);

        $request->validate([
            'nama_usaha' => 'required|min:3',
            'kategori' => 'required'
        ]);

        $datausaha->update([
            'nama_usaha'    => $request->nama_usaha,
            'slug'          => Str::slug($request->nama_usaha, '-'),
            'kategori'      => $request->kategori

        ]);

        FacadesAlert::warning('Selamat', 'Ubah data usaha berhasil');
        return redirect()->route('data-usaha.index');
    }

    public function destroy($id)
    {
        Datausaha::find($id)->delete();

        FacadesAlert::error('Selamat', 'Hapus data usaha berhasil');
        return back();
    }
}