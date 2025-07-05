<?php

namespace App\Http\Controllers\superadmin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Pengunjung;
use Illuminate\Support\Carbon;

class DashboardController extends Controller
{
    public function index(Request $request)
    {
        $filterTanggal = $request->input('tanggal', Carbon::today()->toDateString());
        $filterBulan = $request->input('bulan', Carbon::now()->format('Y-m'));

        // Data Harian
        $harian = Pengunjung::with('kategori')
            ->whereDate('tanggal', $filterTanggal)
            ->get()
            ->groupBy(fn($item) => $item->kategori->nama ?? 'Tanpa Kategori');

        $perHari = $harian->map(function ($items, $kategori) {
            return [
                'kategori' => $kategori,
                'total' => $items->count()
            ];
        })->values();

        // Data Bulanan
        $bulanan = Pengunjung::with('kategori')
            ->whereMonth('tanggal', Carbon::parse($filterBulan)->month)
            ->whereYear('tanggal', Carbon::parse($filterBulan)->year)
            ->get()
            ->groupBy(fn($item) => $item->kategori->nama ?? 'Tanpa Kategori');

        $perBulan = $bulanan->map(function ($items, $kategori) {
            return [
                'kategori' => $kategori,
                'total' => $items->count()
            ];
        })->values();

        // Debug log (optional)
        \Log::info('Tanggal:', [$filterTanggal]);
        \Log::info('perHari:', $perHari->toArray());    

        return view('superadmin.dashboardsuperadmin', compact(
            'filterTanggal',
            'filterBulan',
            'perHari',
            'perBulan'
        ));
    }
}
