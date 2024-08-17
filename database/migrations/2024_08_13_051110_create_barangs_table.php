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
    Schema::create('barangs', function (Blueprint $table) {
        $table->id();
        $table->string('nama_barang')->charset('utf8mb4')->collation('utf8mb4_unicode_ci');
        $table->decimal('harga', 10, 2); 
        $table->string('kode_barang')->unique()->charset('utf8mb4')->collation('utf8mb4_unicode_ci');
        $table->integer('stok');
        $table->string('kategori')->charset('utf8mb4')->collation('utf8mb4_unicode_ci');
        $table->string('foto_barang')->nullable()->charset('utf8mb4')->collation('utf8mb4_unicode_ci'); 
        $table->timestamps();
    });
    
}


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('barangs');
    }
};
