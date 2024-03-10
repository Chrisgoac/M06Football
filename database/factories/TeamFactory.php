<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Team>
 */
class TeamFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name' => $this->faker->unique()->name(),
            'stadium' => $this->faker->name(),
            'numMembers' => $this->faker->numberBetween(5, 22),
            'budget' => $this->faker->numberBetween(100000, 9999999999)
        ];
    }
}
