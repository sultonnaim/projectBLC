<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Peserta extends Model
{
    use HasFactory;

    protected $table = 'pesertaS';

    protected $fillable = [
        'nama',
        'nik',
        'tanggal_lahir',
        'jenis_kelamin',
        'alamat',
        'kecamatan',
        'kelurahan',
        'email',
        'no_telp',
        'kategori',
        'materi',
        'status',
    ];

    protected $casts = [
        'tanggal_lahir' => 'date',
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    public function scopeFilter($query, array $filters)
    {
        $query->when($filters['search'] ?? false, function($query, $search) {
            return $query->where('nama', 'like', '%'.$search.'%');
        });

        $query->when($filters['kategori'] ?? false, function($query, $kategori) {
            return $query->where('kategori', $kategori);
        });

        $query->when($filters['materi'] ?? false, function($query, $materi) {
            return $query->where('materi', $materi);
        });

        $query->when($filters['status'] ?? false, function($query, $status) {
            return $query->where('status', $status === 'belum' ? null : 'tervalidasi');
        });
    }

    public function absensi()
{
    return $this->hasMany(Absensi::class);
}
}