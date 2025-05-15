<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Pengunjung;
use Illuminate\Http\Request;

class PengunjungController extends Controller
{
    public function index(Request $request)
    {
        $query = Pengunjung::query();
        
        // Filter berdasarkan tanggal
        if ($request->has('filter')) {
            switch($request->filter) {
                case 'hari_ini':
                    $query->whereDate('created_at', today());
                    break;
                case 'minggu_ini':
                    $query->whereBetween('created_at', [now()->startOfWeek(), now()->endOfWeek()]);
                    break;
                case 'bulan_ini':
                    $query->whereMonth('created_at', now()->month);
                    break;
            }
        }
        
        $pengunjungs = $query->latest()->paginate(10);
        
        return view('admin.pengunjung.index', compact('pengunjungs'));
    }

    public function destroy(Pengunjung $pengunjung)
    {
        $pengunjung->delete();
        return back()->with('success', 'Data pengunjung berhasil dihapus');
    }
}