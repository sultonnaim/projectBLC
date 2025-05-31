<!-- Hapus dependensi gambar GD -->
<div class="header">
    <h1>Jadwal Kelas BLC Surabaya</h1>
    <p>Periode: {{ now()->format('d F Y') }}</p>
</div>

<table class="table">
    <thead>
        <tr>
            <th>Hari</th>
            @foreach(['Sesi 1', 'Sesi 2', 'Sesi 3', 'Sesi 4', 'Sesi 5'] as $sesi)
                <th>{{ $sesi }}</th>
            @endforeach
        </tr>
    </thead>
    <tbody>
        @foreach($dataKelas as $hari => $sesiKelas)
        <tr>
            <td class="day-header">{{ $hari }}</td>
            @foreach(['Sesi 1', 'Sesi 2', 'Sesi 3', 'Sesi 4', 'Sesi 5'] as $sesi)
                <td>
                    @if(isset($sesiKelas[$sesi]))
                        @foreach($sesiKelas[$sesi] as $kelas)
                            <div class="mb-2">
                                <strong>{{ $kelas->nama_kelas }}</strong><br>
                                {{ $kelas->materi }}<br>
                                <small>
                                    {{ $kelas->ruangan }} | 
                                    {{ $kelas->pesertas_count }} peserta
                                </small>
                            </div>
                        @endforeach
                    @else
                        <span class="text-gray-400">-</span>
                    @endif
                </td>
            @endforeach
        </tr>
        @endforeach
    </tbody>
</table>