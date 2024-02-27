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
    public function definition()
    {
        return [
            'name' => $this->faker->name(),
            'surname' => $this->faker->lastName(),
            'position' => $this->faker->randomElement(['delantero', 'mediocentro', 'medioderecho', 'medioizquierdo', 'defensa']),
            'salary' => $this->faker->numberBetween(10000, 999999)
        ];
    }
}
