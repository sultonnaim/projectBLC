<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('peserta', function (Blueprint $table) {
            $table->id();
            $table->string('nama', 100);
            $table->string('nik', 20)->unique();
            $table->date('tanggal_lahir')->nullable();
            $table->text('alamat')->nullable();
            $table->enum('jenis_kelamin', ['L', 'P']);
            $table->string('kecamatan')->nullable();
            $table->string('kelurahan')->nullable();
            $table->string('email')->nullable();
            $table->string('no_telp')->nullable();
            $table->enum('kategori', ['sd', 'smp', 'sma', 'umum'])->nullable();
            $table->enum('materi', [
                'fun_programing',
                'desain_grafis',
                'aplikasi_perkantoran'
            ])->nullable();
            $table->string('status')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('peserta');
    }
};
