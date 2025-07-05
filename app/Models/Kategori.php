<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kategori extends Model
{
    use HasFactory;

    protected $table = 'kategori';
    protected $fillable = ['nama'];

    public function pengunjung()
{
    return $this->hasMany(\App\Models\Pengunjung::class, 'kategori_id');
}
}

