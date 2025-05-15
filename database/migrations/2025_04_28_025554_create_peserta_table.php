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
            $table->id(); 
            $table->string('nama', 255);
            $table->string('nik', 16); 
            $table->string('lokasi_blc', 255); 
            $table->enum('jenis_kelamin', ['Laki-laki', 'Perempuan']);
            $table->enum('status', ['tervalidasi', 'belum'])->default('belum'); 
            $table->timestamps(); 
        });
    }

    /**
     * Balikkan perubahan yang dilakukan oleh migration.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('peserta'); 
    }
}
