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
        Schema::create('lineups', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('match_id');
            $table->string('team_type');
            $table->string('lineup_player');
            $table->integer('lineup_number');
            $table->integer('lineup_position');
            $table->timestamps();

            $table->foreign('match_id')->references('match_id')->on('events')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('lineups');
    }
};
