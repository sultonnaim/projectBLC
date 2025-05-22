<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Pengunjung;
use Illuminate\Http\Request;
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

        // Filter range tanggal
        if ($request->has('tanggal_awal') && $request->has('tanggal_akhir')) {
            $query->whereBetween('tanggal', [
                $request->tanggal_awal,
                $request->tanggal_akhir
            ]);
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
}