<?php

namespace Database\Factories;

use App\Models\Event;
use App\Models\Scenario;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Event>
 */
class EventFactory extends Factory
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
            'type' => fake()->randomElement(['economique', 'social', 'crise', 'opportunite']),
            'conditions' => [],
            'effets' => [],
            'poids' => fake()->numberBetween(1, 10),
            'texte_seed' => fake()->sentence(),
        ];
    }
}
