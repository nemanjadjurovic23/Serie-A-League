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
        Schema::create('standings', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('team_id');
            $table->integer('position');
            $table->integer('played');
            $table->integer('won');
            $table->integer('drawn');
            $table->integer('lost');
            $table->integer('goals_for');
            $table->integer('goals_against');
            $table->integer('goal_difference');
            $table->integer('points');
            $table->timestamps();

            $table->foreign('team_id')->references('id')->on('teams');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('standings');
    }
};
