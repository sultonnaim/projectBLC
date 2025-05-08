<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePesertaTable extends Migration
{
    /**
     * Jalankan migration untuk membuat tabel peserta.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('peserta', function (Blueprint $table) {
            $table->id(); // BIGINT UNSIGNED AUTO_INCREMENT sebagai ID
            $table->string('nama', 255); // kolom nama
            $table->string('nik', 16); // kolom nik
            $table->string('lokasi_blc', 255); // kolom lokasi_blc
            $table->enum('jenis_kelamin', ['Laki-laki', 'Perempuan']); // kolom jenis_kelamin dengan enum
            $table->enum('status', ['tervalidasi', 'belum'])->default('belum'); // kolom status dengan enum, default 'belum'
            $table->timestamps(); // kolom created_at dan updated_at secara otomatis
        });
    }

    /**
     * Balikkan perubahan yang dilakukan oleh migration.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('peserta'); // Hapus tabel peserta jika rollback
    }
}
