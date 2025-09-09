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
        Schema::table('users', function (Blueprint $table) {
            // Tambah kolom foreign key
            $table->unsignedBigInteger('id_project')->nullable()->after('id_user');
            $table->unsignedBigInteger('id_aplikasi')->nullable()->after('id_project');
            $table->unsignedBigInteger('id_cluster')->nullable()->after('id_aplikasi');

            // Relasi ke tb_project
            $table->foreign('id_project')
                ->references('id_project')->on('tb_project')
                ->onDelete('set null');

            // Relasi ke tb_aplikasi
            $table->foreign('id_aplikasi')
                ->references('id_aplikasi')->on('tb_aplikasi')
                ->onDelete('set null');

            // Relasi ke tb_cluster
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
        Schema::table('users', function (Blueprint $table) {
            $table->dropForeign(['id_project']);
            $table->dropForeign(['id_aplikasi']);
            $table->dropForeign(['id_cluster']);

            $table->dropColumn(['id_project', 'id_aplikasi', 'id_cluster']);
        });
    }
};
