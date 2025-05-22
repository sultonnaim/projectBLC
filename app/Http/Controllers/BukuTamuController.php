<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pengunjung;
use Carbon\Carbon;

class BukuTamuController extends Controller
{
    public function create()
    {
        return view('public.buku'); 
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama_lengkap' => 'required|string|max:255',
            'sesi' => 'required|integer|between:1,5',
            'jenis_kelamin' => 'required|in:L,P',
            'tanggal_lahir' => 'required|date',
            'alamat' => 'required|string',
            'kategori' => 'required|in:sd,smp,sma,umum',
            // 'no_telp' => 'nullable|string|max:20',
        ]);

        // Tambahkan tanggal kunjungan (hari ini)
        $validated['tanggal'] = Carbon::today();

        Pengunjung::create($validated);

        return redirect()->back()->with('success', 'Terima kasih telah mengisi buku tamu!');
    }
}