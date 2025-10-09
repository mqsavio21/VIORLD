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
        Schema::create('player_stats', function (Blueprint $table) {
            $table->id();
            $table->foreignId('player_id')->constrained('users');
            $table->integer('episode');
            $table->integer('act');
            $table->string('month');
            $table->string('peak_rating');
            $table->integer('playtime');
            $table->integer('wins');
            $table->float('win_percentage');
            $table->float('kd_ratio');
            $table->float('hs_percentage');
            $table->string('top_agent');
            $table->date('recorded_at');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('player_stats');
    }
};
