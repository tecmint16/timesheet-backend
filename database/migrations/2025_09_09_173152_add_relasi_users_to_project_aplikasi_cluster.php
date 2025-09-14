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
            $table->unsignedBigInteger('id_cluster')->nullable()->after('id_project');

            // Relasi ke tb_project
            $table->foreign('id_project')
                ->references('id_project')->on('tb_project')
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
            $table->dropForeign(['id_cluster']);

            $table->dropColumn(['id_project', 'id_cluster']);
        });
    }
};
