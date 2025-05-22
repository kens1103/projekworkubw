<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
{
    Schema::create('portofolios', function (Blueprint $table) {
    $table->id();
    $table->string('title');                // Judul portofolio
    $table->text('description');            // Deskripsi
    $table->string('image');                // Foto utama
    $table->string('pdf_path')->nullable(); // File PDF katalog (opsional)
    $table->string('category')->nullable(); // Kategori (opsional)
    $table->timestamps();
});
}

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::dropIfExists('portofolios');
    }
};
