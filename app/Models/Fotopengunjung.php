<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PengunjungFoto extends Model
{
    use HasFactory;

    protected $table = 'pengunjung_foto';
    protected $primaryKey = 'id';

    protected $fillable = [
        'tanggal',
        'sesi',
        'keterangan',
        'path_foto'
    ];

    protected $casts = [
        'tanggal' => 'date'
    ];
}