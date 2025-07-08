<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BlcLocation;

class LokasiController extends Controller
{
    public function index(Request $request)
    {
        $query = BlcLocation::query();

        // Filter berdasarkan region (wilayah)
        if ($request->filled('region')) {
            $query->where('wilayah', 'like', '%' . ucfirst($request->region) . '%');
        }

        // Filter pencarian berdasarkan nama area atau alamat (jika ada kolom alamat)
        if ($request->filled('q')) {
            $query->where(function ($q) use ($request) {
                $q->where('area', 'like', '%' . $request->q . '%')
                  ->orWhere('wilayah', 'like', '%' . $request->q . '%');
            });
        }

        $blcs = $query->get();

        return view('public.lokasi', compact('blcs'));
    }
}
