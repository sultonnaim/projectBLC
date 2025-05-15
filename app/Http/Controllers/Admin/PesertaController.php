<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Peserta;
use Illuminate\Http\Request;

class PesertaController extends Controller
{
    public function index(Request $request)
    {
        $query = Peserta::query();

        // Filter Area
        if ($request->area) {
            $query->where('lokasi_blc', $request->area);
        }

        // Search
        if ($request->search) {
            $query->where(function($q) use ($request) {
                $q->where('nama', 'like', '%'.$request->search.'%')
                ->orWhere('nik', 'like', '%'.$request->search.'%');
            });
        }

        $peserta = $query->latest()->paginate(10); // 10 data per halaman

        return view('admin.peserta.index', compact('peserta'));
    }

    public function create()
    {
        return view('admin.peserta.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'nik' => 'required|string|max:16|unique:peserta',
            'lokasi_blc' => 'required',
            'jenis_kelamin' => 'required',
        ]);

        Peserta::create([
            'nama' => $request->nama,
            'nik' => $request->nik,
            'lokasi_blc' => $request->lokasi_blc,
            'jenis_kelamin' => $request->jenis_kelamin,
            'status' => 'belum', 
        ]);

        return redirect()->route('admin.peserta.index')->with('success', 'Peserta berhasil ditambahkan!');
    }

    public function edit($id)
    {
        $peserta = Peserta::findOrFail($id);
        return view('admin.peserta.edit', compact('peserta'));
    }

    public function update(Request $request, $id)
    {
        $peserta = Peserta::findOrFail($id);

        $request->validate([
            'nama' => 'required|string|max:255',
            'nik' => 'required|string|max:16|unique:peserta,nik,'.$id,
            'lokasi_blc' => 'required',
            'jenis_kelamin' => 'required',
        ]);

        $peserta->update([
            'nama' => $request->nama,
            'nik' => $request->nik,
            'lokasi_blc' => $request->lokasi_blc,
            'jenis_kelamin' => $request->jenis_kelamin,
        ]);

        return redirect()->route('admin.peserta.index')->with('success', 'Peserta berhasil diperbarui!');
    }

    public function destroy($id)
    {
        $peserta = Peserta::findOrFail($id);
        $peserta->delete();

        return redirect()->route('admin.peserta.index')->with('success', 'Peserta berhasil dihapus!');
    }

    public function validasi($id)
    {
        $peserta = Peserta::findOrFail($id);
        $peserta->update(['status' => 'tervalidasi']);

        return redirect()->back()->with('success', 'Peserta berhasil divalidasi.');
    }

    public function nonvalidasi($id)
    {
        $peserta = Peserta::findOrFail($id);
        $peserta->update(['status' => 'belum']);

        return redirect()->back()->with('success', 'Peserta berhasil dinonvalidasi.');
    }
}
