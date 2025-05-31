<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Kelas extends Model
{
   protected $fillable = [
    'nama_kelas',
    'hari',
    'sesi',
    'jam_mulai',
    'jam_selesai',
    'materi',
    'ruangan',
    'tanggal_mulai',
    'status_aktif',
];

protected $casts = [
    'hari' => 'array', 
    'status_aktif' => 'boolean',
    'tanggal_mulai' => 'date'
];

public function materis() {
    return $this->hasMany(KelasMateri::class);
}

public function pesertas()
{
    return $this->belongsToMany(Peserta::class, 'kelas_peserta');
}

protected $appends = ['pesertas_count'];

public function getPesertasCountAttribute()
{
    return $this->pesertas()->count();
}
}
