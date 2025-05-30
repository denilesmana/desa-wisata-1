<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

use function Laravel\Prompts\text;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('obyek_wisata', function (Blueprint $table) {
            $table->id();
            $table->string('nama_wisata', 255);
            $table->text('deskripsi_wisata');
            $table->foreignId('id_kategori_wisata')->constrained('kategori_wisata')->onDelete('cascade')->onUpdate('cascade');
            $table->text('fasilitas');
            $table->text('foto1');
            $table->text('foto2')->nullable();
            $table->text('foto3')->nullable();
            $table->text('foto4')->nullable();
            $table->text('foto5')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('obyek_wisata');
    }
};
