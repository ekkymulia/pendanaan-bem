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
            // $table->string('tahun_proker');
            $table->string('nama');
            $table->string('ketua');
            $table->string('bendahara');
            $table->string('file_proposal');
            $table->string('file_lpj')->nullable();
            $table->text('keterangan')->nullable();
            $table->unsignedBigInteger('dana')->default(0);
            // $table->decimal('dana', 10, 2)->nullable();
            $table->unsignedBigInteger('tipe_dana_id')->nullable();
            $table->unsignedBigInteger('status_id')->default(3);
            $table->softDeletes(); 
            $table->timestamps();

            // Define foreign key relationships
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('departemen_id')->references('id')->on('departemens');
            $table->foreign('tipe_dana_id')->references('id')->on('tipe_danas');
            $table->foreign('status_id')->references('id')->on('status');
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
