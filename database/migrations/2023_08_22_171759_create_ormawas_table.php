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
        Schema::create('ormawas', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->string('tahun_periode');
            $table->string('ketua')->nullable();
            $table->string('wakil')->nullable();
            $table->string('bendahara')->nullable();
            $table->string('sekretaris')->nullable();
            $table->string('ketua_pengawas')->nullable();
            $table->string('fakultas')->nullable();
            $table->string('alamat')->nullable();
            $table->string('no_telp')->nullable();
            $table->softDeletes(); 
            $table->timestamps();

            // Define foreign key relationship
            $table->foreign('user_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ormawas');
    }
};
