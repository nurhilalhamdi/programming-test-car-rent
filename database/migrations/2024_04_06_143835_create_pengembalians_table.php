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
        Schema::create('pengembalians', function (Blueprint $table) {
            $table->id();
            $table->string('merk');
            $table->string('model');
            $table->string('plat_nomor');
            $table->string('harga_perhari');
            $table->date('tanggal_mulai');
            $table->date('tanggal_selesai');
            $table->string('jumlah_hari');
            $table->string('total_tarif');
            $table->integer('id_user');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pengembalian');
    }
};
