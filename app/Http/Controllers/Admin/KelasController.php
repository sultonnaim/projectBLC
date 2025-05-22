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
                    'mentor' => 'Arif',
                    'waktu' => '09:00-11:00',
                    'ruangan' => 'Lab Komputer 1'
                ],
                [
                    'sesi' => 'Sesi 3-4',
                    'nama_kelas' => 'Web Design',
                    'mentor' => 'Budi',
                    'waktu' => '13:00-15:00',
                    'ruangan' => 'Lab Multimedia'
                ]
            ],
            'selasa' => [
                [
                    'sesi' => 'Sesi 1-2', 
                    'nama_kelas' => 'Fun Programming',
                    'mentor' => 'Arif',
                    'waktu' => '09:00-11:00',
                    'ruangan' => 'Lab Komputer 1'
                ],
                [
                    'sesi' => 'Sesi 3-4',
                    'nama_kelas' => 'Web Design',
                    'mentor' => 'Budi',
                    'waktu' => '13:00-15:00',
                    'ruangan' => 'Lab Multimedia'
                ]
            ],
            'rabu' => [
                [
                    'sesi' => 'Sesi 1-2', 
                    'nama_kelas' => 'Fun Programming',
                    'mentor' => 'Arif',
                    'waktu' => '09:00-11:00',
                    'ruangan' => 'Lab Komputer 1'
                ],
                [
                    'sesi' => 'Sesi 3-4',
                    'nama_kelas' => 'Web Design',
                    'mentor' => 'Budi',
                    'waktu' => '13:00-15:00',
                    'ruangan' => 'Lab Multimedia'
                ]
            ],
            'kamis' => [
                [
                    'sesi' => 'Sesi 1-2', 
                    'nama_kelas' => 'Fun Programming',
                    'mentor' => 'Arif',
                    'waktu' => '09:00-11:00',
                    'ruangan' => 'Lab Komputer 1'
                ],
                [
                    'sesi' => 'Sesi 3-4',
                    'nama_kelas' => 'Web Design',
                    'mentor' => 'Budi',
                    'waktu' => '13:00-15:00',
                    'ruangan' => 'Lab Multimedia'
                ]
            ],
            'jumat' => [
                [
                    'sesi' => 'Sesi 1-2', 
                    'nama_kelas' => 'Fun Programming',
                    'mentor' => 'Arif',
                    'waktu' => '09:00-11:00',
                    'ruangan' => 'Lab Komputer 1'
                ],
                [
                    'sesi' => 'Sesi 3-4',
                    'nama_kelas' => 'Web Design',
                    'mentor' => 'Budi',
                    'waktu' => '13:00-15:00',
                    'ruangan' => 'Lab Multimedia'
                ]
            ],// Hari lainnya dengan struktur yang sama...
        ];

        return view('admin.kelas.index', compact('dataKelas'));
    }

    public function cetakPdf()
    {
        $dataKelas = [
            'Senin' => [
                [
                    'sesi' => 'Sesi 1-2', 
                    'nama_kelas' => 'Fun Programming',
                    'mentor' => 'Arif',
                    'waktu' => '09:00-11:00',
                    'ruangan' => 'Lab Komputer 1'
                ],
                [
                    'sesi' => 'Sesi 3-4',
                    'nama_kelas' => 'Web Design',
                    'mentor' => 'Budi',
                    'waktu' => '13:00-15:00',
                    'ruangan' => 'Lab Multimedia'
                ]
            ],
            'selasa' => [
                [
                    'sesi' => 'Sesi 1-2', 
                    'nama_kelas' => 'Fun Programming',
                    'mentor' => 'Arif',
                    'waktu' => '09:00-11:00',
                    'ruangan' => 'Lab Komputer 1'
                ],
                [
                    'sesi' => 'Sesi 3-4',
                    'nama_kelas' => 'Web Design',
                    'mentor' => 'Budi',
                    'waktu' => '13:00-15:00',
                    'ruangan' => 'Lab Multimedia'
                ]
            ],
            'rabu' => [
                [
                    'sesi' => 'Sesi 1-2', 
                    'nama_kelas' => 'Fun Programming',
                    'mentor' => 'Arif',
                    'waktu' => '09:00-11:00',
                    'ruangan' => 'Lab Komputer 1'
                ],
                [
                    'sesi' => 'Sesi 3-4',
                    'nama_kelas' => 'Web Design',
                    'mentor' => 'Budi',
                    'waktu' => '13:00-15:00',
                    'ruangan' => 'Lab Multimedia'
                ]
            ],
            'kamis' => [
                [
                    'sesi' => 'Sesi 1-2', 
                    'nama_kelas' => 'Fun Programming',
                    'mentor' => 'Arif',
                    'waktu' => '09:00-11:00',
                    'ruangan' => 'Lab Komputer 1'
                ],
                [
                    'sesi' => 'Sesi 3-4',
                    'nama_kelas' => 'Web Design',
                    'mentor' => 'Budi',
                    'waktu' => '13:00-15:00',
                    'ruangan' => 'Lab Multimedia'
                ]
            ],
            'jumat' => [
                [
                    'sesi' => 'Sesi 1-2', 
                    'nama_kelas' => 'Fun Programming',
                    'mentor' => 'Arif',
                    'waktu' => '09:00-11:00',
                    'ruangan' => 'Lab Komputer 1'
                ],
                [
                    'sesi' => 'Sesi 3-4',
                    'nama_kelas' => 'Web Design',
                    'mentor' => 'Budi',
                    'waktu' => '13:00-15:00',
                    'ruangan' => 'Lab Multimedia'
                ]
            ],
        ];
        
        $pdf = PDF::loadView('admin.kelas.pdf', compact('dataKelas'));
        return $pdf->download('daftar-kelas.pdf');
    }
}