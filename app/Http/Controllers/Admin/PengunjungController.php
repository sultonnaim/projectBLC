<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Pengunjung;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Carbon\Carbon;

class PengunjungController extends Controller
{
    public function index(Request $request)
    {
        $query = Pengunjung::query();

        // Filter tanggal
        if ($request->has('tanggal')) {
            $query->whereDate('tanggal', $request->tanggal);
        }

        // Search
        if ($request->has('search')) {
            $query->where('nama_lengkap', 'like', '%'.$request->search.'%');
        }

        $pengunjungs = $query->latest('tanggal')->paginate(10);

        return view('admin.pengunjung.index', compact('pengunjungs'));
    }

    public function create()
    {
        $sesiOptions = ['1 (08.00-12.00)', '2 (12.00-16.00)', '3 (16.00-20.00)', '4 (16.00-20.00)', '5 (16.00-20.00)'];
        $kategoriOptions = ['SD', 'SMP', 'SMA', 'Umum'];
        
        return view('admin.pengunjung.entrypengunjung', compact('sesiOptions', 'kategoriOptions'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'tanggal' => 'required|date',
            'sesi' => 'required|string',
            'nama_lengkap' => 'required|string|max:255',
            'alamat' => 'required|string',
            'jenis_kelamin' => 'required|in:L,P',
            'tanggal_lahir' => 'required|date',
            'kategori' => 'required|in:SD,SMP,SMA,Umum',
        ]);

        // Format tanggal sebelum disimpan
        $validatedData['tanggal'] = Carbon::parse($validatedData['tanggal'])->format('Y-m-d');
        $validatedData['tanggal_lahir'] = Carbon::parse($validatedData['tanggal_lahir'])->format('Y-m-d');

        Pengunjung::create($validatedData);

        return redirect()->route('admin.pengunjung.index')
                        ->with('success', 'Data pengunjung berhasil ditambahkan');
    }

    public function destroy(Pengunjung $pengunjung)
    {
        $pengunjung->delete();
        return back()->with('success', 'Data pengunjung berhasil dihapus');
    }

    public function createFoto()
{
    return view('admin.pengunjung.entryfoto');
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
    
    return view('admin.pengunjung.entryfoto', compact('sesiOptions'));
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
    $path = $request->file('foto')->store('foto-pengunjung', 'public');

    // Simpan ke database
    DB::table('pengunjung_foto')->insert([
        'path_foto' => $path,
        'tanggal' => $validated['tanggal'],
        'sesi' => $validated['sesi'],
        'keterangan' => $validated['keterangan'],
        'created_at' => now(),
        'updated_at' => now()
    ]);

    return redirect()->route('admin.pengunjung.entryfoto')
                    ->with('success', 'Foto kegiatan berhasil disimpan');
}
public function showLaporanFoto(Request $request)
{
    $query = DB::table('pengunjung_foto')->orderBy('tanggal', 'desc');

    // Filter by date if provided
    if ($request->has('filter_date')) {
        $query->whereDate('tanggal', $request->filter_date);
    }

    $fotos = $query->paginate(6);

    return view('admin.pengunjung.laporanfoto', compact('fotos'));
}

public function editFoto($id)
{
    $foto = DB::table('pengunjung_foto')->find($id);
    return view('admin.pengunjung.editfoto', compact('foto'));
}

public function hapusFoto($id)
{
    $foto = DB::table('pengunjung_foto')->find($id);
    
    // Delete file from storage
    Storage::delete('public/' . $foto->path_foto);
    
    // Delete record from database
    DB::table('pengunjung_foto')->where('id', $id)->delete();

    return back()->with('success', 'Foto berhasil dihapus');
}

public function updateFoto(Request $request, $id)
{
    $request->validate([
        'tanggal' => 'required|date',
        'sesi' => 'required|string|in:1 (08.00-12.00),2 (12.00-16.00),3 (16.00-20.00),4 (16.00-20.00),5 (16.00-20.00)',
        'keterangan' => 'nullable|string|max:500',
        'foto' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
    ]);

    $foto = DB::table('pengunjung_foto')->where('id', $id)->first();
    
    if (!$foto) {
        abort(404);
    }

    $data = [
        'tanggal' => $request->tanggal,
        'sesi' => $request->sesi,
        'keterangan' => $request->keterangan,
        'updated_at' => now()
    ];

    if ($request->hasFile('foto')) {
        // Hapus foto lama
        if ($foto->path_foto) {
            Storage::delete('public/' . $foto->path_foto);
        }
        
        // Simpan foto baru
        $path = $request->file('foto')->store('public/foto-pengunjung');
        $data['path_foto'] = str_replace('public/', '', $path);
    }

    DB::table('pengunjung_foto')->where('id', $id)->update($data);

    return redirect()->route('pengunjung.laporanfoto')
        ->with('success', 'Foto kegiatan berhasil diperbarui');
}

}
