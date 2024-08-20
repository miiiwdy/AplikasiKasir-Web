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
        Schema::create('checkout', function (Blueprint $table) {
            $table->id();
            $table->string('kode_barang');
            $table->integer('quantity');
            $table->decimal('price', 10, 2);    
            $table->string('metode_pembayaran');
            $table->timestamps();

            $table->foreign('kode_barang')
                ->references('kode_barang')
                ->on('barangs')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('checkout');
    }
};
