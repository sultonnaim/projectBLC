<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
{
    Schema::table('lokasiblc', function (Blueprint $table) {
        $table->string('foto')->nullable()->after('link_maps');
    });
}

public function down()
{
    Schema::table('lokasiblc', function (Blueprint $table) {
        $table->dropColumn('foto');
    });
}

};
