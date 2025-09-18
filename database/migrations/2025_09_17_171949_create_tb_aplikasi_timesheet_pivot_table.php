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
        Schema::create('tb_aplikasi_timesheet', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_timesheet'); // Foreign key ke tabel timesheet
            $table->unsignedBigInteger('id_aplikasi'); // Foreign key ke tabel tb_aplikasi
            $table->timestamps();

            $table->foreign('id_timesheet')
                ->references('id')
                ->on('tb_timesheet')
                ->onDelete('cascade');

            $table->foreign('id_aplikasi')
                ->references('id_aplikasi')
                ->on('tb_aplikasi')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tb_aplikasi_timesheet');
    }
};
