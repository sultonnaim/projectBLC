<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Kelas;
use App\Models\Peserta;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
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

    $validated = $request->validate([
        // validasi lainnya...
        'pesertas' => 'nullable|array',
        'pesertas.*' => 'exists:pesertas,id'
    ]);

    DB::beginTransaction();
    try {
        $kelas = Kelas::create($validated);

        if ($request->has('pesertas')) {
            $pesertaData = [];
            foreach ($request->pesertas as $pesertaId) {
                $pesertaData[$pesertaId] = [
                    'status' => 'aktif',
                    'tanggal_daftar' => now()->format('Y-m-d')
                ];
            }
            $kelas->pesertas()->attach($pesertaData);
        }

        DB::commit();
        
        return redirect()->route('admin.kelas.index')
                        ->with('success', 'Kelas berhasil dibuat dengan peserta');
    } catch (\Exception $e) {
        DB::rollBack();
        return back()->withInput()->with('error', 'Gagal membuat kelas: '.$e->getMessage());
    }
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
        'nama_kelas'    => 'required|string|max:100',
        'hari'          => 'required|array',
        'hari.*'        => 'in:Senin,Selasa,Rabu,Kamis,Jumat',
        'sesi'          => 'required|in:Sesi 1,Sesi 2,Sesi 3,Sesi 4,Sesi 5',
        'jam_mulai' => 'required|date_format:H:i',
        'jam_selesai' => 'required|date_format:H:i|after:jam_mulai',
        'materi'        => 'required|in:Fun Programming,Desain Grafis,Aplikasi Perkantoran,Digital Marketing,Data Science',
        'tanggal_mulai' => 'required|date',
        'pesertas'      => 'nullable|array',
        'pesertas.*'    => 'exists:peserta,id',
    ]);

    DB::transaction(function () use ($validated, $request) {
        $kelas = Kelas::create([
            'nama_kelas'    => $validated['nama_kelas'],
            'hari'          => $validated['hari'],
            'sesi'          => $validated['sesi'],
            'jam_mulai'     => $validated['jam_mulai'],
            'jam_selesai'   => $validated['jam_selesai'],
            'materi'        => $validated['materi'],
            'tanggal_mulai' => $validated['tanggal_mulai'],
        ]);


        if (!empty($validated['pesertas'])) {
            $pivot = collect($validated['pesertas'])
                        ->mapWithKeys(fn ($id) => [$id => [
                            'status'          => 'aktif',
                            'tanggal_daftar'  => now()->toDateString(),
                        ]])->all();

            $kelas->pesertas()->attach($pivot);
        }
    });

    return redirect()
            ->route('admin.kelas.index')
            ->with('success', 'Kelas berhasil ditambahkan');
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

public function edit(Kelas $kelas)
{
    return view('admin.kelas.edit', compact('kelas'));
}

// Method update untuk memproses data
public function update(Request $request, Kelas $kelas)
{
    $validated = $request->validate([
        'nama_kelas' => 'required|string|max:100',
        'hari' => 'required|array',
        'sesi' => 'required|string',
        'jam_mulai' => 'required|date_format:H:i',
        'jam_selesai' => 'required|date_format:H:i|after:jam_mulai',
        'materi' => 'required|string',
        'tanggal_mulai' => 'required|date',
    ]);

    // Encode array hari ke JSON
    $validated['hari'] = json_encode($validated['hari']);

    $kelas->update($validated);

    return redirect()->route('admin.kelas.index')
                ->with('success', 'Kelas berhasil diperbarui');
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

public function kelolaPeserta(Kelas $kelas)
{
    $pesertasTerdaftar = $kelas->pesertas()->pluck('id')->toArray();
    $semuaPeserta = Peserta::whereNotIn('id', $pesertasTerdaftar)->get();
    
    return view('admin.kelas.kelola-peserta', compact('kelas', 'semuaPeserta', 'pesertasTerdaftar'));
}

public function simpanPeserta(Request $request, Kelas $kelas)
{
    $request->validate([
        'pesertas' => 'required|array',
        'pesertas.*' => 'exists:pesertas,id'
    ]);

    $pesertaData = [];
    foreach ($request->pesertas as $pesertaId) {
        $pesertaData[$pesertaId] = [
            'status' => 'aktif',
            'tanggal_daftar' => now()->format('Y-m-d')
        ];
    }

    $kelas->pesertas()->attach($pesertaData);

    return redirect()->route('admin.kelas.index')
                    ->with('success', 'Peserta berhasil ditambahkan ke kelas');
}

public function hapusPeserta(Kelas $kelas, Peserta $peserta)
{
    $kelas->pesertas()->detach($peserta->id);
    
    return back()->with('success', 'Peserta berhasil dihapus dari kelas');
}
}