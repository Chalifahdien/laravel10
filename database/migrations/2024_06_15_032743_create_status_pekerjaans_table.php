<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration {
    public function up()
    {
        Schema::create('status_pekerjaan', function (Blueprint $table) {
            $table->id('id_status');
            $table->string('nama_status', 50);
            $table->timestamps();
        });

        // Insert initial data
        DB::table('status_pekerjaan')->insert([
            ['nama_status' => 'Menunggu'],        //1
            ['nama_status' => 'Sedang Diproses'], //2
            ['nama_status' => 'Tersedia'],        //3
            ['nama_status' => 'Selesai'],         //4
            ['nama_status' => 'Dibatalkan']       //5  
        ]);
    }

    public function down()
    {
        Schema::dropIfExists('status_pekerjaan');
    }
};
