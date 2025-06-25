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
        Schema::create('lokasiblc', function (Blueprint $table) {
            $table->id();
            $table->string('wilayah');
            $table->string('area');
            $table->text('link_maps');
            $table->timestamps();
        });
        
    }

};
