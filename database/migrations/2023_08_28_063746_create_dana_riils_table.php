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
        Schema::create('dana_riils', function (Blueprint $table) {
            $table->id();
            $table->string('supplier_id');
            $table->unsignedBigInteger('proker_id');
            $table->unsignedBigInteger('harga_satuan');
            $table->unsignedBigInteger('quantity');
            $table->unsignedBigInteger('total_harga');
            $table->string('bukti');
            $table->unsignedBigInteger('status_id')->default('3');
            $table->softDeletes(); 
            $table->timestamps();

            $table->foreign('proker_id')->references('id')->on('prokers');
            $table->foreign('status_id')->references('id')->on('status');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('dana_riils');
    }
};
