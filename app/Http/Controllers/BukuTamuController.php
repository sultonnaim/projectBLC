<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BukuTamuController extends Controller
{
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama' => 'required|string|max:255',
            'alamat' => 'required|string|max:255',
            'sesi' => 'required|string|max:255',
            'tujuan' => 'required|string|max:255',
        ]);

        // Simpan data atau kirim ke admin, tergantung kebutuhan
        session()->flash('success', 'Data berhasil dikirim ke admin!');

        return redirect()->back();
    }
}
