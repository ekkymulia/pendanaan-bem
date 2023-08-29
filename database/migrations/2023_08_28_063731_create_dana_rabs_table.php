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
        Schema::create('dana_rab', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->unsignedBigInteger('proker_id');
            $table->unsignedBigInteger('harga_satuan');
            $table->unsignedBigInteger('quantity');
            $table->unsignedBigInteger('total_harga');
            $table->string('tempat_pembelian');
            $table->unsignedBigInteger('status_dana_id');
            $table->timestamps();

            $table->foreign('proker_id')->references('id')->on('prokers');
            $table->foreign('status_dana_id')->references('id')->on('status_dana');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('dana_rab');
    }
};
