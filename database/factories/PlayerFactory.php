<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Player>
 */
class PlayerFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->name(),
            'rank' => $this->faker->randomElement(['Iron', 'Bronze', 'Silver', 'Gold', 'Platinum', 'Diamond', 'Ascendant', 'Immortal', 'Radiant']),
            'main_role' => $this->faker->randomElement(['Duelist', 'Controller', 'Initiator', 'Sentinel']),
            'notes' => $this->faker->sentence(),
            'user_id' => \App\Models\User::factory(),
            'team_id' => \App\Models\Team::factory(),
        ];
    }
}
