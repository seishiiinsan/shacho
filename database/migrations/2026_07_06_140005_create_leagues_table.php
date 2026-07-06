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
        Schema::create('leagues', function (Blueprint $table) {
            $table->id();
            $table->string('nom');
            $table->foreignId('scenario_id')->constrained()->restrictOnDelete();
            $table->string('saison')->nullable();
            $table->string('timezone')->default('UTC');
            $table->string('statut')->default('draft');
            $table->jsonb('options')->default('{}');
            $table->string('webhook_discord')->nullable();
            $table->string('webhook_slack')->nullable();
            $table->string('plan')->default('free');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('leagues');
    }
};
