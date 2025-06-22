<?php

namespace App\Http\Controllers\superadmin;

use App\Http\Controllers\Controller; 
use Illuminate\Http\Request;
use App\Models\Sesi;

class SesiController extends Controller
{
public function store(Request $request)
{
    $validated = $request->validate([
        'nama' => 'required',
        'jam' => 'required|date_format:H:i',
    ]);

    Sesi::create($validated);
    return redirect()->back()->with('success', 'Sesi ditambahkan');
}

public function update(Request $request, Sesi $sesi)
{
    $validated = $request->validate([
        'nama' => 'required',
        'jam' => 'required|date_format:H:i',
    ]);

    $sesi->update($validated);
    return back()->with('success', 'Sesi berhasil diupdate');
}

public function destroy(Sesi $sesi)
{
    $sesi->delete();
    return back()->with('success', 'Sesi dihapus');
}

}
