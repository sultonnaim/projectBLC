<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('sosialisasi_foto', function (Blueprint $table) {
            $table->id();
            $table->date('tanggal');
            $table->string('sesi', 50);
            $table->text('keterangan')->nullable();
            $table->string('path_foto');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('sosialisasi_foto');
    }
};