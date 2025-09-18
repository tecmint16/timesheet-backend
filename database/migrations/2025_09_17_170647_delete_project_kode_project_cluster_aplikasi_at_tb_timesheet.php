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
        Schema::table('tb_timesheet', function (Blueprint $table) {
            $table->dropColumn(['PROJECT', 'KODE_PROJECT', 'CLUSTER', 'APLIKASI']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('tb_timesheet', function (Blueprint $table) {
            $table->string('PROJECT')->nullable();
            $table->string('KODE_PROJECT')->nullable();
            $table->string('CLUSTER')->nullable();
            $table->string('APLIKASI')->nullable();
        });
    }
};
