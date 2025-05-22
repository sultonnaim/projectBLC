<?php

namespace Database\Seeders;

use App\Models\Pengunjung;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class PengunjungSeeder extends Seeder
{
    public function run()
    {
        $kategori = ['SD', 'SMP', 'SMA', 'Umum'];
        $sesi = ['1', '2', '3','4','5'];
        
        for ($i = 0; $i < 50; $i++) {
            Pengunjung::create([
                'tanggal' => Carbon::today()->subDays(rand(0, 30)),
                'sesi' => $sesi[array_rand($sesi)],
                'nama_lengkap' => 'Pengunjung ' . ($i + 1),
                'alamat' => 'Alamat pengunjung ' . ($i + 1),
                'jenis_kelamin' => rand(0, 1) ? 'L' : 'P',
                'tanggal_lahir' => Carbon::today()->subYears(rand(10, 50)),
                'kategori' => $kategori[array_rand($kategori)]
            ]);
        }
    }
}