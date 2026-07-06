<?php

namespace Database\Factories;

use App\Models\League;
use App\Models\Scenario;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<League>
 */
class LeagueFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nom' => fake()->company(),
            'scenario_id' => Scenario::factory(),
            'saison' => '2026',
            'timezone' => 'UTC',
            'statut' => 'draft',
            'options' => [],
            'plan' => 'free',
        ];
    }
}
