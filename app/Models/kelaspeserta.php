<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\Pivot; // Perhatikan ini

class KelasPeserta extends Pivot // Harus extend Pivot bukan Model
{
    protected $table = 'kelas_peserta';
    
    protected $casts = [
        'tanggal_daftar' => 'date',
    ];
    
    // Hapus jika ada deklarasi $fillable atau properti Model lainnya
}