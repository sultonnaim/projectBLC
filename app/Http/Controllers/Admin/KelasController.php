<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class KelasController extends Controller
{
    public function index()
    {
        $dataKelas = [
            'Senin' => [
                ['nama_kelas' => 'Fun Programming', 'pelatih' => 'Arif', 'waktu' => '09:00-11:00'],
                ['nama_kelas' => 'Web Design', 'pelatih' => 'Budi', 'waktu' => '13:00-15:00']
            ],
            'Selasa' => [
                ['nama_kelas' => 'Data Science', 'pelatih' => 'Citra', 'waktu' => '10:00-12:00']
            ],
            'Rabu' => [
                ['nama_kelas' => 'Mobile Development', 'pelatih' => 'Doni', 'waktu' => '09:00-11:00'],
                ['nama_kelas' => 'UI/UX', 'pelatih' => 'Eka', 'waktu' => '13:00-15:00']
            ],
            'Kamis' => [
                ['nama_kelas' => 'Cyber Security', 'pelatih' => 'Fajar', 'waktu' => '10:00-12:00']
            ],
            'Jumat' => [
                ['nama_kelas' => 'Digital Marketing', 'pelatih' => 'Gita', 'waktu' => '09:00-11:00']
            ]
        ];

        return view('admin.kelas.index', compact('dataKelas'));
    }

    public function cetakPdf()
    {
        $dataKelas = [
            $dataKelas = [
                'Senin' => [
                    ['nama_kelas' => 'Fun Programming', 'pelatih' => 'Arif', 'waktu' => '09:00-11:00'],
                    ['nama_kelas' => 'Web Design', 'pelatih' => 'Budi', 'waktu' => '13:00-15:00']
                ],
                'Selasa' => [
                    ['nama_kelas' => 'Data Science', 'pelatih' => 'Citra', 'waktu' => '10:00-12:00']
                ],
                'Rabu' => [
                    ['nama_kelas' => 'Mobile Development', 'pelatih' => 'Doni', 'waktu' => '09:00-11:00'],
                    ['nama_kelas' => 'UI/UX', 'pelatih' => 'Eka', 'waktu' => '13:00-15:00']
                ],
                'Kamis' => [
                    ['nama_kelas' => 'Cyber Security', 'pelatih' => 'Fajar', 'waktu' => '10:00-12:00']
                ],
                'Jumat' => [
                    ['nama_kelas' => 'Digital Marketing', 'pelatih' => 'Gita', 'waktu' => '09:00-11:00']
                ]
            ]
        ];
        
        $pdf = PDF::loadView('admin.kelas.pdf', compact('dataKelas'));
        return $pdf->download('daftar-kelas.pdf');
    }
}

