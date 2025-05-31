<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Kelas;
use App\Models\Peserta;
use Illuminate\Http\Request;
use PDF;

class KelasController extends Controller
{
public function index(Request $request)
{
    
    $hariList = ['Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat'];
    
    $dataKelas = [];
    foreach ($hariList as $hari) {
        $dataKelas[$hari] = Kelas::whereJsonContains('hari', $hari)
            ->where('status_aktif', true)
            ->get()
            ->groupBy('sesi');
    }

    $query = Kelas::query();
    
    if ($request->has('search') && !empty($request->search)) {
        $query->where('materi', 'like', '%'.$request->search.'%')
              ->orWhere('nama_kelas', 'like', '%'.$request->search.'%');
    }
    
    $allKelas = $query->paginate(10);

    return view('admin.kelas.index', compact('dataKelas', 'allKelas'));
}
    
    private function generateJadwalKelas()
    {
        $hari = ['Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat'];
        $sesi = ['Sesi 1', 'Sesi 2', 'Sesi 3', 'Sesi 4', 'Sesi 5'];
        
        $jadwal = [];
        
        foreach ($hari as $day) {
            $kelasHari = Kelas::whereJsonContains('hari', $day)
                            ->where('status_aktif', true)
                            ->get();
            
            $jadwal[$day] = $kelasHari->groupBy('sesi');
        }
        
        return $jadwal;
    }
    
    public function create()
    {
        $pesertas = Peserta::all();
        return view('admin.kelas.create', compact('pesertas'));
    }
    
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama_kelas' => 'required',
            'hari' => 'required|array',
            'sesi' => 'required',
            'jam_mulai' => 'required',
            'jam_selesai' => 'required',
            'materi' => 'required',
            'ruangan' => 'required',
            'tanggal_mulai' => 'required|date',
            'pesertas' => 'nullable|array'
        ]);
        
        $kelas = Kelas::create($validated);
        
        if ($request->has('pesertas')) {
            $kelas->pesertas()->attach($request->pesertas);
        }
        
       $kelas = Kelas::create($validated);
    
    // Debug 1: Cek data yang masuk
    \Log::debug('Data yang disimpan:', $kelas->toArray());
    
    if ($request->has('pesertas')) {
        $kelas->pesertas()->attach($request->pesertas);
        // Debug 2: Cek relasi
        \Log::debug('Peserta terattach:', $kelas->pesertas->toArray());
    }
    
    return redirect()->route('admin.kelas.index')
                   ->with('success', 'Kelas berhasil dibuat');
    }
    
    public function toggleStatus(Kelas $kelas)
    {
        $kelas->update(['status_aktif' => !$kelas->status_aktif]);
        
        return back()->with('success', 'Status kelas berhasil diubah');
    }
    
    public function cetakPdf()
{
    $hariList = ['Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat'];
    
    $dataKelas = [];
    foreach ($hariList as $hari) {
        $dataKelas[$hari] = Kelas::whereJsonContains('hari', $hari)
            ->where('status_aktif', true)
            ->get()
            ->groupBy('sesi');
    }

    $pdf = PDF::loadView('admin.kelas.pdf', [
        'dataKelas' => $dataKelas,
        'tanggalCetak' => now()->format('d F Y H:i')
    ]);
    
    return $pdf->download('jadwal-kelas-'.now()->format('Y-m-d').'.pdf');
}

public function peserta(Kelas $kelas)
{
    $pesertas = Peserta::whereNotIn('id', $kelas->pesertas->pluck('id'))->get();
    return view('admin.kelas.peserta', compact('kelas', 'pesertas'));
}

public function tambahPeserta(Request $request, Kelas $kelas)
{
    $kelas->pesertas()->attach($request->peserta_id);
    return back()->with('success', 'Peserta ditambahkan');
}

public function destroy(Kelas $kelas)
{
    try {
        $kelas->pesertas()->detach();

        $kelas->delete();
        
        return back()->with('success', 'Kelas berhasil dihapus');
    } catch (\Exception $e) {
        return back()->with('error', 'Gagal menghapus kelas: ' . $e->getMessage());
    }
}


}