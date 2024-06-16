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
        Schema::create('log_poins', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('id_user')->nullable();
            $table->string('id_bk');
            $table->string('id_kelas')->nullable();
            $table->integer('poin_asal')->nullable();
            $table->integer('poin_perubahan')->nullable();
            $table->boolean('is_reset')->default(false);
            $table->string('keterangan')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('log_poins');
    }
};
