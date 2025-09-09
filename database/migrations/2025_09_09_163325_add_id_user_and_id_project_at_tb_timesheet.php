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
            $table->string('id_user')->nullable()->after('tanggal');
            $table->string('id_project')->nullable()->after('status_kehadiran');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('tb_timesheet', function (Blueprint $table) {
            $table->dropColumn(['id_user', 'id_project']);
        });
    }
};
