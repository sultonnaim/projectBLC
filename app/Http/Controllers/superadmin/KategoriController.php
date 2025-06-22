<?php

namespace App\Http\Controllers\superadmin;

use App\Http\Controllers\Controller; 
use Illuminate\Http\Request;
use App\Models\Kategori;

class KategoriController extends Controller
{
public function index()
{
    $kategoris = Kategori::all();
    $sesis = \App\Models\Sesi::all();
    return view('superadmin.masterdata.kategori', compact('kategoris', 'sesis'));
}

public function store(Request $request)
{
    Kategori::create($request->validate(['nama' => 'required']));
    return redirect()->back()->with('success', 'Kategori ditambahkan');
}

public function update(Request $request, Kategori $kategori)
{
    $request->validate(['nama' => 'required']);
    $kategori->update(['nama' => $request->nama]);
    return back()->with('success', 'Kategori berhasil diupdate');
}

public function destroy(Kategori $kategori)
{
    $kategori->delete();
    return back()->with('success', 'Kategori dihapus');
}

}
