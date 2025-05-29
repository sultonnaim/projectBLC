<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Peserta;
use Illuminate\Http\Request;

class PesertaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $peserta = Peserta::query()
            ->filter([
                'search' => $request->search,
                'lokasi_blc' => $request->lokasi_blc,
                'status' => $request->status,
            ])
            ->latest()
            ->paginate(10);

        return view('admin.peserta.index', compact('peserta'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $lokasiOptions = ['BLC Surabaya', 'BLC Barat', 'BLC Timur'];
        
        return view('admin.peserta.create', compact('lokasiOptions'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama' => 'required|string|max:255',
            'nik' => 'required|string|max:20|unique:peserta,nik',
            'lokasi_blc' => 'required|string',
            'jenis_kelamin' => 'required|in:L,P',
        ]);

        Peserta::create($validated);

        return redirect()->route('admin.peserta.index')
            ->with('success', 'Peserta berhasil ditambahkan');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Peserta $pesertum)
    {
        $lokasiOptions = ['BLC Surabaya', 'BLC Barat', 'BLC Timur'];
        
        return view('admin.peserta.edit', [
            'peserta' => $pesertum,
            'lokasiOptions' => $lokasiOptions
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Peserta $pesertum)
    {
        $validated = $request->validate([
            'nama' => 'required|string|max:255',
            'nik' => 'required|string|max:20|unique:peserta,nik,'.$pesertum->id,
            'lokasi_blc' => 'required|string',
            'jenis_kelamin' => 'required|in:L,P',
        ]);

        $pesertum->update($validated);

        return redirect()->route('admin.peserta.index')
            ->with('success', 'Data peserta berhasil diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Peserta $pesertum)
    {
        $pesertum->delete();

        return back()->with('success', 'Peserta berhasil dihapus');
    }

    /**
     * Validasi peserta
     */
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

}