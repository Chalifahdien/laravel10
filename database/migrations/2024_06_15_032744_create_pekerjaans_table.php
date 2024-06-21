<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('pekerjaan', function (Blueprint $table) {
            $table->id('id_pekerjaan');
            $table->unsignedBigInteger('id_pengguna');
            $table->unsignedBigInteger('id_pengambil')->nullable();
            $table->string('judul', 100);
            $table->text('deskripsi');
            $table->string('kategori', 50)->nullable();
            $table->date('tenggat_waktu')->nullable();
            $table->string('lampiran', 255)->nullable();
            $table->unsignedBigInteger('id_status');
            $table->timestamp('tanggal_dibuat')->useCurrent();
            $table->timestamp('tanggal_diperbarui')->useCurrent()->useCurrentOnUpdate();
            $table->foreign('id_pengguna')->references('id_pengguna')->on('users');
            $table->foreign('id_status')->references('id_status')->on('status_pekerjaan');
            $table->foreign('id_pengambil')->references('id_pengguna')->on('users');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('pekerjaan');
    }
};
