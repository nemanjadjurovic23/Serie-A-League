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
        Schema::create('player_statistics', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('match_id');
            $table->string('player_name');
            $table->string('team_name');
            $table->integer('player_number');
            $table->string('player_position');
            $table->string('player_is_captain');
            $table->string('player_is_subst');
            $table->integer('player_shots_total');
            $table->integer('player_shots_on_goal');
            $table->integer('player_goals');
            $table->integer('player_goals_conceded');
            $table->integer('player_assists');
            $table->integer('player_offsides');
            $table->string('player_fouls_drawn');
            $table->integer('player_fouls_commited');
            $table->integer('player_tackles');
            $table->integer('player_blocks');
            $table->integer('player_total_crosses');
            $table->integer('player_acc_crosses');
            $table->integer('player_interceptions');
            $table->integer('player_clearances');
            $table->integer('player_saves');
            $table->integer('player_duels_total');
            $table->integer('player_duels_won');
            $table->integer('player_dribble_attempts');
            $table->integer('player_dribble_succ');
            $table->integer('player_yellowcards');
            $table->integer('player_redcards');
            $table->integer('player_passes');
            $table->integer('player_passes_acc');
            $table->integer('player_key_passes');
            $table->integer('player_minutes_played');
            $table->integer('player_rating');
            $table->timestamps();

            $table->foreign('match_id')->references('match_id')->on('events');
        });
    }

        /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('player_statistics');
    }
};
