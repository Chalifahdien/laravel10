<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration {
    public function up()
    {
        Schema::create('peran', function (Blueprint $table) {
            $table->id('id_peran');
            $table->string('nama_peran', 50);
            $table->timestamps();
        });

        // Insert initial data
        DB::table('peran')->insert([
            ['nama_peran' => 'Admin'],
            ['nama_peran' => 'Pengguna'],
        ]);
    }

    public function down()
    {
        Schema::dropIfExists('peran');
    }
};
