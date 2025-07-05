<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pengunjung extends Model
{
    protected $table = 'pengunjung';
    protected $fillable = [
        'tanggal',
        'sesi_id',
        'kategori_id',
        'nama_lengkap',
        'alamat',
        'jenis_kelamin',
        'tanggal_lahir',
        'no_telp',
    ];

    public function sesi()
    {
        return $this->belongsTo(Sesi::class);
    }

    public function kategori()
    {
        return $this->belongsTo(\App\Models\Kategori::class, 'kategori_id');
    }
}
