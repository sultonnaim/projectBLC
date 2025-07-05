<?php

namespace App\Http\Controllers;

use App\Models\Artikel;
use Illuminate\Http\Request;

class PublicArtikelController extends Controller
{
    public function index(Request $request)
    {
        $query = Artikel::query();

    if ($request->filled('search')) {
        $query->where('title', 'like', '%' . $request->search . '%');
    }
        $articles = Artikel::latest()->paginate(6);
        return view('public.artikel', compact('articles'));
    }

    public function show($id)
    {
        $article = Artikel::findOrFail($id);
        return view('public.artikel-show', compact('article'));
    }
}
