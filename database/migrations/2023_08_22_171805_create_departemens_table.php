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
        Schema::create('departemens', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('ormawa_id');
            $table->unsignedBigInteger('user_id'); // Added user_id
            $table->string('tahun_periode')->nullable();
            $table->string('nama_departemen')->nullable();
            $table->string('ketua_departemen')->nullable();
            $table->string('alamat')->nullable();
            $table->string('email')->nullable();
            $table->string('no_tlp')->nullable();
            $table->string('password')->nullable();
            $table->string('wakil_ketua')->nullable();
            $table->string('bendahara')->nullable();
            $table->string('sekretaris')->nullable();
            $table->text('deskripsi_departemen')->nullable();
            $table->timestamps();

            // Define foreign key relationships
            $table->foreign('ormawa_id')->references('id')->on('ormawas');
            $table->foreign('user_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('departemens');
    }
};
