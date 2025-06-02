<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Kelas extends Model
{
    protected $table = 'kelas';

    protected $fillable = [
        'nama_kelas',
        'hari',
        'sesi',
        'jam_mulai',
        'jam_selesai',
        'materi',
        'tanggal_mulai',
        'status_aktif',
    ];

    protected $casts = [
        'hari' => 'array',
        'tanggal_mulai' => 'date',
        'jam_mulai'      => 'datetime:H:i',
        'jam_selesai'    => 'datetime:H:i',
        'status_aktif'   => 'boolean',
    ];


    public function pesertas()
    {
        return $this->belongsToMany(Peserta::class, 'kelas_peserta')
                    ->withPivot(['status', 'tanggal_daftar'])
                    ->withTimestamps();
    }


public function materis() {
    return $this->hasMany(KelasMateri::class);
}

protected $appends = ['pesertas_count'];

public function getPesertasCountAttribute()
{
    return $this->pesertas()->count();
}

}
