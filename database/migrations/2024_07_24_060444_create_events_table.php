<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up(): void
    {
        Schema::create('events', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('match_id')->unique();
            $table->integer('country_id');
            $table->integer('league_id');
            $table->date('match_date');
            $table->string('match_status');
            $table->unsignedBigInteger('home_team_id');
            $table->integer('home_team_score');
            $table->unsignedBigInteger('away_team_id');
            $table->integer('away_team_score');
            $table->string('match_home_team_system');
            $table->string('match_away_team_system');
            $table->integer('match_round');
            $table->string('match_referee');
            $table->string('league_year');
            $table->timestamps();

            $table->foreign('home_team_id')->references('team_id')->on('teams')->onDelete('cascade');
            $table->foreign('away_team_id')->references('team_id')->on('teams')->onDelete('cascade');
        });

    }

    public function down(): void
    {
        Schema::dropIfExists('events');
    }
};
