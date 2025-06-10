<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Absensi extends Model
{
    protected $table = 'absensi';

    protected $fillable = [
        'kelas_id',
        'peserta_id',
        'tanggal_absensi',
        'status',
        'foto_kegiatan'
    ];

    protected $casts = [
        'tanggal_absensi' => 'date'
    ];

    public function kelas()
    {
        return $this->belongsTo(Kelas::class);
    }

    public function peserta()
    {
        return $this->belongsTo(Peserta::class);
    }
}