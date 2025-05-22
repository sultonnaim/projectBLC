<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('pengunjung', function (Blueprint $table) {
    $table->id();
    $table->date('tanggal');
    $table->string('sesi');
    $table->string('nama_lengkap');
    $table->text('alamat');
    $table->enum('jenis_kelamin', ['L', 'P']);
    $table->date('tanggal_lahir');
    $table->enum('kategori', ['SD', 'SMP', 'SMA', 'Umum']);
    $table->timestamps();
});
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pengunjungs');
    }
};