<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Kelas;
use App\Models\Absensi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PelatihanController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('search');
        
        $kelas = Kelas::query()
            ->when($search, function($query) use ($search) {
                return $query->where('nama_kelas', 'like', '%'.$search.'%')
                             ->orWhere('materi', 'like', '%'.$search.'%');
            })
            ->withCount('pesertas')
            ->paginate(10);

        return view('admin.pelatihan.index', compact('kelas'));
    }

    public function show(Kelas $kelas)
    {
        $pesertas = $kelas->pesertas()->paginate(10);
        return view('admin.pelatihan.detail', compact('kelas', 'pesertas'));
    }

    public function storeAbsensi(Request $request, Kelas $kelas)
    {
        $request->validate([
            'tanggal_absensi' => 'required|date',
            'foto_kegiatan' => 'required|image|mimes:jpeg,png,jpg|max:2048',
            'absensi' => 'required|array',
            'absensi.*' => 'in:hadir,tidak_hadir'
        ]);

        // Simpan foto kegiatan
        $fotoPath = $request->file('foto_kegiatan')->store('public/absensi');

        // Simpan data absensi
        foreach ($request->absensi as $pesertaId => $status) {
            Absensi::create([
                'kelas_id' => $kelas->id,
                'peserta_id' => $pesertaId,
                'tanggal_absensi' => $request->tanggal_absensi,
                'status' => $status,
                'foto_kegiatan' => $fotoPath
            ]);
        }

        return redirect()->route('admin.pelatihan.laporan')
            ->with('success', 'Absensi berhasil disimpan');
    }

    public function laporan(Request $request)
    {
        $filterDate = $request->input('filter_date');
        
        $absensi = Absensi::query()
            ->with(['kelas', 'peserta'])
            ->when($filterDate, function($query) use ($filterDate) {
                return $query->whereDate('tanggal_absensi', $filterDate);
            })
            ->orderBy('tanggal_absensi', 'desc')
            ->paginate(10);

        return view('admin.pelatihan.laporan', compact('absensi'));
    }
}