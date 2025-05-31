<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Acara;

class AcaraController extends Controller
{
    public function create()
    {
        return view('admin.acara.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'judul' => 'required|string|max:255',
            'tanggal' => 'required|date',
            'lokasi' => 'required|string|max:255',
            'deskripsi' => 'nullable|string'
        ]);

        Acara::create($validated);

        return redirect()->route('admin.dashboard')
                        ->with('success', 'Acara berhasil ditambahkan');
    }
}