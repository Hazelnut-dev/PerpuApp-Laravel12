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
        Schema::create('buku', function (Blueprint $table) {
            $table->string('KodeBuku')->primary();
            $table->string('NoUDC');
            $table->string('Judul');
            $table->string('Penerbit');
            $table->string('Pengarang');
            $table->date('TahunTerbit');
            $table->text('Deskripsi')->nullable();
            $table->string('ISBN')->unique();
            $table->integer('Stok')->default(0);
            $table->integer('Rusak')->default(0);
            $table->integer('Total')->default(0);
            $table->foreignId('kategori_id')->constrained('kategoris')->onDelete('cascade');
            $table->foreignId('rak_id')->constrained('raks')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('buku');
    }
};
