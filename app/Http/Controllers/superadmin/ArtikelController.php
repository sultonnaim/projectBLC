<?php

namespace App\Http\Controllers\superadmin;

use App\Http\Controllers\Controller;
use App\Models\Artikel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ArtikelController extends Controller
{
    public function index(Request $request)
{
    $query = Artikel::query();

    if ($request->filled('search')) {
        $query->where('title', 'like', '%' . $request->search . '%');
    }

    $articles = $query->latest()->paginate(6);
    return view('superadmin.masterdata.artikel', compact('articles'));
}


    public function create()
    {
        return view('superadmin.masterdata.entryartikel');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'content' => 'required',
            'thumbnail' => 'image|mimes:jpg,jpeg,png|max:5000'
        ]);

        $thumbnailPath = $request->file('thumbnail')?->store('thumbnails', 'public');

        Artikel::create([
            'title' => $request->title,
            'content' => $request->content,
            'thumbnail' => $thumbnailPath
        ]);

        return redirect()->route('superadmin.masterdata.entryartikel')->with('success', 'Artikel berhasil ditambahkan!');
    }

    public function edit(Artikel $artikel)
    {
        return view('superadmin.masterdata.editartikel', compact('artikel'));
    }

    public function update(Request $request, Artikel $artikel)
    {
        $request->validate([
            'title' => 'required',
            'content' => 'required',
            'thumbnail' => 'image|mimes:jpg,jpeg,png|max:5000'
        ]);

        if ($request->hasFile('thumbnail')) {
            Storage::disk('public')->delete($artikel->thumbnail);
            $artikel->thumbnail = $request->file('thumbnail')->store('thumbnails', 'public');
        }

        $artikel->update([
            'title' => $request->title,
            'content' => $request->content,
            'thumbnail' => $artikel->thumbnail,
        ]);

        return redirect()->route('superadmin.masterdata.artikel.index')->with('success', 'Artikel berhasil diperbarui!');
    }

    public function destroy(Artikel $artikel)
    {
        Storage::disk('public')->delete($artikel->thumbnail);
        $artikel->delete();
        return back()->with('success', 'Artikel berhasil dihapus!');
    }
}
