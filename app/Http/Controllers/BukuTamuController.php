<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pengunjung;
use App\Models\Kategori;
use App\Models\Sesi;
use Carbon\Carbon;

class BukuTamuController extends Controller
{
    public function create()
    {
        $kategoris = Kategori::all();
        $sesis = Sesi::all();

        return view('public.buku', compact('kategoris', 'sesis'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama_lengkap'    => 'required|string|max:255',
            'sesi_id'         => 'required|exists:sesis,id',
            'kategori_id'     => 'required|exists:kategoris,id',
            'jenis_kelamin'   => 'required|in:L,P',
            'tanggal_lahir'   => 'required|date',
            'alamat'          => 'required|string',
            'no_telp'         => 'nullable|string|max:20',
        ]);

        $validated['tanggal'] = Carbon::today();

        Pengunjung::create($validated);

        return redirect()->back()->with('success', 'Terima kasih telah mengisi buku tamu!');
    }
}
