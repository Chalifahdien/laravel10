<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('umpan_balik', function (Blueprint $table) {
            $table->id('id_umpan_balik');
            $table->unsignedBigInteger('id_pekerjaan');
            $table->unsignedBigInteger('id_pengguna');
            $table->integer('penilaian')->check('penilaian BETWEEN 1 AND 5');
            $table->text('teks_umpan_balik')->nullable();
            $table->timestamp('tanggal_dibuat')->useCurrent();
            $table->foreign('id_pekerjaan')->references('id_pekerjaan')->on('pekerjaan');
            $table->foreign('id_pengguna')->references('id_pengguna')->on('users');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('umpan_balik');
    }
};
