<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\sosialisasi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Carbon\Carbon;

class SosialisasiController extends Controller
{
 
    public function createFoto()
{
    return view('admin.sosialisasi.entryfoto');
}
public function showEntryFotoForm()
{
    $sesiOptions = [
        '1 (08.00-12.00)',
        '2 (12.00-16.00)', 
        '3 (16.00-20.00)',
        '4 (16.00-20.00)',
        '5 (16.00-20.00)'
    ];
    
    return view('admin.sosialisasi.entryfoto', compact('sesiOptions'));
}


public function simpanFoto(Request $request)
{
    $validated = $request->validate([
        'tanggal' => 'required|date',
        'sesi' => 'required|string|in:1 (08.00-12.00),2 (12.00-16.00),3 (16.00-20.00),4 (16.00-20.00),5 (16.00-20.00)',
        'keterangan' => 'nullable|string|max:500',
        'foto' => 'required|image|mimes:jpeg,png,jpg|max:2048',
    ]);

    // Simpan file foto
    $path = $request->file('foto')->store('foto-sosialiasi', 'public');

    // Simpan ke database
    DB::table('sosialisasi_foto')->insert([
        'path_foto' => $path,
        'tanggal' => $validated['tanggal'],
        'sesi' => $validated['sesi'],
        'keterangan' => $validated['keterangan'],
        'created_at' => now(),
        'updated_at' => now()
    ]);

    return redirect()->route('admin.sosialisasi.entryfoto')
                    ->with('success', 'Foto kegiatan berhasil disimpan');
}
public function showLaporanFoto(Request $request)
{
    $query = DB::table('sosialisasi_foto')->orderBy('tanggal', 'desc');

    // Filter by date if provided
    if ($request->has('filter_date')) {
        $query->whereDate('tanggal', $request->filter_date);
    }

    $fotos = $query->paginate(6);

    return view('admin.sosialisasi.laporanfoto', compact('fotos'));
}

public function editFoto($id)
{
    $foto = DB::table('sosialisasi_foto')->find($id);
    return view('admin.sosialisasi.editfoto', compact('foto'));
}

public function hapusFoto($id)
{
    $foto = DB::table('sosialisasi_foto')->find($id);
    
    // Delete file from storage
    Storage::delete('public/' . $foto->path_foto);
    
    // Delete record from database
    DB::table('sosialisasi_foto')->where('id', $id)->delete();

    return back()->with('success', 'Foto berhasil dihapus');
}


}
