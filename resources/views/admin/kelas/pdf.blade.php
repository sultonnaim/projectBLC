<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Jadwal Kelas BLC Surabaya</title>
    <style>
        body { font-family: Arial, sans-serif; }
        .header { text-align: center; margin-bottom: 20px; }
        .table { width: 100%; border-collapse: collapse; }
        .table th { background-color: #f3f4f6; text-align: left; padding: 8px; }
        .table td { padding: 8px; border-bottom: 1px solid #e5e7eb; }
        .day-header { background-color: #e5e7eb; font-weight: bold; }
    </style>
</head>
<body>
    <div class="header">
        <h1>Jadwal Kelas</h1>
        <p>BLC Surabaya - {{ date('d F Y') }}</p>
    </div>

    <table class="table">
        @foreach($dataKelas as $hari => $kelas)
        <tr class="day-header">
            <td colspan="4">{{ $hari }}</td>
        </tr>
        @foreach($kelas as $item)
        <tr>
            <td width="25%">{{ $item['sesi'] }}</td>
            <td width="30%">{{ $item['nama_kelas'] }}</td>
            <td width="20%">{{ $item['mentor'] }}</td>
            <td width="25%">{{ $item['waktu'] }} ({{ $item['ruangan'] }})</td>
        </tr>
        @endforeach
        @endforeach
    </table>
</body>
</html>