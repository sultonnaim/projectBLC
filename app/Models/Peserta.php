<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Peserta extends Model
{
    use HasFactory;

    protected $table = 'peserta';

    protected $fillable = [
        'nama',
        'nik',
        'lokasi_blc',
        'jenis_kelamin',
        'status',
    ];

    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    // Scope untuk filter pencarian
    public function scopeFilter($query, array $filters)
    {
        $query->when($filters['search'] ?? false, function($query, $search) {
            return $query->where('nama', 'like', '%'.$search.'%');
        });

        $query->when($filters['lokasi_blc'] ?? false, function($query, $lokasi) {
            return $query->where('lokasi_blc', $lokasi);
        });

        $query->when($filters['status'] ?? false, function($query, $status) {
            return $query->where('status', $status === 'belum' ? null : 'tervalidasi');
        });
    }

    
}