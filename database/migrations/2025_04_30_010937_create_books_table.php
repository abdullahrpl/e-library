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
        Schema::create('books', function (Blueprint $table) {
            $table->id();
            $table->string('judulbuku');
            $table->string('penulis');
            $table->string('publisher');
            $table->integer('tahunterbit');
            $table->integer('jumlahhalaman');
            $table->string('coverbuku')->nullable();
            $table->longText('deskripsi')->nullable();
            $table->string('kategori');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('books');
    }
};
