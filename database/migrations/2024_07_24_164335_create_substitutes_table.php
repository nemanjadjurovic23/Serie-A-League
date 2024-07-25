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
        Schema::create('substitutes', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('match_id');
            $table->string('team_type');
            $table->string('substitute_player');
            $table->integer('substitute_number');
            $table->integer('substitute_position');
            $table->timestamps();

            $table->foreign('match_id')->references('match_id')->on('events')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('substitutes');
    }
};
