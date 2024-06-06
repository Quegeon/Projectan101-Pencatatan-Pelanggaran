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
        Schema::create('pelanggarans', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->boolean('is_active')->default(1);
            $table->string('hukuman_pilihan')
                ->nullable();
            $table->string('id_bk')
                ->nullable();
            $table->string('no_pelanggaran');
            $table->string('nis');
            $table->string('id_user')
                ->nullable();
            $table->date('tgl_pelanggaran');
            $table->string('keterangan');
            $table->string('status', 20)
                ->default('Belum');
            $table->integer('total_poin')
                ->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pelanggarans');
    }
};
