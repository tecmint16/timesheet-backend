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
        Schema::table('tb_cluster', function (Blueprint $table) {
            $table->unsignedBigInteger('id_project')->nullable()->after('id_cluster');
            $table->foreign('id_project')
                ->references('id_project')->on('tb_project')
                ->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('tb_cluster', function (Blueprint $table) {
            $table->dropForeign(['id_project']);
            $table->dropColumn('id_project');
        });
    }
};
