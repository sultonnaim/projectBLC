<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
{
    Schema::create('lokasiblc', function (Blueprint $table) {
        $table->id();
        $table->string('wilayah'); // Contoh: "BLC Grudo"
        $table->string('area'); // Contoh: "Surabaya Pusat"
        $table->string('link_maps'); // URL Google Maps
        $table->timestamps();
    });
}

};
