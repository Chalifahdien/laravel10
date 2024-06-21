<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('notifikasi', function (Blueprint $table) {
            $table->id('id_notifikasi');
            $table->unsignedBigInteger('id_pengguna');
            $table->text('pesan');
            $table->boolean('telah_dibaca')->default(false);
            $table->timestamp('tanggal_dibuat')->useCurrent();
            $table->foreign('id_pengguna')->references('id_pengguna')->on('users');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('notifikasi');
    }
};
