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
       Schema::create('kelas', function (Blueprint $table) {
    $table->id();
    $table->string('nama_kelas', 100);
    $table->json('hari'); 
    $table->enum('sesi', ['Sesi 1', 'Sesi 2', 'Sesi 3', 'Sesi 4', 'Sesi 5']);
    $table->time('jam_mulai');
    $table->time('jam_selesai');
    $table->enum('materi', ['Fun Programming', 'Desain Grafis', 'Aplikasi Perkantoran', 'Digital Marketing', 'Data Science']);
    $table->date('tanggal_mulai');
    $table->boolean('status_aktif')->default(true);
    $table->softDeletes(); 
    $table->timestamps();
});

Schema::create('kelas_peserta', function (Blueprint $table) {
    $table->foreignId('kelas_id')->constrained()->onDelete('cascade');

    $table->id();
    $table->string('nama');
    $table->timestamps();

    $table->foreignId('peserta_id')
            ->constrained('peserta')
            ->onDelete('cascade');

    $table->enum('status', ['aktif','selesai','dropout'])->default('aktif');
    $table->date('tanggal_daftar')->default(now());
    $table->primary(['kelas_id', 'peserta_id']);
});

    }

   public function down(): void
{
    Schema::dropIfExists('kelas_materi');
    Schema::dropIfExists('kelas_peserta');
    Schema::dropIfExists('kelas');        
}
};
