@extends('layouts.admin')

@section('page-title', 'Daftar Peserta')
@section('content')
<div class="content-header">
  <div class="container-fluid">
    <div class="flex flex-col md:flex-row justify-between items-center mb-4">
      <h1 class="text-2xl font-bold text-gray-800">Daftar Peserta</h1>

      <!-- Tombol Tambah Peserta -->
      <a href="{{ route('admin.peserta.create') }}" class="btn btn-primary mt-2 md:mt-0">
        <i class="fas fa-plus"></i> Tambah Peserta
      </a>
    </div>

    <!-- Filter dan Search -->
    <div class="flex flex-col md:flex-row md:items-center gap-4 mb-4">
      <!-- Dropdown Pilih Area -->
      <div class="w-full md:w-1/3">
        <select name="area" id="area" class="form-control">
          <option value="">Pilih Area BLC</option>
          <option value="BLC Surabaya">BLC Surabaya</option>
          <option value="BLC Barat">BLC Barat</option>
          <option value="BLC Timur">BLC Timur</option>
          <!-- Tambah area lain sesuai kebutuhan -->
        </select>
      </div>

      <!-- Search Bar -->
      <div class="w-full md:w-1/3">
        <input type="text" name="search" id="search" class="form-control" placeholder="Cari peserta...">
      </div>
    </div>

    <!-- Table Peserta -->
    <div class="card">
      <div class="card-body p-0">
        <div class="table-responsive">
          <table class="table table-hover table-striped mb-0">
            <thead class="thead-light">
              <tr>
                <th>Nama</th>
                <th>NIK</th>
                <th>Lokasi BLC</th>
                <th>Jenis Kelamin</th>
                <th>Status</th>
                <th>Aksi</th>
              </tr>
            </thead>
            <tbody>
              <!-- Loop data peserta di sini -->
              @forelse ($peserta as $item)
              <tr>
                <td>{{ $item->nama }}</td>
                <td>{{ $item->nik }}</td>
                <td>{{ $item->lokasi_blc }}</td>
                <td>{{ $item->jenis_kelamin }}</td>
                <td>
                  @if ($item->status == 'tervalidasi')
                    <span class="badge badge-success">Tervalidasi</span>
                  @else
                    <span class="badge badge-warning">Belum Validasi</span>
                  @endif
                </td>
                <td>
                  <!-- Tombol Aksi -->
                  <div class="btn-group">
                    <a href="{{ route('admin.peserta.edit', $item->id) }}" class="btn btn-sm btn-warning">
                      <i class="fas fa-edit"></i> Ubah
                    </a>
                    <form action="{{ route('admin.peserta.destroy', $item->id) }}" method="POST" onsubmit="return confirm('Yakin mau hapus?')">
                      @csrf
                      @method('DELETE')
                      <button type="submit" class="btn btn-sm btn-danger">
                        <i class="fas fa-trash"></i> Hapus
                      </button>
                    </form>
                    @if ($item->status == 'tervalidasi')
                      <a href="{{ route('admin.peserta.nonvalidasi', $item->id) }}" class="btn btn-sm btn-secondary">
                        <i class="fas fa-times-circle"></i> Nonvalidasi
                      </a>
                    @else
                      <a href="{{ route('admin.peserta.validasi', $item->id) }}" class="btn btn-sm btn-success">
                        <i class="fas fa-check-circle"></i> Validasi
                      </a>
                    @endif
                  </div>
                </td>
              </tr>
              @empty
              <tr>
                <td colspan="6" class="text-center">Belum ada data peserta.</td>
              </tr>
              @endforelse
            </tbody>
          </table>
        </div>
      </div>

      <!-- Pagination -->
      <div class="card-footer clearfix">
        {{ $peserta->links() }}
      </div>
    </div>
  </div>
</div>
@endsection
