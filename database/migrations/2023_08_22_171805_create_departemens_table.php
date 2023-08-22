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
            $table->string('tahun_periode');
            $table->string('nama_departemen');
            $table->string('ketua_departemen');
            $table->string('alamat');
            $table->string('no_tlp');
            $table->string('password');
            $table->string('wakil_ketua');
            $table->string('bendahara');
            $table->string('sekretaris');
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
