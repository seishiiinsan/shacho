<?php

namespace Database\Factories;

use App\Models\DecisionTemplate;
use App\Models\Scenario;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<DecisionTemplate>
 */
class DecisionTemplateFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'scenario_id' => Scenario::factory(),
            'role' => fake()->randomElement(['pdg', 'directeur_financier', 'directeur_rh', 'directeur_commercial']),
            'jour_min' => 1,
            'jour_max' => 30,
            'options' => [],
        ];
    }
}
