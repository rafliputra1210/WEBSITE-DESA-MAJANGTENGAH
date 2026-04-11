<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('profil_desas', function (Blueprint $table) {
            $table->id();
            $table->string('nama_desa')->default('Majangtengah');
            $table->string('tagline')->nullable();
            $table->string('kecamatan')->nullable();
            $table->string('kabupaten')->nullable();
            $table->string('provinsi')->nullable();
            $table->string('kode_pos')->nullable();
            $table->text('alamat')->nullable();
            $table->string('telepon')->nullable();
            $table->string('email')->nullable();
            $table->text('visi')->nullable();
            $table->text('misi')->nullable();
            $table->text('sejarah')->nullable();
            $table->string('nama_kades')->nullable();
            $table->string('masa_jabatan')->nullable();
            $table->text('sambutan')->nullable();
            $table->string('foto_kades')->nullable();
            $table->string('jumlah_penduduk')->nullable();
            $table->string('jumlah_kk')->nullable();
            $table->string('luas_wilayah')->nullable();
            $table->string('jumlah_rt')->nullable();
            $table->string('jumlah_rw')->nullable();
            $table->string('jumlah_rtrw')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('profil_desas');
    }
};
