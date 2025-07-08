<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BlcLocation extends Model
{
    protected $table = 'lokasiblc'; // sesuai dengan nama tabel kamu

    protected $fillable = ['wilayah', 'area', 'link_maps', 'foto']; // atau 'nama' jika pakai solusi #2
}

