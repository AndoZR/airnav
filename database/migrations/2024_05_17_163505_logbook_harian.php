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
        Schema::create('elogbook_harian', function (Blueprint $table) {
            $table->id('no');
            $table->string('elogbook_uid', 64)->unique();
            $table->string('username')->nullable();
            $table->string('user_id')->nullable();
            $table->string('day')->nullable();
            $table->string('month')->nullable();
            $table->string('year')->nullable();
            $table->time('morning_ctr')->nullable();
            $table->time('morning_ass')->nullable();
            $table->time('morning_rest')->nullable();
            $table->time('afternoon_ctr')->nullable();
            $table->time('afternoon_ass')->nullable();
            $table->time('afternoon_rest')->nullable();
            $table->time('night_ctr')->nullable();
            $table->time('night_ass')->nullable();
            $table->time('night_rest')->nullable();
            $table->boolean('unit_adc')->nullable();
            $table->boolean('unit_app')->nullable();
            $table->boolean('unit_app_surv')->nullable();
            $table->boolean('unit_adc_app')->nullable();
            $table->boolean('unit_acc')->nullable();
            $table->boolean('unit_acc_surv')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('logbook_harian');
    }
};
