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
        Schema::create('game_days', function (Blueprint $table) {
            $table->id();
            $table->foreignId('league_id')->constrained()->cascadeOnDelete();
            $table->unsignedInteger('jour_n');
            $table->jsonb('etat_avant')->nullable();
            $table->jsonb('etat_apres')->nullable();
            $table->jsonb('events_tires')->default('[]');
            $table->text('rapport_narratif')->nullable();
            $table->timestamp('resolu_at')->nullable();
            $table->timestamps();

            $table->unique(['league_id', 'jour_n']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('game_days');
    }
};
