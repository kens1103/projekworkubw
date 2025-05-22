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
        Schema::create('portofolio_images', function (Blueprint $table) {
    $table->id();
    $table->foreignId('portofolio_id')->constrained()->onDelete('cascade');
    $table->string('image'); // Nama file gambar tambahan
    $table->timestamps();
});

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('portofolio_images');
    }
};
