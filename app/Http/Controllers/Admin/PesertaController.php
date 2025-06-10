<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Peserta;
use Illuminate\Http\Request;

class PesertaController extends Controller
{
    public function index(Request $request)
    {
        $peserta = Peserta::query()
            ->filter([
                'search' => $request->search,
                'kategori' => $request->kategori,
                'materi' => $request->materi,
                'status' => $request->status,
            ])
            ->latest()
            ->paginate(10);

        return view('admin.peserta.index', compact('peserta'));
    }

    public function create()
    {
        $kategoriOptions = ['sd' => 'SD', 'smp' => 'SMP', 'sma' => 'SMA', 'umum' => 'Umum'];
        $materiOptions = [
            'fun_programing' => 'Fun Programming',
            'desain_grafis' => 'Desain Grafis',
            'aplikasi_perkantoran' => 'Aplikasi Perkantoran'
        ];
        
        return view('admin.peserta.create', compact('kategoriOptions', 'materiOptions'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama' => 'required|string|max:255',
            'nik' => 'required|string|max:20|unique:peserta,nik',
            'tanggal_lahir' => 'required|date',
            'jenis_kelamin' => 'required|in:L,P',
            'alamat' => 'required|string',
            'kecamatan' => 'required|string',
            'kelurahan' => 'required|string',
            'email' => 'nullable|email',
            'no_telp' => 'nullable|string',
            'kategori' => 'required|in:sd,smp,sma,umum',
            'materi' => 'required|in:fun_programing,desain_grafis,aplikasi_perkantoran',
        ]);

        Peserta::create($validated);

        return redirect()->route('admin.peserta.index')
            ->with('success', 'Peserta berhasil ditambahkan');
    }

    public function edit(Peserta $pesertum)
    {
        $kategoriOptions = ['sd' => 'SD', 'smp' => 'SMP', 'sma' => 'SMA', 'umum' => 'Umum'];
        $materiOptions = [
            'fun_programing' => 'Fun Programming',
            'desain_grafis' => 'Desain Grafis',
            'aplikasi_perkantoran' => 'Aplikasi Perkantoran'
        ];
        
        return view('admin.peserta.update', [
            'peserta' => $pesertum,
            'kategoriOptions' => $kategoriOptions,
            'materiOptions' => $materiOptions
        ]);
    }

    public function update(Request $request, Peserta $pesertum)
    {
        $validated = $request->validate([
            'nama' => 'required|string|max:255',
            'nik' => 'required|string|max:20|unique:peserta,nik,'.$pesertum->id,
            'tanggal_lahir' => 'required|date',
            'jenis_kelamin' => 'required|in:L,P',
            'alamat' => 'required|string',
            'kecamatan' => 'required|string',
            'kelurahan' => 'required|string',
            'email' => 'nullable|email',
            'no_telp' => 'nullable|string',
            'kategori' => 'required|in:sd,smp,sma,umum',
            'materi' => 'required|in:fun_programing,desain_grafis,aplikasi_perkantoran',
        ]);

        $pesertum->update($validated);

        return redirect()->route('admin.peserta.index')
            ->with('success', 'Data peserta berhasil diperbarui');
    }

    public function destroy(Peserta $pesertum)
    {
        $pesertum->delete();

        return back()->with('success', 'Peserta berhasil dihapus');
    }

public function validasi($id)
    {
        $peserta = Peserta::findOrFail($id);
        $peserta->update(['status' => 'tervalidasi']);

        return back()->with('success', 'Peserta berhasil divalidasi');
    }

    /**
     * Non-validasi peserta
     */
    public function nonvalidasi($id)
    {
        $peserta = Peserta::findOrFail($id);
        $peserta->update(['status' => null]);

        return back()->with('success', 'Peserta berhasil dinonvalidasi');
    }
    public function show(Peserta $peserta)
    {
        return view('admin.peserta.index', compact('peserta'));
    }
}