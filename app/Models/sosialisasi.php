<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SosialisasiFoto extends Model
{
    use HasFactory;

    protected $table = 'sosialisasi_foto';
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