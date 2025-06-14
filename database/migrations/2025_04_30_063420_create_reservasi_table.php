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
        Schema::create('reservasi', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_pelanggan')->constrained('pelanggan')->onDelete('cascade');
            $table->foreignId('id_paket_wisata')->constrained('paket_wisata')->onDelete('cascade');
            $table->dateTime('tgl_reservasi_wisata');
            $table->dateTime('tgl_selesai_reservasi');
            $table->integer('harga');
            $table->integer('jumlah_peserta');
            $table->decimal('diskon', 10, 0);
            $table->float('nilai_diskon');
            $table->bigInteger('total_bayar');
            $table->text('file_bukti_tf');
            $table->enum('status_reservasi_wisata', ['pesan', 'dibayar', 'selesai', 'dibatalkan']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reservasi');
    }
};
