<?php

namespace App\Http\Controllers\SuperAdmin;

use App\Models\BlcLocation;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

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
            'area' => 'required|string|max:255',
            'wilayah' => 'required|string|max:255',
            'link_maps' => 'required|url',
            'foto' => 'image|mimes:jpg,jpeg,png|max:5000',
        ]);

        $data = $request->only(['area', 'wilayah', 'link_maps']);

        if ($request->hasFile('foto')) {
            $data['foto'] = $request->file('foto')->store('blc', 'public');
        }

        BlcLocation::create($data);

        return redirect()->route('superadmin.masterdata.editblc')->with('success', 'Lokasi berhasil ditambahkan');
    }

    public function edit(BlcLocation $blcLocation)
    {
        return view('superadmin.masterdata.formeditblc', compact('blcLocation'));
    }

    public function update(Request $request, BlcLocation $blcLocation)
    {
        $request->validate([
            'area' => 'required|string|max:255',
            'wilayah' => 'required|string|max:255',
            'link_maps' => 'required|url',
            'foto' => 'image|mimes:jpg,jpeg,png|max:5000',
        ]);

        $data = $request->only(['area', 'wilayah', 'link_maps']);

        if ($request->hasFile('foto')) {
            // Hapus foto lama jika ada
            if ($blcLocation->foto && Storage::disk('public')->exists($blcLocation->foto)) {
                Storage::disk('public')->delete($blcLocation->foto);
            }

            $data['foto'] = $request->file('foto')->store('blc', 'public');
        }

        $blcLocation->update($data);

        return redirect()->route('superadmin.masterdata.editblc')->with('success', 'Lokasi berhasil diperbarui');
    }

    public function destroy(BlcLocation $blcLocation)
    {
        // Hapus file foto dari storage
        if ($blcLocation->foto && Storage::disk('public')->exists($blcLocation->foto)) {
            Storage::disk('public')->delete($blcLocation->foto);
        }

        $blcLocation->delete();

        return redirect()->route('superadmin.masterdata.editblc')->with('success', 'Data berhasil dihapus');
    }

    public function editDeletePage()
    {
        $blcLocations = BlcLocation::select('id', 'area as name', 'wilayah', 'link_maps as url', 'foto')
            ->orderBy('wilayah')
            ->orderBy('area')
            ->get();

        return view('superadmin.masterdata.editblc', compact('blcLocations'));
    }
}
