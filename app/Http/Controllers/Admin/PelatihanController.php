<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Peserta;
use Illuminate\Http\Request;

class PelatihanController extends Controller
{
    public function index(Request $request)
    {
        $query = Peserta::query();

        // Search functionality
        if ($request->has('search')) {
            $query->where('nama', 'like', '%'.$request->search.'%')
                ->orWhere('nik', 'like', '%'.$request->search.'%');
        }

        $peserta = $query->paginate(10);

        return view('admin.pelatihan.index', compact('peserta'));
    }

    public function updatepPelatihan(Request $request)
    {
        $request->validate([
            'tanggal_absensi' => 'required|date',
            'foto_kegiatan' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'absensi' => 'required|array',
            'absensi.*' => 'required|in:hadir,izin,sakit,alpa'
        ]);

        // Process photo upload
        if ($request->hasFile('foto_kegiatan')) {
            $fotoPath = $request->file('foto_kegiatan')->store('absensi-photos', 'public');
            // Save $fotoPath to database if needed
        }

        // Process attendance data
        foreach ($request->absensi as $pesertaId => $status) {
            // Save attendance to database
            // Example:
            // Absensi::updateOrCreate(
            //     ['peserta_id' => $pesertaId, 'tanggal' => $request->tanggal_absensi],
            //     ['status' => $status]
            // );
        }

        return back()->with('success', 'Data absensi berhasil disimpan!');
    }
}