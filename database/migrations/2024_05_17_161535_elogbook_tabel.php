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
        Schema::create('elogbook', function (Blueprint $table) {
            $table->id('no');
            $table->string('uid', 64)->unique();
            $table->string('username');
            $table->string('user_id');
            $table->date('bulan');
            $table->date('tahun');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('elogbook');
    }
};
