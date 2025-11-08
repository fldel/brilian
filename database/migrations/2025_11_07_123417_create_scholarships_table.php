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
        Schema::create('scholarships', function (Blueprint $table) {
            $table->id();
            $table->string('name'); // Nama beasiswa
            $table->text('description'); // Deskripsi beasiswa
            $table->string('image')->nullable(); // Gambar beasiswa
            $table->string('link'); // Link pendaftaran
            $table->boolean('is_available')->default(true); // Tersedia atau tidak
            $table->date('start_date'); // Tanggal mulai
            $table->date('end_date'); // Tanggal berakhir
            $table->enum('category', ['d1', 'd2', 'd3', 'd4', 's1', 's2', 's3']); // Kategori
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('scholarships');
    }
};
