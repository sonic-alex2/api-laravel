<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\MedicalTest>
 */
class MedicalTestFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nombre' => $this->faker->name,
            'tipo' => $this->faker->randomElement(['Sangre','Completo','Acidos','Glucosa','Dermatologico']),
            'cost' => $this->faker->randomFloat($nbMaxDecimals = 2, $min = 10, $max = 1000),
            'tiempo_resultado' => $this->faker->dateTimeBetween($startDate = '-1 years', $endDate = 'now', $timezone = null),
        ];
    }
}
