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
        Schema::create('TB_TIMESHEET', function (Blueprint $table) {
            $table->id();
            $table->date('TANGGAL');
            $table->integer('SHIFTING');
            $table->time('JAM_MASUK');
            $table->time('JAM_PULANG');
            $table->integer('TOTAL_JAM_KERJA');
            $table->string('STATUS_KEHADIRAN', 50);
            $table->string('PROJECT', 100);
            $table->string('KODE_PROJECT', 50);
            $table->string('CLUSTER', 100)->nullable();
            $table->string('APLIKASI', 100)->nullable();
            $table->string('KEGIATAN', 255)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('TB_TIMESHEET');
    }
};
