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
        Schema::create('prokers', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('departemen_id');
            $table->string('tahun_proker');
            $table->string('nama');
            $table->string('ketua');
            $table->string('bendahara');
            $table->bigInteger('rkat');
            $table->bigInteger('bptn');
            $table->string('Proposal');
            $table->text('keterangan')->nullable();
            $table->decimal('dana', 10, 2)->nullable();
            $table->timestamps();

            // Define foreign key relationships
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('departemen_id')->references('id')->on('departemens');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('prokers');
    }
};
