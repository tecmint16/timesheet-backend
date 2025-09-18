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
            $table->unsignedBigInteger('id_user')->nullable()->after('kegiatan');
            $table->unsignedBigInteger('id_project')->nullable()->after('tanggal');
            $table->unsignedBigInteger('id_cluster')->nullable()->after('status_kehadiran');

            $table->foreign('id_user')
                ->references('id')->on('users')
                ->onDelete('set null');

            $table->foreign('id_project')
                ->references('id_project')->on('tb_project')
                ->onDelete('set null');

            $table->foreign('id_cluster')
                ->references('id_cluster')->on('tb_cluster')
                ->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('tb_timesheet', function (Blueprint $table) {
            $table->dropForeign(['id_user']);
            $table->dropForeign(['id_project']);
            $table->dropForeign(['id_cluster']);

            $table->dropColumn('id_user', 'id_project', 'id_cluster');
        });
    }
};
