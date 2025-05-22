<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pengunjung extends Model
{
    protected $table = 'pengunjung'; 
    
    protected $fillable = [
        'tanggal',
        'sesi',
        'nama_lengkap', 
        'alamat',
        'jenis_kelamin',
        'tanggal_lahir',
        'kategori',
        'no_telp'
    ];

    protected $dates = ['tanggal', 'tanggal_lahir'];
}