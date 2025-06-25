<?php

namespace App\Http\Controllers\SuperAdmin;

use App\Models\User;
use App\Models\BlcLocation;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class LokasiBLCController extends Controller
{
    public function indexarea()
    {
        $locations = BlcLocation::select('wilayah', 'area', 'link_maps')
            ->orderBy('wilayah')
            ->orderBy('area')
            ->get();
    
        // Group by wilayah
        $blcArea = $locations->groupBy('wilayah')->map(function ($items) {
            return $items->map(function ($item) {
                return (object)[
                    'name' => $item->area,
                    'url' => $item->link_maps,
                ];
            });
        });
    
        return view('superadmin.masterdata.blcarea', compact('blcArea'));
    }
    



    public function create()
    {
        return view('superadmin.masterdata.entryblc');
    }

    public function store(Request $request)
{
    $request->validate([
        'area' => 'required',
        'wilayah' => 'required',
        'link_maps' => 'required|url',
    ]);

    BlcLocation::create([
        'area' => $request->area,
        'wilayah' => $request->wilayah,
        'link_maps' => $request->link_maps,
    ]);

    return redirect()->route('superadmin.masterdata.blcarea')->with('success', 'Lokasi berhasil ditambahkan');
}


    public function edit(BlcLocation $blcLocation)
    {
        return view('superadmin.masterdata.editarea', compact('blcLocation'));
    }

    public function update(Request $request, BlcLocation $blcLocation)
    {
        $request->validate([
            'area' => 'required',
            'wilayah' => 'required',
            'link_maps' => 'required|url',
        ]);
    
        $blcLocation->update([
            'area' => $request->area,
            'wilayah' => $request->wilayah,
            'link_maps' => $request->link_maps,
        ]);
    
        return redirect()->route('superadmin.masterdata.blcarea')->with('success', 'Lokasi berhasil diupdate');
    }
    

    public function destroy(BlcLocation $blcLocation)
    {
        $blcLocation->delete();

        return redirect()->route('blc.index')->with('success', 'Lokasi berhasil dihapus');
    }
}
