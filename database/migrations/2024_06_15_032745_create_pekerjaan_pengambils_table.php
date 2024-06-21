<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('pekerjaan_pengambil', function (Blueprint $table) {
            $table->unsignedBigInteger('id_pengambil');
            $table->unsignedBigInteger('id_pekerjaan');
            $table->timestamp('tanggal_diambil')->useCurrent();
            $table->primary(['id_pengambil', 'id_pekerjaan']);
            $table->foreign('id_pengambil')->references('id_pengguna')->on('users');
            $table->foreign('id_pekerjaan')->references('id_pekerjaan')->on('pekerjaan');
        });
    }

    public function down()
    {
        Schema::dropIfExists('pekerjaan_pengambil');
    }
};
