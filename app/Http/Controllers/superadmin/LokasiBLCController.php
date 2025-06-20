<?php

namespace App\Http\Controllers\SuperAdmin;

use App\Models\BlcLocation;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LokasiBLCController extends Controller
{
    public function indexarea()
    {
        $locations = BlcLocation::select('id', 'wilayah', 'area', 'link_maps')
            ->orderBy('wilayah')
            ->orderBy('area')
            ->get();

        $blcArea = $locations->groupBy('wilayah')->map(function ($items) {
            return $items->map(function ($item) {
                return (object)[
                    'id' => $item->id,
                    'name' => $item->area,
                    'wilayah' => $item->wilayah,
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

        BlcLocation::create($request->only('area', 'wilayah', 'link_maps'));

        return redirect()->route('superadmin.masterdata.blcarea')->with('success', 'Lokasi berhasil ditambahkan');
    }

    public function edit(BlcLocation $blcLocation)
{
    return view('superadmin.masterdata.formeditblc', compact('blcLocation'));
}


public function destroy(BlcLocation $blcLocation)
{
    $blcLocation->delete();
    return redirect()->route('superadmin.masterdata.editblc')->with('success', 'Data berhasil dihapus');
}


public function editDeletePage()
{
    $blcLocations = BlcLocation::select('id', 'area as name', 'wilayah', 'link_maps as url')
        ->orderBy('wilayah')
        ->orderBy('area')
        ->get();

    return view('superadmin.masterdata.editblc', compact('blcLocations'));
}



    public function update(Request $request, BlcLocation $blcLocation)
    {
        $request->validate([
            'area' => 'required',
            'wilayah' => 'required',
            'link_maps' => 'required|url',
        ]);

        $blcLocation->update($request->only('area', 'wilayah', 'link_maps'));

        return redirect()->route('superadmin.masterdata.blcarea')->with('success', 'Lokasi berhasil diupdate');
    }

}
