<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use PDF;

class KelasController extends Controller
{
    public function index()
    {
        $dataKelas = [
            'Senin' => [
                [
                    'sesi' => 'Sesi 1-2', 
                    'nama_kelas' => 'Fun Programming',
                    'waktu' => '09:00-11:00',
                    'ruangan' => 'Lab Komputer 1'
                ],
                [
                    'sesi' => 'Sesi 3-4',
                    'nama_kelas' => 'Web Design',
                    'waktu' => '13:00-15:00',
                    'ruangan' => 'Lab Multimedia'
                ]
            ],
            'Selasa' => [
                [
                    'sesi' => 'Sesi 1-2', 
                    'nama_kelas' => 'Fun Programming',
                    'waktu' => '09:00-11:00',
                    'ruangan' => 'Lab Komputer 1'
                ],
                [
                    'sesi' => 'Sesi 3-4',
                    'nama_kelas' => 'Web Design',
                    'waktu' => '13:00-15:00',
                    'ruangan' => 'Lab Multimedia'
                ]
            ],
            'Rabu' => [
                [
                    'sesi' => 'Sesi 1-2', 
                    'nama_kelas' => 'Fun Programming',
                    'waktu' => '09:00-11:00',
                    'ruangan' => 'Lab Komputer 1'
                ],
                [
                    'sesi' => 'Sesi 3-4',
                    'nama_kelas' => 'Web Design',
                    'waktu' => '13:00-15:00',
                    'ruangan' => 'Lab Multimedia'
                ]
            ],
            'Kamis' => [
                [
                    'sesi' => 'Sesi 1-2', 
                    'nama_kelas' => 'Fun Programming',
                    'waktu' => '09:00-11:00',
                    'ruangan' => 'Lab Komputer 1'
                ],
                [
                    'sesi' => 'Sesi 3-4',
                    'nama_kelas' => 'Web Design',
                    'waktu' => '13:00-15:00',
                    'ruangan' => 'Lab Multimedia'
                ]
            ],
            'Jumat' => [
                [
                    'sesi' => 'Sesi 1-2', 
                    'nama_kelas' => 'Fun Programming',
                    'waktu' => '09:00-11:00',
                    'ruangan' => 'Lab Komputer 1'
                ],
                [
                    'sesi' => 'Sesi 3-4',
                    'nama_kelas' => 'Web Design',
                    'waktu' => '13:00-15:00',
                    'ruangan' => 'Lab Multimedia'
                ]
            ],
        ];

        // Membuat array flat untuk daftar semua kelas
        $allKelas = [];
        foreach ($dataKelas as $hari => $kelasHari) {
            foreach ($kelasHari as $kelas) {
                $allKelas[] = [
                    'hari' => $hari,
                    'sesi' => $kelas['sesi'],
                    'nama_kelas' => $kelas['nama_kelas'],
                    'waktu' => $kelas['waktu'],
                    'ruangan' => $kelas['ruangan']
                ];
            }
        }

        return view('admin.kelas.index', compact('dataKelas', 'allKelas'));
    }

    public function cetakPdf()
    {
        $dataKelas = $this->index()->getData()['dataKelas'];
        
        $pdf = PDF::loadView('admin.kelas.pdf', compact('dataKelas'));
        return $pdf->download('daftar-kelas.pdf');
    }
}