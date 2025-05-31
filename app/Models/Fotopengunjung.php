<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Foto extends Model
{
    use HasFactory;

    protected $table = 'foto_kegiatan';
    
    protected $fillable = [
        'tanggal',
        'sesi',
        'keterangan',
        'path_foto'
    ];

    protected $dates = ['tanggal'];
}