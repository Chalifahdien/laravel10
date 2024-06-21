<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('komentar', function (Blueprint $table) {
            $table->id('id_komentar');
            $table->unsignedBigInteger('id_pekerjaan');
            $table->unsignedBigInteger('id_pengguna');
            $table->text('teks_komentar');
            $table->timestamp('tanggal_dibuat')->useCurrent();
            $table->foreign('id_pekerjaan')->references('id_pekerjaan')->on('pekerjaan');
            $table->foreign('id_pengguna')->references('id_pengguna')->on('users');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('komentar');
    }
};
