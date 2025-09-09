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
        Schema::create('TB_PROJECT', function (Blueprint $table) {
            $table->bigIncrements('ID_PROJECT');
            $table->string('KODE_PROJECT', 50)->unique();
            $table->string('NAMA_PROJECT', 150);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('TB_PROJECT');
    }
};
