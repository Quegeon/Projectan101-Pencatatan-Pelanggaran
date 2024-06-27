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
        Schema::create('siswas', function (Blueprint $table) {
            $table->string('nis', 15)
                ->primary();
            $table->string('id_kelas');
            $table->string('nama', 100);
            $table->string('no_telp', 13);
            $table->integer('poin');
            $table->string('alamat', 255)
                ->nullable();
            $table->string('status');
            $table->string('password')->nullable();
            $table->string('view_password')->nullable();
            $table->timestamps();
            // $table->foreign('id_kelas')->references('id')->on('kelas')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('siswas');
    }
};
